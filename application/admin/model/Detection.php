<?php
/**
 * 检测单
 * User: 霍文俊
 * Date: 2019/1/11
 * Time: 10:09
 */

namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;
use think\Request;

class Detection extends Model
{
    protected $name = 'report_order';
    protected $pk = 'id';
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    public $old_part_status = array(
        0 => '未审核',
        1 => '通过',
        2 => '驳回再提交',
        3 => '补充资料'
    );//旧件审核
    public $card_type = array(
        1 => '身份证',
        2 => '军官证',
        3 => '护照'
    );//证件类型
    public $order_status = array(
        0 => '待出险',
        1 => '已出险',
        2 => '出险驳回',
    );//订单状态
    public $t_status = array(
        0 => '未收到',
        1 => '已收到',
    );//设备状态

    /**
     * 检测单分页列表
     * @param $where
     * @param $page
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function allList($where, $page)
    {
        return $this
            ->alias('order')
            ->field([
                'order.id,
                order.old_part_status,
                info.t_mod,
                info.t_imei_one,
                info.t_time,
                info.server_start_time,
                info.server_end_time,
                in_info.u_name,
                in_info.u_tel,
                name
                '])
            ->join('report_info info', 'order.report_info_id=info.id')
            ->join('insure_info in_info', 'info.insureinfo_id=in_info.id')
            ->join('card cd', 'in_info.card_id=cd.id')
            ->order('info.id DESC')
            ->where($where)
            ->paginate($page, false, [
                'query' => Request::instance()->request()
            ]);
    }

    /**
     * 数据详情
     * @param array $where
     * @return array|bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function info($where = array())
    {

        //没有保障天数字段，剩余保障天数字段
        $data = $this
            ->alias('order')
            ->field(['
                order.id,
                in_info.u_name,
                in_info.u_sex,
                in_info.card_type,
                in_info.u_cardid,
                in_info.u_tel,
                in_info.u_job,
                in_info.buy_address,
                info.express_company,
                info.express_num,
                info.contact_address,
                info.t_brand,
                info.t_mod,
                info.t_col,
                info.t_mem,
                info.t_imei_one,
                info.t_imei_two,
                info.t_sn,
                info.t_time,
                info.damage,
                info.photo,
                info.t_equity,
                cd.name,
                info.server_start_time,
                info.server_end_time,
                info.acode,
                s.store_name,
                s.store_address,
                order.order_status,
                order.report_time,
                order.pro_price,
                order.operator,
                order.operator_time,
                order.t_status,
                order.recipient,
                order.old_part_status
                '])
            ->join('report_info info', 'order.report_info_id=info.id')
            ->join('insure_info in_info', 'info.insureinfo_id=in_info.id')
            ->join('card cd', 'in_info.card_id=cd.id')
            ->join('store s', 'info.store_id=s.id')
            ->order('info.id DESC')
            ->where($where)
            ->find();
        return $this->datas($data);
    }

    /**
     * 数据处理
     * @param bool $data
     * @return array|bool
     */
    protected function datas($data = false)
    {
        if (!empty($data)) {
            $data['f'] = $data['order_status'];
            $data['t_time'] = date('y-m-d H:i', $data['t_time']);
            $data['photo'] = explode(',', $data['photo']);
            $data['guarantee_time'] = round(($data['server_end_time'] - $data['server_end_time']) / 3600 / 24);//保障天数
            $data['surplus_date'] = round(($data['server_end_time'] - strtotime(date('Y-m-d H:i:s'))) / 3600 / 24);//剩余保障天数
            $data['server_start_time'] = date('y-m-d H:i', $data['server_start_time']);
            $data['server_end_time'] = date('y-m-d H:i', $data['server_end_time']);
            $data['report_time'] = $data['report_time'] ? date('y-m-d H:i', $data['report_time']) : '无';
            $data['old_part_status'] = $this->old_part_status[$data['old_part_status']];
            $data['card_type'] = $this->card_type[$data['card_type']];
            $data['operator_time'] = $data['operator_time'] ? date('y-m-d H:i', $data['operator_time']) : '无';
            $data['order_status'] = $this->order_status[$data['order_status']];
            $data['t_status'] = $this->t_status[$data['t_status']];
            $data['operator'] = $data['operator'] ? $data['operator'] : '';
            $data['recipient'] = $data['recipient'] ? $data['recipient'] : '';
            return $data;
        }
        return array();
    }

}