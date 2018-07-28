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
    $config['center'] = '37.4419, -122.1419';
    $config['zoom'] = 'auto';
    $config['directions'] = TRUE;
    $config['directionsStart'] = 'empire state building';
    $config['directionsEnd'] = 'statue of liberty';
    $config['directionsDivID'] = 'directionsDiv';
    GMaps::initialize($config);
    $map = GMaps::create_map();
    return view('welcome')->with('map', $map);
    //return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('veiculos', 'VeiculoController');
Route::resource('corridas', 'CorridaController');