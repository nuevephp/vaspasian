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
class Recycles extends DataMapper
{
	/**
	 * Send information to Recycle Bin
	 */
	public function do_recycle($name, $data, $type) {
		// Store information into Recycle Bin Table
		$this->name = $name;
		$this->data = 'this info';//serialize($data);
		$this->table = $type;
		$this->date = date('Y-m-d H:i:s');
		
		return $this->save();
	}
}
/* End of file recycles.php */
/* Location: ./cms/models/recycles.php */