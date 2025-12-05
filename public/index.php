<?php
// Strict types for safety
declare(strict_types=1);

// Use Composer autoload if available
$autoloadPath = dirname(__DIR__) . '/vendor/autoload.php';
if (file_exists($autoloadPath)) {
    require $autoloadPath;
}

// Fallback: include a minimal PSR-4 autoloader if composer is not yet installed
spl_autoload_register(function (string $class): void {
    $prefix = 'mini_mvc\\app\\';
    $baseDir = dirname(__DIR__) . '/app/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return; // another namespace
    }
    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

use mini_mvc\app\Core\Router;
use mini_mvc\app\Controllers\HomeController;
use mini_mvc\app\Controllers\CategoryController;
use mini_mvc\app\Controllers\ClientController;
use mini_mvc\app\Controllers\ProduitController;
use mini_mvc\app\Controllers\CommandeController;
use mini_mvc\app\Controllers\AdminController;
use mini_mvc\app\Controllers\LigneCommandeController;

// Declare the routes table
$routes = [
    // GET / -> HomeController@index
    ['GET', '/', [HomeController::class, 'index']],
    // Listing routes for each table
    ['GET', '/categories', [CategoryController::class, 'index']],
    ['GET', '/clients', [ClientController::class, 'index']],
    ['GET', '/produits', [ProduitController::class, 'index']],
    ['GET', '/commandes', [CommandeController::class, 'index']],
    ['GET', '/admins', [AdminController::class, 'index']],
    ['GET', '/lignes-commandes', [LigneCommandeController::class, 'index']],
];

// Instantiate the router and dispatch the current request
$router = new Router($routes);
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$uri = $_SERVER['REQUEST_URI'] ?? '/';
$router->dispatch($method, $uri);
