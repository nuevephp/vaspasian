<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Layout Class
 *
 * Setup the views for each module
 *
 * @license 	MIT Licence
 * @category	Libraries
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		28 Apr 2009
 */
class Layout
{
	public function __construct() {
		$this->CI =& get_instance();
	}
	
	public function load($data, $view)
	{
		$breadcrumb = array();
		
		if (empty($data['breadcrumb'])) $data['breadcrumb'] = array();
		
		if ($data['module'] != 'page')
		{
			$breadcrumb[] = array(
								'title' => ucwords($data['module']),
								'uri'	=> $data['module']
							);
		}
						
		$data['breadcrumb'] = array_merge($breadcrumb, $data['breadcrumb']);
		
		$data['view'] = $view;
		
		if ((isset($data['admin']) && $data['admin'] == true) || $data['module'] == 'admin')
		{
			$template_path = 'admin/index';
		}
		else
		{
			$template_path = '../../themes/' . theme_name() . '/index';
		}
		
		switch ($data['module']) {
			case 'admin':
				$set_view = 'admin/' . $data['view'];
				break;
			case 'public':
				$set_view = '../../themes/' . theme_name() . '/' . $data['view'];
				break;
			default:
				$set_view = '../../modules/'. $data['module'] .'/views/'. $data['view'];
				break;
		}
		
		$data['content_for_layout'] = $this->CI->load->view($set_view, $data, true);
		
		$output = $this->CI->load->view($template_path, $data, true);
		
		$here = substr($this->CI->uri->uri_string(), 1);
		
		$this->CI->session->set_userdata(array('last_uri' => $here));
		
		$this->CI->output->set_output($output);
	}
}
/* End of file Layout.php */
/* Location: ./cms/libraries/Layout.php */