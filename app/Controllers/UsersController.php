<?php

namespace App\Controllers;

use App\Models\User;
use Core\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function getAllUsers(): void
    {
        $users = User::all();

        $result = [];

        foreach ($users as $user) {
            $result[] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'is_manager' => (bool) $user->is_manager,
                'profile_picture_url' => $user->profile_picture_url,
            ];
        }

        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($result);
    }
}
