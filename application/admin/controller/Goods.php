<?php
/**
 * 商品
 * User: 霍文俊
 * Date: 2018/12/13
 * Time: 9:21
 */

namespace app\admin\controller;

use app\admin\model\Card as GoodsModel;
use think\Request;
use think\Log;

class Goods extends Controller
{
	public $obj;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
		$this->obj = new GoodsModel();
    }

	/**
	商品列表
	*/
    public function index()
    {
        $where = array();
		$get = $this->getData();
        if (!empty($get['name'])) {
            $where['name'] = ['like', $get['name'] . '%'];
        }
        if (!empty($get['date'])) {
            $date = explode(" - ", $get['date']);
            $where['ctime'] = [['gt', strtotime($date[0])], ['lt', strtotime($date[1])]];
        }
        $list = $this->obj->allList($where,20);
        return $this->fetch('index', ['list'=>$list]);
    }
	
	/*
	商品详情
	*/
	public function show_goods(){
		$get = $this->getData();
		$data = $this->obj->getCard(['id'=>$get['id']]);
		return $this->fetch('',['data'=>$data]);
	}
	
	/*
	作废商品
	*/
	public function delete_goods(){
		if ($this->request->isAjax()) {
            $post = $this->postData();
			$data = $this->obj->getCard(['id'=>$post['pkid']]);
			if ($data['activation']==1) {
				return ['msg' => '已激活,不可以删除'];
			}
            $bool = $this->obj->destroy($post['pkid']);
            if (!$bool) {
                Log::write('商品删除失败' . $post['beName'] . DATE);
                return ['msg' => '删除失败'];
            }
            $this->add_SystemLog('商品', '删除', $post['beName']);
            return ['msg' => '删除成功'];
        } 
	}
	
	
	
	
	
	
	
	
	
}