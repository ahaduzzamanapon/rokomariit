<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('activate_menu_method')) {
    function activate_menu_method($method) {
        // Getting CI class instance.
        $CI = get_instance();
        // Getting router class to active.
        $class = $CI->router->fetch_method();
        return ($class == $method) ? 'current' : '';
    }
}

if(!function_exists('active_menu_class')) {
  	function activate_menu_class($controller) {
	    // Getting CI class instance.
	    $CI = get_instance();
	    // Getting router class to active.
	    $class = $CI->router->fetch_class();
	    return ($class == $controller) ? 'current' : '';
  	}
}

if (!function_exists('backend_activate_menu_method')) {
    function backend_activate_menu_method($method) {
        // Getting CI class instance.
        $CI = get_instance();
        // Getting router class to active.
        $class = $CI->router->fetch_method();
        return ($class == $method) ? 'active' : '';
    }
}

if(!function_exists('backend_active_menu_class')) {
    function backend_activate_menu_class($controller) {
      // Getting CI class instance.
      $CI = get_instance();
      // Getting router class to active.
      $class = $CI->router->fetch_class();
      return ($class == $controller) ? 'active' : '';
    }
}


if(!function_exists('dd')) {
    function dd($var) {
     echo '<pre>'; print_r($var); echo '</pre>';
     exit;
    }
}

if ( ! function_exists('update_sitemap_txt'))

{

    function update_sitemap_txt($url) {

        $sitemap_path = FCPATH . 'sitemap.txt'; // Path to your sitemap.txt

        // Check if the file exists

        if (file_exists($sitemap_path)) {

            $urls = file($sitemap_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        } else {

            $urls = [];

        }

        // Check if the URL already exists
        if (!in_array($url, $urls)) {

            // Add the new URL to the array
            $urls[] = $url;

            // Save the updated URLs back to the file
            file_put_contents($sitemap_path, implode(PHP_EOL, $urls) . PHP_EOL);

        }

    }

    

}