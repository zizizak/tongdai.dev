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
})->name('home');




Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('postRegister');



Route::get('/publicajax', [ClientController::class, 'publicajax']);
Route::get('/publicajaxipu', [IPUController::class, 'publicajaxipu']);



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::group(['middleware' => 'admin.user'], function () {

        Route::get('/init_data/{id}', [VoyagerUserController::class, 'init_data'])->name('voyager.users.init_data');

        Route::get('/thongsokythuat', [ClientController::class, 'tinhnangkct']);
        Route::get('/sodokhoi', [ClientController::class, 'sodokhoivanguyenlyhoatdong']);
        Route::get('/cautruc', [ClientController::class, 'cautruc']);
        Route::get('/trienkhaithuhoi', [ClientController::class, 'trienkhailapdat']);
        Route::get('/thuchanhkhaibao', [ClientController::class, 'thuchanhkhaibao']);

        Route::get('/cacloaicard', [ClientController::class, 'chucnangcard']);
        Route::get('/khaibaokhoiIPU', [ClientController::class, 'khaibaokhoiIPU']);

        Route::get('/khaibaokhoiIPU', [ClientController::class, 'khaibaokhoiIPU'])->name('voyager.dialplan.index');


        Route::get('/pan', [ClientController::class, 'pan']);
        Route::get('/bq', [ClientController::class, 'baoquan']);
        Route::get('/bd1', [ClientController::class, 'baoduongcap1']);
        Route::get('/bd2', [ClientController::class, 'baoduongcap2']);

        Route::get('/khaibaoPO', [ClientController::class, 'khaibaoPO']);
        Route::get('/khaibaoPM', [ClientController::class, 'khaibaoPM']);


        Route::get('/ipu', [IPUController::class, 'ipu']);
        Route::get('/thuebaoipu', [IPUController::class, 'thuebaoipu']);
        Route::get('/dialplan', [IPUController::class, 'dialplan']);
        Route::get('/huonggoiraipu', [IPUController::class, 'huonggoiraipu']);
        Route::get('/huonggoivaoipu', [IPUController::class, 'huonggoivaoipu']);
        Route::get('/ipu_trungke_ip_e1', [IPUController::class, 'ipu_trungke_ip_e1']);



        //Khai báo các trang tĩnh

        Route::get('/tinhnangkct', [ClientController::class, 'tinhnangkct']);
        Route::get('/sodokhoivanguyenlyhoatdong', [ClientController::class, 'sodokhoivanguyenlyhoatdong']);
        Route::get('/cautruc', [ClientController::class, 'cautruc']);
        Route::get('/chucnangcard', [ClientController::class, 'chucnangcard']);
        Route::get('/pan', [ClientController::class, 'pan']);
        Route::get('/trienkhailapdat', [ClientController::class, 'trienkhailapdat']);
        Route::get('/thuchanhkhaibao', [ClientController::class, 'thuchanhkhaibao']);
        Route::get('/tracnghiem', [ClientController::class, 'tracnghiem']);

        Route::get('/baoquan', [ClientController::class, 'baoquan']);
        Route::get('/baoduongcap1', [ClientController::class, 'baoduongcap1']);
        Route::get('/baoduongcap2', [ClientController::class, 'baoduongcap2']);
        Route::get('/giaithichcaulenh', [ClientController::class, 'giaithichcaulenh']);
        Route::get('/baitap1', [ClientController::class, 'baitap1']);
        Route::get('/baitap2', [ClientController::class, 'baitap2']);
        Route::get('/baitap3', [ClientController::class, 'baitap3']);
        Route::get('/baitap4', [ClientController::class, 'baitap4']);
        Route::get('/baitap5', [ClientController::class, 'baitap5']);
        Route::get('/baitap6', [ClientController::class, 'baitap6']);
        Route::get('/baitap7', [ClientController::class, 'baitap7']);
        Route::get('/baitap8', [ClientController::class, 'baitap8']);
        Route::get('/baitap9', [ClientController::class, 'baitap9']);
        Route::get('/baitap10', [ClientController::class, 'baitap10']);
        Route::get('/baitap11', [ClientController::class, 'baitap11']);



        Route::post('/ajax', [ClientController::class, 'ajax']);
        Route::post('/ajaxPO', [POController::class, 'ajaxPO']);
        Route::post('/ajaxipu', [IPUController::class, 'ajaxipu']);
    });
});
