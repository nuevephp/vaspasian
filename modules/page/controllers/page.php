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
	// var $layout = FALSE;
	var $model_name = FALSE;
	
	public function __construct() {
		parent::__construct();
		
		$this->view_data['cmsname'] = $this->cmsname();
	}
	
	public function index() {
		if ( $this->uri->segment(1) )
		{
			$num = 1;
			$built_uri = '';
			
			while ( $segment = $this->uri->segment($num))
			{
				$built_uri .= $segment.'/';
				$num++;
			}
			
			$new_length = strlen($built_uri) - 1;
			$built_uri = substr($built_uri, 0, $new_length);
		}
		else
		{
			$built_uri = 'home';
		}
		
		$content = $this->pages->find_page($built_uri);
		
		$this->templex->set('page_title', $content->title);
		$this->templex->set('slug', $content->slug);
		
		$this->templex->render('page/index');
	}
	
	public static function cmsname() {
		return "Vaspasian CMS";
	}
}
/* End of file page.php */
/* Location: ./cms/controllers/page.php */