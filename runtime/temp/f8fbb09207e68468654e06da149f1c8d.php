<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"F:\toubao\toubao\public/../application/admin\view\systems\menulist.html";i:1546682487;s:59:"F:\toubao\toubao\application\admin\view\layouts\layout.html";i:1546682487;}*/ ?>
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
		<a href="/">首页</a><span lay-separator="">/</span><a><cite>菜单列表</cite></a>
	</span>
</div>
<div class="weadmin-body">
	<!-- 操作按钮 -->
	<?php if(in_array(5, $role_operation_ids)): ?>
	<div class="weadmin-block">
		<a href="system-addmenu.html" class="layui-btn layui-btn-sm layui-btn-normal">增加菜单</a>
	</div>
	<?php endif; ?>
	<!-- 搜索框 -->
	<!-- 注意事项 -->
	<div class="layui-row">
		<div class="admin-caveat"><span>注：非开发人员请勿操作。（删除父级菜单，对应的子菜单也将删除）</span></div>
	</div>
	<!-- table -->
	<?php if(in_array(22, $role_operation_ids)): ?>
	<div class="layui-form-item">
		<button class="layui-btn layui-btn-sm" lay-submit lay-filter="updateSort">更新排序</button>
	</div>
	<?php endif; ?>
	<table class="layui-table">
		<colgroup>
			<col width="100">
			<col width="500">
			<col>
		</colgroup>
		<thead>
			<tr>
				<th>排序</th>
				<th>菜单名称</th>
				<th>地址</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($list as $v): ?>
			<tr>
				<td><input style="width: 35px; text-align:center" name="<?php echo $v['id']; ?>_<?php echo $v['sort']; ?>" value="<?php echo $v['sort']; ?>"></td>
				<td><?php echo $v['name']; ?></td>
				<td><?php echo $v['url']; ?></td>
				<td>
				<?php if(in_array(19, $role_operation_ids)): ?>
					<a class="rha-bt-a" href="system-updateMenu.html?id=<?php echo $v['id']; ?>">修改</a>
				<?php endif; if(in_array(20, $role_operation_ids)): ?>
					<a href="javascript:;" onclick="delMenu('<?php echo $v['id']; ?>', '<?php echo $v['name']; ?>')" class="rha-bt-a" >删除</a>
				<?php endif; ?>
				</td>
			</tr>
			<?php if(!(empty($v['child']))): if(is_array($v['child'])): $i = 0; foreach ($v['child'] as $v2): ++$i; ?>
			<tr>
				<td><input style="width: 35px; text-align:center" name="<?php echo $v2['id']; ?>_<?php echo $v2['sort']; ?>" value="<?php echo $v2['sort']; ?>"></td>
				<td>&nbsp;&nbsp;&nbsp; ├<?php echo $v2['name']; ?></td>
				<td><?php echo $v2['url']; ?></td>
				<td>
				<?php if(in_array(19, $role_operation_ids)): ?>
					<a class="rha-bt-a" href="system-updateMenu.html?id=<?php echo $v2['id']; ?>">修改</a>
				<?php endif; if(in_array(20, $role_operation_ids)): ?>
					<a href="javascript:;" onclick="delMenu('<?php echo $v2['id']; ?>', '<?php echo $v['name']; ?>')" class="rha-bt-a" >删除</a>
				<?php endif; ?>
				</td>
			</tr>
			<?php if(!(empty($v2['child']))): if(is_array($v2['child'])): $ii = 0; foreach ($v2['child'] as $v3): ++$ii; ?>
			<tr>
				<td><input style="width: 35px; text-align:center" name="<?php echo $v3['id']; ?>_<?php echo $v3['sort']; ?>" value="<?php echo $v3['sort']; ?>"></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ├<?php echo $v3['name']; ?></td>
				<td><?php echo $v3['url']; ?></td>
				<td>
				<?php if(in_array(19, $role_operation_ids)): ?>
					<a class="rha-bt-a" href="system-updateMenu.html?id=<?php echo $v3['id']; ?>">修改</a>
				<?php endif; if(in_array(20, $role_operation_ids)): ?>
					<a href="javascript:;" onclick="delMenu('<?php echo $v3['id']; ?>', '<?php echo $v['name']; ?>')" class="rha-bt-a" >删除</a>
				<?php endif; ?>
				</td>
			</tr>
			<?php if(!(empty($v3['child']))): if(is_array($v3['child'])): $iii = 0; foreach ($v3['child'] as $v4): ++$iii; ?>
			<tr>
				<td><input style="width: 35px; text-align:center" name="<?php echo $v4['id']; ?>_<?php echo $v4['sort']; ?>" value="<?php echo $v4['sort']; ?>"></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ├<?php echo $v4['name']; ?></td>
				<td><?php echo $v4['url']; ?></td>
				<td>
				<?php if(in_array(19, $role_operation_ids)): ?>
					<a class="rha-bt-a" href="system-updateMenu.html?id=<?php echo $v4['id']; ?>">修改</a>
				<?php endif; if(in_array(20, $role_operation_ids)): ?>
					<a href="javascript:;" onclick="delMenu('<?php echo $v4['id']; ?>', '<?php echo $v['name']; ?>')" class="rha-bt-a" >删除</a>
				<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; endif; endif; endforeach; endif; endif; endforeach; endif; endif; endforeach; ?>
		</tbody>
	</table>
</div>
<script>
layui.use(['form', 'upload'], function(){
    var form = layui.form,
	upload = layui.upload;
	var returnExcel = upload.render({
		elem: '#Eximport' //指向容器选择器
		,url: 'upExcels' //服务端上传接口
		,accept: 'file' //指定允许上传时校验的文件类型
		,field: 'excel' //设定文件域的字段名
		,size: 20 * 1024 * 1024 //设置文件最大可允许上传的大小，单位 KB
		,multiple: false //是否允许多文件上传
		,number: 1 //设置同时可上传的文件数量
		,before: function(obj){
			layer.load(2, {shade: [1, '#FFF']});
		}
		,done: function(res){
			layer.closeAll();
			layer.msg(res.msg, {time: 1500});
		}
		,error: function(){
			layer.closeAll();
			layer.msg('系统发生错误', {time: 1500});
		}
	});
	form.on('submit(updateSort)', function (data) {
		layer.load(2, {shade: [1, '#FFF']});
		$.ajax({
			url: "system-updateSort.html",
			type: "POST",
			data: data.field,
			success: function (obj) {
				layer.closeAll();
				layer.msg(obj.msg, {time: 1500}, function(){
					if(obj.ret === 200){
						window.location.reload();
					}
				});
			},
			error:function(msg){
				layer.closeAll();
				layer.msg('系统发生错误', {time: 1500});
			}
		});
		return false;
	});
});
function delMenu(pkid, beName)
{
	layui.use('layer', function(){
		var layer = layui.layer;
		layer.confirm('你确定要删除吗？', {
			btn: ['是','不'] //按钮
		}, function(){
			$.post(
				'system-deleteMenu',
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