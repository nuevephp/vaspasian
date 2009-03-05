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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

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
 (9,'Good Food Logo','1221598066_vm.jpg','images'),
 (10,'Web Team Minutes 1','WebsiteTeam1.doc','documents'),
 (11,'Francis Adjei 15','15_-_Track_15.mp3','audio'),
 (12,'Francis Adjei 10','10_-_Track_10.mp3','audio'),
 (13,'Animatic','animatic.flv','video'),
 (14,'Flower','event1.jpg','images'),
 (15,'Organic Flower','corporate_large16.jpg','images'),
 (17,'Reeces Invite','reeces_invite.pdf','documents'),
 (18,'James','00715.jpg','images'),
 (21,'Test','BLOG_EXAMPLE.jpg','images');
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
-- Definition of table `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `breadcrumb` varchar(160) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` text NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `page`
--

/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` (`id`,`title`,`slug`,`breadcrumb`,`keywords`,`description`,`parent_id`,`layout_id`,`master_id`,`status_id`,`created_on`,`updated_on`,`created_by`,`updated_by`,`position`,`permission`) VALUES 
 (1,'Home','home','','','',0,2,1,1,'2008-12-22 17:00:00','2008-12-22 17:00:00',0,0,0,0),
 (2,'About','about','about','','',1,2,3,1,'2008-12-26 19:08:44','2008-12-26 19:08:51',1,0,2,1);
/*!40000 ALTER TABLE `page` ENABLE KEYS */;


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
-- Definition of table `recycle`
--

DROP TABLE IF EXISTS `recycle`;
CREATE TABLE `recycle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `data` text NOT NULL,
  `table` varchar(65) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recycle`
--

/*!40000 ALTER TABLE `recycle` DISABLE KEYS */;
INSERT INTO `recycle` (`id`,`name`,`data`,`table`,`date`) VALUES 
 (1,'James','O:8:\"stdClass\":4:{s:2:\"id\";s:2:\"20\";s:4:\"name\";s:5:\"James\";s:4:\"file\";s:9:\"00717.jpg\";s:4:\"type\";s:6:\"images\";}','files','2008-12-23 16:26:32'),
 (4,'James','O:8:\"stdClass\":4:{s:2:\"id\";s:2:\"19\";s:4:\"name\";s:5:\"James\";s:4:\"file\";s:9:\"00716.jpg\";s:4:\"type\";s:6:\"images\";}','files','2008-12-23 20:20:21');
/*!40000 ALTER TABLE `recycle` ENABLE KEYS */;


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
 (1,'clean',1);
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
