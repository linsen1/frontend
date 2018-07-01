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


/*
 * 文章添加基本模块
 */
//添加文章
Route::get("/backend/addarticle",function (){
    return view('backend.addarticle');
});
//编辑文章
Route::get("/backend/editearticle/{id}",function ($id){
    $article=DB::table("articles")->where('id',$id)->first();
   return view("backend.editArticle",["article"=>$article,'id'=>$id]);
});
//文章列表
Route::get("/backend/articlelist",function (){
   $articlelist=DB::table('articles')->select('id','title')->orderBy('id','desc')->paginate(20);
   return view('backend.articlelist',['articlelist'=>$articlelist]);
});


/*
 * 文章内容相关模块
 */
//文章类容列表
Route::get("/backend/contentlist/{id}",function ($id){
   $contentlist=DB::table("article_conetents")->select('id','articleID','content','created_at')->where('articleID',$id)->orderBy('id','asc')->paginate(20);
   return view('backend.contentlist',['contentlist'=>$contentlist,'articleID'=>$id]);
});
//添加文章内容
Route::get("/backend/addarticlecontent/{id}",function ($id){
   return view('backend.addarticlecontent',['id'=>$id]);
});
//编辑文章内容
Route::get("/backend/editArticleContent/{id}/articleid/{articleid}",function ($id,$articleid){
$contents=DB::table("article_conetents")->where("id",$id)->first();
return view('backend.editArticleContent',['contents'=>$contents,'id'=>$id,'articleid'=>$articleid]);
});


/*
 * 标签相关业务逻辑
 */
//文章标签列表
Route::get("/backend/taglist/{id}/tagtype/0",function ($id){
    $taglist=DB::table("tags")->select('id','tagname','created_at')->where([
        ['type','=',0],
        ['typeID','=',$id]
    ])->orderBy('id','desc')->paginate(20);
    return view('backend.taglist',['taglist'=>$taglist,'articleID'=>$id]);
});
//添加标签
Route::get('/backend/addtag/{id}/type/0',function ($id){
    return view('backend.addtag',['articleID'=>$id]);
});
//编辑标签
Route::get('/backend/edittag/{id}/articleid/{articleid}/type/0',function ($id,$articleid){
    $tag=DB::table("tags")->where("id",$id)->first();
   return view('backend.edittag',['id'=>$id,'articleid'=>$articleid,'type'=>0,'tag'=>$tag]);
});
