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
Route::get('/answer/search','AnswerController@search');
Route::get('/answer/create', 'AnswerController@create');
Route::post('/answer/store', 'AnswerController@store');
Route::get('/answer/edit/{id}', 'AnswerController@edit');
Route::put('/answer/update/{id}', 'AnswerController@update');
Route::get('/answer/destroy/{id}', 'AnswerController@destroy');

// CRUD Pertanyaan
Route::get('/question', 'QuestionController@index');
Route::get('/question/create', 'QuestionController@create');
Route::post('/question/store', 'QuestionController@store');
Route::get('/question/edit/{id}', 'QuestionController@edit');
Route::put('/question/update/{id}', 'QuestionController@update');
Route::get('/question/destroy/{id}', 'QuestionController@destroy');

Route::get('/home', 'ThreadController@index')->name('home');
Route::get('/detail', 'QuestionController@detail')->name('detail');


Route::middleware('auth')->group(function(){
    //CRUD Jawaban
    Route::prefix('answer')->name('answer.')->group(function(){
        Route::get('/', 'AnswerController@index')->name('index');
        Route::get('/create', 'AnswerController@create')->name('create');
        Route::post('/store', 'AnswerController@store')->name('store');
        Route::get('/edit/{id}', 'AnswerController@edit')->name('edit');
        Route::put('/update/{id}', 'AnswerController@update')->name('update');
        Route::get('/destroy/{id}', 'AnswerController@destroy')->name('destroy');
    });
    
    // CRUD Pertanyaan
    Route::prefix('question')->name('question.')->group(function(){
        Route::get('/', 'QuestionController@index')->name('index');
        Route::get('/create', 'QuestionController@create')->name('create');
        Route::post('/store', 'QuestionController@store')->name('store');
        Route::get('/edit/{id}', 'QuestionController@edit')->name('edit');
        Route::put('/update/{id}', 'QuestionController@update')->name('update');
        Route::get('/destroy/{id}', 'QuestionController@destroy')->name('destroy');
        Route::get('/search', 'QuestionController@search')->name('search');
    });
});


