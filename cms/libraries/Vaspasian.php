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
		// $this->output->enable_profiler(TRUE);
		
		// Load Configuration
		$this->config->load('vaspasian');
		
		// Load Helpers
		$this->load->helper('admin');
		
		// Set Master view variables
		$this->template['site_name'] = 'Vaspasian';
		$this->template['system_name'] = 'Vaspasian'; // System Name
		$this->template['system_version'] = $this->config->item('vasp_version'); // System Version
		
		// System Configurations
		define('WEBROOT', $this->config->item('webroot')); // Set website root
		$this->public_folder = $this->config->item('public_folder');
		
	}
	
	/**
	 * Send information to Recycle Bin
	 */
	public function recycle($name, $data, $type) {
		// Store information into Recycle Bin Table
		$recycle['name'] = $name;
		$recycle['data'] = serialize($data);
		$recycle['table'] = $type;
		$recycle['date'] = date('Y-m-d H:i:s');
		
		return $this->recycles->save($recycle);
	}
}
/* End of file Vaspasian.php */
/* Location: ./cms/libraries/controllers/Vaspasian.php */