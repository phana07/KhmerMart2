<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/user', [PageController::class, 'user']);
Route::get('/', [PageController::class, 'home']);
Route::get('/about', [PageController::class, 'about']);

