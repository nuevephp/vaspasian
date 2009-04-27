-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.30-community-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema vasp
--

CREATE DATABASE IF NOT EXISTS vasp;
USE vasp;

--
-- Definition of table `alias`
--

DROP TABLE IF EXISTS `alias`;
CREATE TABLE `alias` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(254) NOT NULL,
  `path` varchar(254) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alias`
--

/*!40000 ALTER TABLE `alias` DISABLE KEYS */;
INSERT INTO `alias` (`id`,`alias`,`path`) VALUES 
 (1,'default_controller','page'),
 (2,'home','page'),
 (3,'about','page');
/*!40000 ALTER TABLE `alias` ENABLE KEYS */;


--
-- Definition of table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`,`name`,`type`,`created_on`,`updated_on`,`created_by`,`updated_by`) VALUES 
 (1,'master','layout','2008-12-30 03:55:03','2008-12-30 03:55:06',1,1),
 (2,'general','layout','2008-12-30 04:54:33','2008-12-30 04:54:36',1,1);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


--
-- Definition of table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ci_sessions`
--

/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) VALUES 
 (0x3464626233323866323961653131333834626163303131306338666163363736,0x3132372E302E302E31,0x4D6F7A696C6C612F352E30202857696E646F77733B20553B2057696E646F7773204E5420352E313B20656E2D47423B207276,1233106549,'');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;


--
-- Definition of table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `file` varchar(125) NOT NULL,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` (`id`,`name`,`file`,`type`) VALUES 
 (2,'Reeces Logo','1221122644_vm.jpg','images'),
 (3,'Pink Flower','1221157887_vm.jpg','images'),
 (4,'Olympic','olympic_contract.PDF','documents'),
 (5,'Web Team Minutes','WebsiteTeam.doc','documents'),
 (6,'Freelance Web Info','Freelance_web_info.doc','documents'),
 (10,'Web Team Minutes 1','WebsiteTeam1.doc','documents'),
 (11,'Francis Adjei 15','15_-_Track_15.mp3','audio'),
 (12,'Francis Adjei 10','10_-_Track_10.mp3','audio'),
 (13,'Animatic','animatic.flv','video');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;


--
-- Definition of table `layout`
--

DROP TABLE IF EXISTS `layout`;
CREATE TABLE `layout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layout`
--

