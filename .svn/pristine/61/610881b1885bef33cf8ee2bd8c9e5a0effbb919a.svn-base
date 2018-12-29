<?php
namespace app\admin\controller;

use app\admin\model\Faq as FaqModel;
class Faq extends Controller
{
	// 导航列表
	public function nav_lists()
	{
		$model = new FaqModel;
		$list = array();
		$where['v'] = 1;
		$list = $model->allList($where);
		return $this->fetch('nav_lists', ['list'=>$list]);
	}
	// 添加
	public function add_nav()
	{
		if($this->request->isAjax()){
			$post = $this->postData();
			$model = new FaqModel;
			$post['ctime'] = time();
			$r = $model->allowField(true)->save($post);
			if($r){
				$this->add_SystemLog('问题导航', '增加', $post['nav']);
				return ['ret'=>200, 'msg'=>'操作成功'];
			}
			else{
				return ['ret'=>0, 'msg'=>'操作失败'];
			}
		}
		else{
			return $this->fetch();
		}
	}
	// 编辑
	public function up_nav()
	{
		$model = new FaqModel;
		if($this->request->isAjax()){
			$post = $this->postData();
			$post['utime'] = time();
			$r = $model->allowField(true)->save($post, ['id'=>$post['pkid']]);
			if($r){
				$contents = $post['nav'] === $post['beName'] ? $post['nav'] : $post['nav']." (".$post['beName'].") ";
				$this->add_SystemLog('问题导航', '修改', $contents);
				return ['ret'=>200, 'msg'=>'操作成功'];
			}
			else{
				return ['ret'=>0, 'msg'=>'操作失败'];
			}
		}
		else{
			$get = $this->getData();
			$list = $model->get($get['id']);
			return $this->fetch('up_nav', ['list'=>$list]);
		}
	}
	// 常见问题列表
	public function faq_lists()
	{
		$model = new FaqModel;
		$where = array();
		$where['v'] = 2;
		$list = $model->allList($where);
		return $this->fetch('faq_lists', ['list'=>$list]);
	}
	// 添加
	public function add_faq()
	{
		$model = new FaqModel;
		if($this->request->isAjax()){
			$post = $this->postData();
			$post['ctime'] = time();
			$r = $model->allowField(true)->save($post);
			if($r){
				$this->add_SystemLog('常见问题', '增加', $post['problem']);
				return ['ret'=>200, 'msg'=>'操作成功'];
			}
			else{
				return ['ret'=>0, 'msg'=>'操作失败'];
			}
		}
		else{
			$navList = $model->where(['v'=>1])->order('px asc')->field('id, nav')->select();
			return $this->fetch('add_faq', ['navList'=>$navList]);
		}
	}
	// 编辑
	public function up_faq()
	{
		$model = new FaqModel;
		if($this->request->isAjax()){
			$post = $this->postData();
			$post['utime'] = time();
			$r = $model->allowField(true)->save($post, ['id'=>$post['pkid']]);
			if($r){
				$contents = $post['problem'] === $post['beName'] ? $post['problem'] : $post['problem']." (".$post['beName'].") ";
				$this->add_SystemLog('常见问题', '修改', $contents);
				return ['ret'=>200, 'msg'=>'操作成功'];
			}
			else{
				return ['ret'=>0, 'msg'=>'操作失败'];
			}
		}
		else{
			$get = $this->getData();
			$list = $model->get($get['id']);
			$navList = $model->where(['v'=>1])->order('px asc')->field('id, nav')->select();
			return $this->fetch('up_faq', ['list'=>$list, 'navList'=>$navList]);
		}
	}
	// 删除
	public function del_faq()
	{
		if($this->request->isAjax()){
			$model = new FaqModel;
			$post = $this->postData();
			$data = $model->get($post['pkid']);
			$r = $data->delete();
			if($r){
				$module = $data['v'] === 1 ? '问题导航' : '常见问题';
				$contents = $data['v'] === 1 ? $data['nav'] : $data['problem'];
				$this->add_SystemLog($module, '删除', $contents);
				return ['ret'=>200, 'msg'=>'删除成功'];
			}
			else{
				return ['ret'=>0, 'msg'=>'删除失败'];
			}
		}
	}
	// 更新排序
	public function up_sort()
    {
        if ($this->request->isAjax()) {
            $post = $this->postData();
			$is = 0;
			$level = 0;
			$times = time();
            foreach ($post as $k => $v) {
                if (!empty($_v = explode('_', $k))) {
					if($v >= 0){
						$data[] = ['id' => $_v[0], 'px' => $v, 'utime' => $times];
					}
					else{
						$is = 1;
						break;
					}
                }
				$level = $_v[2];
            }
			if($is === 1){
				return ['ret'=>0, 'msg' =>'请输入大于0排序'];
			}
			else{
				$model = new FaqModel;
				$model->saveAll($data);
				$module = $level == 1 ? '问题导航' : '常见问题';
				$this->add_SystemLog($module, '排序', '更新排序');
				return ['ret'=>200, 'msg' =>'更新成功'];
			}
        }
    }
}
