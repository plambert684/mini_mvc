<?php

namespace mini_mvc\app\Controllers;

use mini_mvc\app\Models\Category;
use mini_mvc\app\Core\Controller;

class CategoryController extends Controller
{

    public function index() {
        $categories = Category::getAll();
        $this->render('category/index', [
            'title' => 'Liste des catégories',
            'categories' => $categories,
        ]);
    }

}