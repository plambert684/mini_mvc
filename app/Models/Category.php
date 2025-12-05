<?php

namespace mini_mvc\app\Models;

use mini_mvc\app\Core\Database;

class Category
{
    public $id_categorie;
    public $nom;
    public $description;
    public $created_at;
    public $updated_at;

    // =====================
    // Getters / Setters
    // =====================

    public function getId()
    {
        return $this->id_categorie;
    }

    public function setId($id_categorie)
    {
        $this->id_categorie = $id_categorie;
    }

    public function getName()
    {
        return $this->nom;
    }

    public function setName($name)
    {
        $this->nom = $name;
    }

    // =====================
    // Méthodes CRUD
    // =====================

    /**
     * Récupère toutes les catégories
     * @return array<int,Category>
     */
    public static function getAll(): array
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query("SELECT * FROM categorie ORDER BY id_categorie DESC");

        $categories = [];
        foreach ($stmt as $row) {
            $categorie = new Category();
            $categorie->id_categorie = $row['id_categorie'] ?? null;
            $categorie->nom = $row['nom'] ?? null;
            $categorie->description = $row['description'] ?? null;
            $categorie->created_at = $row['created_at'] ?? null;
            $categorie->updated_at = $row['updated_at'] ?? null;
            $categories[] = $categorie;
        }
        return $categories;
    }
}