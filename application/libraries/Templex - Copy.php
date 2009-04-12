<?php defined('BASEPATH') or die('No direct script access.');
/*
 * Created on 23 Dec 2008
 * by Andrew Smith <a.smith@silentworks.co.uk>
 */

/**
 *
 */
class Templex
{
	// Default template file
	public $template;
	
	// Template data
	var $data = array();
	
	/**
	 *
	 */
	public function __construct($template = 'template')
	{
		$this->CI =& get_instance();
		
		$this->template($template);
		
		log_message('debug', "Templex Class Initialized");
	}
	
	/**
	 * Set the template to load
	 */
	public function template($template)
	{
		$this->template = $template;
	}
	
	/**
	 * Set variable name and value
	 */
	public function set($name, $value)
	{
		$this->data[$name] = $value;
	}
	
	/**
	 *
	 */
	public function render($view = '' , $view_data = array(), $parser = '', $return = FALSE, $output = FALSE)
	{
		switch ($parser) {
			case 'parser':
				// Load CI Template Parser Library
				$this->CI->load->library('parser');
				if($view !== ''){
					$this->set('content', $this->CI->parser->parse($view, $view_data, TRUE));			
				}
				$view = $this->CI->parser->parse($this->template, $this->data, $return);
			break;
			default:
				if($view !== ''){
					$this->set('content', $this->CI->load->view($view, $view_data, TRUE));			
				}
				$view = $this->CI->load->view($this->template, $this->data, $return);
			break;
		}
		
		if ($output)
        {
        	echo $view;
        }
        else
        {
            return $view;
        }
	}
}
/* End of file Templex.php */
/* Location: ./application/libraries/Templex.php */