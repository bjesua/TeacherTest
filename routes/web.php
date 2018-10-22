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
Route::post('importoQuestions', 'MaatwebsiteDemoController@importoQuestions');
Route::post('importoAsignaQuestions', 'MaatwebsiteDemoController@importoAsignaQuestions');
Route::post('importArchivoFinal', 'MaatwebsiteDemoController@importArchivoFinal');



Route::post('setAlumno', 'TestController@setAlumno');
Route::get('getAlumno', 'TestController@getAlumno');
Route::get('getEditAlumno', 'TestController@getEditAlumno');
Route::post('setEditAlumno', 'TestController@setEditAlumno');
Route::get('deleteAlumno', 'TestController@deleteAlumno');

Route::post('setCatedratico', 'TestController@setCatedratico');
Route::get('deleteCatedratico', 'TestController@deleteCatedratico');
Route::get('editCatedratico', 'TestController@editCatedratico');
Route::post('saveEditCat', 'TestController@saveEditCat');
Route::get('getCatedratico', 'TestController@getCatedratico');


Route::get('mantUsuarios', 'TestController@getMantUsuarios');
Route::get('getEditarUsuario', 'TestController@getEditarUsuario');
Route::post('actualizarUsuario', 'TestController@actualizarUsuario');
Route::post('create', 'TestController@create');


Route::get('mantPreguntas', 'TestController@mantPreguntas');
//Route::get('importoAsignaQuestions', 'TestController@importoAsignaQuestions');
//Route::get('/mantPreguntas', function () {
//    return view('evaluacion/mantenimientoPreguntas');
//});

Route::get('/importExports', function () {
    return view('evaluacion.importExport');
});
