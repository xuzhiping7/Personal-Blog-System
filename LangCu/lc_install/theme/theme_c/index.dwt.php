<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
<meta name="Generator" content="APPNAME VERSION" />
		<meta http-equiv="Content-Type" content="text/html; charset=EC_CHARSET" />
		<title>浪簇level1 安装中……</title>
	</head>
	<body>
		<?php if ($this->_var['install_step'] == 1): ?>
		<form id="form1" name="form1" method="post" action="index.php?step=2" >
			<p>主机名：<input type="text" name="hostname" id="hostname" />	</p>
			<p>用户名：<input type="text" name="username" id="username" />	</p>
			<p>用户密码：<input type="text" name="password" id="password" /></p>
			<p>数据库名：<input type="text" name="dbname" id="dbname" /></p>
			<p>数据库表前缀（建议添加）：<input type="text" name="table_prefix" id="table_prefix" /></p>
			<p><input type="checkbox" name="b_create_database" id="b_create_database" value='1'/>是否创建数据库（如果是已有数据库则不选，如果需要创建的话选上。）</p>
			<p><input type="submit" name="" value="开始执行" /></p>
		</form>
		<?php elseif ($this->_var['install_step'] == 2): ?>
			<p>数据库安装完毕</p>
			<form id="form1" name="form1" method="post" action="index.php?step=3" >
				<p>管理员邮箱：<input type="text" name="u_email" id="u_email" /></p>
				<p>管理员昵称：<input type="text" name="u_nickname" id="u_nickname" /></p>
				<p>管理员密码：<input type="text" name="u_pw" id="u_pw" /></p>
				<p><input type="submit" name="" value="确定" /></p>
			</form>
		<?php elseif ($this->_var['install_step'] == 3): ?>
			<p>安装成功！</p>
		<?php endif; ?>
	</body>
</html>