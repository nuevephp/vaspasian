<?php defined('BASEPATH') or die('No direct script access.');
/*
 * Created on 24 Dec 2008
 * by Andrew Smith <a.smith@silentworks.co.uk>
 */

/**
 * Vaspasian Master Controller
 * Loads all settings
 */
class Vaspasian extends Controller
{
	function __construct() {
		parent::__construct();
		
		// Profiler
		//$this->output->enable_profiler(TRUE);
		
		// Load Configuration
		$this->config->load('vaspasian');
		
		// Load Helpers
		$this->load->helper('admin');
		
		// Set Master Template using Templex
		$this->templex = new Templex('admin/master/simplelook');
		$this->templex->set('site_name', 'Vaspasian');
		$this->templex->set('system_name', 'Vaspasian'); // System Name
		$this->templex->set('system_version', $this->config->item('vasp_version')); // System Version
		
		// System Configurations
		define('WEBROOT', $this->config->item('webroot')); // Set website root
		$this->public_folder = $this->config->item('public_folder');
		
	}
	
	/**
	 * Send information to Recycle Bin
	 */
	public function recycle($name, $data, $type)
	{
		$this->load->model('recycle_model');
		
		// Store information into Recycle Bin Table
		$recycle['name'] = $name;
		$recycle['data'] = serialize($data);
		$recycle['table'] = $type;
		$recycle['date'] = date('Y-m-d H:i:s');
		
		return $this->recycle_model->save($recycle);
	}
}
/* End of file Vaspasian.php */
/* Location: ./application/libraries/controllers/Vaspasian.php */