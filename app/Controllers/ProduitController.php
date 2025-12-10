<?php

namespace mini_mvc\app\Controllers;

use mini_mvc\app\Core\Controller;
use mini_mvc\app\Models\Produit;

class ProduitController extends Controller
{
    public function index(): void
    {
        $produits = Produit::getAll();
        $this->json([
            'data' => $produits,
            'meta' => [
                'title' => 'Liste des produits',
                'count' => is_countable($produits) ? count($produits) : null,
            ],
        ]);
    }
}
