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
	function vasp_navi()
	{
		$CI =& get_instance();
		$pages = $CI->pages->find_all();
		
		$nav = array();
		
		foreach($pages as $page) {
			$nav['title'] .= $page->title;
			$nav['slug'] .= $page->slug;
			$nav['parent'] .= $page->parent_id;
		}
		
		return $nav;
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