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
    return view('layouts.main');
});

Route::get('/dash', function () {
    return view('layouts.dash');
});

Route::view('/', 'agenda.create');

Route::get('/agenda', 'AgendaController@index');

Route::post('agenda/cliente', function(){
    return "Form funcionando";
}); 