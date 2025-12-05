<?php

namespace mini_mvc\app\Models;

use mini_mvc\app\Core\Database;

class Produit
{
    public $id_produit;
    public $nom;
    public $description;
    public $prix;
    public $stock;
    public $image;
    public $actif;
    public $id_categorie;
    public $created_at;
    public $updated_at;

    /**
     * @return array<int,Produit>
     */
    public static function getAll(): array
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query('SELECT * FROM produit ORDER BY id_produit DESC');
        $items = [];
        foreach ($stmt as $row) {
            $p = new Produit();
            $p->id_produit = $row['id_produit'] ?? null;
            $p->nom = $row['nom'] ?? null;
            $p->description = $row['description'] ?? null;
            $p->prix = $row['prix'] ?? null;
            $p->stock = $row['stock'] ?? null;
            $p->image = $row['image'] ?? null;
            $p->actif = $row['actif'] ?? null;
            $p->id_categorie = $row['id_categorie'] ?? null;
            $p->created_at = $row['created_at'] ?? null;
            $p->updated_at = $row['updated_at'] ?? null;
            $items[] = $p;
        }
        return $items;
    }
}
