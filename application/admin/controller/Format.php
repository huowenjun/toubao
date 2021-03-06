<?php
namespace app\admin\controller;

use app\admin\model\Format as FormatModel;
class Format extends Controller
{
	// 规格列表
	public function format_lists()
	{
		$where = array();
        $get = $this->getData();
		if(!empty($get['brand'])){
            $where['brand'] = ['like', $get['brand'] . '%'];
        }
        if(!empty($get['models'])){
            $where['models'] = ['like', $get['models'] . '%'];
        }
		if(!empty($get['color'])){
            $where['color'] = ['like', $get['color'] . '%'];
        }
		if(!empty($get['rom'])){
            $where['rom'] = ['like', $get['rom'] . '%'];
        }
		$model = new FormatModel;
		$list = $model->allList($where, 30);
		return $this->fetch('format_lists', ['list'=>$list]);
	}
	// 添加
	public function add_format()
	{
		if($this->request->isAjax()){
			$post = $this->postData();
			$model = new FormatModel;
			$post['utime'] = time();
			$r = $model->allowField(true)->save($post);
			if($r){
				$this->add_SystemLog('手机规格', '增加', $post['brand'] . " " . $post['models'] . " " . $post['color'] . " " . $post['rom']);
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
	public function up_format()
	{
		$model = new FormatModel;
		if($this->request->isAjax()){
			$post = $this->postData();
			$post['utime'] = time();
			$r = $model->allowField(true)->save($post, ['id'=>$post['pkid']]);
			if($r){
				$contents = $post['brand'] . " " . $post['models'] . " " . $post['color'] . " " . $post['rom'] . " (".$post['beName'].") ";
				$this->add_SystemLog('手机规格', '修改', $contents);
				return ['ret'=>200, 'msg'=>'操作成功'];
			}
			else{
				return ['ret'=>0, 'msg'=>'操作失败'];
			}
		}
		else{
			$get = $this->getData();
			$list = $model->get($get['id']);
			return $this->fetch('up_format', ['list'=>$list]);
		}
	}
	// 删除
	public function del_format()
	{
		if($this->request->isAjax()){
			$model = new FormatModel;
			$post = $this->postData();
			$data = $model->get($post['pkid']);
			$r = $data->delete();
			if($r){
				$this->add_SystemLog('手机规格', '删除', $data['brand'] . " " . $data['models'] . " " . $data['color'] . " " . $data['rom']);
				return ['ret'=>200, 'msg'=>'删除成功'];
			}
			else{
				return ['ret'=>200, 'msg'=>'删除失败'];
			}
		}
	}
	// 导出
	public function export()
	{
		vendor('PHPExcel.PHPExcel');
		$PHPExcel = new \PHPExcel();
		$PHPSheet = $PHPExcel->getActiveSheet();
		$PHPSheet->setTitle('手机规格');
		$PHPSheet->setCellValue('A1','设备品牌')->setCellValue('B1','设备型号')->setCellValue('C1','机身颜色')->setCellValue('D1','内存容量');//表格数据
		$model = new FormatModel;
		$list = $model->all();
		$i = 2;
		foreach($list as $v){
			$PHPSheet->setCellValue('A'.$i,$v['brand'])->setCellValue('B'.$i,$v['models'])->setCellValue('C'.$i,$v['color'])->setCellValue('D'.$i,$v['rom']);
			$i++;
		}
		$PHPWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
		$time = date('ymdhis');
		header('Content-Disposition: attachment;filename="手机规格参数'.$time.'.xlsx"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		$PHPWriter->save('php://output');
	}
	// Excel回传
	public function excel_import()
	{
		if($this->request->isPost()){
			$config = [
				'size' => 20 * 1024 * 1024,
				'ext'  => 'xls,xlsx'
			];
			// $upload_path = str_replace('\\', '/', ROOT_PATH . 'public/excel');
			$upPath = ROOT_PATH . 'public' . DS . 'excel';
			$file = $this->request->file('importFile');
			if($file){
				$info = $file->validate($config)->move($upPath);
				if($info){
					$fileExts = $info->getExtension();//文件后缀
					$filePath = ROOT_PATH . 'public' . DS . 'excel' . DS . $info->getSaveName();
					// 导入PHPExcel类库
					vendor('PHPExcel.PHPExcel');
					// 创建PHPExcel对象
					$PHPExcel = new \PHPExcel();
					// 判断excel文件后缀
					if($fileExts == 'xls'){
						Vendor('PHPExcel.PHPExcel.Reader.Excel5');
						$PHPReader = new \PHPExcel_Reader_Excel5();
					}
					else if($fileExts == 'xlsx'){
						Vendor('PHPExcel.PHPExcel.Reader.Excel2007');
						$PHPReader = new \PHPExcel_Reader_Excel2007();
					}
					// 载入文件
					$PHPExcel = $PHPReader->load($filePath);
					$allAry = $PHPExcel->getSheet(0)->toArray();
					if(count($allAry) <= 4){
						if($allAry[0][0] === '设备品牌' && $allAry[0][1] === '设备型号' && $allAry[0][2] === '机身颜色' && $allAry[0][3] === '内存容量'){
							// 初始
							$model = new FormatModel;
							$addData = array();
							$utime = time();
							for($i=1; $i<count($allAry); $i++){
								$addData[] = ['brand'=>$allAry[$i][0], 'models'=>$allAry[$i][1], 'color'=>$allAry[$i][2], 'rom'=>$allAry[$i][3], 'utime'=>$utime];
							}
							if($addData){
								// 添加新获取的数据
								$model->saveAll($addData);
								$this->add_SystemLog('手机规格', 'Excel回传', '手机参数');
							}
							$result = [
								'error' => 0,
								'msg' => '回传成功'
							];
						}
						else{
							$result = [
								'error' => 1,
								'msg' => '模板错误'
							];
						}
					}
					else{
						$result = [
							'error' => 1,
							'msg' => '回传失败，模板总条数不得大于1000条'
						];
					}
					// 删除目录
					$this->delDir(ROOT_PATH . 'public' . DS . 'excel');
				}
				else{
					$result = [
						'error' => 1,
						'msg' => '回传失败'
					];
				}
			}
			else{
				$result = [
					'error' => 1,
					'msg' => '模板错误'
				];
			}
			return json($result);
		}
	}
	public function up_sort()
    {
        if ($this->request->isAjax()) {
            $post = $this->postData();
			$is = 0;
            foreach ($post as $k => $v) {
                if (!empty($_v = explode('_', $k))) {
					if($v >= 0){
						$data[] = ['id' => $_v[0], 'px' => $v];
					}
					else{
						$is = 1;
						break;
					}
                }
            }
			
			if($is === 1){
				return ['ret'=>0, 'msg' =>'请输入大于0排序'];
			}
			else{
				$model = new FormatModel;
				$model->saveAll($data);
				$this->add_SystemLog('手机规格', '排序', '更新排序');
				return ['ret'=>200, 'msg' =>'更新成功'];
			}
        }
    }
}