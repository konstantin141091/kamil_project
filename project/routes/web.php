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
    'middleware' => 'auth',
    'namespace' => 'Admin',
], function() {
    Route::get('/', 'AdminController@index')->name('index');
    Route::group([
        'prefix' => 'student',
        'as' => 'student.'
    ], function () {
        Route::post('/import', 'StudentsController@import')->name('import');
        Route::get('/export', 'StudentsController@export')->name('export');
        Route::post('/create', 'StudentsController@create')->name('create');
        Route::get('/', 'StudentsController@index')->name('index');
        Route::get('/{student}', 'StudentsController@show')->name('show');
        Route::get('/edit/{student}', 'StudentsController@edit')->name('edit');
        Route::post('/update/{student}', 'StudentsController@update')->name('update');
        Route::post('/delete/{student}', 'StudentsController@delete')->name('delete');
        Route::post('/find', 'StudentsController@find')->name('find');
    });
    Route::group([
        'prefix' => 'client',
        'as' => 'client.'
    ], function () {
        Route::post('/create', 'ClientController@create')->name('create');
        Route::get('/', 'ClientController@index')->name('index');
        Route::get('/edit/{client}', 'ClientController@edit')->name('edit');
        Route::post('/delete/{client}', 'ClientController@delete')->name('delete');
        Route::post('/update/{client}', 'ClientController@update')->name('update');
        Route::post('/find', 'ClientController@find')->name('find');
        Route::post('/import', 'ClientController@import')->name('import');
        Route::get('/export', 'ClientController@export')->name('export');
    });
    Route::group([
        'middleware' => 'isAdmin',
        'prefix' => 'user',
        'as' => 'user.'
    ], function (){
        Route::get('/', 'UserController@index')->name('index');
        Route::post('/create', 'UserController@create')->name('create');
        Route::post('/delete/{user}', 'UserController@delete')->name('delete');
    });
});

