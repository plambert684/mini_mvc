<?php

namespace mini_mvc\app\Models;

use mini_mvc\app\Core\Database;

class Commande
{
    public $id_commande;
    public $numero_commande;
    public $statut;
    public $montant_total;
    public $adresse_livraison;
    public $ville_livraison;
    public $code_postal_livraison;
    public $date_commande;
    public $id_client;
    public $created_at;
    public $updated_at;

    /**
     * @return array<int,Commande>
     */
    public static function getAll(): array
    {
        $pdo = Database::getPDO();
        $stmt = $pdo->query('SELECT * FROM commande ORDER BY id_commande DESC');
        $items = [];
        foreach ($stmt as $row) {
            $o = new Commande();
            $o->id_commande = $row['id_commande'] ?? null;
            $o->numero_commande = $row['numero_commande'] ?? null;
            $o->statut = $row['statut'] ?? null;
            $o->montant_total = $row['montant_total'] ?? null;
            $o->adresse_livraison = $row['adresse_livraison'] ?? null;
            $o->ville_livraison = $row['ville_livraison'] ?? null;
            $o->code_postal_livraison = $row['code_postal_livraison'] ?? null;
            $o->date_commande = $row['date_commande'] ?? null;
            $o->id_client = $row['id_client'] ?? null;
            $o->created_at = $row['created_at'] ?? null;
            $o->updated_at = $row['updated_at'] ?? null;
            $items[] = $o;
        }
        return $items;
    }
}
