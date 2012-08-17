<?php
	require_once('../lc_includes/cls_output.php');
	
	$outputer = new Outputer();
	
	switch ($_REQUEST['act'])
	{
		case 'lc_article_title':
			$outputer->lc_article_title('view');
			break;
	}
?>