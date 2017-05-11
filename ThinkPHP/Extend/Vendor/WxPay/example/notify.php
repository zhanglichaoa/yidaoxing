<?php
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);

require_once dirname(__FILE__)."/../lib/WxPay.Api.php";
require_once dirname(__FILE__).'/../lib/WxPay.Notify.php';
//require_once 'log.php';
//
////初始化日志
//$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
//$log = Log::Init($logHandler, 15);

class PayNotifyCallBack extends WxPayNotify
{
	//查询订单
//	public function Queryorder($transaction_id)
//	{
//		$input = new WxPayOrderQuery();
//		$input->SetTransaction_id($transaction_id);
//		$result = WxPayApi::orderQuery($input);
//		Log::DEBUG("query:" . json_encode($result));
//		if(array_key_exists("return_code", $result)
//			&& array_key_exists("result_code", $result)
//			&& $result["return_code"] == "SUCCESS"
//			&& $result["result_code"] == "SUCCESS")
//		{
//			return true;
//		}
//		return false;
//	}
	
	//重写回调处理函数
	public function NotifyProcess($data, &$msg)
	{
//		Log::DEBUG("call back:" . json_encode($data));
//		$notfiyOutput = array();

		if(!array_key_exists("attach", $data)){
			$msg = "输入参数不正确";
			return false;
		}
		//更新记录
		$m = M('user');
		$where['memberid'] = $data['attach'];
		$datas['is_pay'] = 1;
		$res = $m->where($where)->save($datas);
		if (!$res){
			$msg = '更新状态失败';
			return false;
		}
		return true;
	}
}

//Log::DEBUG("begin notify");
$notify = new PayNotifyCallBack();
$notify->Handle(false);
