<?php

use App\Controllers\UsersController;
use Core\Router\Route;

// Authentication
Route::get('/api/users', [UsersController::class, 'getAllUsers'])->name('root');