/*!40000 ALTER TABLE `layout` DISABLE KEYS */;
INSERT INTO `layout` (`id`,`name`,`type`,`content`,`created_on`,`updated_on`,`created_by`,`updated_by`) VALUES 
 (1,'template','master','<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\"\r\n	\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html>\r\n	<head>\r\n		<meta http-equiv=\"Content-type\" content=\"text/html; charset=utf-8\" />\r\n		<title>Master Template | <?php echo $site_name; ?></title>\r\n		<link rel=\"stylesheet\" href=\"/css/master.css\" type=\"text/css\" media=\"screen\" title=\"no title\" charset=\"utf-8\" />\r\n	</head>\r\n	<body>\r\n		<?php echo $content; ?>\r\n	</body>\r\n</html>','2008-12-30 03:56:53','2008-12-30 03:56:56',1,1),
 (2,'test','normal','<strong><?php echo $var[\'body\'][\'content_html\'] ?></strong>\r\n<p><?php echo $var[\'sidebar\'][\'content_html\'] ?></p>','2008-12-30 04:53:14','2008-12-30 04:53:17',1,1),
 (3,'about','master','<!DOCTYPE html themes/public/hub \"-//W3C//DTD XHTML 1.0 Transitional//EN\"\r\n\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\">\r\n<head>\r\n	<title><?php echo $site_name; ?> - The Hub</title>\r\n	\r\n	<meta http-equiv=\"content-type\" content=\"application/xhtml+xml; charset=utf-8\" />\r\n	<meta name=\"robots\" content=\"index, follow\" />\r\n	<meta name=\"description\" content=\"<?php //echo ($this->description() != \'\') ? $this->description() : \'Default description goes here\'; ?>\" />\r\n	<meta name=\"keywords\" content=\"<?php //echo ($this->keywords() != \'\') ? $this->keywords() : \'frog cms, silentworks, php, tutorials, articles, tagger, plugins, development\'; ?>\" />\r\n	<meta name=\"author\" content=\"Andrew Smith\" />\r\n	<meta name=\"verify-v1\" content=\"RvXNbY6BgHHDPavFzh4lewddMSqG0aQEhSkf+wALrvc=\" />\r\n	\r\n	<link rel=\"favourites icon\" href=\"<?php echo base_url(); ?>favicon.ico\" />\r\n	<link rel=\"stylesheet\" href=\"<?php echo base_url(); ?>/themes/public/hub/css/screen.css\" type=\"text/css\" media=\"screen, projection\" />\r\n	<link rel=\"stylesheet\" href=\"<?php echo base_url(); ?>/themes/public/hub/css/print.css\" type=\"text/css\" media=\"print\" />\r\n	<!--[if IE]>\r\n	    <link rel=\"stylesheet\" href=\"<?php echo base_url(); ?>/themes/public/hub/css/ie.css\" type=\"text/css\" media=\"screen, projection\" />\r\n	<![endif]-->\r\n	<link rel=\"stylesheet\" href=\"<?php echo base_url(); ?>/themes/public/hub/css/style.css\" type=\"text/css\" media=\"screen, projection\" />\r\n	<link rel=\"alternate\" type=\"application/rss+xml\" title=\"The Hub RSS Feed\" href=\"<?php //echo base_url().(USE_MOD_REWRITE)?\'\':\'/?\'; ?>rss.xml\" />\r\n</head>\r\n	\r\n<body>\r\n	<div class=\"container\">\r\n		<?php //$this->includeSnippet(\'hub_header\'); ?>\r\n		<h1 id=\"about\">About</h1>\r\n		<div id=\"content\" class=\"span-22 last\">\r\n			<?php //if (!url_match(\'/\')): ?>\r\n				<?php //echo $this->breadcrumbs(\'&raquo;\'); ?>\r\n			<?php //endif ?>\r\n			\r\n			<div id=\"content-head\" class=\"last\">\r\n				<div id=\"welcome\" <?php //if($this->hasContent(\'advertisment\')){ echo \'class=\"span-14\"\'; } else { echo \'class=\"span-23 last\"\'; } ?>>\r\n					<?php echo $content; ?>\r\n					\r\n					<?php //if ($this->hasContent(\'extended\')) echo $this->content(\'extended\'); ?>\r\n				</div>\r\n				\r\n				<?php //if ($this->hasContent(\'advertisment\')) : ?>\r\n				<div id=\"advertisment\" class=\"span-8 prefix-1 last\">\r\n					<?php //echo $this->content(\'advertisment\'); ?>\r\n				</div>\r\n				<?php //endif; ?>\r\n			</div>\r\n			\r\n			<div id=\"content-body\" class=\"span-14\">\r\n\r\n				<!-- <div id=\"recent-articles\" class=\"span-8 recent\">\r\n				  <h1 class=\"fancy\">Recent Articles</h1>\r\n				  <?php //$this->includeSnippet(\'article_list\'); ?>\r\n			</div> -->\r\n\r\n				<div id=\"list-all\" class=\"recent\">\r\n				  <?php //$this->includeSnippet(\'list_all\'); ?>\r\n				</div>\r\n				\r\n			</div>\r\n			\r\n			<div id=\"sidebar\" class=\"span-9 last\">\r\n			\r\n				<?php //$this->includeSnippet(\'side_tools\'); ?>\r\n				\r\n				<div id=\"cms-sidebar-content\" class=\"span-5 last recent\">\r\n					<?php //echo $this->content(\'sidebar\', true); ?>\r\n				</div>\r\n				\r\n			</div> <!-- end #sidebar -->\r\n			\r\n			<?php //$this->includeSnippet(\'hub_footer\'); ?>\r\n		</div>\r\n	</div>\r\n	\r\n	<?php //if($_SERVER[\"SERVER_ADDR\"] != \"127.0.0.1\") $this->includeSnippet(\'google_analytics\'); ?>\r\n</body>\r\n</html>','2008-12-30 06:00:39','2008-12-30 06:00:41',1,1);
