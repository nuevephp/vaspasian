<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Setting Class
 *
 * Backend and frontend settings controller
 *
 * @license 	MIT Licence
 * @category	Controllers
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		02 May 2009
 */
class Setting extends Vaspasian
{
	public function __construct() {
		parent::__construct();
		
		// Set mode and module name
	    $this->template['admin'] = true;
	    $this->template['module'] = 'admin';
	}
	
	public function index() {
		// Page title
		$this->template['title'] = 'Settings';
		$this->template['page_title'] = 'Settings';
		
		// View to load
        $view = 'setting/index';
		
		$this->layout->load($this->template, $view);
	}
}
/* End of file setting.php */
/* Location: ./cms/controllers/setting.php */