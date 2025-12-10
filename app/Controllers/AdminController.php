<?php

namespace mini_mvc\app\Controllers;

use mini_mvc\app\Core\Controller;
use mini_mvc\app\Models\Admin;

class AdminController extends Controller
{
    public function index(): void
    {
        $admins = Admin::getAll();
        $this->json([
            'data' => $admins,
            'meta' => [
                'title' => 'Liste des administrateurs',
                'count' => is_countable($admins) ? count($admins) : null,
            ],
        ]);
    }
}
