<?php
declare(strict_types=1);

abstract class ActiveRecord {
    
    protected ?PDO $connection = null;

    protected function getConnection(): PDO {
        if ($this->connection === null) {
            $host = HOSTNAME;
            $user = USERNAME;
            $pass = PASSWORD;
            $db = DATABASE;

            try {
                $this->connection = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return $this->connection;
    }
    
    protected function getTable(): string {
        return strtolower(static::class) . 's';
    }

    protected function getFields(): array {
        return array_diff(array_keys(get_object_vars($this)), ['id', 'connection']);
    }
    public function delete(): bool {
        if (!isset($this->id)) {
            return false;
        }

        // INÍCIO - LÓGICA DE AUDITORIA
        $dadosAnterioresObj = static::findById($this->id);
        $dadosAnteriores = $dadosAnterioresObj ? get_object_vars($dadosAnterioresObj) : null;
        if (isset($dadosAnteriores['connection'])) {
            unset($dadosAnteriores['connection']);
        }
        // FIM - LÓGICA DE AUDITORIA
    
        $tabela = $this->getTable();
        $stmt = $this->getConnection()->prepare("DELETE FROM {$tabela} WHERE id = :id");
        $success = $stmt->execute(['id' => $this->id]);

        if ($success && $dadosAnteriores) {
            // INÍCIO - LÓGICA DE AUDITORIA
            $this->logAuditoria('DELETE', $this->id, $dadosAnteriores, null);
            // FIM - LÓGICA DE AUDITORIA
        }

        return $success;
    }
    
    public function save(): bool {
        if (!empty($this->id)) {
            return $this->update();
        }

        $fields = $this->getFields();
        $columns = implode(', ', $fields);
        $placeholders = implode(', ', array_map(fn($f) => ":$f", $fields));

        $sql = "INSERT INTO " . $this->getTable() . " ($columns) VALUES ($placeholders)";
        $stmt = $this->getConnection()->prepare($sql);

        foreach ($fields as $field) {
            $value = $this->$field ?? '';
            $stmt->bindValue(":$field", $value);
        }

        if ($stmt->execute()) {
            $this->id = (int)$this->getConnection()->lastInsertId();

             // INÍCIO - LÓGICA DE AUDITORIA
            $dadosNovos = get_object_vars($this);
            unset($dadosNovos['connection']); // Remove a conexão do log
            $this->logAuditoria('INSERT', $this->id, null, $dadosNovos);
            // FIM - LÓGICA DE AUDITORIA

            return true;
        }
        return false;
    }

    private function update(): bool {

        // INÍCIO - LÓGICA DE AUDITORIA (captura dados anteriores)
        $dadosAnterioresObj = static::findById($this->id);
        $dadosAnteriores = $dadosAnterioresObj ? get_object_vars($dadosAnterioresObj) : null;
        if (isset($dadosAnteriores['connection'])) {
            unset($dadosAnteriores['connection']);
        }
        // FIM - LÓGICA DE AUDITORIA
        
        $fields = $this->getFields();
        $set = implode(', ', array_map(fn($f) => "$f = :$f", $fields));
        $sql = "UPDATE " . $this->getTable() . " SET $set WHERE id = :id";

        $stmt = $this->getConnection()->prepare($sql);

        foreach ($fields as $field) {
            $value = $this->$field ?? '';
            $stmt->bindValue(":$field", $value);
        }
        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);

        $success = $stmt->execute();

        if ($success) {
            // INÍCIO - LÓGICA DE AUDITORIA (grava o log)
            $dadosNovos = get_object_vars($this);
            unset($dadosNovos['connection']);
            $this->logAuditoria('UPDATE', $this->id, $dadosAnteriores, $dadosNovos);
            // FIM - LÓGICA DE AUDITORIA
        }

        return $success;
    }

    protected static function load(string $table, string $class, ?array $conditions = null, string $order = 'id ASC', ?string $group = null): array {
        $sql = "SELECT * FROM `$table`";
        if (!empty($conditions)) {
            $sql .= ' WHERE ' . implode(' AND ', $conditions);
        }
        if ($group) {
            $sql .= ' GROUP BY ' . $group;
        }
        $sql .= ' ORDER BY ' . $order;

        $stmt = (new static())->getConnection()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, $class);
    }

