<?php

namespace mini_mvc\app\Models;

use mini_mvc\app\Core\Database;

class LigneCommande
{
    public $id_ligne;
    public $id_commande;
    public $id_produit;
    public $quantite;
    public $prix_unitaire;
    public $sous_total;
    public $created_at;
    public $updated_at;

    /**
     * @return array<int,LigneCommande>
     */
    public static function getAll(): array
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query('SELECT * FROM ligne_commande ORDER BY id_ligne DESC');
        $items = [];
        foreach ($stmt as $row) {
            $lc = new LigneCommande();
            $lc->id_ligne = $row['id_ligne'] ?? null;
            $lc->id_commande = $row['id_commande'] ?? null;
            $lc->id_produit = $row['id_produit'] ?? null;
            $lc->quantite = $row['quantite'] ?? null;
            $lc->prix_unitaire = $row['prix_unitaire'] ?? null;
            $lc->sous_total = $row['sous_total'] ?? null;
            $lc->created_at = $row['created_at'] ?? null;
            $lc->updated_at = $row['updated_at'] ?? null;
            $items[] = $lc;
        }
        return $items;
    }
}
