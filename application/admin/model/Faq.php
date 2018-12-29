<?php
namespace app\admin\model;

use think\Model;
use think\Request;
class Faq extends Model
{
	protected $name = 'faq';
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