<?php
/**
 * Created by PhpStorm.
 * User: linsen
 * Date: 2018/6/17
 * Time: 下午12:12
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Curl\Curl;

class weixinController extends Controller
{
    private $appid='wxeda70b61f8d68047';
    private $secret='2da1563a1904f94272cdf162ba0c2f45';
    public $sessionKey;
    public $OK = 0;
    public $IllegalAesKey = -41001;
    public $IllegalIv = -41002;
    public $IllegalBuffer = -41003;
    public $DecodeBase64Error = -41004;

    /**
     * 检验数据的真实性，并且获取解密后的明文.
     * @param $encryptedData string 加密的用户数据
     * @param $iv string 与用户数据一同返回的初始向量
     * @param $data string 解密后的原文
     *
     * @return int 成功0，失败返回对应的错误码
     */
    public function decryptData($encryptedData, $iv, &$data )
    {
        if (strlen($this->sessionKey) != 24) {

            return $this->IllegalAesKey;
        }
        $aesKey=base64_decode($this->sessionKey);


        if (strlen($iv) != 24) {
            return $this->IllegalIv;
        }
        $aesIV=base64_decode($iv);

        $aesCipher=base64_decode($encryptedData);

        $result=openssl_decrypt( $aesCipher, "AES-128-CBC", $aesKey, 1, $aesIV);

        $dataObj=json_decode( $result );
        if( $dataObj  == NULL )
        {
            return $this->IllegalBuffer;
        }
        if( $dataObj->watermark->appid != $this->appid )
        {
            return $this->IllegalBuffer;
        }
        $data = $result;
        return $this->OK;
    }
    public function OnlyGetOpenID(Request $request){
        $js_code=$request->input("code");
        $getSessionIDURL='https://api.weixin.qq.com/sns/jscode2session?appid='.$this->appid.'&secret='.$this->secret.'&js_code='.$js_code.'&grant_type=authorization_code';
        $curl=new Curl();
        $curl->get($getSessionIDURL);
        $result=$curl->response;
        return response($result);
    }
}