<?php

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
$router->group(['prefix' => 'v1', 'namespace' => 'Api\v1'], function() use($router)
{

    $router->get('estate-finishings','EstateFinishingController@index');
    $router->post('estate-finishings','EstateFinishingController@store');
    $router->get('estate-finishings/{type}','EstateFinishingController@show');
    $router->put('estate-finishings/{type}','EstateFinishingController@update');
    $router->patch('estate-finishings/{type}','EstateFinishingController@update');
    $router->delete('estate-finishings/{type}','EstateFinishingController@destroy');
});
