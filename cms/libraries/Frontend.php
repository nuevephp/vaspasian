<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Frontend Class
 *
 * Controls every request made to a page on website
 *
 * @license 	MIT Licence
 * @category	Libraries
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		11 Apr 2009
 */
class Frontend extends Automagic
{
    
	function __construct() {
		parent::__construct();
		
		// Profiler
		// $this->output->enable_profiler(TRUE);
		
		// Load Models
		/*$this->load->model('page_model');
		$this->load->model('page_part_model');
		$this->load->model('layout_model');
		$this->load->model('snippet_model');
		
		// Load Helpers
		$this->load->helper('page');*/
		
		// Load Plugins
		
		
		// Build Routes
		//$this->alias->build_routes();
	}
}
/* End of file Frontend.php */
/* Location: ./application/libraries/Frontend.php */