<?php
/**
 * LangCu Index PHP
 * ============================================================================
 * $Author : Zhiping Xu
 * $Contact: http://weibo.com/spades7
*/

require_once('lc_includes/lc_init.php');

$page = safetyGet('page','GET');
$articles = array();
$articles = getArticle($page,5);

$gallery_info = $db -> getRow("SELECT * FROM ".Table('image')." WHERE img_keycode ='gallery_pic' ORDER BY img_add_time DESC");

//Debug_Log($articles);
$smarty->assign("theme_root",'lc_themes/default/');
$smarty->assign("articles",$articles);
$smarty->assign("gallery_info",$gallery_info);

$smarty->display("index.dwt");


function getArticle($i_page,$i_article_num)
{
    $i_page = $i_page < 1 ? 0:(--$i_page);
    $articles = array();
    $start_num = $i_page * $i_article_num;
    $sql = "SELECT * FROM ".Table('article')." AS a ".
           "LEFT JOIN ".Table('category')." AS c ON c.cat_id=a.a_cid ".
           "WHERE c.cat_type <> 'note' ORDER BY a_id DESC LIMIT $start_num , $i_article_num";
	  $articles = $GLOBALS['db']->getAll($sql);
	  for($i=0;$i< count($articles);$i++)
	  {
	     $articles[$i]['a_add_time'] = date("Y-m-d H:i:s",$articles[$i]['a_add_time']);
	  }
	  return $articles;
}

?>