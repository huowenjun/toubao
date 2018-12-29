<?php
namespace app\admin\model;

use think\Model;
use think\Request;
class Mel extends Model
{
	protected $name = 'p_model';
	protected $pk = 'id';
	public function allList($where = array(), $page = 15)
	{
		$data = $this->with(['brand'])
			->where($where)
            ->order('id desc')
			->paginate($page, false, [
                'query' => Request::instance()->request()
            ]);
		return $data;
	}


	public function melData($where=false)
    {
        return $this->field(['id','brand_id','name'])->where($where)->select();
    }
	public function brand()
    {
        return $this->belongsTo('Brand', 'brand_id');
    }
}