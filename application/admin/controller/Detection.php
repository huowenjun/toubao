<?php
/**
 * 检测单
 * User: 霍文俊
 * Date: 2019/1/11
 * Time: 10:09
 */

namespace app\admin\controller;


use think\Request;
use think\Log;
use \app\admin\model\Detection as DetectionM;

class Detection extends Controller
{
    public $reportInfoM;
    public $reportOrderM;
    public $order_status = array(
        0 => '待出险',
        1 => '已出险',
        2 => '出险驳回',
    );//订单状态
    public $t_status = array(
        0 => '未收到',
        1 => '已收到',
    );
    public $old_part_status = array(
        0 => '未审核',
        1 => '通过',
        2 => '驳回再提交',
        3 => '补充资料'
    );
    public $msg = array(
        'order_status' => '报案状态',
        'pro_price' => '出库金额',
        'operator' => '操作人',
        't_status' => '设备状态',
        'recipient' => '接收人',
        'old_part_status' => '旧件审核',
    );

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->reportOrderM = new DetectionM();
    }

    /**检测单列表
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $where = array();
        $get = $this->getData();
        $list = $this->reportOrderM->allList($where, PAGE_NUM);
        if (!empty($list)) {
            foreach ($list as $v) {
                $v['old_part_status'] = $v->old_part_status[$v['old_part_status']];
                $v['t_time'] = date('y-m-d H:i', $v['t_time']);
                $v['surplus_date'] = round(($v['server_end_time'] - strtotime(date('Y-m-d H:i:s'))) / 3600 / 24);//剩余保障天数
                if ($v['surplus_date'] < 0) {
                    $v['surplus_date'] = 0;
                }
                $v['server_start_time'] = date('y-m-d H:i', $v['server_start_time']);
                $v['server_end_time'] = date('y-m-d H:i', $v['server_end_time']);
            }
        }
        return $this->fetch('', ['list' => $list]);
    }

    /**检测单详情
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function show()
    {
        $id = input('get.id/d');
        $where = ['order.id' => $id];
        $data = $this->reportOrderM->info($where);
        return $this->fetch('', ['data' => $data]);
    }

    /**删除数据
     * @return array
     */
    public function del_detection()
    {
        if ($this->request->isAjax()) {
            $post = $this->postData();
            $bool = $this->reportOrderM->destroy(['id' => $post['pkid']]);
            if (!$bool) {
                Log::write('检测单删除失败' . $post['beName'] . DATE);
                return ['msg' => '删除失败'];
            }
            $this->add_SystemLog('检测单', '删除', $post['beName']);
            return ['msg' => '删除成功'];
        }
    }

    /**
     * @return array|mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function up_detection()
    {
        //TODO:缺少角色判断
        if ($this->request->isAjax()) {
            $post = $this->postData();
            $data['utime'] = time();
            $data['id'] = $post['id'];
            if (isset($post['order_status'])) {
                $data['order_status'] = $post['order_status'];
                $data['report_time'] = $data['utime'];
                $order_status = $this->order_status[$data['order_status']];
                $contents = $order_status . " (" . $post['order_status_old'] . ") ";//日志内容
                //返回值
                $back_data = array(
                    'time' => date('y-m-d H:i', $data['report_time']),
                    'os' => $order_status
                );
                //术语标示
                $msg = $this->msg['order_status'];
            } else if (isset($post['pro_price'])) {
                $data['pro_price'] = $post['pro_price'] ? floatval($post['pro_price']) : 0;
                $contents = $data['pro_price'] . " (" . 0 . ") ";
                $back_data = $data['pro_price'];
                $msg = $this->msg['pro_price'];
            } else if (isset($post['operator'])) {
                $data['operator'] = $post['operator'] ? $post['operator'] : '';
                $data['operator_time'] = $data['utime'];
                $contents = $data['operator'] . " (操作人) ";
                $back_data = array(
                    'time' => date('y-m-d H:i', $data['operator_time']),
                    'operator' => $data['operator'],
                );
                $msg = $this->msg['operator'];
            } else if (isset($post['t_status'])) {
                $data['t_status'] = $post['t_status'];
                $t_status = $this->t_status[$data['t_status']];
                $contents = $t_status . " (" . $post['t_status_old'] . ") ";
                $back_data = array(
                    'os' => $t_status,
                );
                $msg = $this->msg['t_status'];
            } else if (isset($post['recipient'])) {
                $data['recipient'] = $post['recipient'] ? $post['recipient'] : '';
                $contents = $data['recipient'] . " (接收人) ";
                $back_data = array(
                    'operator' => $data['recipient']
                );
                $msg = $this->msg['recipient'];
            } else if (isset($post['old_part_status'])) {
                $data['old_part_status'] = $post['old_part_status'];
                $old_part_status = $this->old_part_status[$data['old_part_status']];
                $contents = $old_part_status . " (" . $post['old_part_status'] . ") ";
                $back_data = array(
                    'os' => $old_part_status,
                );
                $msg = $this->msg['old_part_status'];
            }
            $r = $this->reportOrderM->allowField(true)->save($data, ['id' => $post['id']]);
            if ($r) {
                $this->add_SystemLog($msg, '修改', $contents);
                return ['ret' => 200, 'msg' => $back_data];
            } else {
                Log::write($msg . '修改失败' . DATE);
                return ['ret' => 0, 'msg' => '操作失败'];
            }
        } else {
            $id = input('get.id/d');
            $where = ['order.id' => $id];
            $list = $this->reportOrderM->info($where);
            return $this->fetch('up_detection', ['data' => $list]);
        }
    }


}