<?php
	require_once('../lc_includes/lc_init.php');
	
	switch ($_REQUEST['act'])
	{
		case 'add_user':
			$u_email =$_REQUEST['u_email'];
			$u_pw = $_REQUEST['u_pw'];
			$u_nickname = $_REQUEST['u_nickname'];

			//if the username is already existence,return -1
			if($db->query("select u_email from user where u_email='$u_email'"))
			{
				$result = -1;
			}
			else
			{
				$db -> query("INSERT INTO user(u_email,u_pw,u_nickname) VALUES ('$u_email','$u_pw','$u_nickname')");
				$test=$db -> affected_rows();
				if($test == 1)
				{
					//insert sucess
					$result = 1;
				}
				else
				{
					//insert false
					$result = 0;
				}
			}
			
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
			$u_email =$_REQUEST['u_email'];
			$u_pw = $_REQUEST['u_pw'];
			
			//$result =$user->login($username,$password);
			$db -> query("select u_email from user where u_email = '$u_email'");
			//if the username is existent.
			if($db -> affected_rows())
			{
				//$this-> db -> query();
				$dbrow = $db -> getRow("select u_email,u_pw,u_id from user where u_email = '$u_email'");
				if($dbrow['u_pw'] == $u_pw)
				{
					//password right , add to session
					$_SESSION['u_id'] = $dbrow['u_id'];
					$_SESSION['u_email'] = $dbrow['u_email'];
					$result = 1;
				}
				else
				{
					//password wrong
					$result = -1;
				}
			}
			else
			{
				//the username is not existence return 0;
				$result = 0;
			}
			
			if($result ==1)
			{
				echo '欢迎'.$_SESSION['u_email'].'<br />';
				echo '登陆成功！';
				echo '<a href="ctrl_user.php?act=logout">注销</a>';
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
			$_SESSION['u_id']='';
			echo '注销成功!';
			break;
	}
?>