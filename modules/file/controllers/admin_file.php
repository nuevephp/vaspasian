<?php defined('BASEPATH') or die('No direct script access.');
/*
 * Created on 15 Dec 2008
 * by Andrew Smith <a.smith@silentworks.co.uk>
 */

/**
 *	Admin_File class
 *
 *	Admin_File Types
 *	Documents, Audio, Video, Images, Flash Files and other media formats
 *
 */
class Admin_File extends Vaspasian
{	
	public function __construct() {
	    parent::__construct();

	    // Load Models
	    $this->load->model('files');
	    $this->load->model('recycles');

		// Load Library
		$this->load->library('form_validation');

		// Get last segment of uri
		$this->last_seg = $this->uri->segment(3);
		
		// Set mode and module name
	    $this->template['admin'] = true;
	    $this->template['module'] = 'file';

        // Load the view file
        $this->view = 'admin_file/index';
	}

	// Default - Images
	public function index()
	{   
		if ($this->form_validation->run('file') != FALSE)
		{
			// Validation
			switch($_POST['type']) {
				case "audio":
					$config['upload_path'] = WEBROOT . $this->public_folder . '/audio/';
					$config['allowed_types'] = 'wav|mp3';
				break;
				case "video":
					$config['upload_path'] = WEBROOT . $this->config->item('public_folder') . '/video/';
					$config['allowed_types'] = 'flv';
				break;
				case "documents":
					$config['upload_path'] = WEBROOT . $this->config->item('public_folder') . '/documents/';
					$config['allowed_types'] = 'doc|pdf|xls|xps';
				break;
				default:
					$config['upload_path'] = WEBROOT . $this->config->item('public_folder') . '/images/';
					$config['allowed_types'] = 'gif|jpg|png';
				break;
			}
			
			// Load upload config
			$this->upload->initialize($config);
			if($this->upload->do_upload()) {
				
				// Uploaded image info
				$original = $this->upload->data();
				
				// Create preview version
				if($_POST['type'] == "images") {
					$preview['source_image'] = $original['full_path'];
					$preview['maintain_ratio'] = TRUE;
					$preview['create_thumb'] = FALSE;
		        	$preview['quality'] = 75;
		        	$preview['width'] = 200;
		        	$preview['height'] = 180;
		        	$preview['new_image'] = $original['file_path'] . 'preview/' . $original['file_name'];
		        	
		        	$this->image_lib->initialize($preview);
		        	
		        	$this->image_lib->resize();
		        }
		        
		        $data['name'] = $_POST['name'];
		        $data['file'] = $original['file_name'];
		        $data['type'] = $_POST['type'];
		        
		        $this->files->save($data);
		        $success = 'You have successfully added "'.$_POST['name'].'".';
	        } else {
	        	$error = $this->upload->display_errors('<span>', '</span>');
	        	$data['file_error'] = $error;
	        }
		}
		
	    // Page title
		$this->template['title'] = 'File';
		
		// Load Javascript
		$js = array('/shared/js/lib/shadowbox-2.0.js');
		$this->template['javascript'] = $js;

		// Content
		$this->template['page_title'] = "File";
		$this->template['type_url'] = $this->last_seg;
		$this->template['files'] = $this->files->find_all();
		$this->template['public_folder'] = $this->config->item('public_folder');
		$this->template['success'] = isset($success) ? $success : $this->session->flashdata('success');
		$this->template['error'] = isset($error) ? $error : $this->session->flashdata('error');
		
		$this->layout->load($this->template, $this->view);
	}

	// Images
	public function images()
	{
		if ($this->form_validation->run('file') != FALSE)
		{
			// Validation
			$config['upload_path'] = WEBROOT . $this->config->item('public_folder') . '/images/';
			$config['allowed_types'] = 'gif|jpg|png';
			
			// Load upload config
			$this->upload->initialize($config);
			if($this->upload->do_upload()) {
				
				// Uploaded image info
				$original = $this->upload->data();
				
				// Create preview version
				$preview['source_image'] = $original['full_path'];
				$preview['maintain_ratio'] = TRUE;
				$preview['create_thumb'] = FALSE;
	        	$preview['quality'] = 75;
	        	$preview['width'] = 200;
	        	$preview['height'] = 180;
	        	$preview['new_image'] = $original['file_path'] . 'preview/' . $original['file_name'];
	        	
	        	$this->image_lib->initialize($preview);
	        	
	        	$this->image_lib->resize();
		        
		        $data['name'] = $_POST['name'];
		        $data['file'] = $original['file_name'];
		        $data['type'] = $_POST['type'];
		        
		        $this->files->save($data);
		        $success = 'You have successfully added "'.$_POST['name'].'".';
	        } else {
	        	$error = $this->upload->display_errors('<span>', '</span>');
	        	$data['file_error'] = $error;
	        }
		}
		 
		// Page title
		$this->template['title'] = 'File';

		// Content
		$this->template['page_title'] = "File | Images";
		$this->template['type_url'] = $this->last_seg;
		$this->template['files'] = $this->files->find_all(array('type' => 'images'));
		$this->template['public_folder'] = $this->config->item('public_folder');
		$this->template['success'] = isset($success) ? $success : $this->session->flashdata('success');
		$this->template['error'] = isset($error) ? $error : $this->session->flashdata('error');
		
		$this->layout->load($this->template, $this->view);
	}

