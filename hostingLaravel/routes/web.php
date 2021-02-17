<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('Products.create');
});

Route::post('/login', 'Auth\loginController@login')->name('login');
Route::get('/dashboard', 'dashboardController@index')->name('dashboard');

Route::get('/index', 'ProductController@index')->name('products.create');
Route::post('/create', 'ProductController@store')->name('products.create');
Route::post('/edit', 'ProductController@update')->name('products.edit');
Route::delete('/delete/{id}','ProductController@destroy')->name('prroducts.destroy');

Route::get('/prices/{id}', 'ProductController@prices');

Route::get('/datacenter/new', 'DatacenterController@create')->name('Datacenters.new');
Route::get('/datacenter', 'DatacenterController@index')->name('Datacenters.index');
Route::post('/datacenter/create', 'DatacenterController@store')->name('Datacenters.create');
Route::post('/datacenter/edit/{id}', 'DatacenterController@update')->name('Datacenters.edit');
Route::get('/datacenter/update/{id}', 'DatacenterController@edit')->name('Datacenters.update');
Route::delete('/datacenter/delete/{id}','DatacenterController@destroy')->name('Datacenters.destroy');

// Route::post('/addProduct', function (request $request)
// {
//     dd($request->all());
// });