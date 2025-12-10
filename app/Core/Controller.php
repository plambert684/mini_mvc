<?php
// Active le mode strict pour les types
declare(strict_types=1);
// Espace de noms du noyau (Core)
namespace mini_mvc\app\Core;
// Déclare une classe abstraite de contrôleur de base
class Controller
{
    // Méthode utilitaire pour rendre une vue avec des paramètres
    protected function render(string $view, array $params = []): void
    {
        // Extrait les paramètres en variables locales, sans écraser les existantes
        extract(array: $params);
        // Construit le chemin du fichier de vue
        $viewFile = dirname(__DIR__) . '/Views/' . $view . '.php';
        // Construit le chemin du layout principal
        $layoutFile = dirname(__DIR__) . '/Views/layout.php';

        // Démarre la temporisation de sortie pour capturer le rendu de la vue
        ob_start();
        // Inclut la vue spécifique
        require $viewFile;
        
        // Récupère le contenu rendu et nettoie le tampon
        $content = ob_get_clean();

        // Inclut le layout qui utilise la variable $content
        require $layoutFile;
    }

    /**
     * Répond en JSON (API) avec un statut HTTP et des en-têtes optionnels
     * @param mixed $data Données à encoder en JSON
     * @param int $status Code HTTP (par défaut 200)
     * @param array<string,string> $headers En-têtes additionnels
     */
    protected function json(mixed $data, int $status = 200, array $headers = []): void
    {
        http_response_code($status);
        // Forcer le type de contenu JSON
        header('Content-Type: application/json; charset=utf-8');
        // CORS basique (peut être ajusté au besoin)
        if (!headers_sent()) {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
            header('Access-Control-Allow-Headers: Content-Type, Authorization');
        }
        foreach ($headers as $name => $value) {
            header($name . ': ' . $value);
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_INVALID_UTF8_SUBSTITUTE);
    }
}


