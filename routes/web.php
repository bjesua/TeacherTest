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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/config', function () {
    return view('evaluacion/config');
});

Route::get('/mantenimientos', function () {
    return view('evaluacion/mantenimiento');
});



Route::post('/import-excel', 'ExcelController@importUsers');
Route::get('/export-users', 'ExcelController@exportUsers');
Route::get('/export', 'ExcelController@export');


Route::get('importExport', 'MaatwebsiteDemoController@importExport');
Route::get('downloadExcel/{type}', 'MaatwebsiteDemoController@downloadExcel');
Route::post('importExcel', 'MaatwebsiteDemoController@importExcel');
Route::post('importCarrera', 'MaatwebsiteDemoController@importCarrera');
Route::post('importCursos', 'MaatwebsiteDemoController@importCursos');
Route::post('importCatedratico', 'MaatwebsiteDemoController@importCatedratico');
Route::post('importAlumno', 'MaatwebsiteDemoController@importAlumno');

Route::get('/importExports', function () {
    return view('evaluacion/importExport');
});
