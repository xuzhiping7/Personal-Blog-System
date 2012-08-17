<?php
	require('init.php');
	if($b_login === false)
	{
		header('Location: ./index.php');
		exit;
	}

  $act = isset($_REQUEST['act'])?trim($_REQUEST['act']):'common';
  $user_id = $_SESSION["u_id"];

  //Incident Response
  switch($act)
  {
  	case 'add_article':
  		//do nothing , just show
  		break;

    case 'save_article':
      $title = isset($_REQUEST['title'])?trim($_REQUEST['title']):'';
      $content = isset($_REQUEST['content'])?trim($_REQUEST['content']):'';
      $cur_unix_time = time();
      $sql = "INSERT INTO ".Table('article')."(a_title,a_content,a_author_id,a_add_time) VALUES ('$title','$content','$user_id','$cur_unix_time')";
      $db -> query($sql);
      $act = 'save_success';
      break;

    case 'add_new_gallery':
      //do nothing just show
      break;
    case 'save_gallery':
      $image_name = SafetyGet('image_name','POST');
      $image_description = SafetyGet('content','POST');
      $image_type = 'gallery_pic';
      $image_handle = $_FILES['image_file'];
      if(empty($image_handle['name']))
          exit("upload pic please!");
      //change to an unique name : gallery_pic_ + time() + original_name
      $cur_unix_time = time();
      $img_url = "/lc_data/images/gallery_pic_" .$cur_unix_time. '_'.$image_handle["name"];
      move_uploaded_file($image_handle["tmp_name"],ROOT_PATH.$img_url);
      $sql = "INSERT INTO ".Table('image')."(img_name,img_description,img_url,img_keycode,img_add_time) ".
             " VALUES ('$image_name','$image_description','$img_url','gallery_pic','$cur_unix_time')";
      $db -> query($sql);
      $act = 'save_success';
      break;
    case 'delete_gallery':
      $img_id = SafetyGet('img_id','GET');
      $db -> query('DELETE FROM '.Table('image').' WHERE `img_id`='.$img_id);
      $act = 'delete_success';
      break;

    case 'manage_gallery':
    	$gallery_info = $db -> getAll("SELECT * FROM ".Table('image')." WHERE img_keycode ='gallery_pic' ");
    	$smarty->assign("gallery_info",$gallery_info);
    	break;

    case 'save_category':
      $temp_CategoryInfo = array();
      $temp_CategoryInfo['cat_name'] = SafetyGet('cat_name','POST');
      $temp_CategoryInfo['cat_type'] = SafetyGet('cat_type','POST');
      $temp_CategoryInfo['cat_is_show'] = SafetyGet('cat_is_show','POST');
      $temp_CategoryInfo['cat_sort_order'] = SafetyGet('cat_sort_order','POST');
      $db -> autoInsert($temp_CategoryInfo,Table('category'));
      $act = 'save_success';
      break;
    case 'save_edit_category':
      $temp_CategoryInfo = array();
      $temp_CategoryInfo['cat_name'] = SafetyGet('cat_name','POST');
      $temp_CategoryInfo['cat_type'] = SafetyGet('cat_type','POST');
      $temp_CategoryInfo['cat_is_show'] = SafetyGet('cat_is_show','POST');
      $temp_CategoryInfo['cat_sort_order'] = SafetyGet('cat_sort_order','POST');

      $key_info = array();
      $key_info['key_name'] = 'cat_id';
      $key_info['key_value'] = SafetyGet('cat_id','POST');
      $db -> autoUpdate($temp_CategoryInfo,$key_info,Table('category'));
      $act = 'save_success';
      break;
    case 'manage_category':
    	$category_info = $db -> getAll('SELECT * FROM '.Table('category'));
    	$smarty->assign("category_info",$category_info);
    	break;

    case 'delete_article':
      $a_id = SafetyGet('a_id','GET');
      $db -> query('DELETE FROM '.Table('article').' WHERE `a_id`='.$a_id);
      $act = 'delete_success';
      break;

    case 'delete_category':
      $cat_id = SafetyGet('cat_id','GET');
      $db -> query('DELETE FROM '.Table('category').' WHERE `cat_id`='.$cat_id);
      $act = 'delete_success';
      break;

    case 'add_category':
    	//do nothing just show
    	break;
    case 'edit_category':
    	$cat_id = SafetyGet('cat_id','GET');
    	$category_info  =array();
    	$category_info = $db -> getRow('SELECT * FROM '.Table('category').' WHERE cat_id='.$cat_id);
    	$smarty->assign("category_info",$category_info);
    	break;

    case 'log_out':
      $_SESSION["b_login"] = false;
	    $b_login = false;
	    header('Location: ./index.php');
	    exit;
      break;

    case 'common':
      $sql = "SELECT `a_id`,`a_title` , `a_add_time` ,`a_is_show` FROM ".Table('article')." ORDER BY `a_id` DESC;";
      $articles = $db -> getAll($sql);
      //Debug_Log($articles);
      $smarty->assign("articles",$articles);
      break;
  }

//  $sql = "SELECT `u_nickname` FROM `user` WHRER u_id=".$_SESSION["u_id"].';';
//  $u_nickname = $db -> getRow($sql);
//  Debug_Log($u_nickname);
  $smarty->assign("main_url",$_SERVER['HTTP_HOST']);
	$smarty->assign("user_nickname", $_SESSION['u_nickname']);
	$smarty->assign("act", $act);
	$smarty->assign("b_login", $b_login);
	$smarty->display("managing.dwt");
?>