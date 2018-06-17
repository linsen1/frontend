<?php
/**
 * Created by PhpStorm.
 * User: linsen
 * Date: 2018/6/17
 * Time: 下午12:07
 */
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;


Route::post('/wxlogin/clientCode','weixinController@OnlyGetOpenID');