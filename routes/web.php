<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('admin/dashboard',function(){
    //     return view('adminHome');
    // })->name('adminHome');

    Route::get('admin/dashboard',function(){
        return view('adminHomePage');
    })->name('admHomePg');

    Route::get('user/dashboard',function(){
        return view('userHomePage');
    })->name('userHomePg');
});

require __DIR__.'/auth.php';