/*!40000 ALTER TABLE `layout` ENABLE KEYS */;


--
-- Definition of table `layout_category`
--

DROP TABLE IF EXISTS `layout_category`;
CREATE TABLE `layout_category` (
  `layout_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

--
-- Dumping data for table `layout_category`
--

/*!40000 ALTER TABLE `layout_category` DISABLE KEYS */;
INSERT INTO `layout_category` (`layout_id`,`category_id`) VALUES 
 (1,1),
 (2,2),
 (3,1);
/*!40000 ALTER TABLE `layout_category` ENABLE KEYS */;


--
-- Definition of table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `login_attempts`
--

/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;


--
-- Definition of table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE `newsletter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `format` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter`
--

/*!40000 ALTER TABLE `newsletter` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletter` ENABLE KEYS */;


--
-- Definition of table `newsletter_history`
--

DROP TABLE IF EXISTS `newsletter_history`;
CREATE TABLE `newsletter_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `list_id` int(10) unsigned NOT NULL,
  `list_data` text NOT NULL,
  `newsletter_id` int(10) unsigned NOT NULL,
  `newsletter_data` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter_history`
--

/*!40000 ALTER TABLE `newsletter_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletter_history` ENABLE KEYS */;


--
-- Definition of table `newsletter_list`
--

DROP TABLE IF EXISTS `newsletter_list`;
CREATE TABLE `newsletter_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(180) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter_list`
--

/*!40000 ALTER TABLE `newsletter_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletter_list` ENABLE KEYS */;


--
-- Definition of table `page_part`
--

DROP TABLE IF EXISTS `page_part`;
CREATE TABLE `page_part` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `filter_id` varchar(25) DEFAULT NULL,
  `content` longtext,
  `content_html` longtext,
  `page_id` int(11) unsigned DEFAULT NULL,
  `page_type` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_part`
--

/*!40000 ALTER TABLE `page_part` DISABLE KEYS */;
INSERT INTO `page_part` (`id`,`name`,`filter_id`,`content`,`content_html`,`page_id`,`page_type`) VALUES 
 (1,'body',NULL,'Just a test to make sure all works well.','<p>Just a test to make sure all works well.</p>',1,'default'),
 (2,'sidebar',NULL,'This is the sidebar test','<ul>\r\n  <li>This is the sidebar</li>\r\n</ul>',1,'default'),
 (3,'body',NULL,'This is the about us page','<p>This is the about us page.</p>',2,'default');
/*!40000 ALTER TABLE `page_part` ENABLE KEYS */;


--
-- Definition of table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `breadcrumb` varchar(160) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` mediumtext NOT NULL,
  `parent_id` int(11) NOT NULL,
  `layout_id` int(11) NOT NULL,
  `master_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `position` mediumint(11) NOT NULL,
  `permission` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pages`
--

/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`id`,`title`,`slug`,`breadcrumb`,`keywords`,`description`,`content`,`parent_id`,`layout_id`,`master_id`,`status_id`,`created_on`,`updated_on`,`created_by`,`updated_by`,`position`,`permission`) VALUES 
 (1,'Home','home','','','','<p>Flash Web is a free, tableless, W3C-compliant web design layout by Template World. This template has been tested and proven compatible with all major browser environments and operating systems. You are free to modify the design to suit your tastes in any way you like.</p>\r\n				<p>We only ask you to not remove \"Design by Template World\" and the link http://www.templateworld.com from the footer of the template.</p>\r\n			<a href=\"#\" title=\"read more\" class=\"more\">read more</a><br class=\"spacer\" />',0,2,1,1,'2008-12-22 17:00:00','2008-12-22 17:00:00',0,0,0,0),
 (2,'About','about','about','','','<p>Flash Web is a free, tableless, W3C-compliant web design layout by Template World. This template has been tested and proven compatible with all major browser environments and operating systems. You are free to modify the design to suit your tastes in any way you like.</p>',1,2,3,1,'2008-12-26 19:08:44','2008-12-26 19:08:51',1,0,2,1),
 (3,'Us','us','us','','','',2,2,3,1,'2008-12-26 19:08:44','2008-12-26 19:08:51',1,0,2,1);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;


