<?php
	require('./init.php');

	/*Check user's session*/
	if(isset($_POST['admin_login']))
	{
		$u_pw = $_POST["u_pw"];
		$u_email = $_POST["u_email"];
		$sql = "SELECT * FROM ".Table('user')." WHERE `u_pw` = '$u_pw' AND `u_email` = '$u_email'";
		$userInfo = $db->getRow($sql);

		if (!empty($userInfo))
		{
		    $_SESSION["b_login"] = true;
		    $_SESSION["u_id"] = $userInfo['u_id'];
		    $_SESSION["u_nickname"] = $userInfo['u_nickname'];
		    //Debug_Log($userInfo['u_nickname']);
		    $b_login = true;
		}
		else
		{
		    header('Location: ./index.php');
		    exit;
		}
	}


	if(isset($_REQUEST['act']))
	{
		switch($_REQUEST['act'])
		{
			case 'logout':
				$_SESSION["b_login"] = false;
				$b_login = false;
				break;
		}
	}

	if($b_login === true)
	{
		header('Location: ./managing.php');
		exit;
	}
	//$smarty->assign("b_login", $b_login);
	//$smarty->assign("act", $act);
	$smarty->display("index.dwt");

?>

