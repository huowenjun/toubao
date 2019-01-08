<?php
namespace app\admin\model;

use think\Model;
use think\Request;
class Bulletin extends Model
{
	protected $name = 'bulletin';
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