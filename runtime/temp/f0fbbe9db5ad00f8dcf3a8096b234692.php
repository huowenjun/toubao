<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"F:\toubao\toubao\public/../application/admin\view\goods\index.html";i:1546832399;s:59:"F:\toubao\toubao\application\admin\view\layouts\layout.html";i:1546682487;}*/ ?>
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
		<legend>实物卡列表</legend>
		<div>
			<form class="layui-form layui-form-pane" action="">
				<div class="layui-col-md2">
					<div class="layui-form-item" style="margin-left: 5px;">
						<input type="text" name="name" placeholder="请输入产品名称"
							   value="<?php echo input('name'); ?>" class="layui-input">
					</div>
				</div>
				<div class="layui-col-md3">
					<div class="layui-input-item" style="margin-left: 5px;">
						<input type="text" id="date" name="date" placeholder="请选择时间" value="<?php echo input('date'); ?>" class="layui-input" >
					</div>
				</div>
				<div class="layui-inline" style="margin-left: 12px;">
					<button class="layui-btn layui-btn-danger layui-btn-sm" lay-submit lay-filter="*">搜索</button>
					<button type="reset" class="layui-btn layui-bg-cyan layui-btn-sm">重置</button>
				</div>
			</form>
		</div>
	</fieldset>
</div>
<div style="padding: 0px 10px 0px 10px;">
	<table class="layui-table">
		<colgroup>
			<col width="110">
			<col width="70">
			<col width="100">
			<col width="70">
			<col width="70">
			<col width="20">
			<col width="110">
			<col width="80">
			<col>
		</colgroup>
		<thead>
			<tr>
				<th>序列号</th>
				<th>服务大类</th>
				<th>产品名称</th>
				<th>产品价格</th>
				<th>服务条件</th>
				<th>激活</th>
				<th>创建时间</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if (!(empty($list->total()))): foreach ($list as $vo): ?>
		<tr>
			<td><?php echo $vo['card']; ?></td>
			<td><?php echo $vo['i_id']; ?></td>
			<td><?php echo $vo['name']; ?></td>
			<td><?php echo $vo['price']; ?></td>
			<td><?php echo $vo['type']; ?></td>
			<td><?php if($vo['activation']==1) { echo '是'; } else{ echo '否'; } ?></td>
			<td><?php echo $vo['ctime'] ? date("y-m-d H:i:s", $vo['ctime']) : ''; ?></td>
			<td>
				<?php if(in_array(37, $role_operation_ids)): ?>
				<a class="rha-bt-a" href="showGoods.html?id=<?php echo $vo['id']; ?>">详情</a>
				<?php endif; if(in_array(69, $role_operation_ids)): ?>
				<a href="javascript:;" onclick="Del('<?php echo $vo['id']; ?>', '<?php echo $vo['card']; ?>')" class="rha-bt-a" >作废</a>
				<?php endif; ?>
			</td>
		</tr>
		<?php endforeach; else: ?>
		<tr>
			<td colspan="9">暂无记录</td>
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
		layer.confirm('你确定要作废此产品吗？', {
			btn: ['是','不'] //按钮
		}, function(){
			$.post(
				'delGoods',
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
};
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