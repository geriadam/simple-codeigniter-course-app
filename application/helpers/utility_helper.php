<?php 

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    if ( ! function_exists('asset_url()'))
	{
		function asset_url()
		{
    		return base_url().'assets/';
		}
	}

	if ( ! function_exists('active_menu()'))
	{
		function active_menu($controller)
		{
			$ci =& get_instance();
    		$class = $ci->router->fetch_class();
    		return ($class == $controller) ? 'active' : '';
		}
	}
?>