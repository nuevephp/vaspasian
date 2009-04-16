<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter URL Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/url_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Snippet
 *
 * Create a local URL based on your basepath. Segments can be passed via the
 * first parameter either as a string or an array.
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('snippet'))
{
	function snippet($name = '')
	{
		$file = SNIPPET_PATH . $name . '.php';
		
		if(file_exists($file)){
			include_once($file);
		} else {
			$CI =& get_instance();
		
			// Load Snippet Model
			$CI->load->model('snippet_model');
			$snippets = $CI->snippet_model->find_all();
		
			// Load Page Parts into a array
			foreach($snippets as $snippet)
			{
				$data[$snippet->name] = (array)$snippet;
			}
			
			// Create file for the next time it loads
			if (file_put_contents($file, $data[$name]['content_html']) !== false)
	        {
	            chmod($file, FILE_READ_MODE);
	        }
	        else
	        {
	            $this->session->set_flashdata('error', 'File' . $name . ' has not been created!');
	        }
			
			// Output information from database.
			eval('?>'.$data[$name]['content_html']);
		}
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