<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Pages Class
 *
 * Pages Management Database class
 *
 * @license 	MIT Licence
 * @category	Models
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		16 Apr 2009
 */
class Pages extends Vaspasian_Model
{	
	public function has_children($id) {
		return $this->db->where('parent_id', $id)->count_all_results($this->table);
	}
}
/* End of file Pages.php */
/* Location: ./cms/models/Pages.php */