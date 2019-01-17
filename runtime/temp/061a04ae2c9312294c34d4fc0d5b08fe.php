<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"F:\toubao\toubao\public/../application/admin\view\systems\add_menu.html";i:1546682487;s:59:"F:\toubao\toubao\application\admin\view\layouts\layout.html";i:1546682487;}*/ ?>
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
			<!-- 导航栏 -->
<div class="weadmin-nav">
	<span class="layui-breadcrumb" style="visibility: visible;">
		<a href="/">首页</a><span lay-separator="">/</span><a href="system-menulist.html">菜单列表</a><span lay-separator="">/</span><a><cite>增加菜单</cite></a>
	</span>
</div>
<div class="weadmin-body">
	<form class="layui-form layui-form-pane" action="" >
		<div class="layui-form-item">
			<label class="layui-form-label"><i class="required-color">*</i>菜单名称</label>
			<div class="layui-input-block">
				<input type="text" name="name" required  lay-verify="required" placeholder="请输入菜单名称" autocomplete="off" class="layui-input">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><i class="required-color">*</i>上级菜单</label>
			<div class="layui-input-block">
				<select name="pid" lay-verify="required">
					<option value=""></option>
					<option value="0">顶级菜单</option>
					<?php foreach($list as $v): ?>
						 <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
						 <?php if(!(empty($v['child']))): if(is_array($v['child'])): $i = 0; foreach ($v['child'] as $v2): ++$i; ?>
							<option value="<?php echo $v2['id']; ?>">&nbsp;&nbsp;&nbsp; ├<?php echo $v2['name']; ?></option>
							<?php if(!(empty($v2['child']))): if(is_array($v2['child'])): $ii = 0; foreach ($v2['child'] as $v3): ++$ii; ?>
								<option value="<?php echo $v3['id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ├<?php echo $v3['name']; ?></option>
					<?php endforeach; endif; endif; endforeach; endif; endif; endforeach; ?>
				</select>
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><i class="required-color">*</i>菜单URL</label>
			<div class="layui-input-inline">
				<input name="url" required  lay-verify="required" placeholder="请输入URL" autocomplete="off" class="layui-input" type="text">
			</div>
			<div class="layui-form-mid layui-word-aux">注意：(小写)模块/控制器/操作方法(空如：NULL)</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label"><i class="required-color">*</i>模板码</label>
			<div class="layui-input-inline">
				<input name="route" required  lay-verify="required" placeholder="请输入模板码" autocomplete="off" class="layui-input" type="text">
			</div>
			<div class="layui-form-mid layui-word-aux">字符串(空如：NULL)</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">排序</label>
			<div class="layui-input-inline">
				<input name="sort"  placeholder="请输入排序" autocomplete="off" class="layui-input" type="text">
			</div>
			<div class="layui-form-mid layui-word-aux">数字越小越靠前</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">图标</label>
			<div class="layui-input-inline">
				<input name="icon"  placeholder="请输入图标" autocomplete="off" class="layui-input" type="text">
			</div>
			<div class="layui-form-mid layui-word-aux">字符串</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-input-block">
				<button class="layui-btn" lay-submit lay-filter="ADM">立即提交</button>
				<button type="reset" class="layui-btn layui-btn-primary">重置</button>
			</div>
		</div>
	</form>
</div>
<script>
layui.use('form', function(){
    var form = layui.form;
	form.on('submit(ADM)', function (data) {
		$.post(
			"system-addmenu",
			data.field,
			function (obj) {
				if(obj.ret == 200){
					layer.msg(obj.msg, {time: 1500}, function(){
						window.location.reload();
					});
				}
				else{
					layer.msg(obj.msg, {time: 1500, anim: 6});
				}
			},
			"json"
		);
		return false;
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