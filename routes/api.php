<?php

use Illuminate\Http\Request;

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

Route::post('auth/register', 'AuthController@register');
Route::post('auth/login', 'AuthController@login');

Route::get('/activities', 'ActivityController@all');
Route::get('/activities/{id}/detail', 'ActivityController@detail');

Route::get('/galleries', 'GalleryController@all');

Route::get('/videos', 'VideoController@all');

Route::get('/questions', 'QuestionController@all');

Route::get('/profile', 'ProfileController@all');

Route::get('/maps', 'MapsController@all');
Route::get('/map/{id}', 'MapsController@map');

Route::post('/send', 'MessageController@send')->middleware('auth:api');

Route::get('/messages', 'MessageController@all')->middleware('auth:api');

Route::post('/ask', 'AskController@send');

Route::get('/cities', 'CityController@all');
Route::get('/districts/{id}', 'CityController@district');


