<?php

namespace mini_mvc\app\Controllers;

use mini_mvc\app\Core\Controller;
use mini_mvc\app\Models\LigneCommande;

class LigneCommandeController extends Controller
{
    public function index(): void
    {
        $lignes = LigneCommande::getAll();
        $this->json([
            'data' => $lignes,
            'meta' => [
                'title' => 'Liste des lignes de commande',
                'count' => is_countable($lignes) ? count($lignes) : null,
            ],
        ]);
    }
}
