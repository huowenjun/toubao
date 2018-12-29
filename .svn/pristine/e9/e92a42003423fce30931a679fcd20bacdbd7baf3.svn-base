<?php
namespace app\admin\controller;

use app\admin\model\Admin as AdminModel;
class Index extends Controller
{
	public function index()
	{
		$model = new AdminModel;
		$db = $model->query("select VERSION() as version");
		$server = [
			'webserver' => $this->request->server('SERVER_SOFTWARE'),
			'system' => PHP_OS,
			'php' => PHP_VERSION,
			'mysql' => $db[0]['version'],
			'max_execution_time' => ini_get('max_execution_time') . 'S',
			'upload_max' => @ini_get('file_uploads') ? ini_get('upload_max_filesize') : '',
		];
		return $this->fetch('index', ['server'=>$server]);
	}
}
