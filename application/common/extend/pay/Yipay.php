<?php
namespace app\common\extend\pay;

class Yipay {
    public $name = '易支付';
    public $ver = '1.0';

    public function submit($user,$order,$param)
    {
        $pay_type = 'alipay';
        if(!empty($param['paytype'])){
            $pay_type = intval($param['paytype']);
            if ($pay_type==1){
                $pay_type='alipay';
            }
            if ($pay_type==2){
                $pay_type='qqpay';
            }
            if ($pay_type==3){
                $pay_type='wxpay';
            }
            if ($pay_type==4){
                $pay_type='tenpay';
            }
        }

        //组装参数
        $data = array(
            "pid" => trim( $GLOBALS['config']['pay']['yipay']['appid'] ),//你的码支付ID
            "type" => $pay_type,//1支付宝支付 3微信支付 2QQ钱包
            "money" => $order['order_price'],//金额100元
            "out_trade_no" => $order['order_code'], //唯一标识 可以是用户ID,用户名,session_id(),订单ID,ip 付款后返回
            "notify_url" => "http://".$_SERVER['HTTP_HOST']."/application/SDK/notify_url.php",//通知地址
            "return_url" => "http://".$_SERVER['HTTP_HOST']."/application/SDK/return_url.php",//跳转地址
            "ac" => trim( $GLOBALS['config']['pay']['yipay']['ac'] ),//即时到账和代收款默认1 代收款需要申请
            "name" => "充值",//自定义参数
        );

        ksort($data); //重新排序$data数组
        reset($data); //内部指针指向数组中的第一个元素

        $sign = ''; //初始化需要签名的字符为空
        $urls = ''; //初始化URL参数为空

        foreach ($data as $key => $val) { //遍历需要传递的参数
            if ($val == ''||$key == 'sign') continue; //跳过这些不参数签名
            if ($sign != '') { //后面追加&拼接URL
                $sign .= "&";
                $urls .= "&";
            }
            $sign .= "$key=$val"; //拼接为url参数形式
            $urls .= "$key=" . urlencode($val); //拼接为url参数形式并URL编码参数值
        }
        $api= ( $GLOBALS['config']['pay']['yipay']['api'] );
        $query = $urls . '&sign='.md5($sign.trim( $GLOBALS['config']['pay']['yipay']['appkey'] )).'&sign_type=MD5'; //创建订单所需的参数
        $url = "$api/submit.php?{$query}"; //支付页面

        mac_redirect($url);
    }

    public function notify()
    {
        $param = $_POST;
        // $post['pay_id'] 这是付款人的唯一身份标识或订单ID
        // $post['pay_no'] 这是流水号 没有则表示没有付款成功 流水号不同则为不同订单
        // $post['money'] 这是付款金额
        // $post['param'] 这是自定义的参数

        unset($param['/payment/notify/pay_type/yipay']);
        unset($param['paytype']);

        ksort($param); //排序post参数
        reset($param); //内部指针指向数组中的第一个元素
        $sign = '';
        foreach ($param as $key => $val) {
            if ($val == '') continue; //跳过空值
            if ($key != 'sign') { //跳过sign
                $sign .= "$key=$val&"; //拼接为url参数形式
            }
        }

        $GLOBALS['config']['pay'] = config('maccms.pay');

        if (!$param['pay_no'] || md5(substr($sign,0,-1).trim( $GLOBALS['config']['pay']['yipay']['appkey'])) != $param['sign']) {
            echo 'fail';
        }
        else{
            $res = model('Order')->notify($param['pay_id'],'yipay');
            if($res['code'] >1){
                echo 'fail2';
            }
            else {
                echo 'success';
            }
        }
    }
}
