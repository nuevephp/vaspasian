<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Recycles Class
 *
 * We will store all deleted items here until the user decides to remove it completely.
 *
 * @license 	MIT Licence
 * @category	Models
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		16 Apr 2009
 */
class Recycles extends Vaspasian_Model
{
    public function restore($table, $data) {
		return $this->db->insert($table, $data);
	}
}
/* End of file recycles.php */
/* Location: ./cms/models/recycles.php */