--
-- Definition of table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `data` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `permissions`
--

/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;


--
-- Definition of table `recycles`
--

DROP TABLE IF EXISTS `recycles`;
CREATE TABLE `recycles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `data` text NOT NULL,
  `table` varchar(65) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `recycles`
--

/*!40000 ALTER TABLE `recycles` DISABLE KEYS */;
INSERT INTO `recycles` (`id`,`name`,`data`,`table`,`date`) VALUES 
 (8,'Reeces Invite','O:8:\"stdClass\":4:{s:2:\"id\";s:2:\"17\";s:4:\"name\";s:13:\"Reeces Invite\";s:4:\"file\";s:17:\"reeces_invite.pdf\";s:4:\"type\";s:9:\"documents\";}','files','2009-04-19 00:23:53'),
 (9,'Organic Flower','O:8:\"stdClass\":4:{s:2:\"id\";s:2:\"15\";s:4:\"name\";s:14:\"Organic Flower\";s:4:\"file\";s:21:\"corporate_large16.jpg\";s:4:\"type\";s:6:\"images\";}','files','2009-04-19 00:24:43'),
 (10,'Good Food Logo','O:8:\"stdClass\":4:{s:2:\"id\";s:1:\"9\";s:4:\"name\";s:14:\"Good Food Logo\";s:4:\"file\";s:17:\"1221598066_vm.jpg\";s:4:\"type\";s:6:\"images\";}','files','2009-04-19 00:27:43');
/*!40000 ALTER TABLE `recycles` ENABLE KEYS */;


--
-- Definition of table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `roles`
--

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`,`parent_id`,`name`) VALUES 
 (1,0,0x55736572),
 (2,0,0x41646D696E);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


--
-- Definition of table `snippet`
--

DROP TABLE IF EXISTS `snippet`;
CREATE TABLE `snippet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `content_html` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `snippet`
--

/*!40000 ALTER TABLE `snippet` DISABLE KEYS */;
INSERT INTO `snippet` (`id`,`name`,`content`,`content_html`,`created_on`,`updated_on`,`created_by`,`updated_by`) VALUES 
 (1,'header','<div id=\"header\" class=\"span-24\">\r\n  <div id=\"logo\" class=\"span-10\">\r\n  	<h1><a href=\"<?php base_url(); ?>\">The Hub</a></h1>\r\n  	<div class=\"span-4 last\">it\'s free to think</div>\r\n  </div>\r\n  <div id=\"nav\">\r\n    <ul class=\"tabs\">\r\n      <li><a href=\"<?php echo base_url(); ?>\">home</a></li>\r\n      <li><a href=\"<?php echo site_url(\'about\'); ?>\">about</a></li>\r\n    </ul>\r\n  </div> <!-- end #navigation -->\r\n</div> <!-- end #header -->','<div id=\"header\" class=\"span-24\">\r\n  <div id=\"logo\" class=\"span-10\">\r\n  	<h1><a href=\"<?php base_url(); ?>\">The Hub</a></h1>\r\n  	<div class=\"span-4 last\">it\'s free to think</div>\r\n  </div>\r\n  <div id=\"nav\">\r\n    <ul class=\"tabs\">\r\n      <li><a href=\"<?php echo base_url(); ?>\">home</a></li>\r\n      <li><a href=\"<?php echo site_url(\'about\'); ?>\">about</a></li>\r\n    </ul>\r\n  </div> <!-- end #navigation -->\r\n</div> <!-- end #header -->','2008-12-30 06:05:02','2008-12-30 06:05:04',1,1),
 (2,'footer','<div id=\"footer\" class=\"span-22 last\">\r\n	<div id=\"site-links\" class=\"span-7 site\">\r\n		<h3>Friends</h3>\r\n		<ul>\r\n			<li><a href=\"http://www.reecesflavours.com\" target=\"_blank\">Reece\'s Flavour\'s</a></li>\r\n			<li><a href=\"http://www.lightfoot-media.com\" target=\"_blank\">Lightfoot Media</a></li>\r\n			<li><a href=\"http://www.zionworks.co.uk\" target=\"_blank\">Zionworks</a></li>\r\n		</ul>\r\n		<ul>\r\n			<li><a href=\"http://www.madebyfrog.com\" target=\"_blank\">Frog CMS</a></li>\r\n			<li><a href=\"http://www.tbeckett.net\" target=\"_blank\">Tyler\'s Site</a></li>\r\n			<li><a href=\"http://www.freelancetheworkspace.com\" target=\"_blank\">FTW</a></li>\r\n		</ul>\r\n	</div>\r\n	<div id=\"site-related\" class=\"span-7 site\">\r\n		<h3>Useful Sites</h3>\r\n		<ul>\r\n			<li><a href=\"http://www.freelanceswitch.com\" target=\"_blank\">FreelanceSwitch</a></li>\r\n			<li><a href=\"http://www.webdesignerwall.com\" target=\"_blank\">Web Designer Wall</a></li>\r\n			<li><a href=\"http://patterntap.com\" target=\"_blank\">Pattern Tap</a></li>\r\n		</ul>\r\n	</div>\r\n	<div id=\"site-inner\" class=\"span-9 last site\">\r\n		<a href=\"http://www.silentworks.co.uk\" target=\"_blank\" title=\"Silent Works\"><img src=\"/public/images/silentworks.gif\" alt=\"Silent Works\" /></a>\r\n		<a href=\"http://www.billingcart.com\" target=\"_blank\" title=\"Billing Cart - easy way to billing\"><img src=\"/public/images/billingcart.gif\" alt=\"Billing Cart - easy way to billing\" /></a>\r\n	</div>\r\n	<p id=\"copyright\">\r\n		<span>&copy; Copyright <?php echo date(\'Y\'); ?> The Hub, a part of the Silent Works network.</span>\r\n	  	<span class=\"powered\">Built on <a href=\"http://www.madebyfrog.com/\" title=\"Frog CMS\" target=\"_blank\">Frog CMS</a>.</span>\r\n	</p>\r\n</div><!-- end #footer -->','<div id=\"footer\" class=\"span-22 last\">\r\n	<div id=\"site-links\" class=\"span-7 site\">\r\n		<h3>Friends</h3>\r\n		<ul>\r\n			<li><a href=\"http://www.reecesflavours.com\" target=\"_blank\">Reece\'s Flavour\'s</a></li>\r\n			<li><a href=\"http://www.lightfoot-media.com\" target=\"_blank\">Lightfoot Media</a></li>\r\n			<li><a href=\"http://www.zionworks.co.uk\" target=\"_blank\">Zionworks</a></li>\r\n		</ul>\r\n		<ul>\r\n			<li><a href=\"http://www.madebyfrog.com\" target=\"_blank\">Frog CMS</a></li>\r\n			<li><a href=\"http://www.tbeckett.net\" target=\"_blank\">Tyler\'s Site</a></li>\r\n			<li><a href=\"http://www.freelancetheworkspace.com\" target=\"_blank\">FTW</a></li>\r\n		</ul>\r\n	</div>\r\n	<div id=\"site-related\" class=\"span-7 site\">\r\n		<h3>Useful Sites</h3>\r\n		<ul>\r\n			<li><a href=\"http://www.freelanceswitch.com\" target=\"_blank\">FreelanceSwitch</a></li>\r\n			<li><a href=\"http://www.webdesignerwall.com\" target=\"_blank\">Web Designer Wall</a></li>\r\n			<li><a href=\"http://patterntap.com\" target=\"_blank\">Pattern Tap</a></li>\r\n		</ul>\r\n	</div>\r\n	<div id=\"site-inner\" class=\"span-9 last site\">\r\n		<a href=\"http://www.silentworks.co.uk\" target=\"_blank\" title=\"Silent Works\"><img src=\"/public/images/silentworks.gif\" alt=\"Silent Works\" /></a>\r\n		<a href=\"http://www.billingcart.com\" target=\"_blank\" title=\"Billing Cart - easy way to billing\"><img src=\"/public/images/billingcart.gif\" alt=\"Billing Cart - easy way to billing\" /></a>\r\n	</div>\r\n	<p id=\"copyright\">\r\n		<span>&copy; Copyright <?php echo date(\'Y\'); ?> The Hub, a part of the Silent Works network.</span>\r\n	  	<span class=\"powered\">Built on <a href=\"http://www.vaspasiancms.com/\" title=\"Vaspasian CMS\" target=\"_blank\">Vaspasian CMS</a>.</span>\r\n	</p>\r\n</div><!-- end #footer -->','2008-12-31 11:20:42','2008-12-31 11:20:46',1,1),
 (3,'test','<strong><?php echo $var[\'body\'][\'content_html\'] ?></strong>\r\n<p><?php echo $var[\'sidebar\'][\'content_html\'] ?></p>','<strong><?php echo $var[\'body\'][\'content_html\'] ?></strong>\r\n<p><?php echo $var[\'sidebar\'][\'content_html\'] ?></p>','2008-12-31 11:26:44','0000-00-00 00:00:00',1,0);
/*!40000 ALTER TABLE `snippet` ENABLE KEYS */;


--
-- Definition of table `themes`
--

DROP TABLE IF EXISTS `themes`;
CREATE TABLE `themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `is_default` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `is_default` (`is_default`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes`
--

/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
INSERT INTO `themes` (`id`,`name`,`is_default`) VALUES 
 (1,'sw_new_dawn',1);
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;


--
-- Definition of table `user_autologin`
--

DROP TABLE IF EXISTS `user_autologin`;
CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` mediumint(8) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_autologin`
--

/*!40000 ALTER TABLE `user_autologin` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_autologin` ENABLE KEYS */;


--
-- Definition of table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_profile`
--

/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
INSERT INTO `user_profile` (`id`,`user_id`,`country`,`website`) VALUES 
 (1,1,NULL,NULL);
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;


--
-- Definition of table `user_temp`
--

DROP TABLE IF EXISTS `user_temp`;
CREATE TABLE `user_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(34) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activation_key` varchar(50) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_temp`
--

/*!40000 ALTER TABLE `user_temp` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_temp` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `username` varchar(25) COLLATE utf8_bin NOT NULL,
  `password` varchar(34) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `newpass` varchar(34) COLLATE utf8_bin DEFAULT NULL,
  `newpass_key` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `newpass_time` datetime DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`role_id`,`username`,`password`,`email`,`banned`,`ban_reason`,`newpass`,`newpass_key`,`newpass_time`,`last_ip`,`last_login`,`created`,`modified`) VALUES 
 (1,2,0x61646D696E,0x2431246937352E446F342E24524F50525A6A5A7A44782F4A6A71655674614A4C572E,0x61646D696E406C6F63616C686F73742E636F6D,0,NULL,NULL,NULL,NULL,0x3132372E302E302E31,'2008-11-30 04:56:38','2008-11-30 04:56:32','2008-11-30 04:56:38'),
 (2,1,0x75736572,0x243124624F2E2E4952342E2443786A4A426A4B4A355157322F4261594B445337662E,0x75736572406C6F63616C686F73742E636F6D,0,NULL,NULL,NULL,NULL,0x3132372E302E302E31,'2008-12-01 14:04:14','2008-12-01 14:01:53','2008-12-01 14:04:14');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
