<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('theme_block'))
{
	function theme_block($name = '')
	{
		$file = THEME_PATH . theme_name() .'/'. $name . EXT;
		if(file_exists($file)){
			include_once($file);
		}
	}
}

if ( ! function_exists('vasp_navi'))
{
	function vasp_navi($selectedclass = 'current')
	{
		$CI =& get_instance();
		$pages = $CI->pages->find_all(array('status_id' => 100));
		
		// Initialize variables
		$navi = array();
		$i = 1;
		
		foreach($pages as $index => $page) {
			// Full Url
			$full_url = site_url($page['slug']);
			
			$navi[$index]['id'] = $page['id'];
			$navi[$index]['title'] = $page['title'];
			$navi[$index]['slug'] = $page['slug'];
			$navi[$index]['url'] = $full_url;
			$navi[$index]['parent'] = $page['parent_id'];
			$navi[$index]['cssmode'] = "";
			
			$first_item = $i === 1;
			$current_item = $full_url === current_url();
			$last_item = $i === (count($pages));
			
			if(!$current_item && $first_item) { $navi[$index]['cssmode'] .= "first"; }
			if($current_item && $first_item) { $navi[$index]['cssmode'] .= "first " . $selectedclass; }
			if($current_item && $last_item) { $navi[$index]['cssmode'] .= "last " . $selectedclass; }
			if(!$current_item && $last_item) { $navi[$index]['cssmode'] .= "last"; }
			if($current_item && !$first_item && !$last_item) { $navi[$index]['cssmode'] .= $selectedclass; }
			
			$i++;
		}
		
		return $navi;
	}
}

if ( ! function_exists('vasp_breadcrumbs'))
{
	function vasp_breadcrumbs($trail_delimeter = '&raquo;', $open_tag = '<p>', $close_tag = '</p>')
	{
		$CI =& get_instance();
	    $CI->load->helper('inflector');
	    
	    $breadcrumbs = array();
	
	    if(count($breadcrumbs) == 0) {
	
	    	$url_parts = array();
	    	$segment = $CI->uri->segment_array();
	    	$last_segment = array_pop($segment);
	    	foreach($segment as $url_ref) {
	    		
	    		// Skip if we already have this breadcrumb and its not admin
	    		//if(in_array($url_ref, $url_parts) or $url_ref == 'admin') continue;
	
	    		$url_parts[] = $url_ref;
	    		$breadcrumbs[] = array('name'=>humanize(str_replace('-', ' ', $url_ref)), 'url'=>implode('/', $url_parts), 'current_page' => FALSE );
	    	}
	    	
	    	$url_parts[] = $last_segment;
	    	$breadcrumbs[] = array('name'=>humanize(str_replace('-', ' ', $last_segment)), 'url'=>implode('/', $url_parts), 'current_page' => TRUE );
	    }
	    
	    // Build HTML to output
	    $html = $open_tag . '<a href="'. site_url('home') .'">Home</a> ';
				foreach($breadcrumbs as $breadcrumb){
					if(!$breadcrumb['current_page']){
						$html .= $trail_delimeter . ' ' .'<a href="'. site_url($breadcrumb['url']) .'">'. $breadcrumb['name'] .'</a> ';
					} elseif(current_url() === site_url('home') || uri_string() === ''){
						$html .= '';
					} else {
						$html .= $trail_delimeter . ' ' . $breadcrumb['name'];
					}
				}
		$html .= $close_tag;
	    
	    echo $html;
	}
}

// ------------------------------------------------------------------------

/**
 * Content
 *
 * Returns the "base_url" item from your config file
 *
 * @access	public
 * @return	string
 */
if ( ! function_exists('content'))
{
	function content($part_name = 'body', $page = FALSE, $html = TRUE)
	{
		$CI =& get_instance();
		
		// Load Snippet Model
		$CI->load->model('page_model');
		$CI->load->model('page_part_model');
		
		// Check if the page param is set
		if ($CI->uri->segment(1))
		{
			$num = 1;
			$current_uri = '';
			
			while ($segment = $CI->uri->segment($num))
			{
				$current_uri .= $segment.'/';
				$num++;
			}
			
			$new_length = strlen($current_uri) - 1;
			$current_uri = substr($current_uri, 0, $new_length);
		}
		else
		{
			$current_uri = 'home';
		}
		
		// Get the page we are looking for.
		$page_lookup = $page ? $page : $current_uri;
		
		// Find page in DB
		$get_page = $CI->page_model->find_by_slug($page_lookup);
		
		// Load page parts by page id
		$parts = $CI->page_part_model->find_all(array('page_id' => $get_page->id));
		
		// Content Type
		$content_type = $html ? 'content_html' : 'content';
		
		foreach($parts as $part)
			$data[$part->name] = (array)$part;
		
		return $data[$part_name][$content_type];
	}
}

// ------------------------------------------------------------------------

/**
 * Current URL
 *
 * Returns the full URL (including segments) of the page where this 
 * function is placed
 *
 * @access	public
 * @return	string
 */
if ( ! function_exists('front_current_url'))
{
	function front_current_url()
	{
		$CI =& get_instance();
		return substr($CI->config->site_url($CI->uri->uri_string()), 0, -6);
	}
}

// ------------------------------------------------------------------------

/**
 * Parse out the attributes
 *
 * Some of the functions use this
 *
 * @access	private
 * @param	array
 * @param	bool
 * @return	string
 */
if ( ! function_exists('_parse_attributes'))
{
	function _parse_attributes($attributes, $javascript = FALSE)
	{
		if (is_string($attributes))
		{
			return ($attributes != '') ? ' '.$attributes : '';
		}

		$att = '';
		foreach ($attributes as $key => $val)
		{
			if ($javascript == TRUE)
			{
				$att .= $key . '=' . $val . ',';
			}
			else
			{
				$att .= ' ' . $key . '="' . $val . '"';
			}
		}

		if ($javascript == TRUE AND $att != '')
		{
			$att = substr($att, 0, -1);
		}

		return $att;
	}
}


/* End of file url_helper.php */
/* Location: ./system/helpers/url_helper.php */