<?php defined('BASEPATH') or die('No direct script access.');
/**
 *	Admin_Recycle Bin class
 *
 *	Removing and restoring files that were deleted.
 */
class Admin_Recycle extends Vaspasian
{
    var $model_name = array('recycles');
    
	public function __construct() {
		parent::__construct();

        // Load the view file
        $this->view = 'admin_recycle/index';
	}
    
	// Default
	public function index() {
		// Page title
		$this->view_data['title'] = 'Recycle Bin';

		// Content
		$this->view_data['page_title'] = 'Recycle Bin';
		$this->view_data['recycled'] = $this->recycles->find_all();
		$this->view_data['public_folder'] = $this->config->item('public_folder');
		$this->view_data['success'] = isset($success) ? $success : $this->session->flashdata('success');
		$this->view_data['error'] = isset($error) ? $error : $this->session->flashdata('error');
	}

    /**
	 * Send information to Recycle Bin
	 */
	public function recycle($name, $data, $type) {
		// Store information into Recycle Bin Table
		$recycle['name'] = $name;
		$recycle['data'] = serialize($data);
		$recycle['table'] = $type;
		$recycle['date'] = date('Y-m-d H:i:s');

		return $this->recycles->save($recycle);
	}

	// Restore
	public function restore($id) {
        $recycle = $this->recycles->find($id);

		$restore = unserialize($recycle->data);

		switch ($recycle->table){
			case 'files':
				$data['id'] = $restore->id;
				$data['name'] = $restore->name;
				$data['file'] = $restore->file;
				$data['type'] = $restore->type;
				if($this->recycles->restore('files', $data)){
					$restored = $restore->name;
					$this->recycle->delete($recycle->id);
				}
			break;
			case 'layouts':
				$data['id'] = $restore->id;
				$data['name'] = $restore->name;
				$data['class'] = $restore->class;
				$data['type'] = $restore->type;
				if($this->recycles->restore('layout', $data)){
					$restored = $restore->name;
					$this->recycle->delete($recycle->id);
				}
			break;
		}

		if($restored)
		{
			$this->session->set_flashdata('success', 'You have successfully restored "'.$restored.'".');
			redirect('admin/recycle');
		}
	}

	// Delete Confirmation message
	public function del($id = FALSE) {
		$this->auto_render = FALSE;
		$recycle = $this->recycles->find($id);
        $this->session->set_flashdata('error', 'Are you sure you would like to delete "'.$recycle->name.'" permanently? <a href="'.site_url('admin/recycle/delete/'.$id).'" style="color: #fff"><strong>Yes</strong></a> | <a href="'.site_url('admin/recycle/').'" style="color: #fff" class="delete-no"><strong>No</strong></a>');
		redirect('admin/recycle');
	}

	// Delete Permanently
	public function delete($id = FALSE)
    {
        $recycle = $this->recycles->find($id);
		$destroy = unserialize($recycle->data);
		
		switch ($recycle->type) {
			case 'file':
				$get = folder::get(WEBROOT . $this->config->item('public_folder'));
				$keys = array_keys($get['filename'], $destroy->file);
		
				if(count($keys) > 0)
				{
					foreach($keys as $key)
					{
						$the_file = $get['fullpath'][$key];
		
						if(file_exists($the_file))
						{
							unlink($the_file);
							$destroyed = $destroy->name;
						}
					}
				} else { $destroyed = $destroy->name; }
			break;
			default:
				$destroyed = $destroy->name;
			break;
		}
		
		if($destroyed)
		{
			if($this->recycles->delete($recycle->id))
			{
				$this->session->set_flashdata('success', 'You have successfully deleted "'.$recycle->name.'" permanently.');
				redirect('admin/recycle');
			}
		}
    }
}