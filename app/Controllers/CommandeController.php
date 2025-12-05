<?php

namespace mini_mvc\app\Controllers;

use mini_mvc\app\Core\Controller;
use mini_mvc\app\Models\Commande;

class CommandeController extends Controller
{
    public function index(): void
    {
        $commandes = Commande::getAll();
        $this->render('commande/index', [
            'title' => 'Liste des commandes',
            'commandes' => $commandes,
        ]);
    }
}
