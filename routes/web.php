<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class,'index'])->name('movie.index');
Route::get('/show/{id}', [MovieController::class,'show'])->name('movie.show');

Route::prefix("/actor")->group(function()
{
    Route::get('/', [ActorController::class,'index'])->name('actor.index');
    Route::get('/page/{page?}', [ActorController::class,'index']);
    Route::get('/show/{id}', [ActorController::class,'show'])->name('actor.show');
});

