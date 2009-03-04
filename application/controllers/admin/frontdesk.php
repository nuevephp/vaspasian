<?php defined('BASEPATH') or die('No direct script access.');
/*
 * Created on 15 Dec 2008
 * by Andrew Smith <a.smith@silentworks.co.uk>
 */

/**
 *
 */
class Frontdesk extends Vaspasian
{	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// Page Title
		$this->templex->set('title', 'Frontdesk');
		
		// Content
		$data['page_title'] = "Frontdesk";

		// Render View
		$this->templex->render('frontdesk/main', $data);
	}
}
/* End of file frontdesk.php */
/* Location: ./application/modules/admin/controllers/frontdesk.php */