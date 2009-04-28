<?php defined('BASEPATH') or die('No direct script access.');

function theme_directory($theme = '') {
	if($theme !== '') {
		$theme_dir = THEME_PATH . $theme;
		if(is_dir($theme_dir)) return base_url() . THEME_PATH . $theme;
		else show_error('Theme {'.theme_name().'} could not be found.');
	} else {
		$theme_dir = THEME_PATH . theme_name();
		if(is_dir($theme_dir)) return base_url() . THEME_PATH . theme_name();
		else show_error('Theme {'.theme_name().'} could not be found.');
	}
}

function theme_name() {
	$ci =& get_instance();
	$ci->load->model('themes');
	$default = $ci->themes->current();
	return $default->name;
}

function stylesheet($file, $media = 'screen')
{
	return core::stylesheet($file, 'themes/public/clean', $media);
}
/* End of file public_helper.php */
/* Location: ./cms/helpers/public_helper.php */