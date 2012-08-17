<?php
require_once('lc_includes/lc_init.php');	

//从数据库取出TIME_STAMP，将TIME_STAMP转换为UNIX时间，再存进数据库
$time_stamps = array();
$time_stamps = $GLOBALS['db']->getAll('SELECT a_date,a_id FROM article');
foreach($time_stamps as $time_stamp)
{
    // 2012-03-21 22:09:47 样式
    // print_r($time_stamp['a_date']);

    $part = array();
    $part = explode(' ',$time_stamp['a_date']);
    $part1 = array();
    $part2 = array();
    $part1 = $part[0];
    $part2 = $part[1];
    
    $part1_arr = explode('-',$part1);
    $part2_arr = explode(':',$part2);
   
    //mktime(hour,minute,second,month,day,year,is_dst)
    $unix_time = mktime((int)$part2_arr[0],(int)$part2_arr[1],(int)$part2_arr[2],(int)$part1_arr[1],(int)$part1_arr[2],(int)$part1_arr[0]);
    //print_r(date("Y-m-d h:i:s",$unix_time));

    $GLOBALS['db']->query('UPDATE article SET `a_add_time`='.$unix_time.' WHERE `a_id`='.$time_stamp['a_id']);
}
//print_r($time_stamps);
?>