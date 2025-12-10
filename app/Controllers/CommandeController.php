<?php

namespace mini_mvc\app\Controllers;

use mini_mvc\app\Core\Controller;
use mini_mvc\app\Models\Commande;

class CommandeController extends Controller
{
    public function index(): void
    {
        $commandes = Commande::getAll();
        $this->json([
            'data' => $commandes,
            'meta' => [
                'title' => 'Liste des commandes',
                'count' => is_countable($commandes) ? count($commandes) : null,
            ],
        ]);
    }
}
