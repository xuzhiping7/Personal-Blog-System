<?php /* Smarty version Smarty-3.1.6, created on 2012-01-29 02:08:08
         compiled from "./theme\index.dwt" */ ?>
<?php /*%%SmartyHeaderCode:129974f1e69ee8470d7-71543802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8eabc904823fc02d33c5e054c947fafffad154c' => 
    array (
      0 => './theme\\index.dwt',
      1 => 1327802661,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129974f1e69ee8470d7-71543802',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_4f1e69ee8d11a',
  'variables' => 
  array (
    'install_step' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4f1e69ee8d11a')) {function content_4f1e69ee8d11a($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>浪簇level1 安装中……</title>
	</head>
	<body>
		<?php if ($_smarty_tpl->tpl_vars['install_step']->value==1){?>
		<form id="form1" name="form1" method="post" action="index.php?step=2" >
			<p>主机名：<input type="text" name="hostname" id="hostname" />	</p>
			<p>用户名：<input type="text" name="username" id="username" />	</p>
			<p>用户密码：<input type="text" name="password" id="password" /></p>
			<p>数据库名：<input type="text" name="dbname" id="dbname" /></p>
			<p><input type="submit" name="" value="登陆" /></p>
		</form>
		<?php }elseif($_smarty_tpl->tpl_vars['install_step']->value==2){?>
			<p>数据库安装完毕</p>
			<form id="form1" name="form1" method="post" action="index.php?step=3" >
				<p>管理员邮箱：<input type="text" name="u_email" id="u_email" /></p>
				<p>管理员昵称：<input type="text" name="u_nickname" id="u_nickname" /></p>
				<p>管理员密码：<input type="text" name="u_pw" id="u_pw" /></p>
				<p><input type="submit" name="" value="确定" /></p>
			</form>
		<?php }elseif($_smarty_tpl->tpl_vars['install_step']->value==3){?>
			<p>安装成功！</p>
		<?php }?>
	</body>
</html><?php }} ?>