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

    function register_post_type() {
        register_post_type('blog_tags',
            array(
                'labels'      => array(
                    'name'          => __('Blog Tags', 'textdomain'),
                    'singular_name' => __('Blog Tag', 'textdomain'),
                ),
                    'public'      => true,
                    'has_archive' => true,
                    'rewrite'     => array( 'slug' => 'all-blog-tags' ), // my custom slug
            )
        );
    }

    private function list_of_tags($tags) {
        $html = '  <ul class="post_tags">';
        foreach ( $tags as $tag ) {
            if ($tag->count > 0) {
                $tag_link = get_tag_link( $tag->term_id );

                $html .= "  <li><a href='{$tag_link}' class='{$tag->slug}'>";
                $html .= "{$tag->name} ({$tag->count} posts)</a></li>";
            }
        }
        $html .= '  </ul>';
        return $html;
    }

    public function show_tags() {
        $html = '<div class="post_tags">';

        $tags = get_tags(array(
              'taxonomy' => 'post_tag',
              'orderby' => 'count'));

        $html .= '  <h2 class="post_tags">Tags by Popularity</h2>';

        $html .= $this->list_of_tags($tags);

        $tags = get_tags(array(
              'taxonomy' => 'post_tag',
              'orderby' => 'name'));

        $html .= '  <h2 class="post_tags">Tags by Name</h2>';

        $html .= $this->list_of_tags($tags);

        $html .= '</div>';
        echo $html;
    }

}

$blog_tags = new BlogTags();

register_activation_hook(__FILE__, array($blog_tags, 'activate'));

add_action('init', array($blog_tags, 'register_post_type'));

add_shortcode('show_blog_tags', array($blog_tags, 'show_tags'));
