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
        return (boolean) $this->db->where('parent_id', (int)$id)->count_all_results($this->table);
    }

    function find_page_id($page)
    {
	    $query = $this->db->from($this->table)->where("slug", $page)->get()->row_array();
	    return (count($query) > 0) ? $query->id : 0;
	}

    function find_page($page)
    {
	    if (isset($page['child']))
	    {
		    $child_id = $this->find_page_id($page['parent']);
		    $query = $this->db->from($this->table)->where(array("slug" => $page['child']))->limit("1")->get()->row_array();
	    } else {
		    $query = $this->db->from($this->table)->where("slug", $page['parent'])->limit("1")->get()->row_array();
	    }
		
	    /* Check to see if the page exists */
	    return (count($query) > 0) ? $query : false;
    }
}
/* End of file Pages.php */
/* Location: ./cms/models/Pages.php */