<?php
namespace app\admin\model;

use think\Model;
use think\Request;
class Format extends Model
{
	protected $name = 'format';
	protected $pk = 'id';
	public function allList($where = array(), $page = 15)
	{
		$data = $this
            ->order('px asc')
			->where($where)
			->paginate($page, false, [
                'query' => Request::instance()->request()
            ]);
		return $data;
	}
}