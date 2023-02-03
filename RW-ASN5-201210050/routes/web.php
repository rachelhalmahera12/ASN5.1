<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/barang', 'Controllerbarang@create');

$router->get('/barang', 'Controllerbarang@index');

$router->get('/detail/{id}', 'Controllerbarang@detail');

$router->put('/update/{id}', 'Controllerbarang@update');

$router->delete('/delete/{id}', 'Controllerbarang@delete');

$router->group(['middleware' => 'basicAuth'], function() use ($router) {
    $router->get('/barang', 'Controllerbarang@index');
});
