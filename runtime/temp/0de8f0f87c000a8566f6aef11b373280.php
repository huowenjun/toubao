<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"F:\toubao\toubao\public/../application/admin\view\index\index.html";i:1546064118;s:59:"F:\toubao\toubao\application\admin\view\layouts\layout.html";i:1546064118;}*/ ?>
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
	<link rel="stylesheet" type="text/css" href="/static/layui/css/layui.seller.css" />
	<link rel="stylesheet" type="text/css" href="/static/icon/icon.css" />
	<script type="text/javascript" src="/static/jquery/jquery-2.1.0.min.js"></script>
	<script type="text/javascript" src="/static/layui/layui.js"></script>
</head>
<body class="trade-order">
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
		<legend>系统信息</legend>
	</fieldset>
</div>
<div style="padding: 0px 10px 0px 10px; background-color: #F2F2F2;">
	<div class="layui-row layui-col-space15">
		<div class="layui-col-md12">
			<div class="layui-card">
				<div class="layui-card-header">Web服务器环境</div>
				<div class="layui-card-body">
					<?php echo $server['webserver']; ?>
				</div>
			</div>
		</div>
		<div class="layui-col-md4">
			<div class="layui-card">
				<div class="layui-card-header">服务器操作系统</div>
				<div class="layui-card-body">
					<?php echo $server['system']; ?>
				</div>
			</div>
		</div>
		<div class="layui-col-md4">
			<div class="layui-card">
				<div class="layui-card-header">PHP版本</div>
				<div class="layui-card-body">
					<?php echo $server['php']; ?>
				</div>
			</div>
		</div>
		<div class="layui-col-md4">
			<div class="layui-card">
				<div class="layui-card-header">MySQL版本</div>
				<div class="layui-card-body">
					<?php echo $server['mysql']; ?>
				</div>
			</div>
		</div>
		<div class="layui-col-md4">
			<div class="layui-card">
				<div class="layui-card-header">最大执行时间</div>
				<div class="layui-card-body">
					<?php echo $server['max_execution_time']; ?>
				</div>
			</div>
		</div>
		<div class="layui-col-md4">
			<div class="layui-card">
				<div class="layui-card-header">文件上传限制</div>
				<div class="layui-card-body">
					<?php echo $server['upload_max']; ?>
				</div>
			</div>
		</div>
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