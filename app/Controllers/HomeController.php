<?php

namespace App\Controllers;

use App\Models\User;
use Core\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $title = 'Home Page';
        $this->render('home/index', compact('users', 'title'));
    }

    public function getAllUsers(): void
    {
        $users = User::all(['id', 'name', 'email', 'is_manager', 'profile_picture_url']);

        $result = [];

        foreach ($users as $user) {
            $result[] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'is_manager' => $user->is_manager,
                'profile_picture_url' => $user->profile_picture_url,
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
