<?php defined('BASEPATH') or die('No direct script access.');
/*
 * Created on 23 Dec 2008
 * by Andrew Smith <a.smith@silentworks.co.uk>
 */
class Templex
{   
	// Default template file
	var $master;
    var $master_view_module = '';
	
	// Template data
	var $data = array();
	
	public function __construct($view = '')
	{
		parent::__construct();
		
		if($view !== '') $this->template($view);
		if($this->master_view_module === '') $this->master_view_module = current(explode('/', $this->master));
		
		log_message('debug', "Templex Class Initialized");
	}
	
	public function set($name, $value)
	{
		$this->data[$name] = $value;
	}
	
	public function render($view = '' , $view_data = FALSE, $parser = '', $return = FALSE, $output = FALSE)
	{
		switch ($parser) {
			case 'parser':
				// Load CI Template Parser Library
				$this->load->library('parser');
				if($view !== ''){
					$this->set('content_for_layout', $this->CI->parser->parse($view . VIEW_EXT, $view_data, TRUE));			
				}
				$view = $this->CI->parser->parse($this->master . VIEW_EXT, $this->data, $return, $this->master_view_module);
			break;
			default:
				if($view !== ''){
					$this->set('content_for_layout', $this->CI->load->view($view . VIEW_EXT, $view_data, TRUE));			
				}
				$view = $this->CI->load->view($this->master . VIEW_EXT, $this->data, $return, $this->master_view_module);
			break;
		}
		
		if ($output) { echo $view; }
        else { return $view; }
	}
}
/* End of file Templex.php */
/* Location: ./application/libraries/Templex.php */