<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"F:\toubao\toubao\public/../application/admin\view\systems\system_log_lists.html";i:1546682487;s:59:"F:\toubao\toubao\application\admin\view\layouts\layout.html";i:1546682487;}*/ ?>
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
			<div class="weadmin-nav">
	<span class="layui-breadcrumb" style="visibility: visible;">
		<a href="/">首页</a><span lay-separator="">/</span><a><cite>系统日志</cite></a>
	</span>
</div>
	<div class="weadmin-body">
		<form class="layui-form serch" action="">
			<div class="layui-col-md2">
				<div class="layui-form-item">
					<input type="text" name="name" placeholder="请输入创建人"
						   value="<?php echo input('name'); ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-col-md2">
				<div class="layui-form-item" style="margin-left: 5px;">
					<input type="text" name="keys" placeholder="请输入关键字"
						   value="<?php echo input('keys'); ?>" class="layui-input">
				</div>
			</div>
			<div class="layui-col-md3">
				<div class="layui-input-item" style="margin-left: 5px;">
					<input type="text" id="date" name="date" placeholder="请选择时间" value="<?php echo input('date'); ?>" class="layui-input" >
				</div>
			</div>
			<div class="layui-col-md2" style="margin-left: 12px;">
				<button class="layui-btn layui-btn-danger layui-btn-sm" lay-submit lay-filter="*">搜索</button>
				<button type="reset" class="layui-btn layui-bg-cyan layui-btn-sm">重置</button>
			</div>
		</form>
		<table class="layui-table" >
			<colgroup>
				<col width="170">
				<col width="150">
				<col width="100">
				<col width="100">
				<col>
			</colgroup>
			<thead>
				<tr>
					<th>时间</th>
					<th>创建人</th>
					<th>模块</th>
					<th>动作</th>
					<th>内容</th>
				</tr>
			</thead>
			<tbody>
			<?php if (!(empty($list->total()))): foreach ($list as $vo): ?>
			<tr>
				<td><?php echo $vo['ctime'] ? date("Y.m.d H:i:s", $vo['ctime']) : ''; ?></td>
				<td><?php echo $vo['c_name']; ?></td>
				<td><?php echo $vo['module']; ?></td>
				<td><?php echo $vo['actions']; ?></td>
				<td><?php echo $vo['contents']; ?></td>
			</tr>
			<?php endforeach; else: ?>
			<tr>
				<td colspan="6">暂无记录</td>
			</tr>
			<?php endif; ?>
			</tbody>
		</table>
		<?php if (!(empty($list))): ?>
			<div style="text-align: left;"><?php echo $list->render(); ?></div>
		<?php endif; ?>
	</div>
<script>
layui.use(['layer', 'laydate'], function() {
	var layer = layui.layer,
		laydate = layui.laydate,
		$ = layui.jquery;
	layer.closeAll('iframe');//关闭弹窗
	<!-- 日期范围 -->
	laydate.render({
		elem: '#date'
		,range: true
	});
});
</script>
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