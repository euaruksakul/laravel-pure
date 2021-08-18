<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/user-details/{id}/edit', function () {
    return view('user-details.edit');
})->name('user_details.edit');

Route::get('/user-details/{id}', [UserProfileController::class, 'show'])->middleware(['auth'])->name('user.id');




require __DIR__.'/auth.php';


