<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DictionaryController;
use App\Models\Dictionary;
use App\Models\User;

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
    return view('welcome');
});

Route::get('/', [DictionaryController::class, 'index']);

Route::get('/dictionaries/register', [DictionaryController::class, 'display']);

Route::post('/', [DictionaryController::class, 'register']);

Route::get('/dictionaries/search', [DictionaryController::class, 'search']);

Route::patch('/dictionaries/update', [DictionaryController::class, 'update']);

Route::delete('/dictionaries/delete', [DictionaryController::class, 'delete']);

Route::middleware('auth')->group(function () {
    Route::get('/', [DictionaryController::class, 'index']);
});