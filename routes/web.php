<?php

use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index'])
     ->name('index');

Route::get('/article/{id}', [ArticleController::class, 'show'])
     ->name('article.show');


// V1 - Without BDD ##########
// Route::get('/', [HomeController::class, 'index'])
//      ->name('home');
//
// Route::get('/article/{articleId}', [HomeController::class, 'show'])
//      ->name('article.show');
