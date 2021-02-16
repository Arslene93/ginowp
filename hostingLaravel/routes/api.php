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
Route::post('/create', 'ProductController@store')->name('products.create');
Route::post('/edit', 'ProductController@update')->name('products.edit');
Route::delete('/delete/{id}','ProductController@destroy')->name('prroducts.destroy');



Route::post('/datacenter/create', 'DatacenterController@store')->name('Datacenters.create');
Route::post('/datacenter/edit', 'DatacenterController@update')->name('Datacenters.edit');
Route::delete('/datacenter/delete/{id}','DatacenterController@destroy')->name('Datacenters.destroy');






Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();


});
