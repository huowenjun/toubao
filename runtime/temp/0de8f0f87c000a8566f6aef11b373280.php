<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"F:\toubao\toubao\public/../application/admin\view\index\index.html";i:1546682487;s:59:"F:\toubao\toubao\application\admin\view\layouts\layout.html";i:1546682487;}*/ ?>
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
			<div style="padding: 15px;">
	<div class="layui-col-lg12 layui-col-md12">
		
			<blockquote style="margin-bottom: 10px;padding: 15px;line-height: 22px;border-left: 5px solid #009688;border-radius: 0 2px 2px 0;background-color: #f2f2f2;font-size: 16px;">服务器信息</blockquote>
			<table class="layui-table">
				<tbody>
					<tr>
						<th width="25%">Web服务器环境</th>
						<td><?php echo $server['server_software']; ?></td>
					</tr>
					<tr>
						<td>服务器操作系统</td>
						<td><?php echo $server['system']; ?></td>
					</tr>
					<tr>
						<td>服务器IP地址</td>
						<td><?php echo $server['server_addr']; ?></td>
					</tr>
					<tr>
						<td>服务器域名</td>
						<td><?php echo $server['server_name']; ?></td>
					</tr>
					<tr>
						<td>服务器端口</td>
						<td><?php echo $server['server_port']; ?></td>
					</tr>
					<tr>
						<td>PHP版本</td>
						<td><?php echo $server['php']; ?></td>
					</tr>
					<tr>
						<td>最大执行时间 </td>
						<td><?php echo $server['max_execution_time']; ?></td>
					</tr>
					<tr>
						<td>文件上传限制 </td>
						<td><?php echo $server['upload_max']; ?></td>
					</tr>
				</tbody>
			</table>
		<!-- <fieldset class="layui-elem-field we-changelog" style="padding: 5px;"> -->
			<blockquote style="margin-bottom: 10px;padding: 15px;line-height: 22px;border-left: 5px solid #009688;border-radius: 0 2px 2px 0;background-color: #f2f2f2;font-size: 16px;">通知公告</blockquote>
			<ul class="layui-timeline" style="height: 600px; overflow-y: auto;">
				<?php if (!(empty($ggList))): foreach ($ggList as $vo): ?>
				<li class="layui-timeline-item">
					<i class="layui-icon layui-timeline-axis"></i>
					<div class="layui-timeline-content layui-text">
						<h3 class="layui-timeline-title"><?php echo date("Y.m.d", $vo['ctime']); ?></h3>
						<p><?php echo $vo['main_text']; ?></p>
					</div>
				</li>
				<?php endforeach; endif; ?>
			</ul>
		<!-- </fieldset> -->
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