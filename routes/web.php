<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('welcome');
});

//etudiants routes
Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiants.index');
Route::get('/etudiants/create', [EtudiantController::class, 'create'])->name('etudiants.create');
Route::post('/etudiants', [EtudiantController::class, 'store'])->name('etudiants.store');
Route::get('/etudiants/{id}', [EtudiantController::class, 'show'])->name('etudiants.show');
Route::put('/etudiants/{id}', [EtudiantController::class, 'update'])->name('etudiants.update');
Route::delete('/etudiants/{id}', [EtudiantController::class, 'destroy'])->name('etudiants.destroy');


//profs routes
Route::get('/profs', [ProfController::class, 'showAll'])->name('profs.showAll');
Route::get('/profs/create', [ProfController::class, 'create'])->name('profs.create');
Route::post('/profs', [ProfController::class, 'store'])->name('profs.store');
Route::get('/profs/{id}', [ProfController::class, 'show'])->name('profs.show');
Route::put('/profs/{id}', [ProfController::class, 'update'])->name('profs.update');
Route::delete('/profs/{id}', [ProfController::class, 'destroy'])->name('profs.destroy');


// quizzes routes
Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');
Route::get('/quizzes/create', [QuizController::class, 'create'])->name('quizzes.create');
Route::post('/quizzes', [QuizController::class, 'store'])->name('quizzes.store');
Route::get('/quizzes/{id}', [QuizController::class, 'edit'])->name('quizzes.edit');
Route::put('/quizzes/{id}', [QuizController::class, 'update'])->name('quizzes.update');
Route::delete('/quizzes/{id}', [QuizController::class, 'destroy'])->name('quizzes.destroy');
