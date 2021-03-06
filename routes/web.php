<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class,'index'])->name('movie.index');
Route::get('/show/{id}', [MovieController::class,'show'])->name('movie.show');
