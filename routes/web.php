<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Livewire\ArticleIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
     ->name('home');

Route::get('/article/{articleId}', [HomeController::class, 'show'])
     ->name('article.show');
