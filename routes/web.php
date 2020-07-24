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
      
        Route::get('/question/search', 'QuestionController@search');
    });
});

