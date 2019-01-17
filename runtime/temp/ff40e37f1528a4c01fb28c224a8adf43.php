<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"F:\toubao\toubao\public/../application/admin\view\product\index.html";i:1546067924;s:59:"F:\toubao\toubao\application\admin\view\layouts\layout.html";i:1546682487;}*/ ?>
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
		<legend>产品列表</legend>
		<div style="text-align: left; ">
			<form class="layui-form layui-form-pane" action="">
				<?php if(in_array(51, $role_operation_ids)): ?>
					<div class="layui-inline">
						<a href="addProduct.html" class="layui-btn layui-btn-sm layui-btn-normal">增加产品配置</a>
					</div>
				<?php endif; ?>
				<div class="layui-inline" style="margin-left: 5px;">
					<select name="i_id" lay-verify="" class="layui-input" style="display: inline;">
						<option value="">请选择服务大类</option>
						<?php if(isset($insData)): foreach($insData as $vo): ?>
						<option value="<?php echo $vo['id']; ?>" <?php if($vo['id'] == input('i_id')): ?> selected <?php endif; ?>><?php echo $vo['i_name']; ?></option>
						<?php endforeach; endif; ?>
					</select>
				</div>
				<div class="layui-inline" style="margin-left: 5px;">
					<input type="text"  name="name" placeholder="请输入产品名称" value="<?php echo input('name'); ?>" class="layui-input" >
				</div>
				<div class="layui-inline" style="margin-left: 5px;">
					<button class="layui-btn layui-btn-primary" lay-submit lay-filter="formDemo">搜索</button>
				</div>
			</form>
		</div>
	</fieldset>
</div>
<div style="padding: 0px 10px 0px 10px;">

	<table class="layui-table" >
		<colgroup>
			<col width="60">
			<col width="120">
			<col width="120">
			<col width="120">
			<col width="100">
			<col width="150">
			<col width="150">
		</colgroup>
		<thead>
			<tr>
				<th>ID</th>
				<th>大类</th>
				<th>成色</th>
				<th>名称</th>
				<th>价格</th>
				<th>创建时间</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if (!(empty($list->total()))): foreach ($list as $vo): ?>
		<tr>
			<td><?php echo $vo['id']; ?></td>
			<td><?php echo $vo['i_id']; ?></td>
			<td><?php echo $vo['condition']; ?></td>
			<td><?php echo $vo['name']; ?></td>
			<td><?php echo $vo['price']; ?></td>
			<td><?php echo $vo['ctime']; ?></td>
			<td>
				<?php if(in_array(28, $role_operation_ids)): ?>
				<a class="rha-bt-a" href="upProduct.html?id=<?php echo $vo['id']; ?>">修改</a>
				<?php endif; if(in_array(29, $role_operation_ids)): ?>
				<a href="javascript:;" onclick="Del('<?php echo $vo['id']; ?>', '<?php echo $vo['name']; ?>')" class="rha-bt-a" >删除</a>
				<?php endif; if(in_array(67, $role_operation_ids)): ?>
				<a href="setC.html?id=<?php echo $vo['id']; ?>&name=<?php echo $vo['name']; ?>" class="rha-bt-a" >生成卡片</a>
				<?php endif; ?>
			</td>
		</tr>
		<?php endforeach; else: ?>
		<tr>
			<td colspan="7">暂无记录</td>
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
		layer.confirm('你确定要删除吗？', {
			btn: ['是','不'] //按钮
		}, function(){
			$.post(
				'delProduct',
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
// function Add(pkid, beName)
// {
//     layui.use('layer', function(){
//         layer.prompt({
//             formType: 0,
//             value: '',
//             title: '请输入卡片的数量'
//         }, function(value,index){
//             if(value<1000)
//             {
//                 if(value==0)
//                 {
//                     layer.alert('数量不可小于0，请重新输入');
//                 }else{
//                     $.post(
//                         'addCard',
//                         {'pkid':pkid, 'beName':beName, 'num':value},
//                         function(obj){
//                             if(obj.ret == 200){
//                                 layer.msg(obj.msg, {time: 1500}, function(){
//                                     window.location.reload();
//                                 });
//                             }
//                             else{
//                                 layer.msg(obj.msg, {time: 1500, anim: 6});
//                             };
//                         },
//                         "json"
//                     );
//                 }
// 			}else{
//                 layer.alert('数量不可大于999，请重新输入');
// 			}
//             layer.close(index);
//         });
//     });
// }
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