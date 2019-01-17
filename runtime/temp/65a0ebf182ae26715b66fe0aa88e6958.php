<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"F:\toubao\toubao\public/../application/admin\view\insure\index.html";i:1546500737;s:59:"F:\toubao\toubao\application\admin\view\layouts\layout.html";i:1546682487;}*/ ?>
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
		<legend>投保单列表</legend>
	</fieldset>
</div>
<div style="padding: 0px 10px 0px 10px;">

	<table class="layui-table" >
		<colgroup>
			<col width="80">
			<col width="100">
			<col width="90">
			<col width="105">
			<col width="105">
			<col width="110">
			<col width="100">
			<col width="110">
			<col width="110">
			<col width="90">
			<col width="120">
			<col>
		</colgroup>
		<thead>
			<tr>
				<th>受益人</th>
				<th>手机号</th>
				<th>型号</th>
				<th>IMEI1</th>
				<th>激活/购买日期</th>
				<th>服务内容</th>
				<th>服务开始日期</th>
				<th>服务结束日期</th>
				<th>授权码</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if (!(empty($list->total()))): foreach ($list as $vo): ?>
		<tr>
			<td><?php echo $vo['u_name']; ?></td>
			<td><?php echo $vo['u_tel']; ?></td>
			<td><?php echo $vo['t_mod']; ?></td>
			<td><?php echo $vo['t_imei_one']; ?></td>
			<td><?php echo $vo['t_time'] ? date("y-m-d H:i", $vo['t_time']) : ''; ?></td>
			<td><?php echo $vo['name']; ?></td>
			<td><?php echo $vo['insure_start_time'] ? date("y-m-d H:i", $vo['insure_start_time']) : ''; ?></td>
			<td><?php echo $vo['insure_end_time'] ? date("y-m-d H:i", $vo['insure_end_time']) : ''; ?></td>
			<td><?php echo $vo['acode']?></td>
			<td>
				<?php if(in_array(88, $role_operation_ids)): ?>
				<a class="rha-bt-a" href="updateInsure.html?id=<?php echo $vo['id']; ?>">修改</a><br>
				<?php endif; if(in_array(89, $role_operation_ids)): ?>
				<a href="javascript:;" onclick="Del('<?php echo $vo['id']; ?>', '<?php echo $vo['name']; ?>')" class="rha-bt-a" >删除</a><br>
				<?php endif; if(in_array(87, $role_operation_ids)): ?>
				<a class="rha-bt-a" href="showInsure.html?id=<?php echo $vo['id']; ?>">详情</a><br>
				<?php endif; ?>
			</td>
		</tr>
		<?php endforeach; else: ?>
		<tr>
			<td colspan="10">暂无记录</td>
		</tr>
		<?php endif; ?>
		</tbody>
	</table>
	<?php if (!(empty($list))): ?>
	<div style="text-align: left;"><?php echo $list->render(); ?></div>
	<?php endif; ?>
</div>
<script>
function Del(pkid, beName)
{
	layui.use('layer', function(){
		var layer = layui.layer;
		layer.confirm('你确定要删除此保单吗？', {
			btn: ['是','不'] //按钮
		}, function(){
			$.post(
				'delInsure',
				{'pkid':pkid, 'beName':beName},
				function(obj){
					layer.msg(obj.msg, {time: 1500}, function(){
						window.location.reload();
					});
				},
				"json"
			);
		});
	});
}
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