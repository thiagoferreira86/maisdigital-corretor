<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\ActiveRecord;

$db = new PDO("mysql:host=" . HOSTNAME . ";dbname=" . DATABASE . ";charset=utf8mb4", USERNAME, PASSWORD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
ActiveRecord::setConnection($db);

$filtroTabela = $_GET['tabela'] ?? '';
$filtroAcao = $_GET['acao'] ?? '';
$filtroId = $_GET['registro_id'] ?? '';
$dataInicio = $_GET['data_inicio'] ?? '';
$dataFim = $_GET['data_fim'] ?? '';

$page = (int)($_GET['page'] ?? 0);
$limit = 10;
$offset = $page * $limit;

$where = ["1=1"];
if ($filtroTabela) $where[] = "tabela_alterada = " . $db->quote($filtroTabela);
if ($filtroAcao) $where[] = "acao = " . $db->quote($filtroAcao);
if ($filtroId) $where[] = "registro_id = " . (int)$filtroId;
if ($dataInicio) $where[] = "DATE(data_cadastro) >= " . $db->quote($dataInicio);
if ($dataFim) $where[] = "DATE(data_cadastro) <= " . $db->quote($dataFim);

$sql = "SELECT * FROM MDM_logs_auditoria WHERE " . implode(" AND ", $where) . " ORDER BY data_cadastro DESC LIMIT $offset, $limit";
$stmt = $db->query($sql);
$logs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Logs de Auditoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        pre { font-size: 0.85rem; background: #f8f9fa; padding: 10px; }
    </style>
</head>
<body class="p-4">
    <h2 class="mb-4">Logs de Auditoria</h2>

    <form class="row g-3 mb-4" method="GET">
        <div class="col-md-2">
            <input type="text" name="tabela" class="form-control" placeholder="Tabela" value="<?= htmlspecialchars($filtroTabela) ?>">
        </div>
        <div class="col-md-2">
            <select name="acao" class="form-select">
                <option value="">Ação</option>
                <option <?= $filtroAcao === 'INSERT' ? 'selected' : '' ?>>INSERT</option>
                <option <?= $filtroAcao === 'UPDATE' ? 'selected' : '' ?>>UPDATE</option>
                <option <?= $filtroAcao === 'DELETE' ? 'selected' : '' ?>>DELETE</option>
            </select>
        </div>
        <div class="col-md-2">
            <input type="number" name="registro_id" class="form-control" placeholder="ID do Registro" value="<?= htmlspecialchars($filtroId) ?>">
        </div>
        <div class="col-md-2">
            <input type="date" name="data_inicio" class="form-control" value="<?= htmlspecialchars($dataInicio) ?>">
        </div>
        <div class="col-md-2">
            <input type="date" name="data_fim" class="form-control" value="<?= htmlspecialchars($dataFim) ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
        </div>
    </form>

    <table class="table table-bordered table-sm table-hover">
        <thead class="table-light">
            <tr>
                <th>Data</th>
                <th>Tabela</th>
                <th>Ação</th>
                <th>ID</th>
                <th>Corretora</th>
                <th>Usuário</th>
                <th>Admin</th>
                <th>Dados Anteriores</th>
                <th>Dados Novos</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($logs as $log): ?>
                <tr>
                    <td><?= $log['data_cadastro'] ?></td>
                    <td><?= $log['tabela_alterada'] ?></td>
                    <td><?= $log['acao'] ?></td>
                    <td><?= $log['registro_id'] ?></td>
                    <td><?= $log['corretora_id'] ?></td>
                    <td><?= $log['usuario_id'] ?></td>
                    <td><?= $log['admin_id'] ?></td>
                    <td><pre><?= json_encode(json_decode($log['dados_anteriores'] ?? '{}'), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) ?></pre></td>
                    <td><pre><?= json_encode(json_decode($log['dados_novos'] ?? '{}'), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) ?></pre></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="d-flex justify-content-between">
        <a href="?<?= http_build_query(array_merge($_GET, ['page' => max(0, $page - 1)]) ) ?>" class="btn btn-outline-secondary btn-sm">Anterior</a>
        <a href="?<?= http_build_query(array_merge($_GET, ['page' => $page + 1]) ) ?>" class="btn btn-outline-secondary btn-sm">Próximo</a>
    </div>
</body>
</html>
