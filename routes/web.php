<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\IPUController;
use App\Http\Controllers\POController;
use App\Http\Controllers\AuthController;

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
})->name('home') ;




Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('postRegister');



Route::get('/publicajax', [ClientController::class, 'publicajax']);
Route::get('/publicajaxipu', [IPUController::class, 'publicajaxipu']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::group(['middleware' => 'admin.user'], function () {

        Route::get('/init_data/{id}', [VoyagerUserController::class, 'init_data'])->name('voyager.users.init_data');

        Route::get('/thongsokythuat', [ClientController::class, 'thongsokythuat']);
        Route::get('/sodokhoi', [ClientController::class, 'sodokhoi']);
        Route::get('/cautruc', [ClientController::class, 'cautruc']);
        Route::get('/trienkhaithuhoi', [ClientController::class, 'trienkhaithuhoi']);
        Route::get('/cacloaicard', [ClientController::class, 'cacloaicard']);
        Route::get('/khaibaokhoiIPU', [ClientController::class, 'khaibaokhoiIPU']);

        Route::get('/khaibaokhoiIPU', [ClientController::class, 'khaibaokhoiIPU'])->name('voyager.dialplan.index');


        Route::get('/pan', [ClientController::class, 'pan']);
        Route::get('/bq', [ClientController::class, 'bq']);
        Route::get('/bd1', [ClientController::class, 'bd1']);
        Route::get('/bd2', [ClientController::class, 'bd2']);

        Route::get('/khaibaoPO', [ClientController::class, 'khaibaoPO']);
        Route::get('/khaibaoPM', [ClientController::class, 'khaibaoPM']);


        Route::get('/ipu', [IPUController::class, 'ipu']);
        Route::get('/thuebaoipu', [IPUController::class, 'thuebaoipu']);
        Route::get('/dialplan', [IPUController::class, 'dialplan']);
        Route::get('/huonggoiraipu', [IPUController::class, 'huonggoiraipu']);
        Route::get('/huonggoivaoipu', [IPUController::class, 'huonggoivaoipu']);
        Route::get('/ipu_trungke_ip_e1', [IPUController::class, 'ipu_trungke_ip_e1']);

        Route::post('/ajax', [ClientController::class, 'ajax']);
        Route::post('/ajaxPO', [POController::class, 'ajaxPO']);
        Route::post('/ajaxipu', [IPUController::class, 'ajaxipu']);

    });



});
