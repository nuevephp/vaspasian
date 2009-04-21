<?php defined('BASEPATH') or die('No direct script access.');
/*
 * Created on 22 Dec 2008
 * by Andrew Smith <a.smith@silentworks.co.uk>
 */

/**
 *
 */
class Admin_Page extends Vaspasian
{
	var $model_name = array('pages', 'recycles');
    
	public function index() {
		
		// Page title
		$this->view_data['title'] = 'Pages';
		// Content
		$this->view_data['page_title'] = 'Pages';
        $this->view_data['page'] = $this->pages->find(1);
        $this->view_data['children_content'] = $this->children(1, 0, true);
        $this->view_data['success'] = isset($success) ? $success : $this->session->flashdata('success');
        $this->view_data['error'] = isset($error) ? $error : $this->session->flashdata('error');

        $this->view = 'admin_page/index';
    }
	
	// Add part to page
	public function add_part() 
	{
	    
	}
	
	// Page ordering
	public function page_order()
    {
        if(request::is_ajax())
        {
            $this->auto_render = FALSE;
            $ranking = 0;
            foreach($_POST['pages-table'] as $table)
            {
                $this->database->update('pages', array('order'=>$ranking), array('id'=>$table));
                $ranking++;
            }
        }
    }
    
    // Create - Add new page
	public function add($id = FALSE)
	{
		// Head Variables
		$this->view_data['title'] = "Pages | Create - Edit - Delete";
        //$this->template->javascript = array();
        // Get all pages
        // $allpages = $this->pages->get();
        
        // Content Variables
		$this->view_data['page_title'] = "Page | Add";
        if($id == FALSE) $id = 0;
        $this->view_data['parent_id'] = $id;
        $this->view_data['parent'] = $this->pages->get();
        
        // Validation
        /*$_POST = new Validation($_POST);
        $_POST->pre_filter('trim',true)
              ->pre_filter('url::title', 'url');
        
        // Rules
        $_POST->add_rules('title', 'required')
              ->add_rules('url', 'required');
        
        // Repopulate
        $this->template->content->form_data = $_POST;*/
        
        /*if($_POST->validate())
        {
            $data['meta_key'] = $_POST['keywords'];
            $data['meta_desc'] = $_POST['description'];
            $data['menu_show'] = (isset($_POST['menu']))?$_POST['menu']:'0';
            $data['title'] = $_POST['title'];
            $data['slug'] = $_POST['url'];
            $data['body'] = $_POST['body'];
            $data['status'] = $_POST['status'];
            $data['parent'] = (isset($_POST['parent']))?$_POST['parent']:'0';
            $data['type'] = $_POST['type'];
            $data['order'] = (count($allpages) + 1);
            
            if($this->pages->save()){
                // Setting message for user
                $this->session->set('message', 'You have successfully added "'.$_POST['title'].'".');
                url::redirect('page');
            }
        }*/
        
        // Errors
		// $this->template->content->form_error = $_POST->errors('page');
	}
    
    // Edit - Add new page
	public function edit($id = FALSE)
	{
		// Head Variables
		$this->template->title = "Pages | Create - Edit - Delete";
        //$this->template->javascript = array();
		
		//$roles = new Roles_Model();                                            
                                            
        // Content Variables
        $this->template->content = new View('page/edit');
		$this->template->content->page_title = "Page | Edit";
        $this->template->content->parent_id = $id;
        $this->template->content->parent = $this->pages->find();
        $this->template->content->page = $this->pages->find($id);
		$this->template->content->page_part = $this->page_part->find_by_page_id($id);
        //$this->template->content->roles = $roles->find_all(array('id' => array(3,4,5)));
        
        // Validation
        $_POST = new Validation($_POST);
        $_POST->pre_filter('trim', true)
              ->pre_filter('url::title', 'url');
        
        // Rules
        $_POST->add_rules('title', 'required')
              ->add_rules('url', 'required');
        
        // Repopulate
        $this->template->content->repopulate = (object)$_POST;
        
        if($_POST->validate())
        {
            $data['id'] = $id;
            $data['meta_key'] = (isset($_POST['keywords']))?$_POST['keywords']:NULL;
            $data['meta_desc'] = (isset($_POST['description']))?$_POST['description']:NULL;
            $data['menu_show'] = (isset($_POST['menu']))?$_POST['menu']:'0';
            $data['title'] = $_POST['title'];
            $data['slug'] = $_POST['url'];
            $data['body'] = $_POST['body'];
            $data['status'] = $_POST['status'];
            $data['parent'] = (isset($_POST['parent']))?$_POST['parent']:'0';
            $data['type'] = $_POST['type'];
            $data['order'] = $_POST['order'];
            $data['access'] = $_POST['group'];
            
            if($this->pages->save()){
                // Setting message for user
                $this->session->set('message', 'You have successfully updated "'.$_POST['title'].'" page.');
                url::redirect('page');
            }
        }
        
        // Errors
		$this->template->content->errors = (object)$_POST->errors('page');
	}
	
	// Load Children node
    public function children($parent_id, $level, $return=false)
    {
    	// $this->method_autoload = FALSE;
        $expanded_rows = isset($_COOKIE['expanded_rows']) ? explode(',', $_COOKIE['expanded_rows']): array();
        
        // get all children of the page (parent_id)
        $my_child = $this->pages->find_all(array('parent_id' => $parent_id));
        $children = array();
        foreach ($my_child as $index => $child)
        {
        	$children[$index] = array(
        								'id' => $child->id,
        								'title' =>$child->title,
        								'slug' => $child->slug,
        								'status_id' => $child->status_id,
            							'has_children' => $this->pages->has_children($child->id),
            							'is_expanded' => in_array($child->id, $expanded_rows)
        							);
            
            if($children[$index]['is_expanded'])
                $children[$index]['children_rows'] = $this->children($child->id, $level+1, true);
        }
        
        $data['children'] = $children;        $data['level'] = $level + 1;        
        $content = $this->load->view('admin_page/children', $data, $return);
        
        if ($return) {
            return $content;
        } else {
        	echo $content;
	    }
    }
}
/* End of file page.php */
/* Location: ./application/modules/admin/controllers/page.php */