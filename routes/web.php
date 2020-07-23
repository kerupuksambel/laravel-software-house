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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//CRUD Jawaban
Route::get('/answer', 'AnswerController@index');
Route::get('/answer/create', 'AnswerController@create');
Route::post('/answer/store', 'AnswerController@store');
Route::get('/answer/edit/{id}', 'AnswerController@edit');
Route::put('/answer/update/{id}', 'AnswerController@update');
Route::get('/answer/destroy/{id}', 'AnswerController@destroy');