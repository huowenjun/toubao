<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"F:\toubao\toubao\public/../application/admin\view\detection\up_detection.html";i:1547627697;s:59:"F:\toubao\toubao\application\admin\view\layouts\layout.html";i:1546682487;}*/ ?>
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
        <legend>修改检测单</legend>
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
            <li class="layui-this">个人信息</li>
            <li>设备信息</li>
            <li>服务信息</li>
        </ul>
        <div class="layui-tab-content" style="height: auto;">
            <div class="layui-tab-item layui-show wk">
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
                    <label class="layui-form-label">快递公司:</label>
                    <label class="layui-form-label" style="text-align: left;width: auto"><?php echo $data['express_company']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">快递单号:</label>
                    <label class="layui-form-label" style="text-align: left;width: auto"><?php echo $data['express_num']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">联系地址:</label>
                    <label class="layui-form-label" style="text-align: left;width: auto"><?php echo $data['contact_address']; ?></label>
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
                    <label class="layui-form-label" title="激活/购买日期">激活/购买日:</label>
                    <label class="layui-form-label" style="text-align: left;width: auto"><?php echo $data['t_time']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" title="损坏经过">损坏经过:</label>
                    <label class="layui-form-label" style="text-align: left;width: auto"><?php echo $data['damage']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" title="设备权益"> 设备权益:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['t_equity']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"> 上传资料:</label>
                    <label class="layui-form-label" style="text-align: left">
                        <!--<div class="layui-input-inline">-->
                        <?php foreach($data['photo'] as $v): ?>
                        <img src="<?php echo $v; ?>" alt="" width="300px" height="150px" style="margin-bottom: 10px">
                        <?php endforeach; ?>
                        <!--</div>-->
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
                    <label class="layui-form-label" style="text-align: left;width: auto"><?php echo $data['server_start_time']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" style="width: auto"> 服务结束日期:</label>
                    <label class="layui-form-label" style="text-align: left;width: auto"><?php echo $data['server_end_time']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" style="width: auto" title="剩余保障天数"> 剩余保障天数:</label>
                    <label class="layui-form-label" style="text-align: left;width: auto"><?php echo $data['surplus_date']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"> 授权码:</label>
                    <label class="layui-form-label" style="text-align: left"><?php echo $data['acode']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" title="销售门店名称">门店名称:</label>
                    <label class="layui-form-label" style="text-align: left;width: auto"><?php echo $data['store_name']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" title="销售门店地址">门店地址:</label>
                    <label class="layui-form-label" style="text-align: left;width: auto"><?php echo $data['store_address']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label"> 订单状态:</label>
                    <label class="layui-form-label" id="order_status" style="text-align: left;width: auto;">
                        <span <?php if($data['f'] ==0): ?> class="order_status"<?php endif; ?>><?php echo $data['order_status']; ?></span>
                        <?php if($data['f'] == 0): ?>
                        <span class="" style="color: #b1b3b5;font-size: 15px;margin-left: 30px">*请修改</span>
                        <?php endif; ?>
                        <select class="layui-input os" style="display: none; font-size: 15px;width:auto;height: 20px" >
                            <option value="-1" >请选择...</option>
                            <option value="0" >待出险</option>
                            <option value="1" >已出险</option>
                            <option value="2" >出险驳回</option>
                        </select>
                    </label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" title="出险提交日期">提交日期:</label>
                    <label class="layui-form-label time" style="text-align: left;width: auto"><?php echo $data['report_time']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" title="产品出库金额">出库金额:</label>
                    <label class="layui-form-label pro" style="text-align: left;width: auto">
                        <input type="text" name="pro_price" class="pro_price"  style="display: none">
                        <?php if($data['pro_price'] == ''): ?>
                        <span <?php if($data['pro_price'] == ''): ?> class="price" <?php endif; ?>>请填写... </span>
                        <span class="" style="color: #b1b3b5;font-size: 15px;margin-left: 30px">*请修改</span>
                        <?php else: ?>
                        <span id="price"> <?php echo $data['pro_price']; ?></span>
                        <?php endif; ?>
                        </span>
                    </label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" title="操作人">操作人:</label>
                    <label class="layui-form-label opera" style="text-align: left;width: auto">
                        <input type="text" name="operator" class="operators"  style="display: none">
                        <?php if($data['operator'] == ''): ?>
                        <span <?php if($data['operator'] == ''): ?> class="operator" <?php endif; ?>>请填写...</span>
                        <span class="" style="color: #b1b3b5;font-size: 15px;margin-left: 30px">*请修改</span>
                        <?php else: ?>
                            <?php echo $data['operator']; endif; ?>
                    </label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" title="操作日期">操作日期:</label>
                    <label class="layui-form-label operator_time" style="text-align: left;width: auto"><?php echo $data['operator_time']; ?></label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" title="设备状态">设备状态:</label>
                    <label class="layui-form-label" id="t_status" style="text-align: left;width:auto">
                        <?php if($data['t_status'] == '未收到'): ?>
                        <span
                                <?php if($data['t_status'] == '未收到'): ?>
                                    class="t_status"
                                <?php endif; ?>
                        ><?php echo $data['t_status']; ?></span>
                        <span class="" style="color: #b1b3b5;font-size: 15px;margin-left: 30px">*请修改</span>
                        <?php else: ?>
                            <?php echo $data['t_status']; endif; ?>
                        <select class="layui-input status" style="display: none; font-size: 15px;width:auto;height: 20px" >
                            <option value="-1" >请选择...</option>
                            <option value="0" >未收到</option>
                            <option value="1" >已收到</option>
                        </select>
                    </label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" title="接收人">接收人:</label>
                    <label class="layui-form-label reci" style="text-align: left;width: auto">
                        <input type="text" name="recipient" class="recipients"  style="display: none">
                        <?php if($data['recipient'] == ''): ?>
                            <span <?php if($data['recipient'] == ''): ?> class="recipient" <?php endif; ?>>请填写...</span>
                            <span class="" style="color: #b1b3b5;font-size: 15px;margin-left: 30px">*请修改</span>
                        <?php else: ?>
                            <?php echo $data['recipient']; endif; ?>
                    </label>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label" title="旧件审核">旧件审核:</label>
                    <label class="layui-form-label" id="old_p_status" style="text-align: left;width:auto">
                        <?php if($data['old_part_status'] == '未审核'): ?>
                        <span <?php if($data['old_part_status'] == '未审核'): ?>
                        class="old_part_statu"
                        <?php endif; ?> >
                            <?php echo $data['old_part_status']; ?>
                        </span>
                        <span class="" style="color: #b1b3b5;font-size: 15px;margin-left: 30px">*请修改</span>
                        <?php else: ?>
                            <?php echo $data['old_part_status']; endif; ?>
                        <select class="layui-input old_part_status" style="display: none; font-size: 15px;width:auto;height: 20px" >
                            <option value="-1" >请选择...</option>
                            <option value="0" >未审核</option>
                            <option value="1" >通过</option>
                            <option value="2" >驳回再提交</option>
                            <option value="3" >补充资料</option>
                        </select>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="id" value="<?php echo $data['id']; ?>">
