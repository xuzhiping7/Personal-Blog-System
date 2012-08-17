<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

<head profile="http://gmpg.org/xfn/11">
<title>烧饼研究所 - HEY HEY ！妹子~~ CHECK IT OUT !</title>
<meta http-equiv="Content-Type" content="text/html; charset=EC_CHARSET" />
<meta name="description" content="博主很萌，请不要用SQL漏洞注入、DDOS攻击器、CSRF请求伪造、堆流量等方法来攻击博主服务器。不然我派安妮的小熊就打你哦！" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->_var['theme_root']; ?>style.css" media="screen" />
</head>

<body>
<div id="page">
    <?php echo $this->fetch('module/header.htm'); ?>
    <div class="clr"></div>
    

    <div class="langcu_content">

    	<div class="langcu_note_cat">
      <?php $_from = $this->_var['category_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
      <span class="langcu_note_cat_item"><a href="./note.php?id=<?php echo $this->_var['item']['cat_id']; ?>"><?php echo $this->_var['item']['cat_name']; ?></a></span>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	    </div>

    	<div class="langcu_note">
      <?php $_from = $this->_var['note_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
      <div class="langcu_note_item"><p>NO.<?php echo $this->_var['key']; ?>:</p><?php echo $this->_var['item']['a_content']; ?></div>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      <div class="langcu_note_form">
      <h1 style="color:#00F">新添加笔记</h1>
	    </div>
	    <?php if ($this->_var['b_login']): ?>

	      <form name="note" method="post" action="./note.php?act=save_note" >

	    	<p>content：
	    	<textarea name="content" cols="45" rows="5"></textarea>
	    	</p>
	    	<input type="hidden" name="cate_id" value="<?php echo $this->_var['cur_cat_id']; ?>" />
	    	<p><input type="submit" name="" value="提交" /></p>

	    </div>
	    <?php else: ?>
	    请先登陆
	    <?php endif; ?>
	    </form>
  	</div>
  
  <?php echo $this->fetch('module/footer.htm'); ?>
</div>
</body>
</html>
