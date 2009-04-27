<?php defined('BASEPATH') or die('No direct script access.');
/*
 * Created on 23 Dec 2008
 * by Andrew Smith <a.smith@silentworks.co.uk>
 */
class Layout extends Controller
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
		
		log_message('debug', "Layout Class Initialized");
	}
	
	public function set($name, $value)
	{
		$this->data[$name] = $value;
	}
	
	public function render($view = '' , $view_data = FALSE, $return = FALSE, $output = FALSE)
	{
		if($view !== ''){
			$this->data['content_for_layout'] = $this->load->view('../../themes/' . $view . VIEW_EXT, $view_data, TRUE);			
		}
		$view = $this->load->view('../../themes/' . $this->master . VIEW_EXT, $this->data, $return);
		
		if ($output) { echo $view; }
        else { return $view; }
	}
}
/* End of file Templex.php */
/* Location: ./application/libraries/Layout.php */