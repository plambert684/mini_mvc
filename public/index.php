<?php

declare(strict_types=1);

$autoloadPath = dirname(__DIR__) . '/vendor/autoload.php';
if (file_exists($autoloadPath)) {
    require $autoloadPath;
}

use mini_mvc\app\Core\Router;
use mini_mvc\app\Controllers\HomeController;
use mini_mvc\app\Controllers\CategoryController;
use mini_mvc\app\Controllers\ClientController;
use mini_mvc\app\Controllers\ProduitController;
use mini_mvc\app\Controllers\CommandeController;
use mini_mvc\app\Controllers\AdminController;
use mini_mvc\app\Controllers\LigneCommandeController;

$routes = [
    ['GET', '/', [HomeController::class, 'index']],
    ['GET', '/categories', [CategoryController::class, 'index']],
    ['GET', '/clients', [ClientController::class, 'index']],
    ['GET', '/produits', [ProduitController::class, 'index']],
    ['GET', '/commandes', [CommandeController::class, 'index']],
    ['GET', '/admins', [AdminController::class, 'index']],
    ['GET', '/lignes-commandes', [LigneCommandeController::class, 'index']],
];

$router = new Router($routes);
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$uri = $_SERVER['REQUEST_URI'] ?? '/';
$router->dispatch($method, $uri);
