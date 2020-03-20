<?php

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
//验证码
Route::get('/verify',                   'HomeController@verify');
//登陆模块
Route::group(['namespace'  => "Auth"], function () {
   Route::get('/login',                'LoginController@showLoginForm')->name('login');
  // Route::get('/login',                'WecartLogin@login')->name('login');
    Route::post('/login',               'LoginController@login');
    Route::get('/logout',               'LoginController@logout')->name('logout');
});
//后台主要模块
Route::group(['middleware' => ['auth', 'permission']], function () {
    Route::get('/',                     'HomeController@index');
    Route::get('/gewt',                 'HomeController@configr');
    Route::get('/index',                'HomeController@welcome');
    Route::post('/sort',                'HomeController@changeSort');
    Route::resource('/menus',           'MenuController');
    Route::resource('/logs',            'LogController');
    Route::resource('/users',           'UserController');
    Route::get('/userinfo',             'UserController@userInfo');
    Route::post('/saveinfo/{type}',     'UserController@saveInfo');
    Route::resource('/roles',           'RoleController');
    Route::resource('/permissions',     'PermissionController');
    Route::get('/myShopOwner',           'Backend\ShopOwner@myShopOwner');
    Route::get('/myShopLayui',           'Backend\ShopOwner@layui')->name('shopLayui');
    Route::get('/getOrder',           'Backend\OrderController@getOrder')->name('getOrder');
    Route::post('/getOrder',           'Backend\OrderController@getOrder')->name('getOrder');
    Route::post('/keepOwnerUpdateOrderStatus', 'Backend\OrderController@keepOwnerUpdateOrderStatus')->name('keepOwnerUpdateOrderStatus');
    Route::any('/myGoodsList', 'Backend\myStory@myGoodsList')->name('myGoodsList');
    Route::get('/cpyGoods', 'Backend\myStory@companyGoods')->name('companyGoods');
    Route::get('/testRedis', 'Backend\myStory@testRedis')->name('testRedis');
    Route::post('/addCarGoods', 'Backend\myStory@addCarGoods')->name('addCarGoods');
    Route::get('/redisDataList', 'Backend\myStory@redisDataList')->name('redisDataList');






});