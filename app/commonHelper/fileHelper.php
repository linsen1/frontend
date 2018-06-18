<?php

/**
 * Created by PhpStorm.
 * User: linsen
 * Date: 2018/6/18
 * Time: 下午9:08
 */
namespace App\commonHelper;
use Qcloud\Cos\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class fileHelper
{
    //上传至腾讯云
    public  function upTxCos($fileinfo,$filename,$fileFolder){
        $resultinfo=array();
        $cosClient=new  Client(array('region'=>config('appkey.txFrontend.COS_REGION'),
            'credentials'=> array(
                'appId' =>config('appkey.txFrontend.COS_APPID'),
                'secretId'    => config('appkey.txFrontend.COS_KEY'),
                'secretKey' =>config('appkey.txFrontend.COS_SecretKey'))));
        try {
            $result = $cosClient->putObject(array(
                'Bucket' =>config('appkey.txFrontend.COS_Bucket'),
                'Key' =>$fileFolder.'/'.$filename,
                'Body' =>$fileinfo));
            $resultinfo=array(
                "code"=>1,
                "msg"=>'上传成功');
            return  $resultinfo;
        } catch (\Exception $e) {
            $resultinfo=array(
                "code"=>0,
                "msg"=>$e);
            return $resultinfo;
        }
    }
    //上传文件
    public function upfile($file){
        $wenjian=$file;
        if ($wenjian->isValid()) {
            //获取文件的原文件名 包括扩展名
            $yuanname= $wenjian->getClientOriginalName();

            //获取文件的扩展名
            $kuoname=$wenjian->getClientOriginalExtension();

            //获取文件的类型
            $type=$wenjian->getClientMimeType();

            //获取文件的绝对路径，但是获取到的在本地不能打开
            $path=$wenjian->getRealPath();

            //要保存的文件名 时间+扩展名
            $filename=date('Y-m-d-H-i-s') . '_' . uniqid() .'.'.$kuoname;
            //保存文件          配置文件存放文件的名字  ，文件名，路径
            $bool= Storage::disk('upload')->put($filename,file_get_contents($path));
           // $this->upTxCos(Storage::disk('upload')->get($filename),$filename);
            return $filename;
        }else
        {
            return response("0");
        }
    }

}