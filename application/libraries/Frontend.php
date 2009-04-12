<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Frontend Class
 *
 * Controls every request made to a page on website
 *
 * @license 	MIT Licence
 * @category	Libraries
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		11 Apr 2009
 */
class Frontend extends Controller
{
	//name of the controller
    var $name;
    
    //this are vars use for the layout autoloading
    var $layout = FALSE;
    var $head_template;
    var $view;
    var $foot_template;
    var $view_data;
    var $method_autoload = TRUE;
    var $parser = FALSE;
    
	function __construct() {
		parent::__construct();
		
		$this->name = get_class($this);
		
		// Profiler
		// $this->output->enable_profiler(TRUE);
		
		// Load Models
		/*$this->load->model('page_model');
		$this->load->model('page_part_model');
		$this->load->model('layout_model');
		$this->load->model('snippet_model');
		
		// Load Helpers
		$this->load->helper('page');*/
		
		// Load Plugins
		
		
		// Build Routes
		$this->alias->build_routes();
	}
	
	function _remap($method)
    {
        $passedParams = array_slice($this->uri->rsegments, 2);
        
        $this->valid_method($method, $passedParams);
        
        //call the method...
        call_user_func_array(array(&$this, $method), $passedParams);
        
        $this->autoload_templates($method);
    }
    
    /*
     * Valid that the method is public and
     * the number of required params is not minor than the number of params sent
     */
    protected function valid_method($method, $passedParams)
    {
        if(method_exists($this, $method))
        {
            $reflectionMethod = new ReflectionMethod($this, $method);
            
            if(!$reflectionMethod->isPublic())
            {
                $error = "The method must be public";
            }
           
            if(count($passedParams) < $reflectionMethod->getNumberOfRequiredParameters()) 
            {
                $error = 'The method must be called with the number or required parameters'; 
            }
            
        }
        else
        {
            $error = 'The method "'.$method.'" does not exist';
        }
        
        if(isset($error))
        {
            show_error($error);
            exit();
        }
    }
    
    /*
     * The system will autoload templates in this way:
     * 
     * if $template is not FALSE templates will be autoloaded
     * 
     * if $layout is TRUE (by default) head and foot will be autoloaded
     * 
     * the templates with be autoloaded by default in:
     *  
     * views/(subfolder optional)/CONTROLLER/head.php,
     * views/(subfolder optional)/CONTROLLER/METHOD.php
     * views/(subfolder optional)/CONTROLLER/foot.php,
     * 
     * you can customize the head, main and foot template specifing the entire path
     * with the $head_template, $template and $foot_template vars
     * 
     */
    protected function autoload_templates($method)
    {
        if($this->view === FALSE) return;
        if($this->method_autoload === FALSE) return;
        
        if(isset($this->uri->segments[1]) && (!isset($this->uri->rsegments[1]) ||
            $this->uri->segments[1] != $this->uri->rsegments[1]))
        {
            $base_layout_uri = $this->uri->segments[1].'/';
            
            if($this->view == NULL)
            {                
                $template_uri = $base_layout_uri.strtolower($this->name).'/'.$method;
            }
            else
            {
                $template_uri = $this->view;
            }
        }
        else
        {            
            $base_layout_uri = '';
            $template_uri = ($this->view == NULL) ? strtolower($this->name).'/'.$method : $this->view;
        }
        
        // If using as a layout style
        if($this->layout == TRUE)
        {
            $this->load->view(($this->head_template == NULL) ?
                                                $base_layout_uri.'head' : $this->head_template,
                                                $this->view_data);
                                                
            $this->load->view($template_uri, $this->view_data);
            
            $this->load->view(($this->foot_template == NULL) ?
                                                $base_layout_uri.'foot' : $this->foot_template,
                                                $this->view_data);
        }
        else
        {
            // $this->load->view($template_uri, $this->view_data);
            $this->templex->template($template_uri);
            if($this->parser === TRUE) {
            	$this->templex->render('' , $view_data = FALSE, $parser = 'parser');
            } else { $this->templex->render(); }
        }
        
    }
}
/* End of file Frontend.php */
/* Location: ./application/libraries/Frontend.php */