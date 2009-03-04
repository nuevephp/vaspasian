<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* define the modules base path */
define('MODBASE', APPPATH.'modules/');

/* define the offset from application/controllers */
define('MODOFFSET', '../modules/');

/**
 * Modular Extensions - PHP5
 *
 * Adapted from the CodeIgniter Core Classes
 * @copyright	Copyright (c) 2006, EllisLab, Inc.
 * @link		http://codeigniter.com
 *
 * Description:
 * This library extends the CodeIgniter router class.
 *
 * Install this file as application/libraries/MY_Router.php
 *
 * @copyright 	Copyright (c) Wiredesignz 2008-11-20
 * @version 	5.1.40
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class Vaspasian_Router extends CI_Router
{
	public function _validate_request($segments)
	{
		/* Modification starts */
		// Does the requested controller exist in the root folder?
		if (file_exists(APPPATH.'controllers/'.$segments[0].EXT))
		{
			return $segments;
		}

		// Is the controller in a sub-folder?
		if (is_dir(APPPATH.'controllers/'.$segments[0]))
		{		
			// Set the directory and remove it from the segment array
			$this->set_directory($segments[0]);
			$segments = array_slice($segments, 1);
			
			if (count($segments) > 0)
			{
				// Does the requested controller exist in the sub-folder?
				if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$segments[0].EXT))
				{
					show_404($this->fetch_directory().$segments[0]);
				}
			}
			else
			{
				$this->set_class($this->default_controller);
				$this->set_method('index');
			
				// Does the default controller exist in the sub-folder?
				if ( ! file_exists(APPPATH.'controllers/'.$this->fetch_directory().$this->default_controller.EXT))
				{
					$this->directory = '';
					return array();
				}
			
			}

			return $segments;
		}
		
		/* Modificatiion Ends */
	
		(isset($segments[1])) OR $segments[1] = NULL;
	
		/* locate the module controller */
		list($module, $controller) = Router::locate($segments);

		/* no controller found */
		($module === FALSE) AND show_404($controller);
		
		/* set the module directory */
		Router::$path = ($controller) ? $module : NULL ;
		
		/* set the module path */
		$path = ($controller) ? MODOFFSET.$module.'/controllers/' : NULL;

		$this->set_directory($path);

		/* remove the directory segment */
		if ($controller != $module AND $controller != NULL)
			$segments = array_slice($segments, 1);

		return $segments;
	}
}

class Router
{
	public static $path;
	
	/** Locate the controller **/
	public static function locate($segments)
	{		
		list($module, $controller) = $segments;
		
		/* a module? */
		if ($module AND is_dir(MODBASE.$module))
		{
			($controller == NULL) AND $controller = $module;
			
			/* a module sub-controller? */
			if(is_file(MODBASE.$module.'/controllers/'.$controller.EXT))			
				return array($module, $controller);
				
			/* a module controller? */
			return array($module, $module);
		}
		
		/* an application controller? */
		if (is_file(APPPATH.'controllers/'.$module.EXT))
			return array($module, NULL);
		
		/* no controller found */
		return array(FALSE, NULL);
	}
}