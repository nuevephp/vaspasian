<?php defined('BASEPATH') or die('No direct script access.');

function theme_directory($theme = '') {
	if($theme !== '') {
		
	} else {
		return base_url() . THEME_PATH . theme_name();
	}
}

function theme_name() {
	$ci =& get_instance();
	$ci->load->model('themes');
	$default = $ci->themes->current();
	return $default->name;
}
/* End of file themes_helper.php */
/* Location: ./cms/helpers/themes_helper.php */