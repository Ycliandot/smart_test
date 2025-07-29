<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\FilmController::class, 'index'])->name('film.index');
Route::get('/films/create', [\App\Http\Controllers\FilmController::class, 'create'])->name('film.create');
Route::post('/films', [\App\Http\Controllers\FilmController::class, 'store'])->name('film.store');
Route::get('/films/{film}/edit', [\App\Http\Controllers\FilmController::class, 'edit'])->name('film.edit');
Route::patch('/films/{film}', [\App\Http\Controllers\FilmController::class, 'update'])->name('film.update');
Route::delete('/films/{film}', [\App\Http\Controllers\FilmController::class, 'destroy'])->name('film.destroy');
Route::get('/films/{film}/set-active', [\App\Http\Controllers\FilmController::class, 'setActive'])
    ->name('film.set_active');

