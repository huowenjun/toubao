<?php
namespace app\admin\controller;

use app\admin\model\Admin as AdminModel;
use app\admin\model\Bulletin as BulletinModel;
class Index extends Controller
{
	public function index()
	{
		$model = new AdminModel;
		$Bulletin = new BulletinModel;
		$admin = $this->admin_info;
		if($admin['id'] === 1){
			$ggList = $Bulletin->all();
		}
		else{
			$ggList = array();
			if($admin['role_id']){
				$ggList = $Bulletin->where(['role_id'=>['in','0,' . $admin['role_id']]])->order('id', 'desc')->field('main_text,ctime')->select();
			}
		}
		$server = [
			'server_software' => $this->request->server('SERVER_SOFTWARE'), 
			'system' => PHP_OS,
			'server_addr' => $this->request->server('SERVER_ADDR'),
			'server_name' => $this->request->server('SERVER_NAME'),
			'server_port' => $this->request->server('SERVER_PORT'),
			'php' => PHP_VERSION,
			'max_execution_time' => ini_get('max_execution_time') . 'S',
			'upload_max' => @ini_get('file_uploads') ? ini_get('upload_max_filesize') : '',
		];
		return $this->fetch('index', ['server'=>$server, 'ggList'=>$ggList]);
	}
}
