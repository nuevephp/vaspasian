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
 * @date		17 Apr 2009
 */
class Pages extends Vaspasian_Model
{
	// Has Children
    public function has_children($id)
    {
        return (boolean) $this->db->where('parent_id', (int)$id)->count_all_results(strtolower(get_class($this)));
    }
}
/* End of file Pages.php */
/* Location: ./cms/models/Pages.php */