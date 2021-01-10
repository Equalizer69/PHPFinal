<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SongController::class, 'home'])->name("home");


Route::get("/user/auth", [UserController::class, 'authenticate'])->name("login");
Route::post("/user/auth", [UserController::class, 'attemptLogin']);

Route::get("/user/register", [UserController::class, 'register'])->name("register");
Route::post("/user/register", [UserController::class, 'attemptRegister']);

Route::get("/user/logout", [UserController::class, 'logout'])->name("logout");


Route::get("/songs", [SongController::class, 'getLastUploadedSongs'])->name("getLastUploadedSongs");

// Route::get("/add-to-favourite/{id}", [ProfileController::class, "addSongToFavourites"]);


Route::group([
	'middleware' => 'auth',
	'prefix' => 'user'
], function() {

	Route::get("/profile", [ProfileController::class, 'profile'])->name("profile");
	Route::post("/song/upload", [ProfileController::class, 'uploadNewSong']);

	Route::get("/api/songs/favourites/create/{id}", [ProfileController::class, 'addSongToFavourites']);

});