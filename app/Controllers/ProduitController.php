<?php

namespace mini_mvc\app\Controllers;

use mini_mvc\app\Core\Controller;
use mini_mvc\app\Models\Produit;

class ProduitController extends Controller
{
    public function index(): void
    {
        $produits = Produit::getAll();
        $this->render('produit/index', [
            'title' => 'Liste des produits',
            'produits' => $produits,
        ]);
    }
}
