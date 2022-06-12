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

//Auth::routes();

// аунтификация.  Убрал регистрацию
Route::group([
    'namespace' => 'Auth',
], function() {
    Route::get('myLogin21', 'LoginController@showLoginForm')->name('login');
    Route::post('myLogin21', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
//    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
//    Route::post('register', 'RegisterController@register');
});

Route::get('/', 'HomeController@index')->name('index');
Route::get('logoutOthers', function () {
    auth()->logoutOtherDevices('password');
    return redirect('/');
});


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
    'prefix' => 'myCabinet21',
    'as' => 'admin.',
    'middleware' => 'auth',
    'namespace' => 'Admin',
], function() {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/instruction', 'AdminController@instruction')->name('instruction');
    Route::group([
        'prefix' => 'student',
        'as' => 'student.'
    ], function () {
        Route::post('/import', 'StudentController@import')->name('import');
        Route::get('/export', 'StudentController@export')->name('export');
        Route::post('/create', 'StudentController@create')->name('create');
        Route::get('/', 'StudentController@index')->name('index');
        Route::get('/{student}', 'StudentController@show')->name('show');
        Route::get('/edit/{student}', 'StudentController@edit')->name('edit');
        Route::post('/update/{student}', 'StudentController@update')->name('update');
        Route::post('/delete/{student}', 'StudentController@delete')->name('delete');
        Route::post('/find', 'StudentController@find')->name('find');
        Route::get('/delete/all', 'StudentController@deleteAll')->name('deleteAll')
            ->middleware('isAdmin');
    });
    Route::group([
        'middleware' => 'isAdmin',
        'prefix' => 'user',
        'as' => 'user.'
    ], function (){
        Route::get('/', 'UserController@index')->name('index');
        Route::post('/create', 'UserController@create')->name('create');
        Route::delete('/delete/{user}', 'UserController@delete')->name('delete');
    });
});

