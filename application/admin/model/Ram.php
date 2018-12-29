<?php
namespace app\admin\model;

use think\Model;
use think\Request;
class Ram extends Model
{
	protected $name = 'p_ram';
	protected $pk = 'id';
	public function allList($where = array(), $page = 15)
	{
		$data = $this
            ->order('id desc')
			->where($where)
			->paginate($page, false, [
                'query' => Request::instance()->request()
            ]);
		return $data;
	}
}