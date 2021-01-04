<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'cors'], function () {

    /**
      * Login,Logout
      */
    Route::post('/login', 'Auth\LoginController@login')->name('login');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    /**
      * Register
      */
    Route::post('/register', 'Auth\RegisterController@register')->name('register');
        
    /**
     * Task CRUD
     */
    Route::group(['prefix' => 'tasks'], function () {
        Route::get('', 'Task\TaskController@getAllList')->name('task#getAllList');
        Route::post('', 'Task\TaskController@create')->name('task#create');
        Route::get('/{id}', 'Task\TaskController@getTaskByid')->name('task#getTaskByid');
        Route::put('', 'Task\TaskController@edit')->name('task#edit');
        Route::delete('/{id}', 'Task\TaskController@delete')->name('task#delete');
    });
});
