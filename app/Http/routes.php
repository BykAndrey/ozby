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

Route::match(['get','post'],'/registrate', 'Auth\AuthController@registrate')->name('registration');
Route::match(['get','post'],'/login', 'Auth\AuthController@login')->name('login');
Route::match(['get','post'],'/logout', 'Auth\AuthController@logout')->name('logout');



Route::group(['prefix'=>'profile','middleware'=>'auth'],function (){
    Route::match(['get'],'/', 'UserController@profile')->name('profile')->middleware('auth');

    Route::match(['get','post'],'/goods/create','GoodController@create')->name('creategood');
    Route::match(['get','post'],'/goods/edit/{id}','GoodController@edit')->name('editgood');
    Route::match(['get'],'/goods','UserController@listGoodProfile')->name('listgoods');
    Route::match(['get'],'/purchase','UserController@listPurchaseProfile')->name('listpurchaseprofile');
    Route::match(['get'],'/sales','UserController@listSalesProfile')->name('listsalesprofile');

});




Route::group(['prefix'=>'cart','middleware'=>'auth'],function (){
    Route::get('/','CartController@cart')->name('cart');
    Route::get('/addtocart','CartController@addToCart')->name('addtocart');
    Route::get('/lesscount','CartController@lesscount')->name('lesscount');
    Route::get('/morecount','CartController@morecount')->name('morecount');
    Route::get('/deletegood','CartController@deleteGood')->name('deletegood');
    Route::post('/buy','CartController@buy')->name('buy');
});

Route::get('/card/{id}','GoodController@card')->name('card');



Route::get('/', 'HomeController@index')->name('home');

