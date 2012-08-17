<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../lc_includes/ckeditor_libs/ckeditor.js"></script>
<title>发表文章</title>
</head>
<body>
<?php
//	if(isset($_SESSION['usertype']))
//	{
//		if($_SESSION['usertype'] == 'admin')
//		{
//			echo '已经登陆。';		
//		}
//		else
//		{
//			echo '您的权限不足，如果您是管理员请在后台登陆页面登陆管理员帐号。';				
//			echo "<meta http-equiv=\"refresh\" content=\"3;url=index.php\"><p>3秒钟后转入后台登陆首页,请稍等......</p>";						
//		}
//	}
//	else
//	{
//			echo '请登陆!';
//			echo "<meta http-equiv=\"refresh\" content=\"3;url=index.php\"><p>3秒钟后转入后台登陆首页,请稍等......</p>";		
//	}
?>	
	<form id="form1" name="form1" method="post" action="../lc_control/ctrl_admin.php?act=deliver_article" >
	<p>title：<input type="text" name="title" id="title" />
	</p>
	<p>content：
	  <textarea class="ckeditor" name="content" id="content" cols="45" rows="5"></textarea>
	  </p>
	<p><input type="submit" name="" value="发表" /></p>
	</form>
</body>
</html>