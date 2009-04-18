<?php

class Welcome extends Page {

	// var $method_autoload = FALSE;
	var $model_name = FALSE;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->view_data['pagename'] = get_class($this);
	}
	
	public function teaser()
	{
		$data['cmsname'] = parent::cmsname() . ' | Welcome';
		$view['content_for_layout'] = $this->load->view('welcome/index', $data);
		
		$this->load->view('page/index', $view);
		
		// Set Master Template using Templex
		/*$this->templex->template('page/index');
		
		$this->templex->set('cmsname', parent::cmsname() . ' | Welcome');
		
		$this->templex->render('welcome/index');*/
	}
	
	public function hello($name)
	{
		$this->method_autoload = FALSE;
		echo "Hello " . $name;
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */