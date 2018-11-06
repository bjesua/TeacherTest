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


//Route::get('config', ['middleware' => 'auth', 'uses' => 'TestController@configView']);
//Route::get('/config', function () { return view('evaluacion/config'); });

Route::group(['prefix' => '/', 'middleware' => ['auth']], function()
{
    // user need to logged in order to access these routes
//    Route::get('/', function()
//    {
//
//    });
    Route::get('/config', function () { return view('evaluacion/config'); });
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
Route::post('importaPreguntas', 'MaatwebsiteDemoController@importaPreguntas');



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

//responder
Route::get('/llenar', function () {
    return view('evaluacion.llenar');
});
Route::get('llenar/{codigo_curso}/{cod_catedratico}', 'TestController@llenar');
Route::get('llenar/{codigo_curso}/{cod_catedratico}/{carnet}', 'TestController@llenar');
Route::get('calificar/{codigo_curso}/{cod_catedratico}/{carnet}', 'TestController@calificar');
Route::get('registrarCarnet', 'TestController@registrarCarnet');

Route::get('responderPreguntas', 'TestController@responderPreguntas');
Route::post('guardarDatosForm', 'TestController@guardarDatosForm');
//Route::get('importoAsignaQuestions', 'TestController@importoAsignaQuestions');
//Route::get('/mantPreguntas', function () {
//    return view('evaluacion/mantenimientoPreguntas');
//});

Route::get('/importExports', function () {
    return view('evaluacion.importExport');
});

Route::get('deletePreguntas', 'TestController@deletePreguntas');

Route::get('charts', 'TestController@charts');
Route::get('charts/{codigo_carrera}', 'TestController@getCatedraticosCarrera');
Route::get('charts/{codigo_carrera}/{codigo_curso}', 'TestController@getCatedraticosCharts');
Route::post('chartPie', 'TestController@chartPie');