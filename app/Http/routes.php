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


Route::group(['namespace' => 'Home', 'middleware' => ['home.web']], function ($router) {
    Route::get('/', 'HomeController@index');
    $router->get('/{id}.html','ArticleController@show')->where(['id' => '\d+']);
    $router->get('cate/{id?}','CategoryController@show')->where(['id' => '\d+']);
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'],  function ($router) {
    $router->get('login', 'AuthController@showLoginForm');
    $router->post('login', 'AuthController@login');
    $router->get('logout', 'AuthController@logout');
    $router->post('auth/register', 'AuthController@register');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth.admin']], function ($router) {
    $router->get('/', 'IndexController@index');
    $router->resource('/admin', 'AdminController');
    $router->resource('/permission', 'PermissionController');
    $router->resource('/role', 'RoleController');
    $router->resource('/category', 'CategoryController');
    $router->resource('/article', 'ArticleController');
    $router->resource('/say', 'SayController');
    $router->resource('/nav', 'NavController');
    $router->resource('/config', 'ConfigController');
    $router->resource('/image', 'ImageController');

    $router->get('/role/{id}/permissions',['as'=>'admin.role.permissions','uses'=>'RoleController@permissions']);
    $router->post('/role/{id}/permissions',['as'=>'admin.role.permissions','uses'=>'RoleController@storePermissions']);
    $router->post('/config/saveConfig','ConfigController@saveConfig');
});