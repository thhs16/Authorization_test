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

    Route::get('admin/Process', function(){
        dd("admin acc process is running");
    })->name('adminProcess')->middleware('admin');

    Route::get('user/Process', function(){
        dd("user acc process is running");
    })->name('userProcess')->middleware('user');

    Route::group(['middleware' => 'admin'], function(){
        Route::get('admin/Process', function(){
            dd("admin acc process is running");
        })->name('adminProcess');
    });

    Route::group(['middleware' => 'user', 'prefix' => 'user'], function(){ // includes prefix
        Route::get('Process', function(){ // URI: user/Process
            dd("user acc process is running");
        })->name('adminProcess');

        Route::get('fakeUserRoute', function(){
            dd("user fake route");
        })->name('userfakeR');
    });


});

require __DIR__.'/auth.php';
