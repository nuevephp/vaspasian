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
	public function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		$this->templex->set('cmsname', $this->cmsname());
		$this->templex->set('classname', 'Page');
	}
	
	public static function cmsname()
	{
		return "Vaspasian CMS";
	}
}
/* End of file page.php */
/* Location: ./application/controllers/page.php */