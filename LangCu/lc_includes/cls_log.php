<?php

function Debug_Log($content)
{
	if(!$handle = fopen($_SERVER['DOCUMENT_ROOT'].'/debug-log.txt','a'))
	{
		echo "can't not open the file ,please check your pemissions";
		exit;
	}
	if(is_array ($content))
	{
		$content = print_r($content,true);
	}
	//add the line breaks and the add_time to the string
	$content .="\n";
	$now_time = '-------------------log time record: '.date('Y-m-d H:i:s')."\n";
	$content .=$now_time;
	if(fwrite($handle,$content)==FALSE)
	{
		echo "can't write the file ".$_SERVER['DOCUMENT_ROOT'].'config.php please check your pemissions and syntax';
		exit;
	}
	fclose($handle);
}

?>