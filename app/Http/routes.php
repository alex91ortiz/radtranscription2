<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('exams/find/{id}', 'ExamController@find');
Route::get('typeexam/find/{id}','TypeExamController@find');
Route::get('word/find/{id}','WordController@find');
Route::post('client/favorite/{id}', 'UserController@clientFavorite');

Route::get('results.json','ResultController@toJson');
Route::get('results/certificate/{id}','ResultController@certificate');

Route::post('specialist/upload/{id}', 'SpecialistController@upload');
Route::get('specialist/uploadshow/{id}', 'SpecialistController@uploadshow');

Route::post('formalities/import', 'FormalitiesController@import');
Route::get('formalities/importshow/', 'FormalitiesController@importshow');

Route::post('companie/upload/{id}', 'CompanieController@upload');
Route::get('companie/uploadshow/{id}', 'CompanieController@uploadshow');

Route::get('exams.json','ExamController@toJson');
Route::get('formalities.json','FormalitiesController@toJson');

Route::get('download', 'DownloadController@index');
Route::get('generatezip', 'DownloadController@generatezip');
Route::post('pregeneratezip', 'DownloadController@pregeneratezip');

Route::resource('formalities','FormalitiesController');
Route::resource('companie', 'CompanieController');
Route::resource('exams', 'ExamController');
Route::resource('results', 'ResultController');
Route::resource('specialist', 'SpecialistController');
Route::resource('users', 'UserController');
Route::resource('entitie', 'EntitieController');
Route::resource('typeexam', 'TypeExamController');
Route::resource('report', 'ReportController');
Route::resource('word', 'WordController');


Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/confirm/{token}', 'Auth\AuthController@getConfirm');

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');


Route::get('password/reset{token}','Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');