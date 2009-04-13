<?php

class Welcome extends Page {

	var $layout = TRUE;
	// var $parser = 'parser';
	var $model_name = FALSE;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		// Set Master Template using Templex
		$this->templex->set('cmsname', parent::cmsname());
	}
	
	public function hello($name)
	{
		$this->method_autoload = FALSE;
		echo "Hello " . $name;
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */