<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('user/create', 'UserController@store')->name('user.create');
Route::post('user/edit', 'UserController@update')->name('user.edit');
Route::delete('user/delete/{id}','UserController@destroy')->name('user.destroy');





Route::post('/index', 'ProductController@index')->name('products.index');

Route::post('/create', 'ProductController@store')->name('products.create');
Route::post('/edit', 'ProductController@update')->name('products.edit');
Route::delete('/delete/{id}','ProductController@destroy')->name('prroducts.destroy');



Route::post('/datacenter/create', 'DatacenterController@store')->name('Datacenters.create');
Route::post('/datacenter/edit', 'DatacenterController@update')->name('Datacenters.edit');
Route::delete('/datacenter/delete/{id}','DatacenterController@destroy')->name('Datacenters.destroy');


Route::post('/pricing/create', 'PricingController@store')->name('pricing.create');
Route::post('/pricing/edit', 'PricingController@update')->name('pricing.edit');
Route::delete('/pricing/delete/{id}','PricingController@destroy')->name('pricing.destroy');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();


});
