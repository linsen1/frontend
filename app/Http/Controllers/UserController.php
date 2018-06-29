<?php
/**
 * Created by PhpStorm.
 * User: linsen
 * Date: 2018/6/17
 * Time: 下午5:26
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends  Controller
{
    public function  addUsers(Request $request){
        $this->validate($request, [
            'openId' => 'required'
        ]);
        $users=array(
            'openId'=>$request->input('openId'),
            'nickName'=>$request->input('nickName'),
            'gender'=>$request->input('gender'),
            'language'=>$request->input('language'),
            'city'=>$request->input('city'),
            'province'=>$request->input('province'),
            'country'=>$request->input('country'),
            'avatarUrl'=>$request->input('avatarUrl'),
            'created_at'=>date("Y-m-d H:i:s",time()),
            'updated_at'=>date("Y-m-d H:i:s",time())
        );
        if($this->CheckUsersByOpenID($users['openId'])){
            //插入数据
            $infoMsg=$this->InsertUser($users);
            return response()->json($infoMsg);
        }else{
            //更新数据
            $infoMsg=$this->UpdateUserInfo($users);
            return response()->json($infoMsg);
        }
    }
    public function  CheckUsersByOpenID($openID){
        $count=DB::table('users')->where('openId',$openID)->count();
        if($count>0) {
            return false;
        }
        else
        {
            return true;
        }
    }
    public  function  getExitUser($openID){
        $count=DB::table('users')->where('openId',$openID)->count();
        if($count>0) {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    public  function  InsertUser($userInfo){
        $result=DB::table('users')->insert([
            'openId'=>$userInfo['openId'],
            'nickName' => $userInfo['nickName'],
            'gender'=>$userInfo['gender'],
            'language'=>$userInfo['language'],
            'city'=>$userInfo['city'],
            'province'=>$userInfo['province'],
            'country'=>$userInfo['country'],
            'avatarUrl'=>$userInfo['avatarUrl'],
            'created_at'=>date("Y-m-d H:i:s",time()),
            'updated_at'=>date("Y-m-d H:i:s",time())
        ]);
    }
    public  function  UpdateUserInfo($userInfo){

        $result=DB::table('users')
            ->where('openId', $userInfo['openId'])
            ->update([
                'nickName' => $userInfo['nickName'],
                'gender'=>$userInfo['gender'],
                'language'=>$userInfo['language'],
                'city'=>$userInfo['city'],
                'province'=>$userInfo['province'],
                'country'=>$userInfo['country'],
                'avatarUrl'=>$userInfo['avatarUrl'],
                'updated_at'=>date("Y-m-d H:i:s",time())
            ]);
        return $result;
    }
}
