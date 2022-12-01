<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleTypeController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConvocationController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameTypeController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->group(function(){
    Route::resource('users', UserController::class);
});


Route::post('/login', [UserController::class, 'login'])->name('login');

// Route::resource('article', ArticleController::class);
// Route::resource('article-type', ArticleTypeController::class);
// Route::resource('boutique', BoutiqueController::class);
// Route::resource('controllers', CategoryController::class);
// Route::resource('convocation', ConvocationController::class);
// Route::resource('game', GameController::class);
// Route::resource('game-type', GameTypeController::class);
// Route::resource('partner', PartenaireController::class);
// Route::resource('tag', TagController::class);
// Route::resource('team', TeamController::class);
