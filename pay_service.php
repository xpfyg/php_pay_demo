<?php

require_once('client.php');


/*
天工支付服务的部分接口demo

*/



/*
天工支付接口(paycode)
teegon.payment.charge.paycode


order_no	是	string		订单号
channel	是	string			不同支付场景channel 值不同 
							场景1:pc网上商城生成订单二维码 
							1.alipay 支付宝 2.wxpay 微信
							3.jdh5_pinganpay
							场景2:收银台扫用户付款码收款 			1								
							1.barcode_pay
							

notify_url	是	string		异步回调地址
amount	是	string			支付金额
subject	是	string			商品名称
metadata	是	string		备注信息
client_ip	是	string		ip地址
manual_journal	否	string	手动分账:1 自动分账:0,默认为0 仅当需要使用订单分账的时候此值为1,否则资金不会自动清分
return_url	否	string		同步跳转地址
auth_code	否	string		用户付款码 扫用户付款码时必填
*/
 $url = 'https://api.teegon.com/router?method=teegon.payment.charge.paycode&app_key='.$app_key.'&client_secret='.$client_secret;

$data =array('order_no'=>'20180418003','channel'=>'alipay','notify_url'=>'http://f09d1e6c.ngrok.io/pay/notify/mybank','return_url'=>'http://www.a.com','amount'=>'0.01','subject'=>'test','metadata'=>'{"001":"001"}','client_ip'=>'127.0.0.1');
$result = vpost($url,$data);
 print_r($result);





/*
天工支付接口(pay)
teegon.payment.charge.pay
微信公众号支付(非原生)

order_no	是	string		订单号
channel	是	string			不同支付场景channel 值不同 
							场景1:微信公众号内支付
							1.wxpaymp       线下公众号支付
							2.wxpaymponline 线上公众号支付
							两者费率不同
			
							

notify_url	是	string		异步回调地址
amount	是	string			支付金额
subject	是	string			商品名称
metadata	是	string		备注信息
client_ip	是	string		ip地址
manual_journal	否	string	手动分账:1 自动分账:0,默认为0 仅当需要使用订单分账的时候此值为1,否则资金不会自动清分
return_url	否	string		同步跳转地址
auth_code	否	string		用户付款码
*/
//  $url = 'https://api.teegon.com/router?method=teegon.payment.charge.pay&app_key='.$app_key.'&client_secret='.$client_secret;

// $data =array('order_no'=>'20180418003','channel'=>'wxpaymp','notify_url'=>'http://f09d1e6c.ngrok.io/pay/notify/mybank','return_url'=>'http://www.a.com','amount'=>'0.01','subject'=>'test','metadata'=>'{"001":"001"}','client_ip'=>'127.0.0.1');
// $result = vpost($url,$data);
//  print_r($result);




/*
天工支付接口(pay)
teegon.payment.charge.mppay
微信公众号原生js支付和小程序支付,返回调起原生支付的必要参数

out_order_no	是	string		客户订单号
amount	是	string				支付金额
subject	是	string				订单名称
notify_url	是	string			服务器异步通知页面路径
return_url	是	string			页面跳转同步通知页面路径
wx_openid	是	string			微信openid 在微信支付的时候
mini_appid	否	string			小程序的appid，小程序支付时必须传递
metadata	否	string			额外数据(存json格式 会在支付成功后回调接口传回,长度不能大于)
time_expire	否	string			过期时间 单位秒 默认600
ip	否	string					支付ip客户ip
device_id	否	string			设备id
sale_channel	否	string		业务id
manual_journal	否	string		订单分账模式分账方式1 手动分账，0自动分账,默认为0
channel	否	string        线上公众号支付: wxpaympsignonline,线下公众号支付wxpaympsign(默认),区别在于费率不同
*/
//  $url = 'https://api.teegon.com/router?method=teegon.payment.charge.mppay&app_key='.$app_key.'&client_secret='.$client_secret;

// $data =array('out_order_no'=>'20180418003','notify_url'=>'http://f09d1e6c.ngrok.io/pay/notify/mybank','return_url'=>'http://www.a.com','amount'=>'0.01','subject'=>'test','metadata'=>'{"001":"001"}','client_ip'=>'127.0.0.1','wx_openid'=>'oa3p60061DsM3qNvVwxJa7mqYz8E');
// $result = vpost($url,$data);
//  print_r($result);


