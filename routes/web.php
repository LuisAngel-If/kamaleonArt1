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

Route::get('/search', 'SearchController@show');
Route::get('/products/json', 'SearchController@data');
Route::get('/products/{id}', 'ProductController@show'); //mostrar
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products/{id}', 'ProductController@show'); //mostrar
Route::get('/artists/{id}', 'ProductController@showArt'); //mostrar
Route::get('/techniques/{techniques}', 'TechniqueController@show'); //mostrar
Route::get('/nosotros', function () {
    return view('/nosotros');
});

Route::get('/conocenos', function () {
    return view('/conocenos');
});

Route::post('/mensaje/nuevo','MensajeController@store');

Route::post('/contact', 'MensajeController@store');
Route::get('/galeria', function () {
    return view('/galeria');
});

Route::get('/paypal/results', 'TestController@results');

Route::get('/tienda', 'TestController@welcome');
Route::get('/tiendaart', 'TestController@listarArt1');
// Route::get('/tiendaart', 'TestController@listarArt');

Route::get('/artistas', 'TestController@welcome1');

// Route::get('/prueba', 'CartDetailController@listarPedidos');


#Ruta para agregar un elemento al carrito
Route::post('/cart','CartDetailController@store');
#Ruta para eliminar un elemento al carrito
Route::delete('/cart','CartDetailController@destroy');
# Ruta para convertir el carrito en un pedido
Route::post('/order','CartController@update');
#Ruta para eliminar un pedido

#Ruta para cambiar el status de un pedido
Route::post('/order/status','CartController@updateStatus');
#Ruta para enviar un mensage de consulta al admin
Route::post('/message/new','MessageController@store');

//Ruta para procesar el pago
Route::post('paypal/pay', 'PaymentController@payWithpaypal');
// Ruta para verificar el estado del pago
Route::get('/paypal/status', 'PaymentController@getPaymentStatus');

Route::get('/home', 'MensajeController@index');//listar
Route::delete('/home/{id}', 'MensajeController@destroy'); //eliminar

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

