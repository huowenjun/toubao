<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"F:\toubao\toubao\public/../application/admin\view\insure\show.html";i:1547190442;s:59:"F:\toubao\toubao\application\admin\view\layouts\layout.html";i:1546682487;}*/ ?>
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
        <legend>投保详情</legend>
    </fieldset>
</div>
<style>
    .wk div label{
        margin-right: 50px;
        font-size: 16px;
    }
    .wk div{
        border-bottom: 1px #b1b3b5 solid;
    }
</style>
<div class="rhaphp-srivice-register">
    <div class="layui-tab layui-tab-card">
        <ul class="layui-tab-title">
            <li class="layui-this" style="margin-right: 40px">个人信息</li>
            <li>设备信息</li>
            <li>服务信息</li>
        </ul>
        <div class="layui-tab-content" style="height: auto;">
            <div class="layui-tab-item layui-show wk">
                <div class="layui-form-item">
                    <label class="layui-form-label" style="width:auto;">激活订单号:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['order']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">保险号:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['card']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">受益人:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['u_name']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">性别:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['u_sex']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" title="证件类型（身份证、军官证、护照）">证件类:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['card_type']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">证件号码:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['u_cardid']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">手机号:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['u_tel']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">职业:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['u_job']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">购买地址:</label>
                    <label class="layui-form-label" style="text-align: left;width: auto"><?php echo $data['buy_address']; ?></label>
                </div>
            </div>
            <div class="layui-tab-item wk">
                <div class="layui-form-item">
                    <label class="layui-form-label">设备品牌:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['t_brand']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">设备型号:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['t_mod']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">设备颜色:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['t_col']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">内存容量:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['t_mem']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">IMEI1:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['t_imei_one']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">IMEI2:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['t_imei_two']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">SN:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['t_sn']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" title="激活/购买日期" style="width:auto;">激活/购买日:</label>
                    <label class="layui-form-label" style="text-align: left;width: auto"><?php echo $data['t_time']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"> 上传资料:</label>
                    <label class="layui-form-label" style="text-align: left;width: auto">
                        <?php foreach($data['photo'] as $v): ?>
                        <img src="<?php echo $v; ?>" alt="" width="300px" height="150px">
                        <?php endforeach; ?>
                    </label>
                </div>
            </div>
            <div class="layui-tab-item wk">
                <div class="layui-form-item">
                    <label class="layui-form-label" title="服务内容"> 服务内容:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['name']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"> 保障天数:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['guarantee_time']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" style="width: auto"> 服务开始日期:</label>
                    <label class="layui-form-label" style="text-align: left;width: auto"><?php echo $data['insure_start_time']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" style="width: auto"> 服务结束日期:</label>
                    <label class="layui-form-label" style="text-align: left;width: auto"><?php echo $data['insure_end_time']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"> 授权码:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['acode']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"> 提交日期:</label>
                    <label class="layui-form-label" style="text-align: left;width: auto"><?php echo $data['submission_time']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"> 审核日期:</label>
                    <label class="layui-form-label" style="text-align: left;width: auto"><?php if($data['examine_admin'] == ''): ?> 无 <?php else: ?><?php echo $data['examine_time']; endif; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"> 审核人:</label>
                    <label class="layui-form-label" style="text-align: left"><?php if($data['examine_admin'] == ''): ?> 无 <?php else: ?><?php echo $data['examine_admin']; endif; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"> 审核状态:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['order_status']; ?></label>
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