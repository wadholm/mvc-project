<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\YatzyController;
use App\Http\Controllers\BookController;

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

// Route::get('/', function () {
//     return view('layout.page',
//     [
//         'title' => 'Home',
//         'header' => "Home",
//         'message' => "This is the index page."
//     ]
// );
// });

Route::get('/', [IndexController::class, 'index']);

Route::get('/session', [SessionController::class, 'session']);
Route::get('/session/destroy', [SessionController::class, 'destroy']);

Route::get('/test', [TestController::class, 'test']);

Route::get('/yatzy/home', [YatzyController::class, 'home']);
Route::get('/yatzy/destroy', [YatzyController::class, 'destroy']);
Route::any('/yatzy/play', [YatzyController::class, 'play']);
Route::get('/yatzy/result', [YatzyController::class, 'result']);
Route::any('/yatzy/highscore/add', [YatzyController::class, 'addHighscore']);
Route::get('/yatzy/highscore', [YatzyController::class, 'highscore']);
Route::get('/yatzy/statistics', [YatzyController::class, 'statistics']);

Route::get('/books', [BookController::class, 'book']);
