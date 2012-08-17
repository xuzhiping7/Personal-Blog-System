<?php
/**
 * LangCu Initialization PHP
 * ============================================================================
 * Initial the LangCu Program
 * ============================================================================
 * $Author : Zhiping Xu
 * $Contact: http://weibo.com/spades7
*/
	session_start();
	date_default_timezone_set('PRC');

	/* Get the root_path of LangCu */
	define('ROOT_PATH', str_replace('lc_admin/init.php', '', str_replace('\\', '/', __FILE__)));

	require_once(ROOT_PATH.'config.php');
	if (!defined('DIR_INCLUDES'))
	{
		header('Location: lc_install/index.php');
		exit;
	}



	/* LangCu Log Part */
	require(ROOT_PATH.'lc_includes/cls_log.php');

	/* Common Function */
	require(ROOT_PATH.'lc_includes/func_common.php');

	/* Initialization of Database Class */
	require(ROOT_PATH.'lc_includes/cls_mysql.php');
	$db = new lc_mysql($hostname, $dbname, $username, $password);
	$hostname = $dbname = $username = $password ='';
	$db -> connect();
	$db -> selectDB();
	$db -> query("set names 'utf8'");
  $db -> query("set character_set_client=utf8");
  $db -> query("set character_set_results=utf8");
	$GLOBALS['db'] =  $db;
	$lc['tab']=$table_prefix;
	$GLOBALS['lc']=$lc;

	/* Create An Smarty Object */
  require(ROOT_PATH . 'lc_includes/cls_smarty.php');
  $GLOBALS['smartyDir'] ='lc_admin/admin_theme';
  $smarty = new cls_smarty;
  $smarty->templateDir   = ROOT_PATH . 'lc_admin/admin_theme/';
  $smarty->compile_dir    = ROOT_PATH . 'lc_admin/admin_theme/complie_dir';

	/*Check the session to judge the login info*/
	$b_login = (isset($_SESSION["b_login"])&&($_SESSION["b_login"] != false)) ? true:false;

?>