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

// Route::get('/', 'TestController@welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products/{id}', 'ProductController@show'); //mostrar
Route::get('/techniques/{techniques}', 'TechniqueController@show'); //mostrar

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');

Route::post('/order', 'CartController@update');

Route::get('/nosotros', function () {
    return view('/nosotros');
});

Route::get('/conocenos', function () {
    return view('/conocenos');
});

Route::get('/galeria', function () {
    return view('/galeria');
});

Route::get('/tienda', 'TestController@welcome');

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/products', 'ProductController@index');//listar
    Route::get('/products/create', 'ProductController@create'); //crear
    Route::post('/products', 'ProductController@store'); //registrar
    Route::get('/products/{id}/edit', 'ProductController@edit'); //formulario edicion
    Route::post('/products/{id}/edit', 'ProductController@update'); //actualizar
    Route::delete('/products/{id}', 'ProductController@destroy'); //eliminar

    Route::get('/techniques', 'TechniqueController@index');//listar
    Route::get('/techniques/create', 'TechniqueController@create'); //crear
    Route::post('/techniques', 'TechniqueController@store'); //registrar
    Route::get('/techniques/{technique}/edit', 'TechniqueController@edit'); //formulario edicion
    Route::post('/techniques/{technique}/edit', 'TechniqueController@update'); //actualizar
    Route::delete('/techniques/{technique}', 'TechniqueController@destroy'); //eliminar

    Route::get('/genres', 'GenreController@index');//listar
    Route::get('/genres/create', 'GenreController@create'); //crear
    Route::post('/genres', 'GenreController@store'); //registrar
    Route::get('/genres/{genre}/edit', 'GenreController@edit'); //formulario edicion
    Route::post('/genres/{genre}/edit', 'GenreController@update'); //actualizar
    Route::delete('/genres/{genre}', 'GenreController@destroy'); //eliminar

    Route::get('/types', 'TypeController@index');//listar
    Route::get('/types/create', 'TypeController@create'); //crear
    Route::post('/types', 'TypeController@store'); //registrar
    Route::get('/types/{type}/edit', 'TypeController@edit'); //formulario edicion
    Route::post('/types/{type}/edit', 'TypeController@update'); //actualizar
    Route::delete('/types/{type}', 'TypeController@destroy'); //eliminar

    Route::get('/artists', 'ArtistController@index');//listar
    Route::get('/artists/create', 'ArtistController@create'); //crear
    Route::post('/artists', 'ArtistController@store'); //registrar
    Route::get('/artists/{artist}/edit', 'ArtistController@edit'); //formulario edicion
    Route::post('/artists/{artist}/edit', 'ArtistController@update'); //actualizar
    Route::delete('/artists/{artist}', 'ArtistController@destroy'); //eliminar

});

