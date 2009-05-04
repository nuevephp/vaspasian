<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Strong Class
 *
 * Authentication and authorization controller
 *
 * @license 	MIT Licence
 * @category	Controller
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		02 May 2009
 */
class Strong_Setup extends Controller
{
    // Constructor
    public function __construct() {
        parent::__construct();
        
        // Load Model
        $this->load->model('users');
        
        // Load Library
        $this->load->library('strong');
        $this->load->library('form_validation');
    }
    
    // Default - Opens by default
    public function index() {
        // $users = new Users(1);
        /*foreach($users->related_info() as $user)
        {
            var_dump($user);
        }*/
        
        // Check if user exists
        /*if($users->user_exists('easylancer'))
        {
        	echo "This dude exists already.";
        } else {
        	echo "Don't know that dude.";
        }
        
        /*if($users->create('admin', 'password', 'easylancer@gmail.com')){
            echo "User Created.<br />";
            if($users->set_role('admin'))
            {
                echo "User Created with Role";
            }
        } else {
            echo "Something went wrong";
        }*/
        // var_dump($users->has_role('admin'));
        
        //$user = $users->find(3);
        //$users->remove($user->id);
        if($this->strong->login('admin', 'password()~'))
        {
            echo "Passed";
        } else {
            echo "Failed";
        }
    }
    
    public function create() {
    	$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    	
    	// Validate Form using Validation Library
    	$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[password_conf]');
		$this->form_validation->set_rules('password_conf', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['message'] = "Enter your information below";
		} else {
    		if(!$this->users->user_exists($this->input->post('username'))){
	    		if($this->users->create($this->input->post('username'), $this->input->post('password'), $this->input->post('email')) 
	    		AND $this->users->add_role('login') AND $this->users->add_role('admin'))
	    			$data['message'] = "User Created Successfully.";
    		} else {
	    		$data['message'] = "That username is already taken.";
    		}
		}
		
    	$this->load->view('admin/strong/create', $data);
    }
    
    public function install() {
    	$this->load->view('admin/strong/install');
    }
    
}
/* End of file strong.php */
/* Location: /cygdrive/c/projects/dev/vaspasian/cms/controllers/strong.php */