<?php
/**
 * 保险类别.
 * User: 霍文俊
 * Date: 2018/12/13
 * Time: 16:36
 */

namespace app\admin\controller;

use think\Log;
use think\Request;
use \app\admin\model\Insurance as InsuranceModel;

class Insurance extends Controller
{
    public $obj;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->obj = new InsuranceModel();
    }

    /**
     * 保险大类列表
     * @return mixed
     */
    public function index()
    {
        $where = array();
        $list = $this->obj->allList($where, 1);
        return $this->fetch('index', ['list' => $list]);
    }

    /**
     * 添加保险大类
     * @return array|mixed
     */
    public function add_insurance()
    {

        if ($this->request->isAjax()) {
            $post = $this->postData();//维修店提交数据
            $post['ctime'] = time();
            $bool = $this->obj->where([
                'i_name' => $post['i_name'],
                'delete_time' => Null
            ])->value('i_name');
            if ($bool) {
                return ['ret' => 200, 'msg' => '已经存在该大类'];
            }
            $r = $this->obj->allowField(true)->save($post);
            if ($r) {
                $this->add_SystemLog('保险大类', '增加', $post['i_name']);
                return ['ret' => 200, 'msg' => '操作成功'];
            } else {
                Log::write('保险大类添加失败' . $post['i_name'] . DATE);
                return ['ret' => 0, 'msg' => '操作失败'];
            }

        } else {
            return $this->fetch();
        }
    }

    /**
     * 修改保险大类
     * @return array|mixed
     * @throws \think\exception\DbException
     */
    public function update_insurance()
    {
        if ($this->request->isAjax()) {
            $post = $this->postData();
            $post['utime'] = time();
            $r = $this->obj->allowField(true)->save($post, ['id' => $post['pkid']]);
            if ($r) {
                $contents = $post['i_name'] === $post['beName'] ? $post['i_name'] : $post['i_name'] . " (" . $post['beName'] . ") ";
                $this->add_SystemLog('保险大类', '修改', $contents);
                return ['ret' => 200, 'msg' => '操作成功'];
            } else {
                Log::write('保险大类修改失败' . $post['beName'] . DATE);
                return ['ret' => 0, 'msg' => '操作失败'];
            }
        } else {
            $get = $this->getData();
            $list = $this->obj->get($get['id']);
            return $this->fetch('update_insurance', ['list' => $list]);
        }
    }

    public function delete_insurance()
    {
        if ($this->request->isAjax()) {
            $post = $this->postData();
            $bool = $this->obj->destroy($post['pkid']);
            if (!$bool) {
                Log::write('保险大类删除失败' . $post['beName'] . DATE);
                return ['msg' => '删除失败'];
            }
            $this->add_SystemLog('维修', '删除', $post['beName']);
            return ['msg' => '删除成功'];
        }
    }

}