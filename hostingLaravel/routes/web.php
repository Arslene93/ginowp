<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    return view('logs.login');
});

Route::post('/login', 'Auth\loginController@login')->name('login');
Route::get('/dashboard', 'dashboardController@index')->name('dashboard');

Route::get('/index', 'ProductController@index')->name('Products.index');
Route::get('/new', 'ProductController@create')->name('products.create');
Route::post('/create', 'ProductController@store')->name('products.create');
Route::post('/update/{id}', 'ProductController@update')->name('products.update');
Route::get('/edit/{id}', 'ProductController@edit')->name('products.edit');
Route::get('/delete/{id}','ProductController@destroy')->name('prroducts.destroy');
Route::get('/prices/{id}', 'ProductController@prices');

Route::get('/datacenter/new', 'DatacenterController@create')->name('Datacenters.new');
Route::get('/datacenter', 'DatacenterController@index')->name('Datacenters.index');
Route::post('/datacenter/create', 'DatacenterController@store')->name('Datacenters.create');
Route::post('/datacenter/edit/{id}', 'DatacenterController@update')->name('Datacenters.edit');
Route::get('/datacenter/update/{id}', 'DatacenterController@edit')->name('Datacenters.update');
Route::delete('/datacenter/delete/{id}','DatacenterController@destroy')->name('Datacenters.destroy');




Route::get('user/new', 'UserController@create')->name('user.new');
Route::post('user/create', 'UserController@store')->name('user.create');
Route::post('user/edit', 'UserController@update')->name('user.edit');
Route::delete('user/delete/{id}','UserController@destroy')->name('user.destroy');


Route::post('logs/ajaxProvince', function (request $request)
{
    $provinces = DB::table('province')->where('id_nazione', $request->country)->orderBy('provincia')->get()->toArray();
    if ($provinces) {
        $result = '<select class="form-control" name="province" id="province">' ;
        foreach ($provinces as $item) {
            $result .= '<option value="'.$item->id.'">'. $item->provincia.'</option>';
        }
        $result .='</select>' ;
        return $result;
    }
    return '<input type="text" class="form-control" name="province" id="province" placeholder="Province" required/>' ;
    // return response()->json();
});

Route::post('logs/ajaxCommuni', function (request $request)
{
    $comuni = DB::table('comuni')->where('id_prov', $request->province)->orderBy('comune')->get()->toArray();
    if ($comuni) {
        $result = '<select class="form-control" name="region" id="region">' ;
        foreach ($comuni as $item) {
            $result .= '<option value="'.$item->id.'">'. $item->comune.'</option>';
        }
        $result .='</select>' ;
        return $result;
    }
    return '<input type="text" class="form-control" name="region" id="region" placeholder="Communi" required/>' ;
    // return response()->json();
});

Route::post('/pricing/create', 'PricingController@store')->name('pricing.create');
Route::post('/pricing/edit', 'PricingController@update')->name('pricing.edit');
Route::delete('/pricing/delete/{id}','PricingController@destroy')->name('pricing.destroy');

// Route::post('/addProduct', function (request $request)
// {
//     dd($request->all());
// });

