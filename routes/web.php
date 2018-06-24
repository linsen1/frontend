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

Route::get('/backend/addresource', function () {
    return view('backend.addresource');
});
Route::get('/bcakend/resourcelist',function(){
    $resoucelist=DB::table('resouces')->select('id', 'title','type','about','created_at')->orderBy('id','desc')->paginate(20);
    return view('backend.resourcelist',['resoucelist'=>$resoucelist]);
});
Route::get('/backend/editeresource/{id}',function ($id){
    $resouceinfo=DB::table("resouces")->where("id",$id)->first();
   return view('backend.editresource',['id'=>$id,'resouceinfo'=>$resouceinfo]);
});

