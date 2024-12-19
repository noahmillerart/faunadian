<?php

// ---------------------------- Thumbnail

add_theme_support('post-thumbnails');

// ---------------------------- Search

function yourtheme_customize_search_query($query) {
    if ($query->is_search() && $query->is_main_query()) {
        $query->set('post_type', 'post');
        $query->set('posts_per_page', 10);

        // Apply filter to modify search WHERE clause
        add_filter('posts_search', 'yourtheme_modify_search_where', 10, 2);

        if (get_query_var('paged') == 1) {
            $query->set('paged', 1);
        }
    }
}

function yourtheme_modify_search_where($where, $query) {
    global $wpdb;
    if (isset($query->query_vars['s'])) {
        $search_terms = esc_sql($wpdb->esc_like($query->query_vars['s']));
        $where = " AND ($wpdb->posts.post_title LIKE '%$search_terms%' OR $wpdb->posts.post_excerpt LIKE '%$search_terms%')";
    }
    return $where;
}

add_action('pre_get_posts', 'yourtheme_customize_search_query');

// Remove the filter after it's used
function yourtheme_remove_modify_search_where_filter() {
    remove_filter('posts_search', 'yourtheme_modify_search_where', 10);
}
add_action('wp', 'yourtheme_remove_modify_search_where_filter');

function custom_login_logo() {
    echo '<style type="text/css">
        .login h1 a {
            background-image: url('.get_stylesheet_directory_uri().'/img/logo_MS.png);
            background-size: contain;
            width: 200px;
            /* Hide the text */
            text-indent: -9999px;
            overflow: hidden;
            display: block;
            /* Ensure proper accessibility */
            position: relative;
        }
    </style>';
    // Change the login logo URL
    echo '<script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            var loginLogoLink = document.querySelector(".login h1 a");
            if (loginLogoLink) {
                loginLogoLink.href = "'.home_url().'"; // Replace with your desired URL
            }
        });
    </script>';
}
add_action('login_head', 'custom_login_logo');

?>