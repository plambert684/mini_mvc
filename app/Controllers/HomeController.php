<?php

// Active le mode strict pour la vérification des types
declare(strict_types=1);
// Déclare l'espace de noms pour ce contrôleur
namespace mini_mvc\app\Controllers;
// Importe la classe de base Controller du noyau
use mini_mvc\app\Core\Controller;
use mini_mvc\app\Models\User;

// Déclare la classe finale HomeController qui hérite de Controller
final class HomeController extends Controller
{
    // Page d'accueil (API): renvoie des infos minimales
    public function index(): void
    {
        $this->json([
            'message' => 'Bienvenue sur l\'API Mini MVC',
            'meta' => [
                'app' => 'Mini MVC',
                'env' => getenv('APP_ENV') ?: 'prod',
            ],
        ]);
    }

    public function users(): void
    {
        $users = User::getAll();
        $this->json([
            'data' => $users,
            'meta' => [
                'count' => is_countable($users) ? count($users) : null,
            ],
        ]);
    }
}