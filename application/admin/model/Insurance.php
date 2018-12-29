<?php
/**
 * Created by PhpStorm.
 * User: 霍文俊
 * Date: 2018/12/13
 * Time: 16:47
 */

namespace app\admin\model;

use think\Model;
use think\Request;
use traits\model\SoftDelete;

class Insurance extends Model
{
    protected $name = 'insurance';
    protected $pk = 'id';
    use SoftDelete;
    protected $deleteTime = 'delete_time';

    public function allList($where = array(), $page = false)
    {
        $data = $this
            ->field(['id','i_name','i_info','ctime'])
            ->order('id DESC')
            ->where($where)
            ->paginate($page, false, [
                'query' => Request::instance()->request()
            ]);
        return $data;
    }
}