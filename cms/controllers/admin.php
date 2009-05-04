<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Admin Class
 *
 * Controls the CMS Authorization and Authentication.
 *
 * @license 	MIT Licence
 * @category	Controllers
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		23 Apr 2009
 */
class Admin extends Controller
{	
	public function __construct() {
		parent::__construct();
		
		// Load Helper
		$this->load->helper('admin');
		
		// Set module name
		$this->template['module'] = 'admin';
		
		// Load Configuration
		$this->config->load('vaspasian');
		
		// Load Helpers
		$this->load->helper('admin');
		
		// Set Master view variables
		$this->template['site_name'] = 'Vaspasian';
		$this->template['system_name'] = 'Vaspasian'; // System Name
		$this->template['system_version'] = $this->config->item('vasp_version'); // System Version
		
		// System Configurations
		define('WEBROOT', $this->config->item('webroot')); // Set website root
		$this->public_folder = $this->config->item('public_folder');
	}
	
	public function index() {
		
		// Page title
		$this->template['title'] = 'Dashboard';
		$this->template['page_title'] = 'Dashboard';
		
		$this->layout->load($this->template,'frontdesk/main');
	}
}
/* End of file admin.php */
/* Location: ./cms/controllers/admin.php */