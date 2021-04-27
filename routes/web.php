<?php

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
    return view('scan_qr.qr_code');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/scan-qr', function () {
//     return view('scan_qr.qr_code');
// });

Route::get('/scan-qr/{qr_code}', 'EmpInfoController@qrCode_info')->name('qrCode');
Route::post('/post/health_list', 'EmpInfoController@health_declaration');

Route::get('/report', 'HealthCheckList@reportBydate');
Route::get('/reportPerday/{txndate}', 'HealthCheckList@perDate');

Route::get('/pdf/{empno}/{txndate}', 'HealthCheckList@printPDF');