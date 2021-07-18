<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('panel', [MainController::class,"dashboard"])->name("dashboard");
    Route::get('quiz/detay/{slug}', [MainController::class, "quiz_detail"])->name("quiz_detail");
    Route::get('quiz/{slug}', [MainController::class, "quiz"])->name("quiz_join");
    Route::post('quiz/{slug}', [MainController::class, "result"])->name("quiz_result");
});
Route::middleware(['auth', 'isAdmin'])
->prefix("admin")
->group(function () {
    Route::get("quizzes/{id}",[QuizController::class ,"destroy"])->whereNumber("id")->name("quizzes.destroy");
    Route::get("quizzes/{id}/info", [QuizController::class, "show"])->whereNumber("id")->name("quizzes.info");
    Route::resource('quizzes',QuizController::class);
    Route::get("quiz/{quiz_id}/questions/{question_id}",[QuestionController::class,"destroy"])->name("questions.destroy");
    Route::resource('quiz/{quiz_id}/questions', QuestionController::class);
});
