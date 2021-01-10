<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ProfileController;

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


Route::get("home-songs", [SongController::class, "SongsResultForApi"]);

Route::middleware('auth:api')->get('/test', [ProfileController::class, "addSongToFavourites"]);
// Route::get("/add-to-favourite/{id}", [ProfileController::class, "addSongToFavourites"]);
