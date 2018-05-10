<?php

require_once('client.php');

 //验签 $params 为通知参数集合，$secret为用户的app_secret
function checkSign($params,$secret){
    $sign = array(
        $secret,
        isort($params),
        $secret
        );

   $sign = implode('', $sign);
   //printf($sign);
   return strtoupper(md5($sign));
}

//参数排序 
function isort($params) {
     if(is_array($params)) {
     ksort($params);
     $result = array();
     foreach($params as $key=>$value){
        if ($value === false)
            $value = 0;
        if ($value !== null)
            $result[] = $key.$value;
           }
            return implode('', $result);
        }
}

/*
天工通知参数如下

天工回调同步用get接收数据  异步用post接收数据

charge_id - 支付单号
order_no - 创建支付单时传入的订单id
bank - 付款方银行名称
amount - 支付金额
real_amount - 实际到款金额(扣除支付费率)
buyer - 支付方信息，根据不同的支付渠道，返回不同的买家信息，微信支付为相关 id，支付宝支付为手机号码或者邮件地址
channel - 支付方式
device_info - 付款设备信息
status - 调用状态
is_success - 是否成功
pay_time - 付款时间
charge_fee - 支付手续费
payment_no - 第三方支付单号
metadata - 附加信息，额外数据(json 格式，会在支付成功后回调接口传回)如果用户请求时传递了该参数，则返回给商户时会回传该参数。
timestamp - 系统时间戳，天工收银服务器发起请求的时间
sign - 签名，用于验证通知参数的签名
*/


$params = array(
            'order_no' =>'B510311822308309',
            'channel' =>'wxpaympsignonline_pinganpay',
            'amount' => '0.01',
            'metadata' => "{\"001\":\"001\"}",
            'domain_id'=>'3v5***bj4',
            'buyer_openid'=>'',
            'charge_id'=>'994453574144499712',
           // 'code'=>'teegon_wxpay',
            'device_info'=>'',
            'buyer'=>'oRrr3035lIdLrXHhkN4g0nmjKSVU',
            'bank'=>'CFT',
            'is_success'=>'true',
            'pay_time'=>'1525931312',
            'payment_no'=>'2018051013462301707033364178',
            'real_amount'=>'0.01',
            'status'=>'',
            'timestamp'=>'1525931450'
            );

$sign = checkSign($params,$client_secret);
printf($sign);

/*
{"sign":"CAF9E933FD25371C2E866D8329C0B90F","amount":"0.01","bank":"CFT","buyer":"oRrr3035lIdLrXHhkN4g0nmjKSVU","buyer_openid":"","channel":"wxpaympsignonline_pinganpay","charge_id":"994453574144499712","device_info":"","domain_id":"3v5pjbj4","is_success":"true","metadata":"{\"001\":\"001\"}","order_no":"B510311822308309","pay_time":"1525931312","payment_no":"2018051013462301707033364178","real_amount":"0.01","status":"","timestamp":"1525931450"}*/