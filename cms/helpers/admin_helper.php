<?php defined('BASEPATH') or die('No direct script access.');
/*
 * Created on 24 Dec 2008
 * by Andrew Smith <a.smith@silentworks.co.uk>
 */

/**
 *
 */
class Admin
{
	public static function theme($theme = NULL)
	{
		if($theme)
			$compiled = 'themes/admin/' . $theme;
		else
			$compiled = 'themes/admin/simple';
		
		return base_url() . $compiled;
	}
	
	public static function stylesheet($file, $media = 'screen')
	{
		// return core::stylesheet($file, '/themes/admin/' . theme::current());
		return core::stylesheet($file, 'themes/admin/simple', $media);
	}
}
/* End of file admin_helper.php */
/* Location: ./application/modules/admin/helpers/admin_helper.php */