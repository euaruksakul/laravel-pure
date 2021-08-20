<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/user-details/{id}/edit', [UserProfileController::class, 'edit'])->middleware(['auth'])->name('user_details.edit');

Route::get('/user-details/{id}', [UserProfileController::class, 'show'])->middleware(['auth'])->name('user_details.show');

Route::post('/user-details', [UserProfileController::class, 'store'])->middleware(['auth'])->name('user_details.store');



require __DIR__.'/auth.php';


