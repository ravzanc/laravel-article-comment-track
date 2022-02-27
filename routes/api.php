<?php

use Illuminate\Support\Facades\Route;
use Lact\Article\UI\Http\Controller\ArticleController;
use Lact\ArticleComment\UI\Http\Controller\ArticleCommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/article/{articleId}', [ArticleController::class, 'get'])
    ->name('GET /article/{articleId}');

Route::post('/article/{articleId}/comment', [ArticleCommentController::class, 'save'])
    ->name('POST /article/{articleId}/comment');
