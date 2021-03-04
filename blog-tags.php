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

    public function show_tags() {
        $output = '';
        $post_tags = get_the_tags();
        $separator = ' | ';

        if (!empty($post_tags)) {
            foreach ($post_tags as $tag) {
                $output .= '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>' . $separator;
            }
        }

        return trim($output, $separator);
    }

}

$blog_tags = new BlogTags();

register_activation_hook(__FILE__, array($blog_tags, 'activate'));

add_shortcode('show_blog_tags', array($blog_tags, 'show_tags'));
