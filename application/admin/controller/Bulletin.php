<?php
namespace app\admin\controller;

use app\admin\model\Bulletin as BulletinModel;
use app\admin\model\Role as RoleModel;
class Bulletin extends Controller
{
	public function index()
	{
		$model = new BulletinModel;
		$RoleModel = new RoleModel;
		$list = $model->allList();
		$roleList = $RoleModel->column('name','id');
		$roleList[0] = '全部';
		return $this->fetch('index', ['list'=>$list,'roleList'=>$roleList]);
	}
	public function add()
	{
		if($this->request->isAjax()){
			$post = $this->postData();
			$model = new BulletinModel;
			$post['ctime'] = time();
			$r = $model->allowField(true)->save($post);
			if($r){
				$this->add_SystemLog('公告', '增加', '公告');
				return ['ret'=>200, 'msg'=>'操作成功'];
			}
			else{
				return ['ret'=>0, 'msg'=>'操作失败'];
			}
		}
		else{
			$Role = new RoleModel;
			$roleList = $Role->all();
			return $this->fetch('add', ['roleList'=>$roleList]);
		}
	}
	public function up()
	{
		$model = new BulletinModel;
		if($this->request->isAjax()){
			$post = $this->postData();
			$post['utime'] = time();
			$r = $model->allowField(true)->save($post, ['id'=>$post['pkid']]);
			if($r){
				$this->add_SystemLog('公告', '修改', '公告');
				return ['ret'=>200, 'msg'=>'操作成功'];
			}
			else{
				return ['ret'=>0, 'msg'=>'操作失败'];
			}
		}
		else{
			$get = $this->getData();
			$list = $model->get($get['id']);
			$Role = new RoleModel;
			$roleList = $Role->all();
			return $this->fetch('up', ['list'=>$list, 'roleList'=>$roleList]);
		}
	}
	
}
