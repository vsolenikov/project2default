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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();



//Валидация
Route::match(['get','post'],'/','IdeaController@show');
Route::match(['get','post'],'/ideas','IdeaController@show');
//Конецвалидации

//Гостевая
Route::get('/', 'IdeaController@index2');
Route::post('/', 'IdeaController@welcome');
//КонецГостевой

//Детальная
Route::get('/idea/{id}/details','IdeaController@details');
Route::post('/idea/{id}/details','IdeaController@details');
//КонецДетальной

//Создание идей
Route::get('/ideas', 'IdeaController@index')->middleware(['auth']);
Route::post('/idea/', 'IdeaController@store');
//КонецСоздания

//Удаление/обновление
Route::delete('/idea/{idea}', 'IdeaController@destroy');
Route::post('/idea/{id}/update_status','IdeaController@Update')->middleware(['auth']);

// �������� ��������������...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// �������� �����������...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');



