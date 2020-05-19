<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('{any}', function () {
//     return view('apps');
// })->where('any', '.*');

//Route::get('/{any}', 'SpaController@index')->where('any', '.*');


Route::get('/{any}', 'SpaController@index');

Route::post('/api/food', 'FoodController@createFood');

Route::put('/api/updatefood/{id}', 'FoodController@updateFood');

Route::delete('/api/food/{id}', 'FoodController@deleteFood');

//Route::resource('food','FoodController');

// Route::resource('tools','ToolController');