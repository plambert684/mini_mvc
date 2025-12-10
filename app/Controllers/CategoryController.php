<?php

namespace mini_mvc\app\Controllers;

use mini_mvc\app\Models\Category;
use mini_mvc\app\Core\Controller;

class CategoryController extends Controller
{

    public function index() {
        $categories = Category::getAll();
        $this->json([
            'data' => $categories,
            'meta' => [
                'title' => 'Liste des catégories',
                'count' => is_countable($categories) ? count($categories) : null,
            ],
        ]);
    }

}