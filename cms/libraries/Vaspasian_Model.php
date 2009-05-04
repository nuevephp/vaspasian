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
	
	protected $data = array();
	
	public function __construct($where = NULL)
	{
		parent::__construct();
		
		log_message('debug', "Vaspasian_Model Class Initialized");
		
		if($this->table == null){ $this->table = strtolower(get_class($this)); }
		
		if ($where != NULL)
		{
			if(!is_array($where))
				$where = array('id'=>$where);
			// try and get a row with this ID
			$user_data = $this->db->get_where($this->table, $where);
			
			// try and assign the data
			if (count($user_data) == 1 AND $data = $user_data->row_array())
			{
				foreach ($data as $key => $value) {
					$this->$key = $value;
				}
			}
		}
	}
	
	/**
	 * Factory for Vaspasian Model
	 *
	 * @param class $model
	 * @param integer array $where
	 * @return object
	 */
	public static function factory($model = FALSE, $where = FALSE)
	{
		$model = empty($model) ? __CLASS__ : ucfirst($model).'s';
		return new $model($where);
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
        return $query->row_array();
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

		return $this->db->orderby($orderby, $direction)->get($this->table)->result_array();
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