<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('theme-toggle', function () {
    if (session('theme')) {
        session()->forget('theme');
    } else {
        session(['theme' => 'dark']);
    }
    return back();
})->name('theme-toggle');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::redirect('/home', '/');
Route::resource("users", UserController::class);
