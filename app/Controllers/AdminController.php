<?php

namespace mini_mvc\app\Controllers;

use mini_mvc\app\Core\Controller;
use mini_mvc\app\Models\Admin;

class AdminController extends Controller
{
    public function index(): void
    {
        $admins = Admin::getAll();
        $this->render('admin/index', [
            'title' => 'Liste des administrateurs',
            'admins' => $admins,
        ]);
    }
}
