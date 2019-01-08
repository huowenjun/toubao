<?php
/**
 * 投保单
 * User: 霍文俊
 * Date: 2018/12/21
 * Time: 9:21
 */

namespace app\admin\controller;

use app\admin\model\insureOrder;
use think\Request;
use think\Log;
use app\admin\model\Insure as insureModel;
use \app\admin\model\Card;
use \app\admin\model\OrderInsure;
class Insure extends Controller
{
	public $obj;
	public $objo;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
		$this->obj = new insureModel;
		$this->objo = new insureOrder();
    }
	
	/**
	投保单审核列表
	**/
	public function index()
	{
		$where = array();
		$get = $this->getData();
		$list = $this->obj->allList($where,PAGE_NUM);
		return $this->fetch('',['list'=>$list]);
	}
	/**
     * 投保单审核详情
     */
	public function show()
    {
        $id = input('get.id/d');
        $where = ['info.id'=>$id];
        $data = $this->obj->info($where);
        return $this->fetch('',['data'=>$data]);
    }
    public function delete_insure()
    {
        if ($this->request->isAjax()) {
            $post = $this->postData();
            $bool = $this->objo->destroy(['insure_id'=>$post['pkid']]);
            if (!$bool) {
                Log::write('投保单删除失败' . $post['beName'] . DATE);
                return ['msg' => '删除失败'];
            }
            $this->add_SystemLog('投保单', '删除', $post['beName']);
            return ['msg' => '删除成功'];
        }
    }

    public function update_insure()
    {
        if ($this->request->isAjax()) {
            $post = $this->postData();
            $post['utime'] = time();
            $post['examine_time'] = time();
            $r = $this->objo->allowField(true)->save($post, ['id' => $post['pkid']]);
            if ($r) {
                $contents = $post['order_status'] === $post['beName'] ? config('order_status')[$post['order_status']] : config('order_status')[$post['order_status']] . " (" . $post['beName'] . ") ";
                $this->add_SystemLog('保单状态', '修改', $contents);
                return ['ret' => 200, 'msg' => '操作成功'];
            } else {
                Log::write('保单状态修改失败' . $post['beName'] . DATE);
                return ['ret' => 0, 'msg' => '操作失败'];
            }
        } else {
            $id = input('get.id/d');
            $where = ['info.id'=>$id];
            $list = $this->obj->info($where);
            return $this->fetch('update_insure', ['data' => $list]);
        }
    }
	

}