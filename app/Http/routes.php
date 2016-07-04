<?php

Route::group(['domain' => 'admin.' . env('APP_DOMAIN')], function () {

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/', 'Back\BackController@index');
    });

    Route::group(['middleware' => ['throttle:3,1']], function () {
        Route::post('/login', 'Auth\JwtAuthController@login');
        Route::post('/login/setToken/{token}', 'Auth\JwtAuthController@setToken');
    });

    Route::get('/login', 'Auth\JwtAuthController@showLogin');
    Route::get('/logout', 'Auth\JwtAuthController@logout');


});

/**
 * Home
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * Área restrita (exemplo)
 */
Route::get('/home', 'Front\FrontController@index');

/**
 * Rotas de Autenticação
 */
Route::auth();


$apiRoutes = function () {
    /**
     * Access rate: 3 hits por minuto
     */
    Route::group(['middleware' => 'throttle:3,1'], function () {
        Route::post('login', ['uses' => 'Auth\JwtAuthController@login']);
    });

    /**
     * Acessadas somente com Token
     */
    Route::group(['middleware' => ['token.role:admin'], 'namespace' => 'Api\V1'], function () {
        Route::resource('users', 'UsersController');
        Route::resource('roles', 'RolesController');
        Route::resource('users.roles', 'UserRolesController', [
            'only' => ['index', 'store', 'destroy']
        ]);
        Route::resource('permissions', 'PermissionsController');
        Route::resource('users.permissions', 'UserPermissionsController', [
            'only' => ['index', 'store', 'destroy']
        ]);
    });

};

/**
 * API V1 routes
 */
Route::group(['prefix' => 'api/v1'], $apiRoutes);
/**
 * API V1 subdomain routes
 */
Route::group(['domain' => 'api.' . env('APP_DOMAIN'), 'middleware' => ['role:admin']], function () use ($apiRoutes) {
    Route::group(['prefix' => 'v1'], $apiRoutes);
});

