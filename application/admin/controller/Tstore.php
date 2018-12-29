<?php
/**
 * 检测店.
 * User: 霍文俊
 * Date: 2018/12/13
 * Time: 14:57
 */

namespace app\admin\controller;

use app\admin\model\Store as StoreModel;
use think\Log;
use think\Request;

class Tstore extends Controller
{
    public $obj;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->obj = new StoreModel;
    }

    /**
     * 检测店列表
     * @return mixed
     */
    public function index()
    {
        $where = array(
            'type' => 2,
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
        $list = $this->obj->allList($where, PAGE_NUM);
        return $this->fetch('index', ['list' => $list]);
    }

    /**
     * 添加检测店
     * @return array|mixed
     */
    public function add_tstore()
    {
        if ($this->request->isAjax()) {
            $post = $this->postData();//维修店提交数据
            $post['store_acode'] = Store::str();//授权码
            $post['ctime'] = time();
            $bool = StoreModel::where([
                'store_name' => $post['store_name'],
                'type'=>$post['store_name'],
                'delete_time'=>Null
            ])->value('store_name');
            if($bool){
                return ['ret' => 200, 'msg' => '已经存在该检测店'];
            }
            $r = $this->obj->allowField(true)->save($post);
            if ($r) {
                $this->add_SystemLog('检测店', '增加', $post['store_name']);
                return ['ret' => 200, 'msg' => '操作成功'];
            } else {
                Log::write('检测店添加失败' . $post['store_name'] . DATE);
                return ['ret' => 0, 'msg' => '操作失败'];
            }
        } else {
            return $this->fetch();
        }
    }

    /**
     * 修改检测店
     * @return array|mixed
     * @throws \think\exception\DbException
     */
    public function update_tstore()
    {
        if ($this->request->isAjax()) {
            $post = $this->postData();
            $post['utime'] = time();
            $r = $this->obj->allowField(true)->save($post, ['id' => $post['pkid']]);
            if ($r) {
                $contents = $post['store_name'] === $post['beName'] ? $post['store_name'] : $post['store_name'] . " (" . $post['beName'] . ") ";
                $this->add_SystemLog('检测店', '修改', $contents);
                return ['ret' => 200, 'msg' => '操作成功'];
            } else {
                Log::write('检测店修改失败' . $post['beName'] . DATE);
                return ['ret' => 0, 'msg' => '操作失败'];
            }
        } else {
            $get = $this->getData();
            $list = $this->obj->get($get['id']);
            return $this->fetch('update_tstore', ['list' => $list]);
        }
    }

    public function delete_tstore()
    {
        if ($this->request->isAjax()) {
            $post = $this->postData();
            $bool = $this->obj->destroy($post['pkid']);
            if (!$bool) {
                Log::write('检测店删除失败' . $post['beName'] . DATE);
                return ['msg' => '删除失败'];
            }
            $this->add_SystemLog('检测', '删除', $post['beName']);
            return ['msg' => '删除成功'];
        }
    }


}