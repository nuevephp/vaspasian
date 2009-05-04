<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Strong Class
 *
 * User authentication and authorization library
 *
 * @license 	MIT Licence
 * @category	Libraries
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		02 May 2009
 */
class Strong
{

	public function __construct()
	{
		$this->CI =& get_instance();
		
		// Get configuration settings for Strong
		$this->CI->config->load('strong');
		
		// Load library
		$this->CI->load->library('session');

		log_message('debug', 'Strong Library loaded');
	}

	/**
	 * @return object
	 */
	public static function factory()
	{
		return new Strong();
	}

	/**
	 * Try to Login
	 *
	 * @example $strong->login('username', 'password')
	 * @param object string login
	 * @param string password
	 * @return  boolean
	 */
	public function login($user, $password)
	{
		if (!is_object($user))
		{
			// Load the user
			$user = Vaspasian_Model::factory('user', array('username' => $user));
		}

		if (empty($password)) return FALSE;

		// Create a hashed password
		$password = $this->hash_password($password);

		if($user->has_role('login') AND $password === $user->password){
			$this->complete_login($user);
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Check if user is logged in
	 *
	 * @example $strong->logged_in()
	 * @return boolean
	 */
	public static function logged_in($role = NULL)
	{
		$status = FALSE;

		// Checks if a user is logged in and valid
		if (!empty($_SESSION['auth_user']) AND is_object($_SESSION['auth_user'])
			AND ($_SESSION['auth_user'] instanceof Users_Model))
		{
			// Everything is okay so far
			$status = TRUE;

			/*if ( ! empty($role))
			{
				// Check that the user has the given role
				$auth_user = $this->session->userdata('auth_user')
				// $status = $auth_user->has_role($role);
			}*/
		}
		return $status;
	}

	public function logout($destroy)
	{
		// Delete the autologin cookie if it exists
		//cookie::get('authautologin') and cookie::delete('authautologin');

		if ($destroy === TRUE)
		{
			// Destroy the session completely
			$this->session->sess_destroy();
		} else {
			// Remove the user object from the session
			$this->session->unset_userdata('auth_user');
		}

		// Double check
		return ! $this->session->userdata('auth_user');
	}

	public function generator()
	{
		$length = 9;
		$vowels = "aeiouy";
		$consonants = "bcdfghjklmnpqrstvwxz";
		$numeric = '0123456789';

		$password = '';
	    $alt = time() % 2;
	    for ($i = 0; $i < $length; $i++) {
	        if ($alt == 1) {
	            $password .= $consonants[(rand() % strlen($consonants))];
	            $alt = 0;
	        } elseif($alt == 2) {
	            $password .= $vowels[(rand() % strlen($vowels))];
	            $alt = 1;
	        } else {
				$password .= $numeric[(rand() % strlen($numeric))];
				$alt = 2;
			}
	    }
		return $password;
	}

	/*
	 * Password Hashing
	 */
	public function hash_password($password, $salt = FALSE)
	{
		if($salt == FALSE)
		{
			// Create a salt seed, same length as the number of offsets in the pattern
			$salt = md5($this->CI->config->item('salt_pattern'));
		}

		$hash = $this->hash($salt.$password);

		// Add the part to the password, appending the salt character
		$password = substr($hash.$salt, 0, $this->CI->config->item('length'));

		return $password;
	}

	protected function hash($str)
	{
		return hash($this->CI->config->item('hash_type'), $str);
	}

	protected function complete_login($user)
	{
		$data['id'] = $user->id;
		
		// Update the number of logins
		$data['logins'] = $user->logins + 1;

		// Set the last login date
		$data['last_login'] = time();

		// Save the user
		$user->save($data);
		
		$user_info = array('id' => $user->id, 'username' => $user->username);
		
		// Store session data
		$this->CI->session->set_userdata('auth_user', $user_info);
	}

}
/* End of file Strong.php */
/* Location: ./cms/libraries/Strong.php */