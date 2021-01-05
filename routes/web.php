<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;

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

Route::get('/', function () {
    return view('home');
}) -> name('home');

Route::get('boards', [BoardController::class, 'index']) -> name('boards.index');
Route::get('boards/create', [BoardController::class, 'create']) -> name('boards.create');
Route::post('boards', [BoardController::class, 'store']) -> name('boards.store');
Route::get('boards/{board}', [BoardController::class, 'show']) -> name('boards.show');
Route::get('boards/{board}/edit', [BoardController::class, 'edit']) -> name('boards.edit');
Route::put('boards/{board}', [BoardController::class, 'update']) -> name('boards.update');
