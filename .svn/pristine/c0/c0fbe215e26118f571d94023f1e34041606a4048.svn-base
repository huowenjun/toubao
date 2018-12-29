<?php
namespace app\admin\controller;

use think\Loader;
use app\admin\model\Brand as BrandModel;
class Upload extends Controller
{
    private $config;	
	/**
     * 图片上传接口
     */
    public function upimages()
    {
		if ($this->request->file()) {
			$config = [
				'size' => 20 * 1024 * 1024,
				'ext'  => 'jpg,png,jpeg'
			];
			$file = $this->request->file('file');
			// $upload_path = str_replace('\\', '/', ROOT_PATH . 'public/uploads');
			$upPath = ROOT_PATH . 'public' . DS . 'uploads';
			$info = $file->validate($config)->move($upPath);
			if($info){
				$save_path   = '/uploads/';
				$result = [
					'error' => 0,
					'url' => str_replace('\\', '/', $save_path . $info->getSaveName())
				];
			}
			else{
				$result = [
					'error' => 1,
					'msg' => $file->getError()
				];
			}
		}
		else{
			$result = [
				'error' => 1,
				'msg' => '请求失败'
			];
		}
        return json($result);
    }
	// 下载导入模板
	public function import_template()
	{
		// 导入PHPExcel类库
		vendor('PHPExcel.PHPExcel');
		// 创建PHPExcel对象
		$PHPExcel = new \PHPExcel();
		$PHPSheet = $PHPExcel->getActiveSheet();
		$PHPSheet->setTitle('手机规格参数');
		$PHPSheet->setCellValue('A1','品牌')->setCellValue('B1','型号')->setCellValue('C1','机身颜色')->setCellValue('D1','内存容量');//表格数据
		$PHPSheet->setCellValue('A2','Apple')->setCellValue('B2','iPhone XS')->setCellValue('C2','金色')->setCellValue('D2','64GB');
		$PHPSheet->setCellValue('A3','Apple')->setCellValue('B3','iPhone XS')->setCellValue('C3','金色')->setCellValue('D3','256GB');
		$PHPSheet->setCellValue('A4','Apple')->setCellValue('B4','iPhone XS')->setCellValue('C4','金色')->setCellValue('D4','512GB');
		
		$PHPWriter = \PHPExcel_IOFactory::createWriter($PHPExcel, 'Excel2007');
		$time = date('ymdhis');
		header('Content-Disposition: attachment;filename="手机规格参数'.$time.'.xlsx"');
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		$PHPWriter->save('php://output');
	}
    /**
     * 富文本上传图片
     */
    public function layup()
    {

        if ($this->request->file()) {
            $config = [
                'size' => 20 * 1024 * 1024,
                'ext' => 'jpg,png,jpeg'
            ];
            $file = $this->request->file('file');
            $upload_path = str_replace('\\', '/', ROOT_PATH . 'public/uploads');
            $info = $file->validate($config)->move($upload_path);
            if ($info) {
                $save_path = '/uploads/';
                $result = [
                    'code' => 0,
                    'msg' => '上传成功',
                    'data' => [
                        'src' => str_replace('\\', '/', $save_path . $info->getSaveName())
                    ],
                ];
            } else {
                $result = [
                    'code' => 1,
                    'msg' => $file->getError()
                ];
            }
        } else {
            $result = [
                'code' => 1,
                'msg' => '请求失败'
            ];
        }
        return json($result);
    }
}