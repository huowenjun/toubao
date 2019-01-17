<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"F:\toubao\toubao\public/../application/admin\view\insure\update_insure.html";i:1546499572;s:59:"F:\toubao\toubao\application\admin\view\layouts\layout.html";i:1546682487;}*/ ?>
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
        <legend>修改投保</legend>
    </fieldset>
</div>
<div class="rhaphp-srivice-register">
    <div class="layui-form-item">
        <label class="layui-form-label">激活订单号:</label>
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
        <label class="layui-form-label" title="激活/购买日期">激活/购买日:</label>
        <label class="layui-form-label" style="text-align: left;width: auto"><?php echo $data['t_time']; ?></label>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label"> 上传资料:</label>
        <div class="layui-input-inline">
            <?php foreach($data['photo'] as $v): ?>
            <img src="<?php echo $v; ?>" alt="" width="500px" height="300px"><hr>
            <?php endforeach; ?>
        </div>
    </div>
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
    <?php if($data['order_status'] == '未审核'): ?>
    <form class="layui-form layui-form-pane" action="" lay-filter="example">
        <input type="hidden" name="pkid" value="<?php echo $data['id']; ?>">
        <input type="hidden" name="beName" value="<?php echo $data['order_status']; ?>">
    <div class="layui-form-item">
        <label class="layui-form-label"> 审核状态:</label>
        <div class="layui-input-block">
                <input type="radio" name="order_status" value="1" title="通过" lay-filter="type" checked>
                <input type="radio" name="order_status" value="2" title="驳回" lay-filter="type" >
                <input type="radio" name="order_status" value="3" title="待修改" lay-filter="type" >
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label"> 审核人:</label>
        <div class="layui-input-block">
            <input name="examine_admin" required="" lay-verify="required" placeholder="请输入审核人" autocomplete="off" class="layui-input" type="text">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" lay-submit="" lay-filter="ActUpStore">立即提交</button>
        </div>
    </div>
    </form>
    <?php else: ?>
    <div class="layui-form-item">
        <label class="layui-form-label"> 审核日期:</label>
        <label class="layui-form-label" style="text-align: left;width: auto"><?php echo $data['examine_time']; ?></label>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label"> 审核人:</label>
        <label class="layui-form-label" style="text-align: left"><?php echo $data['examine_admin']; ?></label>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label"> 审核状态:</label>
        <label class="layui-form-label" style="text-align: left"><?php echo $data['order_status']; ?></label>
    </div>
    <?php endif; ?>
</div>
<script>
    layui.use('form', function () {
        layui.form.on('submit(ActUpStore)', function (data) {
            if(data.field.order_status==2||data.field.order_status==3){
                    layer.prompt({title:'请输入原因'},function(val,index){
                        data.field.order_status_reason = val;
                        $.post(
                            "updateInsure",
                            data.field,
                            function (obj) {
                                console.log(obj)
                                if (obj.ret == 200) {
                                    layer.msg(obj.msg, {time: 1500}, function () {
                                        window.location.reload();
                                    });
                                }
                                else {
                                    layer.msg(obj.msg, {time: 1500, anim: 6});
                                }
                            }
                        );
                        layer.close(index);
                        //window.parent.location.reload();
                    });
                    return false;
            }
            $.post(
                "updateInsure",
                data.field,
                function (obj) {
                    console.log(obj)
                    if (obj.ret == 200) {
                        layer.msg(obj.msg, {time: 1500}, function () {
                            window.location.reload();
                        });
                    }
                    else {
                        layer.msg(obj.msg, {time: 1500, anim: 6});
                    }
                }
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