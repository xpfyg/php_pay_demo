<?php

require_once('client.php');

/*
teegon.authcenter.token.create(创建token)


user_id	是	string		天工用户id(如果不知道自己的user_id可通过账号中的 获取账号信息接口 teegon.account.get.info，查询)
grant_type	是	string		token类型,1:用于绑卡提现功能
from	是	string		来源
account_id	否	string		子账号账户account_id，用于支持子账户创建token
meta_data	否	string		自定义数据, 128个字符以内

通过此接口创建token后拼接到相应的url地址即可访问页面
常用地址如下


H5绑卡地址和提现地址
https://base.teegon.com/card/card_list?token=*******
PC提现地址
https://base.teegon.com/account/withdraw_pc?token=*******
PC绑卡地址
https://base.teegon.com/card/bind_card_pc_index?token=******* 
PC和H5设置交易密码地址
https://base.teegon.com/account/trade_pwd?token=*******
子账号进件页
https://base.teegon.com/entry/index?token=***********

*/

 $url = 'https://api.teegon.com/router?method=teegon.authcenter.token.create&app_key='.$app_key.'&client_secret='.$client_secret;

$data =array('user_id'=>'****','grant_type'=>'1','from'=>'teegon','account_id'=>'****','amount'=>'0.01','meta_data'=>'');
$result = vpost($url,$data);
 print_r($result);