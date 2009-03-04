<?php defined('BASEPATH') or die('No direct script access.');
/*
 * Created on 15 Dec 2008
 * by Andrew Smith <a.smith@silentworks.co.uk>
 */

/**
 *	File class
 *
 *	File Types
 *	Documents, Audio, Video, Images, Flash Files and other media formats
 *
 */
class Filemanager extends Vaspasian
{
	public function __construct()
	{
	    parent::__construct();

		// Load Model
		$this->load->model('file_model');

		// Get last segment of uri
		$this->last_seg = $this->uri->segment(3);
	}

	// Default - Images
	public function index()
	{   
		if ($this->form_validation->run('filemanager') != FALSE)
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
		        
		        $this->file_model->save($data);
		        $success = 'You have successfully added "'.$_POST['name'].'".';
	        } else {
	        	$error = $this->upload->display_errors('<span>', '</span>');
	        	$data['file_error'] = $error;
	        }
		}
		
	    // Page title
		$this->templex->set('title', "File");
		
		// Load Javascript
		$js = array('/shared/js/lib/shadowbox-2.0.js');
		$this->templex->set('javascript', $js);

		// Content
		$data['page_title'] = "File";
		$data['type_url'] = $this->last_seg;
		$data['files'] = $this->file_model->find_all();
		$data['public_folder'] = $this->config->item('public_folder');
		$data['success'] = isset($success) ? $success : $this->session->flashdata('success');
		$data['error'] = isset($error) ? $error : $this->session->flashdata('error');
        
        $this->templex->render('filemanager/main', $data);
	}

	// Images
	public function images()
	{
		if ($this->form_validation->run('filemanager') != FALSE)
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
		        
		        $this->file_model->save($data);
		        $success = 'You have successfully added "'.$_POST['name'].'".';
	        } else {
	        	$error = $this->upload->display_errors('<span>', '</span>');
	        	$data['file_error'] = $error;
	        }
		}
		 
		// Page title
		$this->templex->set('title', "File");

		// Content
		$data['page_title'] = "File | Images";
		$data['type_url'] = $this->last_seg;
		$data['files'] = $this->file_model->find_all(array('type' => 'images'));
		$data['public_folder'] = $this->config->item('public_folder');
		$data['success'] = isset($success) ? $success : $this->session->flashdata('success');
		$data['error'] = isset($error) ? $error : $this->session->flashdata('error');
        
        $this->templex->render('filemanager/main', $data);
	}

	// Documents
	public function documents()
	{
		if ($this->form_validation->run('filemanager') != FALSE)
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
		        
		        $this->file_model->save($data);
		        $success = 'You have successfully added "'.$_POST['name'].'".';
	        } else {
	        	$error = $this->upload->display_errors('<span>', '</span>');
	        	$data['file_error'] = $error;
	        }
		}
		 
		// Page title
		$this->templex->set('title', "File");

		// Content
		$data['page_title'] = "File | Documents";
		$data['type_url'] = $this->last_seg;
		$data['files'] = $this->file_model->find_all(array('type' => 'documents'));
		$data['public_folder'] = $this->config->item('public_folder');
		$data['success'] = isset($success) ? $success : $this->session->flashdata('success');
		$data['error'] = isset($error) ? $error : $this->session->flashdata('error');
        
        $this->templex->render('filemanager/main', $data);
	}

	// Audio
	public function audio()
	{
		if ($this->form_validation->run('filemanager') != FALSE)
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
		        
		        $this->file_model->save($data);
		        $success = 'You have successfully added "'.$_POST['name'].'".';
	        } else {
	        	$error = $this->upload->display_errors('<span>', '</span>');
	        	$data['file_error'] = $error;
	        }
		}
		 
		// Page title
		$this->templex->set('title', "File");

		// Content
		$data['page_title'] = "File | Audio";
		$data['type_url'] = $this->last_seg;
		$data['files'] = $this->file_model->find_all(array('type' => 'audio'));
		$data['public_folder'] = $this->config->item('public_folder');
		$data['success'] = isset($success) ? $success : $this->session->flashdata('success');
		$data['error'] = isset($error) ? $error : $this->session->flashdata('error');
        
        $this->templex->render('filemanager/main', $data);
	}

	// Video
	public function video()
	{
		if ($this->form_validation->run('filemanager') != FALSE)
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
		        
		        $this->file_model->save($data);
		        $success = 'You have successfully added "'.$_POST['name'].'".';
	        } else {
	        	$error = $this->upload->display_errors('<span>', '</span>');
	        	$data['file_error'] = $error;
	        }
		}
		 
		// Page title
		$this->templex->set('title', "File");

		// Content
		$data['page_title'] = "File | Video";
		$data['type_url'] = $this->last_seg;
		$data['files'] = $this->file_model->find_all(array('type' => 'video'));
		$data['public_folder'] = $this->config->item('public_folder');
		$data['success'] = isset($success) ? $success : $this->session->flashdata('success');
		$data['error'] = isset($error) ? $error : $this->session->flashdata('error');
        
        $this->templex->render('filemanager/main', $data);
	}

	// Delete Confirmation message
	public function del($id = FALSE)
	{
		$referer = explode('/', $_SERVER['HTTP_REFERER']);
		$url_last = array_pop($referer);
		$url = $url_last == "filemanager" ? $url_last : "filemanager/" . $url_last;
		
		$file = $this->file_model->find($id);
        $this->session->set_flashdata('error', 'Are you sure you would like to delete "'.$file->name.'"? <a href="'.site_url('admin/filemanager/delete/'.$id).'" style="color: #fff"><strong>Yes</strong></a> | <a href="'.site_url('admin/' . $url).'" style="color: #fff" class="delete-no"><strong>No</strong></a>');
		redirect('admin/' . $url);
	}

	// Delete - Move to recycle bin
	public function delete($id = FALSE)
    {
        $file = $this->file_model->find($id);

		// Store information into Recycle Bin Table
		$this->recycle($file->name, $file, 'files');
		$this->session->set_flashdata('file', $file->name);
		
		if($this->file_model->delete($id))
		{
			$this->session->set_flashdata('success', 'You have successfully deleted "'. $file->name .'".');
			redirect('admin/filemanager');
		}
    }
}
/* End of file filemanager.php */
/* Location: ./application/admin/controllers/filemanager.php */