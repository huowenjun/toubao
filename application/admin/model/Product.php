<?php
/**
 * 产品配置.
 * User: 霍文俊
 * Date: 2018/12/18
 * Time: 9:13
 */

namespace app\admin\model;

use think\Model;
use think\Request;
use traits\model\SoftDelete;

class Product extends Model
{
    protected $name = 'product';
    protected $pk = 'id';
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    public $condition = array(
        1=>'新机',
        2=>'二手机',
    );
    public $type = array(
        1 => '一体',
        2 => '部分',
        3 => '组合',
    );
    public $type_3 = array(
        31=>'碎屏险',
        32=>'意外险',
        33=>'延保险',
    );
    public function allList($where=false,$page=false,$insData=false)
    {
        $data = $this->field(['id','i_id','condition','name','price','type','ctime'])
            ->order('id DESC')
            ->where($where)
            ->paginate($page, false, [
                'query' => Request::instance()->request()
            ]);
        $res = $this->datap($data,$insData);
        return $res;
    }

    /*
     *处理数据
     */
    private function datap($data,$insData){
        foreach ($insData as $k=>$v)
        {
            $arr[$v['id']]=$v['i_name'];
        }
        foreach ($data as &$v)
        {
            $v['condition'] = $this->condition[$v['condition']];
            $v['type'] = $this->type[$v['type']];
            $v['i_id'] = $arr[$v['i_id']];
            $v['ctime'] = date('y-m-d H:i:s',$v['ctime']);
        }
        return $data;
    }


}