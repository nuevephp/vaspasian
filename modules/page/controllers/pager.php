<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Pager Class
 *
 * This controls all pages that gets loaded and can be extended.
 *
 * @licence 	MIT Licence
 * @category	Controllers
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @date		25 Mar 2009
 */
class Pager extends Page
{
	public function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		// Set Master Template using Templex
		$this->templex->set('cmsname', 'Pager Class');
	}
}
/* End of file page.php */
/* Location: ./application/controllers/pager.php */