/*
teegon.payment.charge.h5pay(微信h5支付)


order_no	是	string		订单号
amount	是	string		金额，单位(元)
subject	是	string		商品名
metadata	是	string		额外参数，json格式
client_ip	是	string		ip
notify_url	是	string		回调地址
scene_info	是	string		场景信息:
							//IOS移动应用  {"h5_info": {"type":"IOS","app_name": "王者荣耀","bundle_id": "com.tencent.wzryIOS"}} 
							//安卓移动应用 {"h5_info": {"type":"Android","app_name": "王者荣耀","package_name": "com.tencent.tmgp.sgame"}} 
							//WAP网站应用  {"h5_info": {"type":"Wap","wap_url": "https://pay.qq.com","wap_name": "腾讯充值"}}	

manual_journal	否	string		订单分账模式分账方式1 手动分账，0自动分账,默认为0
*/
//  $url = 'https://api.teegon.com/router?method=teegon.payment.charge.h5pay&app_key='.$app_key.'&client_secret='.$client_secret;

// $data =array('order_no'=>'20180418003','notify_url'=>'http://f09d1e6c.ngrok.io/pay/notify/mybank','subject'=>'test','metadata'=>'{"001":"001"}','client_ip'=>'127.0.0.1','scene_info'=>'{"h5_info": {"type":"IOS","app_name": "王者荣耀","bundle_id": "com.tencent.wzryIOS"}}','amount'=>'0.01');
// $result = vpost($url,$data);
//  print_r($result);


/*
teegon.payment.account.amount(获取账号余额)
获取余额

account_id	是	string		子账号填account_id 主账号填main
{
	"ecode": 0,
	"emsg": "",
	"result": {
		"all_amount": 0.46, //余额
		"available_balance": 0, //仅IPS 通道的用户才会用到
		"can_use_amount": 0.45	//可提现
	}
}
返回示例

*/
//  $url = 'https://api.teegon.com/router?method=teegon.payment.account.amount&app_key='.$app_key.'&client_secret='.$client_secret;

// $data =array('account_id'=>'main');
// $result = vpost($url,$data);
//  print_r($result);



/*
teegon.payment.account.journal.list(获取账号流水信息(三个月内))


account_id	是	string			子账号填account_id 主账号填main
journal_type	否	string		流水类型 	流水类型 1收款 2支出 3提现 4服务费 5补贴 14收入(提现失败回款)
out_order_no	否	string		商家订单号
from_time	否	string			起始时间
to_time	否	string				结束时间
offset	否	string				起始点
limit	否	string				范围


*/
//  $url = 'https://api.teegon.com/router?method=teegon.payment.account.journal.list&app_key='.$app_key.'&client_secret='.$client_secret;

// $data =array('account_id'=>'main','out_order_no'=>'20171019213355397187');
// $result = vpost($url,$data);
//  print_r($result);



/*
teegon.payment.charge.refund.partial(订单退款)
可全额退款，可部分退款

退款发起条件可参考 https://opennew.teegon.com/doc/?p=351


charge_id	是	string		订单创建时候返回的支付单id
amount	是	string			退款金额

*/
//  $url = 'https://api.teegon.com/router?method=teegon.payment.charge.refund.partial&app_key='.$app_key.'&client_secret='.$client_secret;

// $data =array('charge_id'=>'921006499784826880','amount'=>'0.01');
// $result = vpost($url,$data);
//  print_r($result);



/*
teegon.payment.charge.refund.partial.query(订单退款查询)


退款发起条件可参考 https://opennew.teegon.com/doc/?p=351


refund_id	是	string		退款单id
charge_id	是	string		订单创建时候返回的支付单id

*/
//  $url = 'https://api.teegon.com/router?method=teegon.payment.charge.refund.partial.query&app_key='.$app_key.'&client_secret='.$client_secret;

// $data =array('charge_id'=>'911121045866422272','refund_id'=>'911159563300904960');
// $result = vpost($url,$data);
//  print_r($result);