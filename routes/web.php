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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/loginGo', 'LoginController@login');
Route::post('/concluir', 'HomeController@concluir');

//Rotas Usuario
Route::get('/usuarios', 'UsuarioController@index')->middleware('auth');
Route::post('/usuarioData', 'UsuarioController@usuarioData');
Route::post('/usuarioEdit', 'UsuarioController@usuarioEdit');
Route::post('/usuarioNovo', 'UsuarioController@usuarioNovo');
Route::post('/usuarioDelete', 'UsuarioController@usuarioDelete');

//Rotas Categorias
Route::get('/categorias', 'CategoriasController@index')->middleware('auth');
Route::post('/categoriaNova', 'CategoriasController@categoriaNova');
Route::post('/categoriaEdit', 'CategoriasController@categoriaEdit');
Route::post('/categoriaEditGo', 'CategoriasController@categoriaEditGo');
Route::post('/catDelete', 'CategoriasController@catDelete');

//Rotas Tarefas
Route::get('/tarefas', 'TarefasController@index')->middleware('auth');
Route::post('/tarefaNova', 'TarefasController@tarefaNova');
Route::post('/tarefaEdit', 'TarefasController@tarefaEdit');
Route::post('/tarefaEditGo', 'TarefasController@tarefaEditGo');
Route::post('/taskDelete', 'TarefasController@taskDelete');