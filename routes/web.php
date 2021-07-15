<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth', 'isAdmin'])
->prefix("admin")
->group(function () {
    Route::get("quizzes/{id}",[QuizController::class ,"destroy"])->whereNumber("id")->name("quizzes.destroy");
    Route::resource('quizzes',QuizController::class);
    Route::get("quiz/{quiz_id}/questions/{question_id}",[QuestionController::class,"destroy"])->name("questions.destroy");
    Route::resource('quiz/{quiz_id}/questions', QuestionController::class);
});
