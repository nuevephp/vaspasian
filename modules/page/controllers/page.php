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
	
	public function index() {
		$uri_slug = array();
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
			$new_uri = array_reverse(explode('/', substr($built_uri, 0, $new_length)));
			
			if (count($new_uri) > 1) {
				$uri_slug['parent'] = $new_uri[1];
				$uri_slug['child'] = $new_uri[0];
			} else {
				$uri_slug['parent'] = $new_uri[0];
			}
		}
		else
		{
			$uri_slug['parent'] = 'home';
		}
		
		if($content = $this->pages->find_page($uri_slug)) {
			$this->set('page_title', $content->title);
			$this->set('slug', $content->slug);
			$this->set('content', $content->content);
			$this->render(theme_name() . '/page/index');
		} else {
			show_404();
		}
	}
}
/* End of file page.php */
/* Location: ./cms/controllers/page.php */