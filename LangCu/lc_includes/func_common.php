<?php


function Table($table_name)
{
    return $GLOBALS['lc']['tab'].'_'.$table_name;
}

function SafetyGet($name, $var='R', $htmlcode=false, $rehtml=false) {
	switch ($var) {
		case 'GET':
			$var = &$_GET;
			break;
		case 'POST':
			$var = &$_POST;
			break;
	  case 'REQUEST';
	    $var = &$_REQUEST;
	    break;
		case 'COOKIE':
			$var = &$_COOKIE;
			break;
		case 'R':
			$var = &$_GET;
			if (empty($var[$name])) {
				$var = &$_POST;
			}
			break;
	}
	$putvalue = isset($var[$name]) ? indexdaddslashes($var[$name], 0) : NULL;
	return $htmlcode ? indexhtmldecode($putvalue) : $putvalue;
}


//下面两个函数有待优化处理和检测
function indexdaddslashes($string, $force=0, $strip=FALSE)
{
	if (!get_magic_quotes_gpc() || $force == 1)
	{
		if (is_array($string))
		{
			foreach ($string as $key => $val)
			{
				$string[$key] = addslashes($strip ? stripslashes($val) : $val);
			}
		}
		else
		{
			$string = addslashes($strip ? stripslashes($string) : $string);
		}
	}
	return $string;
}

function indexhtmldecode($str) {
	if (empty($str)) return $str;
	if (!is_array($str)) {
		$str = htmlspecialchars(trim($str));
		$str = str_ireplace("Xss", "", $str);
	} else {
		foreach ($str as $key => $val) {
			$str[$key] = htmlspecialchars($val);
			$str[$key] = indexhtmldecode($val);
		}
	}
	return $str;
}

function GMTime()
{
    return time();
}
?>