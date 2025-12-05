<?php

namespace mini_mvc\app\Controllers;

use mini_mvc\app\Core\Controller;
use mini_mvc\app\Models\LigneCommande;

class LigneCommandeController extends Controller
{
    public function index(): void
    {
        $lignes = LigneCommande::getAll();
        $this->render('ligne_commande/index', [
            'title' => 'Liste des lignes de commande',
            'lignes' => $lignes,
        ]);
    }
}
