<?php
/**
 * LangCu Initialization PHP
 * ============================================================================
 * Initial the LangCu Program
 * ============================================================================
 * $Author : Zhiping Xu
 * $Contact: http://weibo.com/spades7
*/

	/* Get the root_path of LangCu */
	session_start();
	define('ROOT_PATH', str_replace('lc_includes/lc_init.php', '', str_replace('\\', '/', __FILE__)));

	if(file_exists(ROOT_PATH.'config.php'))require_once(ROOT_PATH.'config.php');
	if (!defined('DIR_INCLUDES'))
	{
		header('Location: lc_install/index.php');
		exit;
	}
	date_default_timezone_set('PRC');

	/* LangCu Log Part */
	require_once(ROOT_PATH.'lc_includes/cls_log.php');

	/* Initialization of Database Class */
	require_once(ROOT_PATH.'lc_includes/cls_mysql.php');
	$db = new lc_mysql($hostname, $dbname, $username, $password);
	$db -> connect();
	$db -> selectDB();
	$db -> query("set names 'utf8'");
  $db -> query("set character_set_client=utf8");
  $db -> query("set character_set_results=utf8");
	$hostname = $dbname = $username = $password ='';
	$GLOBALS['db'] =  $db;
	$lc['tab']=$table_prefix;
	$GLOBALS['lc']=$lc;

	/* Include the common function */
	include_once(ROOT_PATH.'lc_includes/func_common.php');

  /* Create LC smarty object */
  require(ROOT_PATH . 'lc_includes/cls_smarty.php');
  $GLOBALS['smartyDir'] ='lc_themes/default';
  $smarty = new cls_smarty;
  $smarty->templateDir   = ROOT_PATH . 'lc_themes/default';
  $smarty->compile_dir    = ROOT_PATH . 'lc_themes/default_c';
?>