<?php
/**
 * 投保单详情
 * User: 霍文俊
 * Date: 2018/12/20
 * Time: 15:58
 */

namespace app\admin\model;

use think\Model;
use think\Request;
use traits\model\SoftDelete;

class OrderInsure extends Model
{
    protected $name = 'insure_order';
    protected $pk = 'id';
    use SoftDelete;
    protected $deleteTime = 'delete_time';
	
}