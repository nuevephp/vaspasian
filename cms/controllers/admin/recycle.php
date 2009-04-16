<?php defined('BASEPATH') or die('No direct script access.');
/**
 *	Recycle Bin class
 *
 *	Removing and restoring files that were deleted.
 */
class Recycle extends Vaspasian
{
	public function __construct()
	{
		parent::__construct();

		// Load Model
		$this->load->model('recycle_model');
		
	}

	// Default
	public function index()
	{
		// Page title
		$this->templex->set('title', "Recycle Bin");

		// Content
		$data['page_title'] = "Recycle Bin";
		$data['recycled'] = $this->recycle_model->find_all();
		$data['public_folder'] = $this->config->item('public_folder');
		$data['success'] = isset($success) ? $success : $this->session->flashdata('success');
		$data['error'] = isset($error) ? $error : $this->session->flashdata('error');
        
        $this->templex->render('recycle/main', $data);
	}

	// Restore
	public function restore($id)
	{
        $recycle = $this->recycle_model->find($id);

		$restore = unserialize($recycle->data);

		switch ($recycle->table){
			case 'files':
				$data['id'] = $restore->id;
				$data['name'] = $restore->name;
				$data['file'] = $restore->file;
				$data['type'] = $restore->type;
				if($this->recycle_model->restore('files', $data)){
					$restored = $restore->name;
					$this->recycle_model->delete($recycle->id);
				}
			break;
			case 'layouts':
				$data['id'] = $restore->id;
				$data['name'] = $restore->name;
				$data['class'] = $restore->class;
				$data['type'] = $restore->type;
				if($this->recycle_model->restore('layout', $data)){
					$restored = $restore->name;
					$this->recycle_model->delete($recycle->id);
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
	public function del($id = FALSE)
	{
		$this->auto_render = FALSE;
		$recycle = $this->recycle_model->find($id);
        $this->session->set_flashdata('error', 'Are you sure you would like to delete "'.$recycle->name.'" permanently? <a href="'.site_url('admin/recycle/delete/'.$id).'" style="color: #fff"><strong>Yes</strong></a> | <a href="'.site_url('admin/recycle/').'" style="color: #fff" class="delete-no"><strong>No</strong></a>');
		redirect('admin/recycle');
	}

	// Delete Permanently
	public function delete($id = FALSE)
    {
        $recycle = $this->recycle_model->find($id);
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
			$this->session->set_flashdata('name', $recycle->name);
			if($this->recycle_model->delete($recycle->id))
			{
				$this->session->set_flashdata('success', 'You have successfully deleted "'.$this->session->flashdata('name').' permanently".');
				redirect('admin/recycle');
			}
		}
    }
}