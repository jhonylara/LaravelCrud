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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/', 'EntrarController@index');
Route::get('/series', 'Series@listSeries')->name('listar_series');
Route::get('/series/criar', 'Series@create')->name('form_criar_serie')->middleware('dale');
Route::post('/series/criar', 'Series@store')->middleware('dale');
Route::delete('/series/remover/{id}', 'Series@remove')->middleware('dale');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');
Route::post('/series/{id}/editaNome', 'Series@editaNome')->middleware('dale');

Route::get('/temporadas/{temporada}/episodios', 'Episodios@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'Episodios@assistir');

Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@entrar');

Route::get('/registro', 'RegistroController@create');
Route::post('/registro', 'RegistroController@store');

Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
