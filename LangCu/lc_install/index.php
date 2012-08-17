<?php

	/**
	 * LangCu Install Page
	 * ============================================================================
	 * Create the database and intialize the config.php
	 * ============================================================================
	 * $Author : Zhiping Xu
	 * $Contact: http://weibo.com/spades7
	*/

	header("Content-Type: text/html;charset=utf-8");

	/* get the root_path of LangCu */
	define('ROOT_PATH', str_replace('lc_install/index.php', '', str_replace('\\', '/', __FILE__)));
	/* LangCu Debug Class */
	include(ROOT_PATH.'/lc_includes/cls_log.php');
	/* LangCu Smarty Part */
  require(ROOT_PATH . 'lc_includes/cls_smarty.php');
  $GLOBALS['smartyDir'] ='lc_install/theme';
  $smarty = new cls_smarty;
  $smarty->template_dir   = ROOT_PATH . 'lc_install/theme';
  $smarty->compile_dir    = ROOT_PATH . 'lc_install/theme/theme_c';

	if(!isset($_REQUEST['step']))
	{
		$_REQUEST['step']='1';
	}
	if($_REQUEST['step']=='1')
	{
		$smarty->assign("install_step", '1');
		$smarty->display("index.dwt");
	}
	elseif($_REQUEST['step']=='2')
	{
		$hostname = $_REQUEST['hostname'];
		$dbname = 	$_REQUEST['dbname'];
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$table_prefix = $_REQUEST['table_prefix'];
		$b_create_database = isset($_POST['b_create_database'])? intval($_POST['b_create_database']):0;
		/*
			Create the database
		*/

		//connect to the mysql,install(create) the databases and insert the table
		include_once(ROOT_PATH.'/lc_includes/'.'cls_mysql.php');
		$handle = new lc_mysql($hostname,$dbname,$username,$password);
		$handle -> connect();
		if($b_create_database)$handle -> query('create database '.$dbname." DEFAULT CHARSET=UTF8");
		$handle -> selectDB();

		//build the tables
		$handle -> query("CREATE TABLE `".$table_prefix."_user` (
											`u_id` INT( 11 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
											`u_pw` VARCHAR( 30 ) NOT NULL ,
											`u_email` VARCHAR( 100 ) NULL ,
											`u_nickname` VARCHAR( 100 ) NULL
											) ENGINE = MyISAM;");

		$handle -> query("CREATE TABLE `".$table_prefix."_category` (
											`cat_id` INT( 11 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
											`cat_name` VARCHAR( 20 ) NOT NULL ,
											`cat_type` VARCHAR( 20 ) NOT NULL ,
											`cat_parent_id` INT( 11 ) UNSIGNED DEFAULT '0',
											`cat_sort_order` INT( 11 ) NOT NULL DEFAULT '0',
											`cat_is_show` BOOLEAN NOT NULL DEFAULT  '1'
											) ENGINE = MyISAM;");

		$handle -> query("CREATE TABLE `".$table_prefix."_article` (
											`a_id` BIGINT( 20 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
											`a_author_id` INT( 11 ) UNSIGNED NOT NULL ,
											`a_add_time` INT( 10 ) UNSIGNED ,
											`a_content` LONGTEXT NOT NULL ,
											`a_title` TEXT NOT NULL ,
											`a_cid` INT( 11 ) UNSIGNED DEFAULT '1',
											`a_is_show` BOOLEAN NOT NULL DEFAULT '1',
											`a_click_num` INT( 11 ) NOT NULL DEFAULT  '0'
											) ENGINE = MyISAM;");
		$handle -> query("CREATE TABLE `".$table_prefix."_comment` (
											`com_id` BIGINT( 20 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
											`com_author_name` TINYTEXT NOT NULL ,
											`com_author_email` VARCHAR( 100 ) NULL ,
											`com_date` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
											`com_content` TEXT NOT NULL ,
											`com_parent_id` BIGINT( 20 ) UNSIGNED NULL ,
											`com_aricle_id` BIGINT( 20 ) UNSIGNED NULL
											) ENGINE = MyISAM;");

		$handle -> query("CREATE TABLE  `".$table_prefix."_link` (
                      `l_id` BIGINT( 20 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
                      `l_url` VARCHAR( 255 ) NOT NULL ,
                      `l_type` VARCHAR( 255 ) NOT NULL ,
                      `l_descript` VARCHAR( 255 ) NOT NULL
                      ) ENGINE = MyISAM;");

    $handle -> query("CREATE TABLE IF NOT EXISTS `".$table_prefix."_schedule` (
                      `sch_id` int(8) NOT NULL AUTO_INCREMENT,
                      `sch_title` varchar(80) NOT NULL,
                      `sch_content` varchar(512) NOT NULL,
                      `sch_begin_time` int(10) NOT NULL,
                      `sch_end_time` int(10) NOT NULL,
                      `sch_evaluation` tinyint(4) NOT NULL,
                      `sch_state` tinyint(4) NOT NULL,
                      PRIMARY KEY (`sch_id`)
                      ) ENGINE=MyISAM;");

    $handle -> query("CREATE TABLE IF NOT EXISTS `".$table_prefix."_image` (
                    `img_id` int(11) NOT NULL AUTO_INCREMENT,
                    `img_name` varchar(255) NOT NULL,
                    `img_description` varchar(1024) NOT NULL,
                    `img_url` varchar(255) NOT NULL,
                    `img_keycode` varchar(127) NOT NULL,
                    `img_add_time` int(10) NOT NULL,
                    PRIMARY KEY (`img_id`)
                    ) ENGINE=MyISAM;");
		/*
			intialize the config.php
		*/

		//string combination
		$s_begining = '<?php
/**
* LangCu Configure PHP
* ============================================================================
* Define and initialize the LangCu program
* ============================================================================
* $Author : Zhiping Xu
* $Contact: http://weibo.com/spades7
*/
//here are the information of database'."\n";
		$s_hostname = '$hostname = \''.$hostname."';\n";
		$s_dbname   = '$dbname = \''.$dbname."';\n";
		$s_username = '$username = \''.$username."';\n";
		$s_password = '$password = \''.$password."';\n";
		$s_dbInfo   = $s_begining.$s_hostname.$s_dbname.$s_username.$s_password;


		if(!$handle = fopen(ROOT_PATH.'/config.php','a'))
		{
			echo "can't not open the file ,please check your pemissions";
			exit;
		}
		if(fwrite($handle,$s_dbInfo)==FALSE)
		{
			echo "can't write the file ".ROOT_PATH.'config.php please check your pemissions and syntax';
			exit;
		}
		$s_difine ="\n".'//here are the table prefix of LangCu program'."\n".
		            '$table_prefix =  \''.$table_prefix."';\n";

		$s_difine .="\n".'//here are the definition of LangCu program'."\n".
								'define(\'DIR_INCLUDES\',$_SERVER[\'DOCUMENT_ROOT\'].\'/lc_includes/\');'."\n".'?>';

		if(fwrite($handle,$s_difine)==FALSE)
		{
			echo "can't write the file ".ROOT_PATH.'config.php please check your pemissions and syntax';
			exit;
		}
		fclose($handle);


		$smarty->assign("install_step", '2');
		$smarty->display("index.dwt");
	}
	elseif($_REQUEST['step']=='3')
	{
		include_once(ROOT_PATH.'config.php');
		include_once(ROOT_PATH.'lc_includes/cls_mysql.php');

		$db = new lc_mysql($hostname, $dbname, $username, $password);
		$hostname = $dbname = $username = $password ='';
		$db -> connect();
		$db -> selectDB();
		$db -> query("set names 'utf8'");
  	$db -> query("set character_set_client=utf8");
  	$db -> query("set character_set_results=utf8");
		$db -> query("insert into ".$table_prefix."_user(u_email,u_nickname,u_pw) values (".'\''.$_REQUEST['u_email'].'\''.','.'\''.$_REQUEST['u_nickname'].'\''.','.'\''.$_REQUEST['u_pw'].'\''.');');
    //set default value
    $db -> query("INSERT INTO ".$table_prefix."_category(`cat_name`) VALUES ('default');");
    $cur_unix_time = time();
    $db -> query("INSERT INTO ".$table_prefix."_article(`a_author_id`,`a_title`,`a_content`,`a_add_time`) VALUES ('1','Hello World!','    Thank you for using LangCu!',$cur_unix_time);");

		$smarty->assign("install_step", '3');
		$smarty->display("index.dwt");
	}
?>