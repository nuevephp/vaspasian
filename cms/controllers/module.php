<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Module Class
 *
 * Load and initalize modules
 *
 * @license 	MIT Licence
 * @category	Controllers
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		24 Apr 2009
 */
class Module extends Controller
{
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->get_details();
	}
	
	public function get_details() {
		/*
		Check if all physical modules are installed
		*/
		$handle = opendir(MODPATH);

		if ($handle)
		{
			while ( false !== ($module = readdir($handle)) )
			{
				// make sure we don't map silly dirs like .svn, or . or ..
				if ( (substr($module, 0, 1) != ".") && file_exists($module_details = MODPATH .'/'. $module . '/details.xml') )
				{
					$this->load_xml($module_details);
				}
			}
		}
	}
	
	public function load_xml($xml) {
		$xml = simplexml_load_file($xml);
		var_dump($xml);
	}
	public function install() {
		
	}
	
	public function uninstall() {
		
	}
}
/* End of file module.php */
/* Location: /cygdrive/c/projects/dev/vaspasiancms/cms/controllers/module.php */