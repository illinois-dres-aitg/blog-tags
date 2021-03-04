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

class BlogTags {
    public function activate() {
        global $wp_version;

        if ( version_compare( $wp_version, '4.1', '<') ) {
            wp_die('This plugin requires WordPress version 4.1 or higher');
        }
    }

    public function deactivate() {

    }

}

$blog_tags = new BlogTags();

register_activation_hook(__FILE__, array($blog_tags, 'activate'));

register_deactivation_hook(__FILE__, array($blog_tags, 'deactivate'));
