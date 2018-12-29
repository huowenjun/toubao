<?php
namespace app\admin\model;

use think\Model;
use think\Request;
class Brand extends Model
{
	protected $name = 'p_brand';
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

	/*
	 *手机品牌
	 */
	public function brandData($where=false)
    {
        return $this->field(['id','name'])->where($where)->select();
    }
}