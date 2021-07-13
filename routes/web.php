<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth', 'isAdmin'])
->prefix("admin")
->group(function () {
    Route::get('deneme', function () {
        return "deneme";
    });
    Route::resource('quizzes',QuizController::class);
});
