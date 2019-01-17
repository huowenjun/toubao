<?php
use think\Route;

// 定义路由规则
Route::rule('/', 'admin/index/index');//首页
Route::rule('upImages', 'admin/upload/upimages');//上传图片
Route::rule('ImportTemplate', 'admin/upload/import_template');//下载导入模板
Route::rule('layUp', 'admin/upload/layup');//富文本上传图片
Route::rule('system-login', 'admin/login/index');//登录
Route::rule('system-verify', 'admin/login/verify');//验证码
Route::rule('system-logout', 'admin/login/logout');//登出
Route::rule('system-menulist', 'admin/systems/menulist');//菜单列表
Route::rule('system-addmenu', 'admin/systems/add_menu');//增加菜单
Route::rule('system-updateMenu', 'admin/systems/update_menu');//修改菜单
Route::rule('system-updateSort', 'admin/systems/update_sort');//更新菜单排序
Route::rule('system-deleteMenu', 'admin/systems/delete_menu');//删除菜单
Route::rule('adminmember', 'admin/administrator/index');//管理员列表
Route::rule('addmember', 'admin/administrator/add_member');//增加管理员
Route::rule('disabledAdmin', 'admin/administrator/disabled_admin');//禁/启管理员
Route::rule('updateAdminPwd', 'admin/administrator/update_pwd');//修改管理员
Route::rule('AssRole', 'admin/administrator/assigning_role');//修改管理员
Route::rule('roleList', 'admin/role/roleList');//授权角色
Route::rule('addRole', 'admin/role/add_role');//增加角色
Route::rule('upRole', 'admin/role/update_role');//修改角色
Route::rule('authGroup', 'admin/role/auth_group');//授权角色
Route::rule('roleTree', 'admin/role/role_tree');//获取授权菜单
Route::rule('systemLogLists', 'admin/systems/system_log_lists');//系统日志
Route::rule('ForMatLists', 'admin/format/format_lists');//手机规格列表
Route::rule('AddFormat', 'admin/format/add_format');//添加手机规格
Route::rule('upFormat', 'admin/format/up_format');//修改手机规格
Route::rule('FormatUpSort', 'admin/format/up_sort');//手机规格更新排序
Route::rule('delFormat', 'admin/format/del_format');//删除手机规格
Route::rule('ForMatExImport', 'admin/format/excel_import');//Excel回传-手机规格
Route::rule('ForMatExport', 'admin/format/export');//Excel回传-手机规格
Route::rule('FaqLists', 'admin/faq/faq_lists');//常见问题列表
Route::rule('AddFaq', 'admin/faq/add_faq');//添加常见问题
Route::rule('upFaq', 'admin/faq/up_faq');//修改常见问题
Route::rule('DelFaq', 'admin/faq/del_faq');//删除常见问题
Route::rule('FaqUpSort', 'admin/faq/up_sort');//常见问题更新排序
Route::rule('NavLists', 'admin/faq/nav_lists');//问题导航列表
Route::rule('AddNav', 'admin/faq/add_nav');//添加问题导航
Route::rule('upNav', 'admin/faq/up_nav');//编辑问题导航
Route::rule('sPact', 'admin/pact/setting');//服务协议
Route::rule('bIndex', 'admin/bulletin/index');//公告列表
Route::rule('bAdd', 'admin/bulletin/add');//添加公告
Route::rule('bUp', 'admin/bulletin/up');//修改公告
Route::rule('bDel', 'admin/bulletin/del');//删除公告


/**
 * hwj--
 * @维修店&检测店&经销商
 */
Route::rule('storeManagement', 'admin/store/index');//维修店列表
Route::rule('addStore', 'admin/store/add_store');//增加维修店
Route::rule('upStore', 'admin/store/update_store');//修改维修店
Route::rule('delStore', 'admin/store/delete_store');//删除维修店

Route::rule('tStoreManagement', 'admin/tstore/index');//检测店列表
Route::rule('addTstore', 'admin/tstore/add_tstore');//增加检测店
Route::rule('upTstore', 'admin/tstore/update_tstore');//修改检测店
Route::rule('delTstore', 'admin/tstore/delete_tstore');//删除检测店

Route::rule('dstoreIndex', 'admin/dstore/index');//经销商列表
Route::rule('addDstore', 'admin/dstore/add_dstore');//增加经销商
Route::rule('upDstore', 'admin/dstore/update_dstore');//修改经销商
Route::rule('delDstore', 'admin/dstore/delete_dstore');//删除经销商

/*
 * hwj--
 * @保险类别&&商品
 */
Route::rule('insurance', 'admin/insurance/index');//保险列表
Route::rule('addInsurance', 'admin/insurance/add_insurance');//添加保险
Route::rule('upInsurance', 'admin/insurance/update_insurance');//修改保险
Route::rule('delInsurance', 'admin/insurance/delete_insurance');//删除保险大类

Route::rule('product', 'admin/product/index');//产品配置列表
Route::rule('addProduct', 'admin/product/add_product');//添加产品配置
Route::rule('upProduct', 'admin/product/update_product');//修改产品配置
Route::rule('delProduct', 'admin/product/delete_product');//删除产品配置

Route::rule('setC','admin/card/set_card');
Route::rule('addCard', 'admin/card/add_card');//生产卡片

Route::rule('goodsManagement', 'admin/goods/index');//商品列表
Route::rule('showGoods', 'admin/goods/show_goods');//商品详情
Route::rule('delGoods', 'admin/goods/delete_goods');//商品作废

/**
*HWJ
*@投保单
**/
Route::rule('insure', 'admin/insure/index');//投保单列表
Route::rule('showInsure', 'admin/insure/show');//投保单详情
Route::rule('updateInsure', 'admin/insure/update_insure');//投保单修改
Route::rule('delInsure', 'admin/insure/delete_insure');//投保单删除

/**
 *HWJ
 *@检测单
 **/
Route::rule('detection', 'admin/detection/index');//检测单列表
Route::rule('detectionShow', 'admin/detection/show');//检测单详情
Route::rule('updateDetection', 'admin/detection/up_detection');//检测单修改
Route::rule('deleteDetection', 'admin/detection/del_detection');//检测单删除

/**
 * HWJ
 * @维修单
 */
Route::rule('index', 'admin/maintain/index');//维修单列表
Route::rule('show', 'admin/maintain/show');//维修单详情
Route::rule('edit', 'admin/maintain/edit');//维修单修改
Route::rule('del', 'admin/maintain/del');//维修单删除