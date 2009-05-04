<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Users Class
 *
 * The model that controls information from the user table
 *
 * @license 	MIT Licence
 * @category	Models
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		02 May 2009
 */
class Users extends Vaspasian_Model
{
    // User roles
	protected $roles = NULL;

    public $user_id = FALSE;

    /**
     * Create Users
     * @example  $users->create('admin', 'password', 'i@me.com');
     * @return booleon
     */
    public function create($username, $password, $email, $ex_data = NULL)
    {
        // Data information
        $this->data['username'] = $username;
        $this->data['password'] = Strong::factory()->hash_password($password);
        $this->data['email'] = $email;

        if(is_array($ex_data))
        {
        	foreach($ex_data as $key => $value)
        		$this->data[$key] = $value;
        }

        // Set the save field
        $this->db->insert($this->table, $this->data);
        $this->user_id = $this->db->insert_id();
        if((bool)$this->user_id)
            return $this->user_id;
    }

    /**
     * Create Role
     * @param string integer
     * @return booloen
     */
    public function add_role($role)
    {
    	// var_dump($role, $this->user_id); 
        if(is_string($role)){
            $info = array('name' => $role);
        } else {
            $info = array('id' => $role);
        }

        $roles = $this->db->where($info)->get('roles');
        $role_id = $roles->row_array();
        //echo "Got Role id from DB.<br />".
        // Data for Users Roles
        $data['user_id'] = $this->user_id ? $this->user_id : $this->id;
        $data['role_id'] = $role_id['id'];
        //echo "Testing User ID.<br />";
        var_dump($data);
        if($this->db->insert('users_roles', $data)){
            return TRUE;
        }
        return FALSE;
    }

    /**
     * Remove Role from User
     * @param string
     * @return booleon
     */
    public function remove_role($role)
    {
    	if(is_string($role)){
            $info = array('name' => $role);
        } else {
            $info = array('id' => $role);
        }
    	$roles = $this->db->where($info)->get('roles');
        $role_id = $roles->row_array();
        $status = $this->db->delete('users_roles', array('user_id' => $this->id, 'role_id' => $role_id['id']));
        if(count($status) > 0)
        {
        	//echo "Completely Removed.<br />";
        	return TRUE;
        }
        return FALSE;
    }


    /**
     * Delete User and Roles
     * @param integer
     * @return booloen
     */
    public function remove()
    {
        //$user = $this->find($id);
        $status = $this->db->delete('users_roles', array('user_id' => $this->id));
        if(count($status) > 0)
        {
            $data['id'] = $this->id;
            // Set the save field
            $this->set_fields($data);
            if($this->delete()){
                return TRUE;
            }
        }
        return FALSE;
    }

    /**
     * Check the role the user has
     * @param string integer
     */
    public function has_role($role)
    {
    	// Don't mess with these calls, they are too complex
		if (is_object($role))
			return parent::has_role($role);

        if($this->roles === NULL)
        {
            $this->roles = array();
            if ($this->id > 0)
			{
				foreach ($this->related_roles() as $r)
				{
					// Load all the user roles
					$this->roles[$r['id']] = $r['name'];
				}
			}
        }

        // Make sure the role name is a string
		$role = (string) $role;

		if (ctype_digit($role))
		{
			// Find by id
			return isset($this->roles[$role]);
		}
		else
		{
			// Find by name
			return in_array($role, $this->roles);
		}
    }

    /**
     * Roles Relationship
     * @return object
     */
    public function related_roles()
    {
        return $this->db
                    ->join('users_roles', $this->table.'.id', 'users_roles.user_id')
                    ->join('roles', 'roles.id', 'users_roles.role_id')
                    ->getwhere($this->table, array($this->table.'.id' => $this->id))
                    ->result_array();
    }

    /**
     * User Info Relationship
     * @return object
     */
    public function related_info()
    {
        return $this->db
                    ->join('users_information', $this->table.'.id', 'users_information.user_id')
                    ->getwhere($this->table, array($this->table.'.id' => $this->id));
    }

    /**
     * Checks is the user already exists
     * @param string
     * @return booleon
     */
    public function user_exists($name)
    {
    	return (bool) count($this->find(array('username' => $name)));
    }

}
/* End of file users.php */
/* Location: /cygdrive/c/projects/dev/vaspasian/cms/models/users.php */