<?php

namespace mini_mvc\app\Controllers;

use mini_mvc\app\Core\Controller;
use mini_mvc\app\Models\Client;

class ClientController extends Controller
{
    public function index(): void
    {
        $clients = Client::getAll();
        $this->json([
            'data' => $clients,
            'meta' => [
                'title' => 'Liste des clients',
                'count' => is_countable($clients) ? count($clients) : null,
            ],
        ]);
    }
}
