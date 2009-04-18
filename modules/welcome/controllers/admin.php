<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Welcome Class
 *
 * Welcome module Welcome interface
 *
 * @license 	MIT Licence
 * @category	Modules
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		17 Apr 2009
 */
class Admin extends Vaspasian
{
	var $model_name = FALSE;
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
        // Page title
		$this->view_data['title'] = 'Admin | Welcome';
		// Content
		$this->view_data['page_title'] = 'Welcome';
        
        $this->view_data['pagename'] = "Admin";
        $this->view = 'admin/index';
	}
}
/* End of file Welcome.php */
/* Location: /cygdrive/c/projects/dev/vaspasiancms/modules/welcome/controllers/Welcome.php */