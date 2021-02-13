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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');


// Сервис для обычного пользователя. Поиск в базе по ФИО.
Route::group([
    'prefix' => 'service',
    'as' => 'service.',
], function() {
    Route::get('/', 'ServiceController@index')->name('index');
    Route::post('/', 'ServiceController@find')->name('find');
});

// Роуты для работы админа
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
//    'namespace' => 'Admin'
], function() {
    Route::get('/', 'AdminController@index')->name('index');
    Route::post('/create', 'AdminController@create')->name('create');
    Route::post('/import', 'AdminController@import')->name('import');
});





Route::get('/form', 'FormController@index')->name('form_index');
Route::get('/create', 'FormController@create')->name('form_create');
Route::post('/create', 'FormController@store')->name('form_store');
Route::post('/import', 'FormController@import')->name('import');
