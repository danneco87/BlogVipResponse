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
/**
 * Start blog Pages routes
 */
    Route::get('/', 'HomeController@index');
    Route::post('/', 'HomeController@storeComment');

/** End blog controller routes*/

/**
 * Authentication login/logout for user admin
 */
Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as'   => 'login'
]);
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as' => 'logout'
]);


Auth::routes();


/**
 * Start Admin Pages routes
 */
Route::group(['prefix' => 'admin', 'middleware' => ['auth','isAdmin']], function(){
    //CREATE USER GROUP
    Route::get('/', ['as' => 'admin', 'uses' => 'AdminController@index']);
    Route::get('create', ['as' => 'create', 'uses' => 'AdminController@create']);
    Route::post('store', ['as' => 'store', 'uses' => 'AdminController@store']);
    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'AdminController@edit']);
    Route::put('update/{id}', ['as' => 'update', 'uses' => 'AdminController@update']);
    Route::get('destroy/{id}', ['as' => 'destroy', 'uses' => 'AdminController@destroy']);

});
/** End admin controller routes*/