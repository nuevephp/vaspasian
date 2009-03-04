<?php defined('BASEPATH') or die('No direct script access.');
/*
 * Created on 26 Dec 2008
 * by Andrew Smith <a.smith@silentworks.co.uk>
 */

/**
 *
 */
class Frontend extends Controller
{
	function __construct() {
		parent::__construct();
		
		// Profiler
		// $this->output->enable_profiler(TRUE);
		
		// Load Models
		$this->load->model('page_model');
		$this->load->model('page_part_model');
		$this->load->model('layout_model');
		$this->load->model('snippet_model');
		
		// Load Helpers
		$this->load->helper('page');
		
		
		// Load Plugins
		
	}
}
/* End of file Frontend.php */
/* Location: ./application/libraries/Frontend.php */