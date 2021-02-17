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

//Auth::routes();

// аунтификация.  Убрал регистрацию
Route::group([
    'namespace' => 'Auth',
], function() {
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
//    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
//    Route::post('register', 'RegisterController@register');
});

Route::get('/', 'HomeController@index')->name('index');


// Сервис для обычного пользователя. Поиск в базе по ФИО.
Route::group([
    'prefix' => 'service',
    'as' => 'service.',
], function() {
    Route::get('/', 'ServiceController@index')->name('index');
    Route::post('/name', 'ServiceController@findByName')->name('findByName');
    Route::post('/protocol', 'ServiceController@findByProtocol')->name('findByProtocol');
});

// Роуты для работы админа
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'isAdmin'],
], function() {
    Route::get('/', 'AdminController@index')->name('index');
    Route::post('/create', 'AdminController@create')->name('create');
    Route::post('/import', 'AdminController@import')->name('import');
    Route::get('/export', 'AdminController@export')->name('export');
});

