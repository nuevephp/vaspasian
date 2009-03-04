<?php defined('BASEPATH') or die('No direct script access.');
/*
 * Created on 22 Dec 2008
 * by Andrew Smith <a.smith@silentworks.co.uk>
 */

/**
 *
 */
class Core
{	
	public static function convert_size($num)
	{
	    if ($num >= 1073741824) $num = round($num / 1073741824 * 100) / 100 .' gb';
	    else if ($num >= 1048576) $num = round($num / 1048576 * 100) / 100 .' mb';
	    else if ($num >= 1024) $num = round($num / 1024 * 100) / 100 .' kb';
	    else $num .= ' b';
	    return $num;
	}
	
	public static function script($script, $path = NULL, $charset = 'utf-8')
	{
	    $filepath = $path ? $path : NULL;
	    $compiled = '';
	    
	    if(is_array($script)){
	    	foreach($script as $js){
	    		$compiled .= core::script($js, $filepath, $charset);
	    	}
	    } else {
	    	// Check if full URL
			if (strpos($script, '://') === FALSE)
			{
				// Check to see if prefix is present
				$suffix = (substr($script, -3) !== '.js') ? '.js' : '';
				$script = base_url().$filepath.$script.$suffix;
			}
			
	    	$compiled = '<script src="'. $script .'"  type="text/javascript" charset="'. $charset .'"></script>';
	    }
	    	
	    return $compiled;
	}
	
	public static function stylesheet($stylesheet, $path = NULL, $media = 'screen')
	{   
	    $filepath = $path ? $path : '';
	    
	    $compiled = '';
	    
	    if(is_array($stylesheet)){
	    	foreach($stylesheet as $css){
	    		$compiled .= core::stylesheet($css, $filepath, $media);
	    	}
	    } else {
	    	// Check if full URL
			if (strpos($stylesheet, '://') === FALSE)
			{
				// Check to see if prefix is present
				$suffix = (substr($stylesheet, -4) !== '.css') ? '.css' : '';
				$stylesheet = base_url().$filepath.$stylesheet.$suffix;
			}
			
	    	//$compiled = '<script src="'. $stylesheet .'"  type="text/javascript" charset="'. $charset .'"></script>';
	    	$compiled = '<link rel="stylesheet" type="text/css" media="'. $media .'" href="'. $stylesheet .'" />';
	    }
	    	
	    return $compiled;
	}
}
/* End of file core_helper.php */
/* Location: ./application/admin/helpers/core_helper.php */