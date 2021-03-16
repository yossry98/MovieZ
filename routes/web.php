<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\tvShowController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class,'index'])->name('movie.index');
Route::get('/show/{id}', [MovieController::class,'show'])->name('movie.show');

Route::prefix("/actor")->group(function()
{
    Route::get('/', [ActorController::class,'index'])->name('actor.index');
    Route::get('/page/{id?}', [ActorController::class,'index']);
    Route::get('/show/{id}', [ActorController::class,'show'])->name('actor.show');
});

Route::prefix("/tvshow")->group(function()
{
    Route::get('/', [tvShowController::class,'index'])->name('tvshow.index');
    Route::get('/show/{id}', [tvShowController::class,'show'])->name('tvshow.show');
});
