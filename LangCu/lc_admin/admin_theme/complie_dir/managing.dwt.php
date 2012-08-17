<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="APPNAME VERSION" />
<meta http-equiv="Content-Type" content="text/html; charset=EC_CHARSET" />
<title>浪簇-level1后台管理</title>


	<style type="text/css" media="all">
		@import url(admin_theme/style2.css);
		img {behavior:url('admin_theme/js/iepngfix.htc') !important;}
	</style>

	<script src="admin_theme/js/jquery.js" type="text/javascript"></script>
	<script src="admin_theme/js/jquery_ui.js" type="text/javascript"></script>
	<script src="admin_theme/js/wysiwyg.js" type="text/javascript"></script>
	<script src="admin_theme/js/functions.js" type="text/javascript"></script>
  <script src="../lc_includes/kindeditor_libs/kindeditor-min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../lc_includes/kindeditor_libs/lang/zh_CN.js" type="text/javascript" charset="utf-8"></script>
		<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : false,
					items : [
						'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'emoticons', 'image', 'link']
				});
			});
		</script>


</head>
<body>
	<div id="container"> 
	<div id="header"> 
		<div id="title">
			<a href="http://<?php echo $this->_var['main_url']; ?>/lc_admin/">LC-Level1_0.02</a>
			<span>浪簇开源博客系统</span>
		</div>
		<div class="logged">
			<p><span id="wellcome-info"></span>, <?php echo $this->_var['user_nickname']; ?></a>!</p>
			<p><a href="#">My Account</a> | <a href="./managing.php?act=log_out" >Sign Out</a></p>
			<p>You have <a href="#">12 unread messages</a>!</p>
		</div>
	</div>
	<div id="sidebar"> 
		<div class="sidebox">
			<span class="stitle">Navigation</span>
		<div id="navigation"> 
			<div class="sidenav">
				<div class="navhead"><span>Gallery</span></div>
					<div class="subnav">
						<ul class="submenu">
						  <li><a href="./managing.php?act=add_new_gallery" title="">Add New Gallery</a></li>
							<li><a href="./managing.php?act=manage_gallery" title="">Manage Gallery</a></li>
						</ul>
					</div>
				<div class="navhead"><span>Articles</span></div>
					<div class="subnav">
						<ul class="submenu">
							<li><a href="./managing.php?act=add_article" title="">Write a new Article</a></li>
							<li><a href="./managing.php" title="">Manage Articles</a></li>
							<li><a href="#" title="">Manage Categories</a></li>
						</ul>
					</div>
				<div class="navhead"><span>Category Manager</span></div>
					<div class="subnav">
						<ul class="submenu">
							<li><a href="./managing.php?act=add_category" title="">Add Category</a></li>
							<li><a href="./managing.php?act=manage_category" title="">Manage Category</a></li>
						</ul>
					</div>
			</div>
		</div> 
		</div>

	</div> 
	<div id="main"> 
		<div id="content"> 
				<ul class="modals">
					<li>
						<a href="managing.php?act=add_article">
							<img src="admin_theme/iconsee/pencil_48.png" alt="Write an article" />
							<span>Write an article</span>
						</a>
					</li>
					<li>
						<a href="#">
							<img src="admin_theme/iconsee/diagram_48.png" alt="View statistics" />
							<span>View statistics</span>
						</a>
					</li>
					<li>
						<a href="#">
							<img src="admin_theme/iconsee/letter_48.png" alt="Check inbox" />
							<span>Check inbox</span>
						</a>
					</li>
					<li>
						<a href="#">
							<img src="admin_theme/iconsee/clipboard_48.png" alt="To-do list" />
							<span>Todo list</span>
						</a>
					</li>
					<li>
						<a href="#">
							<img src="admin_theme/iconsee/gear_48.png" alt="Settings" />
							<span>Settings</span>
						</a>
					</li>
					<li>
						<a href="#">
							<img src="admin_theme/iconsee/save_48.png" alt="Save this!" />
							<span>Save this!</span>
						</a>
					</li>
				</ul>
				<?php if ($this->_var['act'] == 'common'): ?>
				<h2>Tables</h2>
				<table cellspacing="0" cellpadding="0" border="0">
					<thead>
						<tr>
							<th><input type="checkbox" class="checkall" /></th>
							<th>No</th>
							<th>Status</th>
							<th>Title</th>
							<th>Views</th>
							<th>Date</th>
							<th>Actions</th>
						</tr>
					</thead>

					<tbody>

					  <?php $_from = $this->_var['articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
						<tr>
							<td><input type="checkbox" value="<?php echo $this->_var['item']['a_id']; ?>"/></td>
							<td><?php echo $this->_var['item']['a_id']; ?></td>
							<td>Approved</td>
							<td><?php echo $this->_var['item']['a_title']; ?></td>
							<td>273</td>
							<td><?php echo $this->_var['item']['a_date']; ?></td>
							<td><a href="#"><img src="admin_theme/assets/action_add.png" alt="Add" /></a>
							  <a href="#"><img src="admin_theme/assets/action_remove.png" alt="Remove" /></a>
							  <a href="#"><img src="admin_theme/assets/action_check.png" alt="Check" /></a>
							  <a href="managing.php?act=delete_article&a_id=<?php echo $this->_var['item']['a_id']; ?>"><img src="admin_theme/assets/action_delete.png" alt="Delete" /></a>
							  <a href="#"><img src="admin_theme/assets/folder.png" alt="Folder" /></a><a href="#">
							    <img src="admin_theme/assets/letter.png" alt="Letter" /></a></td>
						</tr>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

					</tbody>
				</table>
				
				<h2>Notifications</h2>
				<div class="warning">
					<div class="warn_icon"></div>
					<a href="#" class="close" title="Close this notification">x</a>
					<div class="desc">
						<span>Warning!</span>
						<p>Mauris molestie, nisi ac elementum convallis, sapien odio sollicitudin mi, vel pellentesque nunc erat at sapien. </p>
					</div>
				</div>
				<div class="err">
					<div class="err_icon"></div>
					<a href="#" class="close" title="Close this notification">x</a>
					<div class="desc">
						<span>Error!</span>
						<p>Ut fermentum, quam non eleifend molestie, velit nisl mattis eros, sit amet imperdiet diam justo sed augue.</p>
					</div>
				</div>
				<div class="succes">
					<div class="succes_icon"></div>
					<a href="#" class="close" title="Close this notification">x</a>
					<div class="desc">
						<span>Success!</span>
						<p>Ut fermentum, quam non eleifend molestie, velit nisl mattis eros, sit amet imperdiet diam justo sed augue.</p>
					</div>
				</div>
				<div class="clear"></div>

			<?php elseif ($this->_var['act'] == 'add_article'): ?>
      <form id="form1" name="form1" method="post" action="./managing.php?act=save_article" >
    	<p>title：<input type="text" name="title" id="title" />
    	</p>
    	<p>content：
    	<textarea name="content" id="content" cols="45" rows="5"></textarea>
    	</p>
    	<p><input type="submit" name="" value="提交" /></p>
    	</form>
    	<?php elseif ($this->_var['act'] == 'add_new_gallery'): ?>
      <form id="form1" name="form1" method="post" action="./managing.php?act=save_gallery" enctype="multipart/form-data">
    	  <p>image name：</p>
    	  <p><input type="text" name="image_name" /></p>
    	  <p>pic file：</p>
    	  <p><input type="file" name="image_file" /></p>
    	  <p>pic desc：</p>
    	  <textarea name="content" id="content" cols="45" rows="5"></textarea>
    	  <p><input type="submit" value="提交" /></p>
    	</form>
    	<?php elseif ($this->_var['act'] == 'manage_gallery'): ?>
				<table cellspacing="0" cellpadding="0" border="0">
					<thead>
						<tr>
							<th><input type="checkbox" class="checkall" /></th>
							<th>No</th>
							<th>Status</th>
							<th>NAME</th>
							<th>TYPE</th>
							<th>URL</th>
							<th>OPERATOR</th>
						</tr>
					</thead>
					<tbody>
    			<?php $_from = $this->_var['gallery_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
						<tr>
							<td><input type="checkbox" value="<?php echo $this->_var['item']['a_id']; ?>"/></td>
							<td><?php echo $this->_var['item']['img_id']; ?></td>
							<td>Approved</td>
							<td><?php echo $this->_var['item']['img_name']; ?></td>
							<td><?php echo $this->_var['item']['img_keycode']; ?></td>
							<td><?php echo $this->_var['item']['img_url']; ?></td>
							<td><a href="managing.php?act=delete_gallery&img_id=<?php echo $this->_var['item']['img_id']; ?>">delete</a></td>
						</tr>
    			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    	<?php elseif ($this->_var['act'] == 'add_category'): ?>
      <form id="form1" name="form1" method="post" action="./managing.php?act=save_category" >
    	<p>cat_name：<input type="text" name="cat_name"/>
    	</p>
    	<p>cat_type(can be empty)：<input type="text" name="cat_type" />
    	</p>
    	<p>cat_sort_order：<input type="text" name="cat_sort_order" />
    	</p>
    	<p>cat_is_show：<input type="checkbox" name="cat_is_show" checked="checked"  value="1"/>
    	</p>
    	<p><input type="submit"  value="提交" /></p>
    	</form>
    	<?php elseif ($this->_var['act'] == 'edit_category'): ?>
      <form id="form1" name="form1" method="post" action="./managing.php?act=save_edit_category" >
    	<p>cat_name：<input type="text" name="cat_name" value="<?php echo $this->_var['category_info']['cat_name']; ?>"/>
    	</p>
    	<p>cat_type(can be empty)：<input type="text" name="cat_type" value="<?php echo $this->_var['category_info']['cat_type']; ?>"/>
    	</p>
    	<p>cat_sort_order：<input type="text" name="cat_sort_order" value="<?php echo $this->_var['category_info']['cat_sort_order']; ?>"/>
    	</p>
    	<p>cat_is_show：<input type="checkbox" name="cat_is_show" <?php if ($this->_var['category_info']['cat_is_show']): ?>checked="checked"<?php endif; ?>  value="1"/>
    	</p>
    	<input type="hidden" name="cat_id" value="<?php echo $this->_var['category_info']['cat_id']; ?>"/>
    	<p><input type="submit"  value="提交" /></p>
    	</form>
    	<?php elseif ($this->_var['act'] == 'manage_category'): ?>
				<table cellspacing="0" cellpadding="0" border="0">
					<thead>
						<tr>
							<th><input type="checkbox" class="checkall" /></th>
							<th>No</th>
							<th>Status</th>
							<th>NAME</th>
							<th>SORT ORDER</th>
							<th>TYPE</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
    			<?php $_from = $this->_var['category_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
						<tr>
							<td><input type="checkbox" value="<?php echo $this->_var['item']['a_id']; ?>"/></td>
							<td><?php echo $this->_var['item']['cat_id']; ?></td>
							<td><?php if ($this->_var['item']['cat_is_show']): ?>显示<?php else: ?>隐藏<?php endif; ?></td>
							<td><?php echo $this->_var['item']['cat_name']; ?></td>
							<td><?php echo $this->_var['item']['cat_sort_order']; ?></td>
							<td><?php echo $this->_var['item']['cat_type']; ?></td>
							<td>
							  <a href="managing.php?act=edit_category&cat_id=<?php echo $this->_var['item']['cat_id']; ?>">编辑</a>
							  <a href="managing.php?act=delete_category&cat_id=<?php echo $this->_var['item']['cat_id']; ?>"><img src="admin_theme/assets/action_delete.png" alt="Delete" /></a>
							</td>
						</tr>
    			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    			</tbody>
				</table>
    	<?php elseif ($this->_var['act'] == 'save_success'): ?>
    	save success
    	<?php elseif ($this->_var['act'] == 'delete_success'): ?>
    	delete success
    	<?php endif; ?>


			
				<ul class="paginator">
					<li><a href="#">Previous</a></li>
					<li class="current"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">6</a></li>
					<li><a href="#">7</a></li>
					<li><a href="#">8</a></li>
					<li><a href="#">9</a></li>
					<li><a href="#">Next</a></li>
				</ul>
			
		</div> 

	</div>
</div> 
</body>


<script>
window.onload=function()
{
  var now = new Date();
  var hours = now.getHours();
  var handle = document.getElementById("wellcome-info");
  if(hours>18)
  {
  	handle.innerHTML = "晚上好";
  }
  else if(hours>0 && hours <4)
  {
  	handle.innerHTML = "凌晨好";
  }
  else if(hours>4 && hours <7)
  {
  	handle.innerHTML = "清晨好";
  }
  else if(hours>7 && hours <12)
  {
  	handle.innerHTML = "早上好";
  }
  else if(hours>12 && hours <14)
  {
  	handle.innerHTML = "中午好";
  }
  else if(hours>14 && hours <18)
  {
  	handle.innerHTML = "下午好";
  }
}
</script>


</html>
