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
	}
	
	public function index() {
		$this->template['page_title'] = 'Dashboard';
		$this->layout->load($this->template,'frontdesk/main');
	}
}
/* End of file admin.php */
/* Location: ./cms/controllers/admin.php */