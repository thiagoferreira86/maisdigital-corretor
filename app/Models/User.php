<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class User extends Model {
    public function all(): array {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
