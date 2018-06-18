<?php
/**
 * Created by PhpStorm.
 * User: linsen
 * Date: 2018/6/17
 * Time: 下午12:07
 */
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

//微信登录验证
Route::post('/wxlogin/clientCode','weixinController@OnlyGetOpenID');

//注册用户
Route::post('/regUser','UserController@addUsers');
//判断用户
Route::post('/checkUser/{openID}','UserController@getExitUser');


//添加资源
Route::post('/addresource','ResourceController@addresource');
//获取资源列表
Route::get('/getresourcelist','ResourceController@getResourceList');
//获取资源详情
Route::get('/getresource/{id}','ResourceController@getResourceInfo');
