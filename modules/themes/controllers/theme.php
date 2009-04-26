<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Theme Class
 *
 * Description of class
 *
 * @license 	MIT Licence
 * @category	Models
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		25 Apr 2009
 */
class Theme extends Vaspasian
{
	public function __construct() {
		parent::__construct();
		$this->load->helper('themes');
	}
	
	public function default_theme() {
		return theme_directory();
	}
	
	public function default_theme_name() {
		return theme_name();
	}
}
/* End of file theme.php */
/* Location: /cygdrive/c/projects/dev/vaspasiancms/modules/themes/controllers/theme.php */