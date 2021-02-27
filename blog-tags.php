<?php
/*
Plugin Name: Blog Tags
Plugin URI: https://github.com/illinois-dres-aitg/blog-tags
Description: Adds a tags view of blog posts
Version: 1.0
Author: Jon Gunderson
Author URI: https://github.com/illinois-dres-aitg/blog-tags
License: GPLv2
 */

if (!function_exists('debug')) {
    function debug($var = false, $showHtml = false, $showFrom = true) {
        if ($showFrom) {
            $calledFrom = debug_backtrace();
            echo '<strong>';
            echo substr(str_replace(ROOT, '', $calledFrom[0]['file']), 1);
            echo '</strong>';
            echo ' (line <strong>' . $calledFrom[0]['line'] . '</strong>)';
        }
        echo "\n<pre class=\"cake-debug\">\n";

        $var = print_r($var, true);
        if ($showHtml) {
            $var = str_replace('<', '&lt;', str_replace('>', '&gt;', $var));
        }
        echo $var . "\n</pre>\n";
    }
}


define('WPCE_DIR_NAME', str_replace(basename(__FILE__), '', plugin_basename(__FILE__)));
define('WPCE_URL', WP_PLUGIN_URL. '/' . WPCE_DIR_NAME);
define('WPCE_DIR', WP_PLUGIN_DIR. '/' . WPCE_DIR_NAME);



class Plugin {
    public function activate() {}
}



$plugin = new Plugin();

register_activation_hook(__FILE__, array($plugin, 'activate'));
