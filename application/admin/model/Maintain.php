<?php
/**
 * 维修单
 * User: 霍文俊
 * Date: 2019/1/17
 * Time: 11:56
 */
namespace app\admin\model;
use think\Model;
use traits\model\SoftDelete;
use think\Request;

class Maintain extends Model{

    protected $name = 'report_order';
    protected $pk = 'id';
    use SoftDelete;
    protected $deleteTime = 'delete_time';

}