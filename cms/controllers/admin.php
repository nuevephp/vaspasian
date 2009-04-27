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
		
		// Setup Templex
		$this->templex = new Templex;
		$this->templex->master = 'master/simplelook';
	}
	
	public function index() {
		
	}
}
/* End of file admin.php */
/* Location: ./cms/controllers/admin.php */