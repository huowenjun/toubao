<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"F:\toubao\toubao\public/../application/admin\view\goods\show_goods.html";i:1546916849;s:59:"F:\toubao\toubao\application\admin\view\layouts\layout.html";i:1546682487;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <title>手机投保 · 平台管理系统</title>
	
	<link rel="stylesheet" type="text/css" href="/static/admin/css/admin_base.css" />
	<link rel="stylesheet" type="text/css" href="/static/admin/css/page.css" />
	<link rel="stylesheet" type="text/css" href="/static/layui/css/layui.css" />
	<link rel="stylesheet" type="text/css" href="/static/icon/icon.css" />
	<script type="text/javascript" src="/static/jquery/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="/static/layui/layui.js"></script>
</head>
<body>
	<div class="topbar">
		<div class="wrap">
			<ul>
				<li>欢迎你，<a class="name" href="javascript:;"><?= $admin_info['nickname'] ?></a>
					<a class="quit" href="system-logout"><i class="rha-icon" style="">&#xe609;</i>退出登录</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="header">
		<div class="wrap">
			<div class="logo">
				<h1 class="main-logo"><a href="/"></a></h1>
				<div class="sub-logo"></div>
			</div>
			<div class="nav">
				<ul>
					<?php foreach ($t_nav as $nav): ?>
					<li class="<?php if($nav['selected'] === 1): ?>selected<?php endif; ?>">
						<a href="<?php echo $nav['route']; ?>"><?php echo $nav['name']; ?></a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="container_body">
		<div class="sidebar">
			<div class="menu">
				<?php foreach ($t_menu as $menu): ?>
				<dl>
					<dt><i class="type-ico ico-trade rha-icon "><?php echo $menu['icon']; ?></i><?php echo $menu['name']; ?></dt>
					<?php if(!(empty($menu['child']))): $i = 0; foreach ($menu['child'] as $menus): $i++; ?>
						<dd class="<?php if($menus['selected'] === 1): ?>selected<?php endif; ?>"><a href="<?php echo $menus['route']; ?>"><?php echo $menus['name']; ?></a></dd>
					<?php endforeach; endif; ?>
				</dl>
				<?php endforeach; ?>
			</div>
		</div>
		<!-- 内容区域 start -->
		<div class="content">
			<div class="content-hd">
	<fieldset class="layui-elem-field layui-field-title" >
		<legend>实物卡详情</legend>
	</fieldset>
</div>
<div class="rhaphp-srivice-register">
			<div class="layui-form-item">
				<label class="layui-form-label">序列号:</label>
				<label class="layui-form-label" style="width: auto;text-align: left"><?php echo $data['card']; ?></label>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">服务大类:</label>
				<label class="layui-form-label" style="width: auto;text-align: left"><?php echo $data['i_id']; ?></label>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">产品名称:</label>
				<label class="layui-form-label" style="width: auto;text-align: left"><?php echo $data['name']; ?></label>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">产品价格:</label>
				<label class="layui-form-label" style="width: auto;text-align: left"><?php echo $data['price']; ?></label>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">手机型号:</label>
				<label class="layui-form-label" style="width: auto;text-align: left"><?php echo $data['b_id']; ?></label>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">手机成色:</label>
				<label class="layui-form-label" style="width: auto;text-align: left"><?php echo $data['condition']; ?></label>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">服务条件:</label>
				<label class="layui-form-label" style="width: auto;text-align: left"><?php echo $data['type']; ?></label>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">组合条件:</label>
				<label class="layui-form-label" style="width: auto;text-align: left"><?php echo $data['type_t']; ?></label>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">服务次数:</label>
				<label class="layui-form-label" style="width: auto;text-align: left"><?php echo $data['num']; ?></label>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">服务价格:</label>
				<label class="layui-form-label" style="width: auto;text-align: left"><?php echo $data['prices']; ?></label>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">是否激活:</label>
				<label class="layui-form-label" style="width: auto;text-align: left"><?php if($data['activation'] == 1): ?>是<?php else: ?> 否<?php endif; ?></label>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label">物料编码:</label>
				<label class="layui-form-label" style="width: auto;text-align: left"><?php echo $data['code']; ?></label>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label" title="延保6个月费用">6个月费用:</label>
				<label class="layui-form-label" style="width: auto;text-align: left"><?php echo $data['sixm']; ?></label>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label" title="延保9个月费用">9个月费用</label>
				<label class="layui-form-label" style="width: auto;text-align: left"><?php echo $data['ninem']; ?></label>
			</div>
			<div class="layui-form-item">
				<label class="layui-form-label" title="延保12无个月费用">12个月费用</label>
				<label class="layui-form-label" style="width: auto;text-align: left"><?php echo $data['twelvem']; ?></label>
			</div>
</div>
		</div>
		<!-- 内容区域 end -->
	</div>
	<div class="footer">
		<div class="wrap">
			<!-- <a href="http://www.mcbn.cn/" target="_blank">北京明创百年科技有限公司</a> -->
			北京明创百年科技有限公司
			<i class="vs">|</i>
			Copyright © <?php echo date('Y'); ?> All Rights Reserved.
		</div>
	</div>
</body>
<script>
    layui.use('element', function(){
        var element = layui.element;
    });
    var layer
    layui.use('layer', function(){
        layer = layui.layer;
    });
</script>
</html>