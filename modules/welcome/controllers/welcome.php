<?php

class Welcome extends Page {

	var $layout = FALSE;
	var $parser = TRUE;
	
	public function Welcome()
	{
		parent::Controller();
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