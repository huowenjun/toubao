<?php
/**
 * 投保单
 * User: 霍文俊
 * Date: 2018/12/21
 * Time: 9:21
 */

namespace app\admin\controller;

use think\Request;
use app\admin\model\Insure as insureModel;
use \app\admin\model\Card;
use \app\admin\model\OrderInsure;
class Insure extends Controller
{
	public $obj;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
		$this->obj = new insureModel;
    }
	
	/**
	投保单审核列表
	**/
	public function index()
	{
		$where = array();
		$get = $this->getData();
		$list = $this->obj->allList($where,PAGE_NUM);
		$data = $this->dataI($list);
		print_r($data);die;
		return $this->fetch('',['list'=>$list]);
	}
	
	private function dataI($data=false)
	{
		$insure_id = $this->dataV($data);
		//查订单id
		$order_list = OrderInsure::where('insure_id','in',$insure_id)->field(['card_id as id','order','order_status'])->select();
		$card_id = $this->dataV($order_list);
		//查询实物卡ID
		$res = Card::where('id','in',$card_id)->field(['id','card'])->select();
		return $res;
	}
	
	private function dataV($data=false)
	{
		//提取数据中id
		$str = '';
		foreach ($data as $v) {
			$str .= $v['id'].',';
		}
		return $str;
	}
}