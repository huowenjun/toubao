<?php
/**
 * 实物卡
 * User: 霍文俊
 * Date: 2018/12/20
 * Time: 15:58
 */

namespace app\admin\model;

use think\Model;
use think\Request;
use traits\model\SoftDelete;

class Card extends Model
{
    protected $name = 'card';
    protected $pk = 'id';
    use SoftDelete;
    protected $deleteTime = 'delete_time';
	
	public function allList($where = array(), $page = false) 
	{
			$data = $this
            ->field(['id','card','i_id','name','price','type','activation','ctime'])
            ->order('id DESC')
			->where($where)
			->paginate($page, false, [
                'query' => Request::instance()->request()
            ]);
		return $data;
	}
	
	public function getCard($where=array())
	{
		return $this
		->where($where)
		->field(['id','card','i_id','name','price','type','activation','condition','b_id','type_t','num','prices','ctime','code','sixm','ninem','twelvem'])
		->find();
	}
}