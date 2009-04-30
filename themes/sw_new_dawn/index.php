<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title><?php echo $page_title; ?> &raquo; Silent Works</title>
		<link rel="stylesheet" href="<?php echo theme_directory(); ?>/css/screen.css" type="text/css" media="screen, projection" />
	   	<link rel="stylesheet" href="<?php echo theme_directory(); ?>sw_new_dawn/css/print.css" type="text/css" media="print" /> 
		<!--[if IE]>
			<link rel="stylesheet" href="<?php echo theme_directory(); ?>/css/ie.css" type="text/css" media="screen, projection" />
		<![endif]-->
		
	   	<link rel="stylesheet" href="<?php echo theme_directory(); ?>/css/style.css" type="text/css" media="screen, projection" />
	</head>
	
	<body>
		<div class="container showgrd">
			
			<div id="header">
				
				<!-- Logo -->
				<div id="logo">
					<img src="<?php echo theme_directory(); ?>/images/logo.gif" width="160" height="84" alt="Silent Works" />
				</div>
				<!-- / - Logo -->
				
			</div>
			
			<!-- Navigation -->
			<?php theme_block('navigation'); ?>
			<!-- / - Navigation -->
	
			<div id="wrapper">
				<!-- BreadCrumbs -->
				<?php theme_block('components/breadcrumbs'); ?>
				<!-- / - BreadCrumbs -->
				
				<!-- Strapline -->
				<h1 id="strapline">
					Cool Website
				</h1>
				<!-- / - Strapline -->
				
				<?php echo $content_for_layout; ?>
				
			</div>
			
			<div id="footer">
				<?php theme_block('components/footer'); ?>
			</div>
		</div>
		
	</body>
</html>
