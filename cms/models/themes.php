<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Themes Class
 *
 * Loads up all the information for themes
 *
 * @license 	MIT Licence
 * @category	Models
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		25 Apr 2009
 */
class Themes extends Vaspasian_Model
{
	public function current() {
		$theme = $this->db->getwhere($this->table, array('is_default' => 1))->row();
		return $theme;
	}
}
/* End of file themes.php */
/* Location: ./cms/models/themes.php */