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
  // print($sign);
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
            'order_no' =>'20180612004',
            'channel' =>'alih5_ws',
            'amount' => '0.01',
            'metadata' => "test",
            'domain_id'=>'20729ttu',
            'buyer_openid'=>'2088702255452897',
            'charge_id'=>'1006557088521920512',
           // 'code'=>'teegon_wxpay',
            'device_info'=>'',
            'buyer'=>"2088702255452897",
            'bank'=>'',
            'is_success'=>'true',
            'pay_time'=>'1528817002',
            'payment_no'=>'2018061210152010020001990057959388',
            'real_amount'=>'0.01',
            'status'=>'',
            'timestamp'=>'1528817017'
            );

$sign = checkSign($params,$client_secret);
printf($sign);
