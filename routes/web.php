<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

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

Route::get('/thongsokythuat', [ClientController::class, 'thongsokythuat']);
Route::get('/sodokhoi', [ClientController::class, 'sodokhoi']);
Route::get('/cautruc', [ClientController::class, 'cautruc']);

Route::get('/khaibaoPO', [ClientController::class, 'khaibaoPO']);
Route::get('/khaibaoPM', [ClientController::class, 'khaibaoPM']);


Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
