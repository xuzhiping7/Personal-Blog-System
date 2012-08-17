<?php
	require_once('../lc_includes/cls_admin.php');
	
	$user = new Admin();

	switch ($_REQUEST['act'])
	{
		case 'add_user':
	  	$username =$_REQUEST['username'];
			$password = $_REQUEST['password'];			
			$result = $user->add_user($username,$password);
			if($result == -1)
			{
				echo '已经存在该用户';
			}
			elseif($result == 1)
			{
				echo '注册成功';
			}
			else
			{
				echo '注册失败';
			}
		  break;  
		  
		case 'login':
			$username =$_REQUEST['username'];
			$password = $_REQUEST['password'];
			
			$result =$user->login($username,$password);
			if($result ==1)
			{
				echo '欢迎'.$_SESSION['username'].'<br />';
				echo '你的ID是'.$_SESSION['admin_ID'].'<br />';
				echo '登陆成功！';
				echo '<p><a href="ctrl_admin.php?act=logout">注销</a></p>';
				echo '<p><a href="../lc_admin/deliver_article.php">点击直接跳转至发送文章页面</a></p>';	
				echo "<meta http-equiv=\"refresh\" content=\"3;url=../lc_admin/managing.php\"><p>3秒钟后转入后台登陆首页,请稍等......</p>";			
			}
			elseif($result == -1)
			{
				echo '密码错误。';
			}
			else
			{
				echo '帐号不存在';
			}
		  break;
		  
		case 'logout':
			$user -> logout();
			echo '注销成功!';
			break;

		case 'deliver_article':
	  	$title =$_REQUEST['title'];
			$content = $_REQUEST['content'];			
			$result = $user-> delive_article($title,$content);
			if($result == 1)
			{
				echo '发表成功';
			}
			else
			{
				echo '发表失败';
			}
			break;
			
		case 'edit_article':
	  	$title = $_REQUEST['title'];
			$content = $_REQUEST['content'];
			$id = $_REQUEST['id'];
			$result = $user-> edit_article($title,$content,$id);
			if($result == 1)
			{
				echo '发表成功';
			}
			else
			{
				echo '发表失败';
			}
			break;	
		default:
	}
?>