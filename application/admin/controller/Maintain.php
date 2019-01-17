<?php
/**
 * Created by PhpStorm.
 * User: 霍文俊
 * Date: 2019/1/17
 * Time: 11:55
 */

namespace app\admin\controller;


use think\Request;
use \app\admin\model\Maintain as MaintainM;

class Maintain extends Controller
{
    public $obj;//实例化对象
    public $type = array(
        1=>'屏幕-内屏',
        2=>'屏幕-外屏',
        3=>'屏幕-内外屏',
        4=>'主板-进水',
        5=>'主板-零件损坏',
        6=>'主板-零件缺失',
        7=>'摄像头-损坏',
        8=>'电池-无法使用',
        9=>'电池-性能损耗',
        10=>'其他',
        );//设备损坏类型;
    public $store_status =array(
        1=>'维修中',
        2=>'维修完成',
        3=>'待件中',
        4=>'转维修门店',
    );//维修状态
    public $store_tel_status=array(
        0=>'未收到',
        1=>'已收到',
    );//        待修设备状态
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->obj = new MaintainM();
    }

    /**
     * 展示列表
     * @return mixed
     */
    public function index()
    {
        $where = array();
        $get = $this->getData();
        $list = $this->obj->allList($where, PAGE_NUM);
        return $this->fetch();
    }

    /**
     * 详情
     * @return mixed
     */
    public function show()
    {
        return $this->fetch();
    }

    /**
     * 修改
     * @return mixed
     */
    public function edit()
    {
        if ($this->request->isAjax()) {

        } else {
            return $this->fetch();
        }
    }

    /**
     * 删除
     * @return mixed
     */
    public function del()
    {
        if ($this->request->isAjax()) {

        } else {
            return $this->fetch();
        }
    }

}