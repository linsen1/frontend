<?php
/**
 * Created by PhpStorm.
 * User: linsen
 * Date: 2018/6/18
 * Time: 下午4:46
 */

namespace App\Http\Controllers;
use function PHPSTORM_META\type;
use Qcloud\Cos\Client;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\commonHelper\fileHelper;
use App\commonHelper\SMSHelper;
use Illuminate\Support\Facades\DB;

class ResourceController extends  Controller
{

    //添加资源
    public  function  addresource(Request $request){

        $this->validate($request, [
            'bigImgUrl' => 'required',
            'title'=>'required',
            'type'=>'required'
        ]);

        $uploadFile=new fileHelper();
        //上传封面图片至腾讯存储空间，上传本地获取文件名
        $filename=$uploadFile->upfile($request->file("bigImgUrl"));
        //$filePath=Storage::disk('upload')->get($filename); 上传文件流
        $filePath=Storage_path('app/uploads/'.$filename);
        $fileFolder='resouce/'.date('Y-m-d');
        $uploadFile->upTxCos($filePath,$filename,$fileFolder);//上传到腾讯云
        $uploadFile->upBaiduCos($filePath,$filename,$fileFolder);//上传到百度云
        $uploadFile->upAliCos($filePath,$filename,$fileFolder);//上传到阿里云
        //获取封面图片文件路径
        $fileCurrentUrl=config('appkey.txFrontend.Cos_Host').$fileFolder.'/'.$filename;
        $title=$request->input("title");
        $type=$request->input("type");
        $bigImgUrl=$fileCurrentUrl;
        $onelineUrl=$request->input("onelineUrl");
        $downURLBaidu=$request->input("downURLBaidu");
        $downUrlTX=$request->input("downUrlTX");
        $about=$request->input("about");
        $conetent=$request->input("conetent");
        $created_at=date("Y-m-d H:i:s",time());
        $updated_at=date("Y-m-d H:i:s",time());
        $result=DB::table("resouces")->insert([
           'title'=>$title,
            'type'=>$type,
            'bigImgUrl'=>$bigImgUrl,
            'onelineUrl'=>$onelineUrl,
            'downURLBaidu'=>$downURLBaidu,
            'downUrlTX'=>$downUrlTX,
            'about'=>$about,
            'conetent'=>$conetent,
            'created_at'=>$created_at,
            'updated_at'=>$updated_at
        ]);
        return response()->json($filePath);
        // return $this->upTxCos($file);
    }
    //读取资源列表
    public  function  getResourceList(){
        $info=DB::table('resouces')->select('id', 'title','bigImgUrl','type','about','created_at')->orderBy('id','desc')->paginate(5);
        return response()->json($info,200);
    }
    //查看资源详情
    public  function  getResourceInfo($id){
        $info=DB::table("resouces")->where('id','=',$id)->first();
        return response()->json($info);
    }
    public  function  sendCode($phone){
        $sendinfo=new SMSHelper();
        $infos=$sendinfo->sendSmsCode($phone);
        return response()->json($infos);
    }
}