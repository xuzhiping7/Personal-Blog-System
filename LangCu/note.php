<?php
require_once('lc_includes/lc_init.php');

$act = SafetyGet('act','REQUEST');
$act = isset($act) ? $act : 'common';

$login_act = array("save_note");

if(in_array($act,$login_act))
{
    if(isset($_SESSION["b_login"])&&($_SESSION["b_login"] !== false))
    {
        //now do nothing , will be add
    }
    else
    {
        //now do nothing , will be add
        echo "请先登陆";
        die();
    }
}

if($act == 'common')
{
    $page = SafetyGet('page','GET');
    $page = isset($page) ? $page: 0;

    $category_info = array();
    $category_info = Getcatnote($page,100);

    $cur_cat_id = SafetyGet('id','GET');
    if(empty($cur_cat_id) && (!empty($category_info))) $cur_cat_id =$category_info[0]['cat_id'];

    $temp_sql = "SELECT * FROM ".Table('article')." WHERE a_cid='$cur_cat_id'";
    $note_info = array();
    $note_info = $GLOBALS['db']->getAll($temp_sql);

    //smarty out
    $smarty->assign("theme_root",'lc_themes/default/');
    $smarty->assign("cur_cat_id",$cur_cat_id);
    $smarty->assign("category_info",$category_info);
    $smarty->assign("note_info",$note_info);
    if(isset($_SESSION["b_login"]))$smarty->assign("b_login",$_SESSION["b_login"]);
    $smarty->display("note.dwt");
}
elseif($act == 'save_note')
{
    $cat_id = SafetyGet('cate_id','POST');
    $note_content = SafetyGet('content','POST');

    $u_id = isset($_SESSION["u_id"]) ? $_SESSION["u_id"] : 0;
    if($u_id === 0)exit("login please");

    $cur_unix_time = time();
    $temp_sql = "INSERT INTO ".Table('article')." SET `a_author_id` = '$u_id' , `a_add_time` = '$cur_unix_time', `a_title`='note',`a_content`='$note_content',`a_cid`='$cat_id' ";
    $GLOBALS['db']->query($temp_sql);
    header('Location: ./note.php?id='.$cat_id);
}

function GetCatNote($i_page,$i_article_num)
{
    $i_page = $i_page < 1 ? 0:(--$i_page);
    $articles = array();
    $start_num = $i_page * $i_article_num;
    $sql = "SELECT * FROM ".Table('category')." WHERE cat_type = 'note' ORDER BY cat_sort_order ASC LIMIT $start_num , $i_article_num";
	  $category_info = $GLOBALS['db']->getAll($sql);
	  return $category_info;
}



?>