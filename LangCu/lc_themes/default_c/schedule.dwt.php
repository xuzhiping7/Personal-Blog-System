<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

<head profile="http://gmpg.org/xfn/11">
<title>烧饼研究所 - HEY HEY ！妹子~~ CHECK IT OUT !</title>
<meta http-equiv="Content-Type" content="text/html; charset=EC_CHARSET" />
<meta name="description" content="博主很萌，请不要用SQL漏洞注入、DDOS攻击器、CSRF请求伪造、堆流量等方法来攻击博主服务器。不然我派安妮的小熊就打你哦！" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->_var['theme_root']; ?>style.css" media="screen" />
<script type="text/javascript" src="<?php echo $this->_var['theme_root']; ?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo $this->_var['theme_root']; ?>js/jquery.masonry.js"></script>
<script type="text/javascript" src="<?php echo $this->_var['theme_root']; ?>js/schedule.js"></script>
</head>

<body>
<div id="page">
    <?php echo $this->fetch('module/header.htm'); ?>
    <div class="clr"></div>
    

    <div class="langcu_content">
      <div class="langcu_schedule">
          <h1 style="color:#F00">未完成</h1>
          <div class="schedule_unfinish" id="schedule_unfinish">
              <?php $_from = $this->_var['sch_unfinish_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>

              <div class="schedule_unfinish_block">
                <span class="evaluation"><?php echo $this->_var['item']['sch_evaluation']; ?></span>
              <div class="title">计划<?php echo $this->_var['key']; ?>&nbsp;-&nbsp;<?php echo $this->_var['item']['sch_title']; ?></div>

              <div class="content"><?php echo $this->_var['item']['sch_content']; ?></div>
              <div class="remark"><?php echo $this->_var['item']['begin_time_format']; ?><?php if ($this->_var['item']['sch_end_time']): ?>---<?php echo $this->_var['item']['end_time_format']; ?><?php endif; ?></div>
              <a  href="./schedule.php?act=done_schedule&sch_id=<?php echo $this->_var['item']['sch_id']; ?>"><span class="done">完成</span></a>
              </div>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </div>
          <h1 style="color:#F00">已完成</h1>
          <div class="schedule_finish" id="schedule_finish">
              <?php $_from = $this->_var['sch_finish_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
              <div class="schedule_finish_block">
              <?php echo $this->_var['key']; ?> : <?php echo $this->_var['item']['sch_title']; ?>&nbsp;&nbsp;&nbsp;<?php echo $this->_var['item']['begin_time_format']; ?><?php if ($this->_var['item']['sch_end_time']): ?>---<?php echo $this->_var['item']['end_time_format']; ?><?php endif; ?>&nbsp;优先级:<?php echo $this->_var['item']['sch_evaluation']; ?>
              content:<?php echo $this->_var['item']['sch_content']; ?> <br/>
              已完成<br/>
              </div>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </div>
      </div>

      <div class="langcu_schedule_form">
      <h1 style="color:#00F">新添加计划</h1>
      <?php if ($this->_var['b_login']): ?>
	      <form name="schedule" method="post" action="./schedule.php?act=save_schedule" >
	    	标题：<br/>
	    	<input type="text" name="title" /><br/>
	    	内容：<br/>
	    	<textarea name="content" cols="45" rows="5"></textarea><br/>

	    	是否采用当前时间作起始时间：<input type="checkbox" name="b_cur_time_begin" /><br/>

	    	权重：<input type="text" name="evaluation" /><br/>
	    	起始时间(UNIX)：<input type="text" name="begin_time" /><br/>
	    	结束时间(UNIX)：<input type="text" name="end_time" /><br/>
	    	<p><input type="submit" name="" value="提交" /></p>
	    	</form>
	    <?php else: ?>
	    请先登陆
	    <?php endif; ?>
      </div>
  	</div>
  
  <?php echo $this->fetch('module/footer.htm'); ?>
</div>

</body>
</html>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30306542-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

