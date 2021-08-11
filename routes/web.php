<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::get('/test', [TestController::class,'goTest']);
Route::get('/users/{id}', [UserProfileController::class, 'show'])->middleware(['auth'])->name('user.id');

require __DIR__.'/auth.php';


