<?php defined('BASEPATH') or die('No direct script access.');

/**
 * Automagic Class
 *
 * Description of class
 *
 * @license 	MIT Licence
 * @category	Libraries
 * @author  	Andrew Smith
 * @link    	http://www.silentworks.co.uk
 * @copyright	Copyright (c) 2009, Silent Works.
 * @date		13 Apr 2009
 */
class Automagic extends Controller
{
    
    //name of the controller
    var $name;
    
    //$model_name allows to autoload model, if the var is null the NAME_OF_CONTROLLERs 
    //Model will be loaded automatically (note if it doesn't exist it will generate error...
    //To disable autoloading of the model, set this var to FALSE in the desired controller...
    //To autoload another model just put the name in this var, ex: var $model_name = 'My_model'
    var $model_name = array();
    
    //this are vars use for the layout autoloading
    var $layout = TRUE;
    var $master = 'page/master';
    var $view;
    var $view_data = array();
    var $method_autoload = TRUE;
    var $parser = '';
    
    function __construct()
    {
        parent::__construct();
        
        $this->name = get_class($this);
        
        if($this->model_name !== FALSE)
        {
            if($this->model_name == NULL)
            {                
                $this->model_name = array(strtolower($this->name).'s'); 
            }
            
			foreach($this->model_name as $model){
				$this->load->model($model);
			
				$model_name = $this->model_name;
				$this->model_name = $this->$model;
			}
        }
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
        if($this->layout === TRUE)
        {
        	
			$data['content_for_layout'] = $this->load->view($template_uri, $this->view_data, true);
			if($this->parser !== '') { 
				// Load CI Template Parser Library
				$this->load->library('parser');
				$this->parser->parse($this->master, $data);
			} else { $this->load->view($this->master, $data); }
        }
        else
        {
            $this->templex->template($template_uri);
            if($this->parser === TRUE) {
            	$this->templex->render('' , $this->view_data, $parser = $this->parser);
            } else { $this->templex->render(); }
        }
        
    }
}
/* End of file Automagic.php */
/* Location: ./cms/libraries/Automagic.php */