    protected static function query(string $query, ?string $class = null): array {
        $stmt = (new static())->getConnection()->prepare($query);
        $stmt->execute();

        return $class
            ? $stmt->fetchAll(PDO::FETCH_CLASS, $class)
            : $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function count(string $conditions = '1=1', ?string $table = null): int {
        if ($table === null) {
            throw new Exception("Tabela não especificada");
        }
        $sql = "SELECT COUNT(id) as qntd FROM `$table` WHERE $conditions";
        $stmt = (new static())->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int)($result['qntd'] ?? 0);
    }

    public function destroy(): bool {
        $sql = "DELETE FROM " . $this->getTable() . " WHERE id = :id";
        $stmt = $this->getConnection()->prepare($sql);
        return $stmt->execute([':id' => $this->id]);
    }

    protected static function treatConditions(int $id = 0, ?array $conditions = null): array {
        if (empty($conditions) && $id > 0) {
            $conditions = [];
        }
        if ($id > 0) {
            $conditions[] = sprintf("id='%d'", $id);
        }
        return $conditions ?? [];
    }

    public function fetch(array $params): void {
        foreach ($params as $k => $v) {
            if (in_array($k, $this->getFields(), true)) {
                $this->$k = is_string($v) ? trim($v) : $v;
            }
        }
    }

    protected function change_field(string $table, string $field, $value, string $conditions = '0=0'): bool {
        $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        mysqli_set_charset($conn, 'utf8');
        $query = sprintf("UPDATE `%s` SET `%s` = '%s' WHERE %s", $table, $field, mysqli_real_escape_string($conn, $value), $conditions);
        // echo $query; // descomente para debug
        return mysqli_query($conn, $query);
    }

    public static function findById(int $id): ?static{
        $table = (new static())->getTable();
        $sql = "SELECT * FROM `$table` WHERE id = :id";
        
        $stmt = (new static())->getConnection()->prepare($sql);
        $stmt->execute(['id' => $id]);
        
        $result = $stmt->fetchObject(static::class);

        return $result ?: null;
    }

    private function logAuditoria(string $acao, int $registroId, ?array $dadosAnteriores, ?array $dadosNovos): void{
        // Garante que a sessão foi iniciada para buscar o ID do admin/corretora
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $sql = "INSERT INTO PROauditoria (tabela_alterada, acao, registro_id, dados_anteriores, dados_novos, corretora_id, ip, navegador, data_cadastro, admin_id) 
                VALUES (:tabela_alterada, :acao, :registro_id, :dados_anteriores, :dados_novos, :corretora_id, :ip, :navegador, NOW(), :admin_id)";

        $stmt = $this->getConnection()->prepare($sql);

        // Prepara os dados para o log
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'N/A';
        $navegador = $_SERVER['HTTP_USER_AGENT'] ?? 'N/A';
        // Assumindo que você guarda o ID do admin e da corretora na sessão
        $admin_id = $_SESSION['admin_id'] ?? null;
        $corretora_id = $_SESSION['corretora_id'] ?? null;

        $stmt->bindValue(':tabela_alterada', $this->getTable());
        $stmt->bindValue(':acao', $acao);
        $stmt->bindValue(':registro_id', $registroId, PDO::PARAM_INT);
        $stmt->bindValue(':dados_anteriores', $dadosAnteriores ? json_encode($dadosAnteriores, JSON_UNESCAPED_UNICODE) : null);
        $stmt->bindValue(':dados_novos', $dadosNovos ? json_encode($dadosNovos, JSON_UNESCAPED_UNICODE) : null);
        $stmt->bindValue(':corretora_id', $corretora_id, PDO::PARAM_INT);
        $stmt->bindValue(':ip', $ip);
        $stmt->bindValue(':navegador', $navegador);
        $stmt->bindValue(':admin_id', $admin_id, PDO::PARAM_INT);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            error_log('Falha ao gravar auditoria: ' . $e->getMessage());
        }
    }
}
?>
