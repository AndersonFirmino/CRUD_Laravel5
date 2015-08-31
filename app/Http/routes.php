<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
  return '<h1>Primeira Logica com o Laravel.</h1>';

});

Route::get('home', 'HomeController@index');

Route::controllers([
  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController',
  ]);

Route::get('/outra', function(){
  return 'Testando outra rota';
});

//Produtos Controller
Route::get('/produtos', 'ProdutoController@lista');

Route::get('produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');

Route::get('produtos/novo', 'ProdutoController@novo');


//Envia uma requisição do tipo get para esta rota 
//Route::get('produtos/adiciona', 'ProdutoController@adiciona');

//Envia uma requisição do tipo post para esta rota 
Route::post('produtos/adiciona', 'ProdutoController@adiciona');

//Padrão do Laravel é retornar um json (testando)
Route::get('produtos/json', 'ProdutoController@listaJson');

//Remover produtos 
Route::get('produtos/remove/{id}', 'ProdutoController@remove');

//traz os dados para atualizar o produto
Route::get('produtos/atualiza/{id}', 'ProdutoController@atualiza');
//Indo fazer a atualizãção
Route::post('produtos/atualiza/{id}', 'ProdutoController@fazerAtualizacao');


//testando middleware do Laravel, passando o usuario e senha pela url
Route::get('login', 'LoginController@login');





