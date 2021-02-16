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

Route::get('/', function () {
<<<<<<< HEAD
    return view('login');
});

Route::post('/login', 'Auth\loginController@login')->name('login');
Route::get('/dashboard', 'dashboardController@index')->name('dashboard');
=======
    return view('admin/newProduct');
});

Route::post('/loginAction', 'LoginController@login');

Route::get('/login', function () {
    return view('logs/login');
});
>>>>>>> crud
