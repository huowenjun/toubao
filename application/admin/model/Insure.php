<?php
/**
 * 投保单
 * User: 霍文俊
 * Date: 2018/12/20
 * Time: 15:58
 */

namespace app\admin\model;

use think\Model;
use think\Request;
use traits\model\SoftDelete;

class Insure extends Model
{
    protected $name = 'insure_info';
    protected $pk = 'id';
    use SoftDelete;
    protected $deleteTime = 'delete_time';
	
	public function allList($where = array(), $page = false) 
	{
		$data = $this
		->field(['id','u_name','u_cardid','u_tel','ctime'])
		->order('id DESC')
		->where($where)
		->paginate($page, false, [
			'query' => Request::instance()->request()
		]);
		return $data;
	}
	
}