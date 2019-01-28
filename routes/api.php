<?php

use Illuminate\Http\Request;
use App\Job;
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
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::get('jobs', 'JobController@index');
Route::get('jobs/{job}', 'JobController@get');
Route::post('jobs', 'JobController@save');
Route::put('jobs/{job}', 'JobController@update');
Route::delete('jobs/{job}', 'JobController@delete');

Route::get('ranks', 'RankController@index');
Route::get('ranks/{rank}', 'RankController@get');
Route::post('ranks', 'RankController@save');
Route::put('ranks/{rank}', 'RankController@update');
Route::delete('ranks/{rank}', 'RankController@delete');

Route::get('licenses', 'LicenseController@index');
Route::get('licenses/{license}', 'LicenseController@get');
Route::post('licenses', 'LicenseController@save');
Route::put('licenses/{license}', 'LicenseController@update');
Route::delete('licenses/{license}', 'LicenseController@delete');

Route::get('users', 'UserController@index');
Route::get('users/{user}', 'UserController@get');
Route::put('users/{user}', 'UserController@update');
Route::delete('users/{user}', 'UserController@delete');
