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

//Route::get('/', function () {
//    return view('welcome');
//});
//


Route::get('/home', function () {
    return view('index');
});

Route::get('/', function () {
    return view('login');
});

Route::post('/login','LoginController@check');

Route::get('autocomplete',array('as'=>'autocomplete','uses'=>'AutoCompleteController@index'));
//Route::get('/searchajax','LoginController@check');
Route::get('searchajax',array('as'=>'searchajax','uses'=>'LoginController@autoComplete'));