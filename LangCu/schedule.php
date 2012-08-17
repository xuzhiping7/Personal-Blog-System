<?php
require_once('lc_includes/lc_init.php');

$act = SafetyGet('act','REQUEST');
$act = isset($act) ? $act : 'common';

$login_act = array('save_schedule','done_schedule');

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
    //unfinish schedule
    $temp_sql = "SELECT * FROM ".Table('schedule')." WHERE sch_state=0 ORDER BY sch_evaluation DESC";
    $sch_unfinish_info = $GLOBALS['db']->getAll($temp_sql);
    foreach($sch_unfinish_info as &$schedule)
    {
        $schedule['begin_time_format'] = date("m月s日 H时i分",$schedule['sch_begin_time']);
        $schedule['end_time_format'] = date("m月s日 H时i分",$schedule['sch_end_time']);
    }
    unset($schedule);

    //finish schedule
    $temp_sql = "SELECT * FROM ".Table('schedule')." WHERE sch_state=1 ORDER BY sch_end_time DESC LIMIT 10";
    $sch_finish_info = $GLOBALS['db']->getAll($temp_sql);
    foreach($sch_finish_info as &$schedule)
    {
        $schedule['begin_time_format'] = date("m月s日 H时i分",$schedule['sch_begin_time']);
        $schedule['end_time_format'] = date("m月s日 H时i分",$schedule['sch_end_time']);
    }
    unset($schedule);

    //smarty out
    $smarty->assign("theme_root",'lc_themes/default/');
    $smarty->assign("sch_unfinish_info",$sch_unfinish_info);
    $smarty->assign("sch_finish_info",$sch_finish_info);
    if(isset($_SESSION["b_login"]))$smarty->assign("b_login",$_SESSION["b_login"]);
    $smarty->display("schedule.dwt");
}
elseif($act == 'save_schedule')
{
    //judge user permission
    $u_id = isset($_SESSION["u_id"]) ? $_SESSION["u_id"] : 0;
    if($u_id === 0)exit("login please");

    $title = SafetyGet('title','POST');
    $content = SafetyGet('content','POST');
    $b_UseCurTime = SafetyGet('b_cur_time_begin','POST');
    $evaluation = SafetyGet('evaluation','POST');
    $begin_time = SafetyGet('begin_time','POST');
    $end_time = SafetyGet('end_time','POST');


    if($b_UseCurTime || empty($begin_time))
        $begin_time = time();

    $temp_sql = "INSERT INTO ".Table('schedule')." SET `sch_title` = '$title', `sch_content`='$content',  `sch_begin_time` ='$begin_time' ,`sch_end_time` ='$end_time' ,`sch_evaluation`='$evaluation'  ";
    $GLOBALS['db']->query($temp_sql);
    header('Location: ./schedule.php');
}
elseif($act == 'done_schedule')
{
    //judge user permission
    $u_id = isset($_SESSION["u_id"]) ? $_SESSION["u_id"] : 0;
    if($u_id === 0)exit("login please");

    $sch_id = SafetyGet('sch_id','GET');
    if(empty($sch_id))
        die("ID 缺失");

    $cur_unix_time = time();
    $GLOBALS['db']->query("UPDATE ".Table('schedule')." SET sch_state = 1 ,sch_end_time = '$cur_unix_time' WHERE `sch_id`='$sch_id'");
    header('Location: ./schedule.php');
}


?>