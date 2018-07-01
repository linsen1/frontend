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
//删除资源
Route::delete('/delresource/{id}','ResourceController@delResourceInfo');
Route::put('/updateresource/{id}','ResourceController@updateResourceInfo');

//发送短信验证码
Route::get('/sendcode/{phone}','ResourceController@sendCode');

//添加文章
Route::post('/addarticle','ArticleController@addArticle');
Route::put('/editearticle/{id}','ArticleController@editearticle');
Route::delete('/delarticle/{id}','ArticleController@delArticle');
//小程序相关业务
//获取文章列表
Route::get('/getArticleList','ArticleController@getArticleList');
Route::get('/getArticleInfo/{id}','ArticleController@getArticleInfo');
Route::get('/getArticleContent/{articleid}','ArticleController@getArticleContent');
Route::get('/getArticleTags/{articleid}','ArticleController@getArticleTags');


//添加文章内容
Route::post('/addarticlecontent/{id}','ArticleController@addarticleContent');
//编辑文章内容
Route::put('/editarticlecontent/{id}/articleid/{articleid}','ArticleController@editarticleContent');
//删除文章内容
Route::delete('/delarticlecontent/{id}/articleid/{articleid}','ArticleController@delarticleContent');

Route::post('/addtag/{id}/type/{type}','tagController@addTag');

Route::delete('/deltag/{id}/artilceid/{artilceid}/type/{type}','tagController@delTag');
Route::put('/edittag/{id}/aticleid/{articleid}/type/{type}','tagController@updateTag');
