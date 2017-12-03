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



Route::get('/', 'TeacherController@index');
Route::get('/create', 'TeacherController@create');
Route::post('/create', 'TeacherController@store');
Route::get('/edit/{id}', ['as' => 'teacher_edit', 'uses' => 'TeacherController@edit']);
Route::post('/edit/{id}', 'TeacherController@update');
Route::get('/delete/{id}', ['as' => 'teacher_delete', 'uses' => 'TeacherController@delete']);
Route::post('/search', 'TeacherController@search');

Route::get('/schools', 'SchoolController@create');
Route::post('/schools', 'SchoolController@store');
Route::get('/school/{id}/edit', ['as' => 'school_edit', 'uses' => 'SchoolController@edit']);
Route::post('/school/{id}/edit', 'SchoolController@update');






//Route::resource('/', 'TeacherController');