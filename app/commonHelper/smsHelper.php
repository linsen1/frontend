<?php

namespace App\commonHelper;
use Qcloud\Sms\SmsSingleSender;
class SMSHelper{
    public function sendSmsCode($phone){
        try {
            $sender = new SmsSingleSender(config('appkey.txSms.AppID'), config('appkey.txSms.AppKey'));
            $params = ["97564", "2"];
            // 假设模板内容为：测试短信，{1}，{2}，{3}，上学。
            $result = $sender->sendWithParam("86", $phone, config('appkey.txSms.tempID'),
                $params, "", "", "");
            $rsp = json_decode($result);
            return $result;
            } catch(\Exception $e) {
            return $e;
            }
    }
}
