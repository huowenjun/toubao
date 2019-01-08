<?php
/**
 * Created by PhpStorm.
 * User: 霍文俊
 * Date: 2019/1/3
 * Time: 11:26
 */
namespace app\admin\controller;

use app\admin\model\Store as StoreModel;
use think\Log;
use think\Request;

class Dstore extends Controller
{
    const NUM = 6;//授权码长度
    public $obj;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->obj = new StoreModel();
    }

    // 经销商列表
    public function index()
    {
        $where = array(
            'type'=>3,
        );
        $get = $this->getData();
        if (!empty($get['store_name'])) {
            $where['store_name'] = ['like', '%'.$get['store_name'] . '%'];
        }
        if (!empty($get['store_address'])) {
            $where['store_address'] = ['like', '%'.$get['store_address'] . '%'];
        }
        if (!empty($get['name'])) {
            $where['name'] = ['like', '%'.$get['name'] . '%'];
        }
        if (!empty($get['tel'])) {
            $where['tel'] = ['like', '%'.$get['tel'] . '%'];
        }
        $list = $this->obj->allList($where,PAGE_NUM);
        return $this->fetch('index', ['list' => $list]);
    }

    // 增加经销商
    public function add_dstore()
    {
        if ($this->request->isAjax()) {
            $post = $this->postData();//经销商提交数据
            $post['store_acode'] = Store::str();;//授权码
            $post['ctime'] = time();
            $bool = StoreModel::where([
                'store_name' => $post['store_name'],
                'type'=>$post['type'],
                'delete_time'=>Null
            ])->value('store_name');
            if($bool){
                return ['ret' => 200, 'msg' => '已经存在该经销商'];
            }
            $r = $this->obj->allowField(true)->save($post);
            if ($r) {
                $this->add_SystemLog('经销商', '增加', $post['store_name']);
                return ['ret' => 200, 'msg' => '操作成功'];
            } else {
                Log::write('经销商添加失败' . $post['store_name'] . DATE);
                return ['ret' => 0, 'msg' => '操作失败'];
            }
        } else {
            return $this->fetch();
        }
    }

    // 修改经销商
    public function update_dstore()
    {
        if ($this->request->isAjax()) {
            $post = $this->postData();
            $post['utime'] = time();
            $r = $this->obj->allowField(true)->save($post, ['id' => $post['pkid']]);
            if ($r) {
                $contents = $post['store_name'] === $post['beName'] ? $post['store_name'] : $post['store_name'] . " (" . $post['beName'] . ") ";
                $this->add_SystemLog('经销商', '修改', $contents);
                return ['ret' => 200, 'msg' => '操作成功'];
            } else {
                Log::write('经销商修改失败' . $post['beName'] . DATE);
                return ['ret' => 0, 'msg' => '操作失败'];
            }
        } else {
            $get = $this->getData();
            $list = $this->obj->get($get['id']);
            return $this->fetch('', ['list' => $list]);
        }
    }

    // 删除经销商
    public function delete_dstore()
    {
        if ($this->request->isAjax()) {
            $post = $this->postData();
            $bool = $this->obj->destroy($post['pkid']);
            if (!$bool) {
                Log::write('经销商删除失败' . $post['beName'] . DATE);
                return ['msg' => '删除失败'];
            }
            $this->add_SystemLog('维修', '删除', $post['beName']);
            return ['msg' => '删除成功'];
        }
    }
}