<script>
    //处理订单状态
    $('.order_status').click(function(){
        $(this).hide();
        $(this).next().hide();
        $(this).next().next().show()
    });
    $(".os").blur(function () {
        $(this).hide();
        $(this).prev().show().html('未修改');
        $(this).prev().prev().show()
    });
    $(".os").change(function(){
        var sel = $(this);
        var sel_prev = sel.prev().prev().html();//原本的值
        var sel_now = sel.val();//选择后的值
        var id = $('#id').val();//数据ID
        if(sel_now==-1){
            sel.hide();
            sel.prev().prev().show().html(sel_prev);
            return false;
        }
        $.ajax({
            type: "POST",
            url: "updateDetection",
            data: {'id':id,'order_status':sel_now,'order_status_old':sel_prev},
            success: function(msgs){
                if(msgs.ret==200)
                {
                    if(sel_now != 0 ){
                        $('#order_status').empty();
                        $('#order_status').append('<span>'+msgs.msg.os+'</span><span class="" style="color: #b1b3b5;font-size: 15px;margin-left: 30px">*修改成功</span>');
                        $('.time').html(msgs.msg.time);
                        return false;
                    }
                    sel.hide();
                    sel.prev().show().html('*修改失败');
                    sel.prev().prev().show().html(msgs.msg.os);
                    $('.time').html(msgs.msg.time);
                }else{
                    sel.hide();
                    sel.prev().show().html('*修改失败');
                    sel.prev().prev().show().html(sel_prev)
                }
            },
            error:function () {
                sel.hide();
                sel.prev().show().html('*修改失败');
                sel.prev().prev().show().html(sel_prev)
            }
        });
    });

    //处理出库操作
    $('.price').click(function(){
        $(this).hide();
        $(this).prev().show();
    });
    $('.pro_price').blur(function () {
        now = $(this);//当前元素
        now_v = $(this).val();//当前元素的值
        prev_v = $(this).next().html();//上级元素的值
        val = now_v;
        if(now_v==''){
            val=prev_v;//最后的值
            if(isNaN(val)){
            now.next().next().html('*请修改');
            now.next().show().html('请填写');
            now.hide();
            return false;
            }
        }
        id = $('#id').val();
        //ajax
        $.ajax({
            type: "POST",
            url: "updateDetection",
            data: {'id':id,'pro_price':val},
            success: function(msg){
                if(msg.ret==200){
                    $('.pro').empty();
                    $('.pro').append('<span>'+msg.msg+'</span><span class="" style="color: #b1b3b5;font-size: 15px;margin-left: 30px">*修改成功</span>');
                }else{
                    now.hide();
                    now.prev().next().show().html('请填写');
                }
            }
        });

    });

    //操作人修改
    $('.operator').click(function(){
        $(this).hide();
        $(this).prev().show();
    });
    $('.operators').blur(function () {
        now = $(this);//当前元素
        now_v = $(this).val();//当前元素的值
        prev_v = $(this).next().html();//上级元素的值
        val = now_v;
        if(now_v==''){
            val=prev_v;//最后的值
            //if(isNaN(val)){
                now.next().next().html('*请修改');
                now.next().show().html('请填写');
                now.hide();
                return false;
            //}
        }
        id = $('#id').val();
        //ajax
        $.ajax({
            type: "POST",
            url: "updateDetection",
            data: {'id':id,'operator':val},
            success: function(msg){
                if(msg.ret==200){
                    $('.opera').empty();
                    $('.opera').append('<span>'+msg.msg.operator+'</span><span class="" style="color: #b1b3b5;font-size: 15px;margin-left: 30px">*修改成功</span>');
                    $('.operator_time').html(msg.msg.time);
                }else{
                    now.hide();
                    now.prev().next().show().html('请填写');
                }
            }
        });

    });

    //设备状态修改
    $('.t_status').click(function(){
        $(this).hide();
        $(this).next().hide();
        $(this).next().next().show()
    });
    $(".status").blur(function () {
        $(this).hide();
        $(this).prev().show().html('未修改');
        $(this).prev().prev().show()
    });
    $(".status").change(function(){
        var sel = $(this);
        var sel_prev = sel.prev().prev().html();//原本的值
        var sel_now = sel.val();//选择后的值
        var id = $('#id').val();//数据ID
        if(sel_now==-1){
            sel.hide();
            sel.prev().prev().show().html(sel_prev);
            return false;
        }
        $.ajax({
            type: "POST",
            url: "updateDetection",
            data: {'id':id,'t_status':sel_now,'t_status_old':sel_prev},
            success: function(msgs){
                if(msgs.ret==200)
                {
                    $('#t_status').empty();
                    $('#t_status').append('<span>'+msgs.msg.os+'</span><span class="" style="color: #b1b3b5;font-size: 15px;margin-left: 30px">*修改成功</span>');
                }else{
                    sel.hide();
                    sel.prev().show().html('*修改失败');
                    sel.prev().prev().show().html(sel_prev)
                }
            },
            error:function () {
                sel.hide();
                sel.prev().show().html('*修改失败');
                sel.prev().prev().show().html(sel_prev)
            }
        });
    });

    //接收人
    $('.recipient').click(function(){
        $(this).hide();
        $(this).prev().show();
    });
    $('.recipients').blur(function () {
        now = $(this);//当前元素
        now_v = $(this).val();//当前元素的值
        prev_v = $(this).next().html();//上级元素的值
        val = now_v;
        if(now_v==''){
            val=prev_v;//最后的值
            //if(isNaN(val)){
            now.next().next().html('*请修改');
            now.next().show().html('请填写');
            now.hide();
            return false;
            //}
        }
        id = $('#id').val();
        //ajax
        $.ajax({
            type: "POST",
            url: "updateDetection",
            data: {'id':id,'recipient':val},
            success: function(msg){
                if(msg.ret==200){
                    $('.reci').empty();
                    $('.reci').append('<span>'+msg.msg.operator+'</span><span class="" style="color: #b1b3b5;font-size: 15px;margin-left: 30px">*修改成功</span>');
                }else{
                    now.hide();
                    now.prev().next().show().html('请填写');
                }
            }
        });

    })

    //旧件审核状态
    $('.old_part_statu').click(function(){
        $(this).hide();
        $(this).next().hide();
        $(this).next().next().show()
    });
    $(".old_part_status").blur(function () {
        $(this).hide();
        $(this).prev().show().html('未修改');
        $(this).prev().prev().show()
    });
    $(".old_part_status").change(function(){
        var sel = $(this);
        var sel_prev = sel.prev().prev().html();//原本的值
        var sel_now = sel.val();//选择后的值
        var id = $('#id').val();//数据ID
        if(sel_now==-1){
            sel.hide();
            sel.prev().prev().show().html(sel_prev);
            return false;
        }
        $.ajax({
            type: "POST",
            url: "updateDetection",
            data: {'id':id,'old_part_status':sel_now},
            success: function(msgs){
                if(msgs.ret==200)
                {
                    $('#old_p_status').empty();
                    $('#old_p_status').append('<span>'+msgs.msg.os+'</span><span class="" style="color: #b1b3b5;font-size: 15px;margin-left: 30px">*修改成功</span>');
                }else{
                    sel.hide();
                    sel.prev().show().html('*修改失败');
                    sel.prev().prev().show().html(sel_prev)
                }
            },
            error:function () {
                sel.hide();
                sel.prev().show().html('*修改失败');
                sel.prev().prev().show().html(sel_prev)
            }
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