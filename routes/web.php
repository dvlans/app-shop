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

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show'); //Detalle del producto.

Route::post('/cart','CartDetailController@store'); 
Route::delete('/cart','CartDetailController@destroy');

Route::post('/order', 'CartController@update');



Route::middleware(['auth','admin'])->prefix('admin')->namespace('admin')->group(function () {
   	Route::get('/products','ProductController@index'); //Listar 
	Route::get('/products/create','ProductController@create'); //Formulario 
	Route::post('/products','ProductController@store'); //Registro
	Route::get('/products/{id}/edit','ProductController@edit'); //Formulario edición del producto 
	Route::post('/products/{id}/edit','ProductController@update'); //actualizar
	Route::post('/products/{id}/delete','ProductController@destroy'); //eliminar


	Route::get('/products/{id}/images','ImageController@index');
	Route::post('/products/{id}/images','ImageController@store'); //Registro
	Route::delete('/products/{id}/images','ImageController@destroy'); //eliminar
	Route::get('/products/{id}/images/select/{image}','ImageController@select'); //Destacar imagen
});
 



