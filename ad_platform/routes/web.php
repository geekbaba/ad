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
Route::get('/[Attach]:{hash_key}', ['uses' => 'AttachController@attach']);

Route::group(['middleware' => 'web'], function ($router) {
    $router->get('/click', ['uses' => 'ClickController@index']);
    $router->post('/login/post', ['uses' => 'LoginController@postLogin']);
    
    /**
     * 广告管理路由
     */
    $router->group(['prefix'=>'ad'],function($router){
        $router->get('/list', ['as' => 'ad/list','uses' => 'AdController@adList']);
        $router->get('/create', ['uses' => 'AdController@create']);
        $router->get('/edit/{advertising_id}', ['uses' => 'AdController@edit'])->where('advertising_id', '[0-9]+');
        $router->post('/store', ['as' => 'ad/store','uses' => 'AdController@store']);
        
    });
    /**
     * 活动管理路由
     */
    $router->group(['prefix'=>'activity'],function($router){
        $router->get('/list', ['as' => 'activity/list','uses' => 'ActivityController@activityList']);
        $router->get('/create', ['uses' => 'ActivityController@create']);
        $router->get('/edit/{activity_id}', ['uses' => 'ActivityController@edit'])->where('activity_id', '[0-9]+');
        $router->post('/store', ['as' => 'activity/store','uses' => 'ActivityController@store']);
        
    });
    /**
     * 皮肤管理路由
     */
    $router->group(['prefix'=>'skin'],function($router){
        $router->get('/list', ['as' => 'skin/list','uses' => 'ActivitySkinController@skinList']);
        $router->get('/list/{activity_id}', ['uses' => 'ActivitySkinController@activitySkinList'])->where('activity_id', '[0-9]+');
        
        $router->get('/create/{activity_id}', ['uses' => 'ActivitySkinController@create'])->where('activity_id', '[0-9]+');
        $router->get('/edit/{activity_skin_id}', ['uses' => 'ActivitySkinController@edit'])->where('activity_skin_id', '[0-9]+');
        $router->post('/store', ['as' => 'skin/store','uses' => 'ActivitySkinController@store']);
        
    });
    /**
     * 产品管理路由
     */
    $router->group(['prefix'=>'product'],function($router){
        $router->get('/list', ['as' => 'product/list','uses' => 'ActivityProductController@productList']);
        $router->get('/create', ['uses' => 'ActivityProductController@create']);
        $router->get('/edit/{activity_product_id}', ['uses' => 'ActivityProductController@edit'])->where('activity_product_id', '[0-9]+');
        $router->post('/store', ['as' => 'product/store','uses' => 'ActivityProductController@store']);
        
    });
        
    
    
});