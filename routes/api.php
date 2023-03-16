<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("users", UserController::class);

Route::name('api.')
     ->group(function () {
         Route::apiResource('articles', ArticleController::class)
              ->only('index', 'show', 'test');

         Route::get("test", [ArticleController::class, 'test'])
              ->name('test');
     });
