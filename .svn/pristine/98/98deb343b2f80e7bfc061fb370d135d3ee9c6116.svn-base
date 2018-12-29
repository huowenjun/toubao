<?php
namespace app\admin\controller;

use app\admin\model\Systems as SystemsModel;
class Pact extends Controller
{
	// 服务协议
	public function setting()
	{		
		$model = new SystemsModel;
		if($this->request->isAjax()){
			$post = $this->postData();
			$data['utime'] = time();
			$data['value'] = serialize($post);
			$r = $model->allowField(true)->save($data, ['id'=>1]);
			if($r){
				$this->add_SystemLog('服务协议', '修改', '服务协议');
				return ['ret'=>200, 'msg'=>'操作成功'];
			}
			else{
				return ['ret'=>0, 'msg'=>'操作失败'];
			}
		}
		else{
			$list = $model->get(1);
			return $this->fetch('setting', ['list'=>$list]);
		}
	}
}
