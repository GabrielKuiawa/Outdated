<?php

namespace Database\Populate;

use App\Models\User;

class UsersPopulate
{
    public static function populate()
    {
        self::createUser('John Doe', 'teste@email', '12345', false, 'https://example.com/profile1.jpg');
        $numberOfUsers = 3;

        for ($i = 0; $i < $numberOfUsers; $i++) {
            self::createUser('User ' . ($i + 1), 'user' . ($i + 1) . '@email', '12345', true, 'https://example.com/profile' . ($i + 2) . '.jpg');
            echo 'User ' . ($i + 1) . ' created successfully.' . PHP_EOL;
        }

        echo "Users populated successfully.\n";
    }

    public static function createUser(string $name, string $email, string $password, bool $is_manager, string $profile_picture_url): void
    {
        $user = new User([
            'name' => $name,
            'email' => $email,
            'encrypted_password' => $password,
            'is_manager' => (int)$is_manager,
            'profile_picture_url' => $profile_picture_url
        ]);

        $user->validates();
        $user->authenticate($password);
        $user->save();
    }
}
