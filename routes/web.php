<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//User detail
Route::get('/user-details/{id}/edit', [UserProfileController::class, 'edit'])->middleware(['auth'])->name('user_details.edit');
Route::get('/user-details/{id}', [UserProfileController::class, 'show'])->middleware(['auth'])->name('user_details.show');
Route::post('/user-details', [UserProfileController::class, 'store'])->middleware(['auth'])->name('user_details.store');

//Projects
Route::get('/projects/create', [ProjectController::class, 'create'])->middleware(['auth'])->name('projects.create');
Route::post('/projects', [ProjectController::class, 'store'])->middleware(['auth'])->name('projects.store');
Route::get('/projects', [ProjectController::class, 'index'])->middleware(['auth'])->name('projects.index');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->middleware(['auth'])->name('projects.show');
Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->middleware(['auth'])->name('projects.edit');
Route::put('/projects/{id}', [ProjectController::class, 'update'])->middleware(['auth'])->name('projects.update');

require __DIR__.'/auth.php';


