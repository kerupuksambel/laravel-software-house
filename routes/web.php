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
    return redirect()->route('home');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'ThreadController@index')->name('home');
Route::get('/question/{question_id}', 'ThreadController@detail')->name('detail');


Route::middleware('auth')->group(function () {
    //CRUD Jawaban
    Route::prefix('answer')->name('answer.')->group(function () {
        Route::get('/', 'AnswerController@index')->name('index');
        Route::get('/create/{question_id}', 'AnswerController@create')->name('create');
        Route::post('/store/{question_id}', 'AnswerController@store')->name('store');
        Route::get('/edit/{id}', 'AnswerController@edit')->name('edit');
        Route::put('/update/{id}', 'AnswerController@update')->name('update');
        Route::get('/destroy/{id}', 'AnswerController@destroy')->name('destroy');
    });

    // CRUD Pertanyaan
    Route::prefix('question')->name('question.')->group(function () {
        Route::get('/', 'QuestionController@index')->name('index');
        Route::get('/create', 'QuestionController@create')->name('create');
        Route::post('/store', 'QuestionController@store')->name('store');
        Route::get('/edit/{id}', 'QuestionController@edit')->name('edit');
        Route::put('/update/{id}', 'QuestionController@update')->name('update');
        Route::get('/destroy/{id}', 'QuestionController@destroy')->name('destroy');
        Route::get('/search', 'QuestionController@search')->name('search');
        Route::get('/sortbyupdated', 'QuestionController@sortbyupdated')->name('sortbyupdated');
    });
});
