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
class Frontend extends Layout
{
	var $master_view_module = 'themes';
	
	function __construct() {
		parent::__construct();
		
		// Profiler
		$this->output->enable_profiler(TRUE);
		
		// Load Models
		$this->load->model('pages');
		
		// Load Helpers
		$this->load->helper('page');
		$this->load->helper('themes');
		
		// Load Plugins
		
		
		// Setup Templex
		$this->master = theme_name() . '/master';
		
		// Navigation
		$this->set('navigation', $this->load->view(theme_name() . '/components/navigation', FALSE, TRUE, 'themes'));
		
		// Build Routes
		//$this->alias->build_routes();
	}
}
/* End of file Frontend.php */
/* Location: ./application/libraries/Frontend.php */