	// Documents
	public function documents()
	{
		if ($this->form_validation->run('file') != FALSE)
		{
			// Validation
			$config['upload_path'] = WEBROOT . $this->config->item('public_folder') . '/documents/';
			$config['allowed_types'] = 'doc|pdf|xls|xps';
			
			// Load upload config
			$this->upload->initialize($config);
			if($this->upload->do_upload()) {
				
				// Uploaded image info
				$original = $this->upload->data();
		        
		        $data['name'] = $_POST['name'];
		        $data['file'] = $original['file_name'];
		        $data['type'] = $_POST['type'];
		        
		        $this->files->save($data);
		        $success = 'You have successfully added "'.$_POST['name'].'".';
	        } else {
	        	$error = $this->upload->display_errors('<span>', '</span>');
	        	$data['file_error'] = $error;
	        }
		}
		 
		// Page title
		$this->template['title'] = 'File';

		// Content
		$this->template['page_title'] = "File | Documents";
		$this->template['type_url'] = $this->last_seg;
		$this->template['files'] = $this->files->find_all(array('type' => 'documents'));
		$this->template['public_folder'] = $this->config->item('public_folder');
		$this->template['success'] = isset($success) ? $success : $this->session->flashdata('success');
		$this->template['error'] = isset($error) ? $error : $this->session->flashdata('error');
		
		$this->layout->load($this->template, $this->view);
	}

	// Audio
	public function audio()
	{
		if ($this->form_validation->run('file') != FALSE)
		{
			// Validation
			$config['upload_path'] = WEBROOT . $this->config->item('public_folder') . '/audio/';
			$config['allowed_types'] = 'wav|mp3';
			
			// Load upload config
			$this->upload->initialize($config);
			if($this->upload->do_upload()) {
				
				// Uploaded image info
				$original = $this->upload->data();
				
		        $data['name'] = $_POST['name'];
		        $data['file'] = $original['file_name'];
		        $data['type'] = $_POST['type'];
		        
		        $this->files->save($data);
		        $success = 'You have successfully added "'.$_POST['name'].'".';
	        } else {
	        	$error = $this->upload->display_errors('<span>', '</span>');
	        	$data['file_error'] = $error;
	        }
		}
		 
		// Page title
		$this->template['title'] = 'File';

		// Content
		$this->template['page_title'] = 'File | Audio';
		$this->template['type_url'] = $this->last_seg;
		$this->template['files'] = $this->files->find_all(array('type' => 'audio'));
		$this->template['public_folder'] = $this->config->item('public_folder');
		$this->template['success'] = isset($success) ? $success : $this->session->flashdata('success');
		$this->template['error'] = isset($error) ? $error : $this->session->flashdata('error');
		
		$this->layout->load($this->template, $this->view);
	}

	// Video
	public function video()
	{
		if ($this->form_validation->run('file') != FALSE)
		{
			// Validation
			$config['upload_path'] = WEBROOT . $this->config->item('public_folder') . '/video/';
			$config['allowed_types'] = 'flv';
			
			// Load upload config
			$this->upload->initialize($config);
			if($this->upload->do_upload()) {
				
				// Uploaded image info
				$original = $this->upload->data();
		        
		        $data['name'] = $_POST['name'];
		        $data['file'] = $original['file_name'];
		        $data['type'] = $_POST['type'];
		        
		        $this->files->save($data);
		        $success = 'You have successfully added "'.$_POST['name'].'".';
	        } else {
	        	$error = $this->upload->display_errors('<span>', '</span>');
	        	$data['file_error'] = $error;
	        }
		}
		 
		// Page title
		$this->template['title'] = 'File';

		// Content
		$this->template['page_title'] = 'File | Video';
		$this->template['type_url'] = $this->last_seg;
		$this->template['files'] = $this->files->find_all(array('type' => 'video'));
		$this->template['public_folder'] = $this->config->item('public_folder');
		$this->template['success'] = isset($success) ? $success : $this->session->flashdata('success');
		$this->template['error'] = isset($error) ? $error : $this->session->flashdata('error');
		
		$this->layout->load($this->template, $this->view);
	}

	// Delete Confirmation message
	public function del($id = FALSE)
	{
		$referer = explode('/', $_SERVER['HTTP_REFERER']);
		$url_last = array_pop($referer);
		$url = $url_last == "file" ? $url_last : "file/" . $url_last;
		
		$file = $this->files->find($id);
        $this->session->set_flashdata('error', 'Are you sure you would like to delete "'.$file->name.'"? <a href="'.site_url('admin/file/delete/'.$id).'" style="color: #fff"><strong>Yes</strong></a> | <a href="'.site_url('admin/' . $url).'" style="color: #fff" class="delete-no"><strong>No</strong></a>');
		redirect('admin/' . $url);
	}

	// Delete - Move to recycle bin
	public function delete($id = FALSE)
    {
    	$this->method_autoload = FALSE;
    	
        $file = $this->files->find($id);

		// Store information into Recycle Bin Table
		$this->recycle($file->name, $file, 'files');
		
		if($this->files->delete($id))
		{
			$this->session->set_flashdata('success', 'You have successfully deleted "'. $file->name .'".');
			redirect('admin/file');
		}
    }
}
/* End of file admin_file.php */
/* Location: ./modules/file/controllers/admin_file.php */