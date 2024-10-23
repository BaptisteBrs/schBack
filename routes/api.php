<?php

use App\Http\Controllers\AbilitiesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleTypeController;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConvocationController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GameTypeController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\PefController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Models\Partenaire;
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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('users/upload', [UserController::class, 'uploadFile'])->name('users-upload');
    Route::get('users/players/{category}', [UserController::class, 'playersByCategory'])->name('playersByCategory');
    Route::get('users/coachs/{category}', [UserController::class, 'coachsByCategory'])->name('coachsByCategory');
    Route::get('users/update/a/{id}', [UserController::class, 'setAdmin'])->name('setAdmin');
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('articles', ArticleController::class);
    Route::post('articles/upload', [ArticleController::class, 'uploadFile'])->name('article-upload');
    Route::resource('pef', PefController::class);
    Route::post('pef/upload', [PefController::class, 'uploadFile'])->name('pef-upload');
    Route::get('teams/without/{date}', [TeamController::class, 'noGameTeams']);
    Route::get('teams/withoutForGames/{date}', [TeamController::class, 'noGameTeamsForGames']);
    Route::resource('teams', TeamController::class);
    Route::post('partenaires/upload', [ArticleController::class, 'uploadFile'])->name('articles-upload');
    Route::resource('article-types', ArticleTypeController::class);
    Route::post('article-types/upload', [ArticleTypeController::class, 'uploadFile'])->name('article-types-upload');
    Route::resource('boutiques', BoutiqueController::class);
    Route::post('boutiques/upload', [BoutiqueController::class, 'uploadFile'])->name('boutiques-upload');
    Route::get('convocations/players/{date}', [ConvocationController::class, 'selectedPlayersByCategory']);
    Route::resource('convocations', ConvocationController::class);
    Route::get('games/allNotFinish', [GameController::class, 'allNotFinish']);
    Route::resource('games', GameController::class);
    Route::resource('game-types', GameTypeController::class);
    Route::post('partenaires/upload', [PartenaireController::class, 'uploadFile'])->name('partenaires-upload');
    Route::resource('partenaires', PartenaireController::class);
    Route::resource('tags', TagController::class);
    Route::resource('abilities', AbilitiesController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
});

Route::post('public/check', [UserController::class, 'checkToken'])->name('checkToken');
Route::post('public/login', [UserController::class, 'login'])->name('login');
Route::post('public/firstconnexion', [UserController::class, 'firstConnexion'])->name('firstconnexion');
Route::post('public/update/password', [UserController::class, 'updatePassword'])->name('updatePassword');
Route::get('public/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('public/last', [GameController::class, 'last'])->name('last');
Route::get('public/next', [GameController::class, 'next'])->name('next');
Route::get('public/all/next', [GameController::class, 'allNext'])->name('allNext');
Route::get('public/partenaires', [PartenaireController::class, 'index'])->name('partenaire');
Route::get('public/organigramme', [UserController::class, 'organigramme'])->name('organigramme');
Route::get('public/convocations/{id}/{code}', [ConvocationController::class, 'lastByCategory'])->name('convocationsByCategory');
Route::get('public/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('public/pefs', [PefController::class, 'index'])->name('pefs');
Route::get('public/articles/details/{id}', [ArticleController::class, 'show'])->name('articles_show');
Route::get('public/articles/last', [ArticleController::class, 'last'])->name('last_articles');
Route::get('public/article_types', [ArticleTypeController::class, 'index'])->name('article_types');
Route::get('public/tags', [TagController::class, 'index'])->name('tags');
Route::post('public/boutique/download', [BoutiqueController::class, 'downloadBonCommande'])->name('downloadBonCommande');
