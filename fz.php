<?php

require_once('client.php');


/*

charge_id	是	string		charge_id
profit_content	是	string	分帐数据 

分账参数参考

[{"account_id":"子帐号id","amount":0.1,"fee":0.02,"comment":"订单交易金额"},{"account_id":"子帐号id","amount":0.1,"fee":0.02,"comment":"订单交易金额"}]

分账条件

1.分账订单的分账模式为子账号分账
2.分账数据中的 amount 总和 必须等于 订单的金额
3.分账数据中的 fee 总和 不小于 订单应付的手续费
4.每一组分账数据中 fee 不得大于 amount
5.订单类型为手动分账
*/

 $url = 'https://api.teegon.com/router?method=teegon.capital.manual.split&app_key='.$app_key.'&client_secret='.$client_secret;

$data =array('charge_id'=>'******','profit_content'=>'[{"account_id":"子帐号id","amount":0.1,"fee":0.02,"comment":"订单交易金额"},{"account_id":"子帐号id","amount":0.1,"fee":0.02,"comment":"订单交易金额"}]');
$result = vpost($url,$data);
 print_r($result);