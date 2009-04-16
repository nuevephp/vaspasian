<?php defined('BASEPATH') or die('No direct script access.');
/*
 * Created on 30 Dec 2008
 * by Andrew Smith <a.smith@silentworks.co.uk>
 */

/**
 *
 */
class Layout extends Vaspasian
{
	public function __construct() {
		parent::__construct();
		
		// Load Model
		$this->load->model('layout_model');
		$this->load->model('category_model');
	}
	
	public function index()
	{
		$params = func_get_args();

        $content = '';
        $cat = urldecode(join('/', $params));
        
		// Get uri segment
		$category = $this->uri->segment(4) ? $this->uri->segment(4) : 'general';
		$this->session->set_userdata('layout_dir', $category);
		
		// $category = $cat ? $cat : 'general';
		
		// Page title
		$this->templex->set('title', "Layout");

		// Content
		$data['page_title'] = "Layout";
		$data['directory'] = $this->category_model->find_all(array('type' => 'layout'));
		$data['files'] = $this->layout_model->find_all_by_category($category);
		$data['success'] = isset($success) ? $success : $this->session->flashdata('success');
		$data['error'] = isset($error) ? $error : $this->session->flashdata('error');
        
        $this->templex->render('layout/main', $data);
	}
	
	public function edit()
	{
		$params = func_get_args();

        $content = '';
        $filename = urldecode(join('/', $params));
        
        $category = $this->session->userdata('layout_dir') . '/';
        
        $file = APPPATH.'views/layout/' . $category . $filename . '.' . $this->config->item('file_ext');
        if (file_exists($file))
        {
            $content = file_get_contents($file);
        }
        
        // Page title
		$this->templex->set('title', "Layout");

		// Content
		$data['page_title'] = "Layout";
		$data['filename'] = $filename;
		$data['content'] = $content;
		$data['success'] = isset($success) ? $success : $this->session->flashdata('success');
		$data['error'] = isset($error) ? $error : $this->session->flashdata('error');
        
        $this->templex->render('layout/view', $data);
	}
}
/* End of file layout.php */
/* Location: ./application/modules/admin/controllers/layout.php */