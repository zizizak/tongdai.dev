<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

use App\Http\Controllers\VoyagerUserController;


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




Route::get('/', function () {
    return view('welcome');
});

Route::get('/publicajax', [ClientController::class, 'publicajax']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::group(['middleware' => 'admin.user'], function () {

        Route::get('/init_data/{id}', [VoyagerUserController::class, 'init_data'])->name('voyager.users.init_data');

        Route::get('/thongsokythuat', [ClientController::class, 'thongsokythuat']);
        Route::get('/sodokhoi', [ClientController::class, 'sodokhoi']);
        Route::get('/cautruc', [ClientController::class, 'cautruc']);

        Route::get('/khaibaoPO', [ClientController::class, 'khaibaoPO']);
        Route::get('/khaibaoPM', [ClientController::class, 'khaibaoPM']);
        Route::post('/ajax', [ClientController::class, 'ajax']);

    });



});
