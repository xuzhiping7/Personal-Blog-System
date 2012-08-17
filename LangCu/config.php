<?php
/**
* LangCu Configure PHP
* ============================================================================
* Define and initialize the LangCu program
* ============================================================================
* $Author : Zhiping Xu
* $Contact: http://weibo.com/spades7
*/
//here are the information of database
$hostname = 'localhost';
$dbname = 'langcu';
$username = 'root';
$password = '';

//here are the table prefix of LangCu program
$table_prefix =  'lc';

//here are the definition of LangCu program
define('DIR_INCLUDES',$_SERVER['DOCUMENT_ROOT'].'/lc_includes/');
?>