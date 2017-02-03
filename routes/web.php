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
/*Route::get('/', function (Request $request, $id) {
      $model->image = $request->file('image')->store('uploads');
    return view('welcome');
});*/

	
Route::get('/', ['uses' => 'HomeController@index', 'as' => 'index']);
Route::get('/formacao/index', ['uses' => 'FormacaoController@index', 'as' => 'index'])->middleware('auth');
Route::get('/formacao/cadastro', ['uses' => 'FormacaoController@cadastro', 'as' => 'cadastro'])->middleware('auth');
Route::post('/formacao/create', ['uses' => 'FormacaoController@create', 'as' => 'create'])->middleware('auth');
Route::get('/formacao/editar/{id}', ['uses' => 'FormacaoController@edit', 'as' => 'edit'])->middleware('auth');
Route::post('/formacao/update/{id}', ['uses' => 'FormacaoController@update', 'as' => 'update'])->middleware('auth');
Route::post('/formacao/delete/{id}', ['uses' => 'FormacaoController@destroy', 'as' => 'destroy'])->middleware('auth');
Route::get('/portfolio/index', ['uses' => 'PortfolioController@index', 'as' => 'index'])->middleware('auth');
Route::get('/portfolio/cadastro', ['uses' => 'PortfolioController@cadastro', 'as' => 'cadastro'])->middleware('auth');
Route::post('/portfolio/create', ['uses' => 'PortfolioController@create', 'as' => 'create'])->middleware('auth');
Route::get('/portfolio/editar/{id}', ['uses' => 'PortfolioController@edit', 'as' => 'edit'])->middleware('auth');
Route::post('/portfolio/updatePhoto/{id}', ['uses' => 'PortfolioController@updatePhoto', 'as' => 'updatePhoto']);
Route::post('/portfolio/update/{id}', ['uses' => 'PortfolioController@update', 'as' => 'update'])->middleware('auth');
Route::post('/portfolio/delete/{id}', ['uses' => 'PortfolioController@destroy', 'as' => 'destroy'])->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index');
