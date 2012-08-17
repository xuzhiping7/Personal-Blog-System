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
    <div class="langcu_gallery">
      <div class="title">最近</div>
      <div class="description"><?php echo $this->_var['gallery_info']['img_description']; ?></div>
      <div class="gallery">
        <div class="selector">
          <span>1</span>
          <span>2</span>
          <span>3</span>
        </div>
        <div class="picture">
          <img src="<?php echo $this->_var['gallery_info']['img_url']; ?>"/>
        </div>
      </div>
    </div>

    <div class="langcu_article_thumb">
      <?php $_from = $this->_var['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
      <div class="article">
        <div class="title"> <?php echo $this->_var['item']['a_title']; ?></div>
        <div class="content"><?php echo $this->_var['item']['a_content']; ?></div>
        <div class="add_time"><?php echo $this->_var['item']['a_add_time']; ?></div>
      </div>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
    <?php echo $this->fetch('module/footer.htm'); ?>
</div>


</body>
</html>
