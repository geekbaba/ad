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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',['uses' => 'HomeController@index']);

Route::get('/login',  ['uses' => 'LoginController@index'])->name('login');

Route::get('/gad', ['uses' => 'RequestController@selectAd']);
Route::get('/attach/{hash_key}', ['uses' => 'AttachController@attach']);

Route::group(['middleware' => 'web'], function ($router) {
    $router->get('/click', ['uses' => 'ClickController@index']);
    $router->post('/login/post', ['uses' => 'LoginController@postLogin']);
    
    $router->group(['prefix'=>'ad'],function($router){
        $router->get('/list', ['as' => 'ad/list','uses' => 'AdController@adList']);
        $router->get('/create', ['uses' => 'AdController@create']);
        $router->get('/edit/{advertising_id}', ['uses' => 'AdController@edit'])->where('advertising_id', '[0-9]+');
        $router->post('/store', ['as' => 'ad/store','uses' => 'AdController@store']);
        
    });
    
    
    
});