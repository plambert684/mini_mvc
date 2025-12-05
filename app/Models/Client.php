<?php

namespace mini_mvc\app\Models;

use mini_mvc\app\Core\Database;

class Client
{
    public $id_client;
    public $nom;
    public $prenom;
    public $email;
    public $mdp;
    public $adresse;
    public $ville;
    public $code_postal;
    public $created_at;
    public $updated_at;

    /**
     * @return array<int,Client>
     */
    public static function getAll(): array
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query('SELECT * FROM client ORDER BY id_client DESC');
        $items = [];
        foreach ($stmt as $row) {
            $c = new Client();
            $c->id_client = $row['id_client'] ?? null;
            $c->nom = $row['nom'] ?? null;
            $c->prenom = $row['prenom'] ?? null;
            $c->email = $row['email'] ?? null;
            $c->mdp = $row['mdp'] ?? null;
            $c->adresse = $row['adresse'] ?? null;
            $c->ville = $row['ville'] ?? null;
            $c->code_postal = $row['code_postal'] ?? null;
            $c->created_at = $row['created_at'] ?? null;
            $c->updated_at = $row['updated_at'] ?? null;
            $items[] = $c;
        }
        return $items;
    }
}
