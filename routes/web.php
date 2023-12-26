<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PostController::class)->middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/add-post', 'create')->middleware(['can:isAdmin'])->name('add_post');
    Route::post('/store-post', 'store')->name('store_post');
    Route::get('/single-post/{id}', 'show')->name('single_post');
    Route::get('/edit-post/{id}', 'edit')->name('edit');
    Route::put('/update-post/{id}', 'update')->name('update');
    Route::get('/delete-post/{id}', 'destroy')->name('delete');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

