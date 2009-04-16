<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Page Class
 *
 * This controls all pages that gets loaded and can be extended.
 *
 * @licence 	MIT Licence
 * @category	Controllers
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @date		25 Mar 2009
 */
class Page extends Frontend
{
	var $master = 'page/master';
	// var $layout = FALSE;
	var $model_name = FALSE;
	
	public function __construct() {
		parent::__construct();
		
		$this->view_data['cmsname'] = $this->cmsname();
	}
	
	public function index() {
		
	}
	
	public static function cmsname() {
		return "Vaspasian CMS";
	}
}
/* End of file page.php */
/* Location: ./cms/controllers/page.php */