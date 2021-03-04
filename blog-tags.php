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

    }
}

$blog_tags = new BlogTags();

register_activation_hook(__FILE__, array($blog_tags, 'activate'));
