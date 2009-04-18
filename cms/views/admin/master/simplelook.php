<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title><?php echo $site_name; ?> | <?php echo $title; ?></title>
	<?php echo vasp_stylesheet('/css/simplelook.css'); ?>
</head>

<body>
	<div id="header">
		<div id="logo"></div>
		<div id="extra_nav">
			<ul>
				<li><a href="<?php echo base_url(); ?>" target="_blank"><span>View Website</span></a></li>
				<li><a href=""><span>Help</span></a></li>
				<li><a href="<?php echo site_url('admin/login/logout'); ?>"><span>Logout</span></a></li>
			</ul>
		</div>
	</div>
	<div id="nav_container">
		<div id="top_nav">
			<ul>
				<li><a href="<?php echo site_url('admin/frontdesk'); ?>"><span>Front Desk</span></a></li>
				<li><a href="<?php echo site_url('admin/page'); ?>"><span>Pages</span></a></li>
				<li><a href="<?php echo site_url('admin/newsletter'); ?>"><span>Newsletter</span></a></li>
			</ul>
		</div>
		<div id="admin_nav">
			<ul>
				<li><a href="<?php echo site_url('admin/recycle'); ?>"><span>Recycle</span></a></li>
				<li><a href="<?php echo site_url('admin/file'); ?>"><span>File</span></a></li>
				<li><a href="<?php echo site_url('admin/layout'); ?>"><span>Layout</span></a></li>
				<li><a href="<?php echo site_url('admin/settings'); ?>"><span>Settings</span></a></li>
			</ul>
		</div>
	</div>
	
    <?php echo $content_for_layout; ?>
    
	<div id="footer">
		Copyright &copy; <?php echo Date('Y'); ?> <?php if(isset($system_name)){ echo $system_name; } ?> <?php if(isset($system_version)){ echo $system_version; } ?> | All Rights Reserved.
	</div>
</body>
</html>
