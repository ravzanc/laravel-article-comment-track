<?php

use Illuminate\Support\Facades\Route;
use Lact\Article\UI\Http\Controller\ArticleController;
use Lact\ArticleComment\UI\Http\Controller\ArticleCommentController;
use Lact\ArticleCommentIntent\UI\Http\Controller\ArticleCommentIntentController;
use Lact\ArticleCommentTrack\UI\Http\Controller\ArticleCommentTrackController;

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
    ->middleware('session.fingerprint')
    ->name('POST /article/{articleId}/comment');

Route::post('/article/{articleId}/comment/intent', [ArticleCommentIntentController::class, 'save'])
    ->middleware('session.fingerprint')
    ->name('POST /article/{articleId}/comment/intent');

Route::get('/article/comment/track', [ArticleCommentTrackController::class, 'getByArticles'])
    ->name('GET /article/comment/track');

Route::get('/article/comment/track/session', [ArticleCommentTrackController::class, 'getBySessions'])
    ->name('GET /article/comment/track/session');
