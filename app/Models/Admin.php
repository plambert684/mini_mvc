<?php

namespace mini_mvc\app\Models;

use mini_mvc\app\Core\Database;

class Admin
{
    public $id_admin;
    public $username;
    public $email;
    public $mdp;
    public $created_at;
    public $updated_at;

    /**
     * @return array<int,Admin>
     */
    public static function getAll(): array
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query('SELECT * FROM admin ORDER BY id_admin DESC');
        $items = [];
        foreach ($stmt as $row) {
            $a = new Admin();
            $a->id_admin = $row['id_admin'] ?? null;
            $a->username = $row['username'] ?? null;
            $a->email = $row['email'] ?? null;
            $a->mdp = $row['mdp'] ?? null;
            $a->created_at = $row['created_at'] ?? null;
            $a->updated_at = $row['updated_at'] ?? null;
            $items[] = $a;
        }
        return $items;
    }
}
