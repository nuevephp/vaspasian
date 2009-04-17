<?php defined('BASEPATH') or die('No direct script access.');
/*
 * Created on 15 Dec 2008
 * by Andrew Smith <a.smith@silentworks.co.uk>
 */

/**
 *
 */
class Vaspasian_Model extends Model
{
	// Table name
	var $table;
	
	public function __construct()
	{
		parent::__construct();
		
		log_message('debug', "Vaspasian_Model Class Initialized");
		
		if($this->table == null){ $this->table = strtolower(get_class($this)); }
	}
	
	/**
	 * Factory for Vaspasian Model
	 *
	 * @param class $model
	 * @param integer array $where
	 * @return object
	 */
	public static function factory($model = FALSE)
	{
		$model = empty($model) ? __CLASS__ : ucfirst($model).'_model';
		return new $model();
	}
	
	public function __destruct()
	{
		return TRUE;
	}

    /**
     * Find By field or fields to get a single record
     *
     * @param integer array $where
     * @param string $orderby
     * @param string $direction
     * @param integer $limit
     * @return object
     */
    public function find($where = '', $orderby = 'id', $direction = 'ASC', $limit = '')
    {
		if(!is_array($where))
			$where = array('id'=>$where);
		if($limit !== '')
			$this->db->limit($limit);
        $query = $this->db->orderby($orderby, $direction)->getwhere($this->table, $where);
        return $query->row();
    }
    
    /**
     * Find By field or fields to get all records
     *
     * @param integer array $where
     * @param string $orderby
     * @param string $direction
     * @param integer $limit
     * @return object
     */
    public function find_all($where = '', $orderby = 'id', $direction = 'ASC', $limit = '')
	{
		if($limit !== '') $this->db->limit($limit);
		if($where !== '')
			foreach($where as $key => $value)
				$this->db->where_in($key, $value);

		return $this->db->orderby($orderby, $direction)->get($this->table)->result();
	}

	/**
	 * Save or Update Table Field
	 *
	 * @return integer
	 */
	public function save($data = NULL)
	{
		if (isset($data['id'])){ // Do an update
			$this->db->update($this->table, $data, array('id' => $data['id']));
			return TRUE;
		} else {  // Do an insert
			return $this->db->insert($this->table, $data);
		}
	}

	/**
	 * Delete Table Field
	 *
	 * @return true
	 */
	public function delete($id = NULL)
	{
		if ($id)
			$this->db->delete($this->table, array('id' => $id));
			return $this->__destruct();
	}
}
/* End of file Vaspasian_Model.php */
/* Location: ./application/admin/libraries/Vaspasian_Model.php */