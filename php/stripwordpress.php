<?php
/* 
* Removes all the base Wordpress stuff that we don't wont
*/
$wp_load_path = $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php';
require_once $wp_load_path;

require_once ABSPATH . 'wp-admin/includes/file.php';
WP_Filesystem();

$plugin_files = array(
    WP_PLUGIN_DIR . '/hello.php',
    WP_PLUGIN_DIR . '/akismet/akismet.php'
);

foreach ($plugin_files as $plugin_file) {
    if (file_exists($plugin_file) && is_writable($plugin_file)) {
        global $wp_filesystem;
        $wp_filesystem->delete($plugin_file);
    }
}

/* 
* Delete default wordpress post and pages
*/

$post = get_page_by_path('hello-world',OBJECT,'post');
if ($post)
wp_delete_post($post->ID,true);

// Delete default WordPress pages when theme is first activated
function delete_default_pages_on_theme_activation() {
    $pages_deleted = get_option('theme_pages_deleted', false);

    if (!$pages_deleted) {
        // Array of default page slugs to delete
        $default_pages = array(
            'sample-page', // Add relevant slugs here to remove default pages
            'privacy-policy',
        );

        // Loop through default pages and delete each one
        foreach ($default_pages as $page_slug) {
            $page = get_page_by_path($page_slug);
            if ($page) {
                wp_delete_post($page->ID, true);
            }
        }

        // Update the flag to indicate pages have been deleted
        update_option('theme_pages_deleted', true);
    }
}
add_action('after_switch_theme', 'delete_default_pages_on_theme_activation');

/* 
* Delete all default comments when theme is first activated
*/

function delete_all_comments_on_theme_activation() {
    $comments_deleted = get_option('theme_comments_deleted', false);

    if (!$comments_deleted) {
        // Get all comments
        $comments = get_comments();

        // Loop through comments and delete each one
        foreach ($comments as $comment) {
            wp_delete_comment($comment->comment_ID, true);
        }

        // Update the flag to indicate comments have been deleted
        update_option('theme_comments_deleted', true);
    }
}
add_action('after_switch_theme', 'delete_all_comments_on_theme_activation');

/*
* Disable comments on website by default
*/

// Enable or disable comments and trackbacks
update_option('default_comment_status', 'closed'); // Disable comments
update_option('default_ping_status', 'closed'); // Disable trackbacks

// Set comment moderation
update_option('comment_moderation', 1); // Enable comment moderation

// Close comments on older posts
update_option('close_comments_for_old_posts', 1); // Enable closing comments on older posts

// Disable comments on media attachments
update_option('comments_notify', 0); // Disable comments on media attachments

// Disable comment cookies
update_option('show_comments_cookies_opt_in', 0); // Disable comment cookies

// Disable comment author URL field
update_option('require_name_email', 1); // Require name and email for comments

// Enable avatars
update_option('show_avatars', 1); // Enable avatars

// Enable gravatar display
update_option('show_avatars', 'gravatar_default'); // Set to 'gravatar_default' to enable gravatar display

// Update pingback settings
update_option('default_pingback_flag', 0); // Disable pingbacks

// Flush rewrite rules to update the changes
flush_rewrite_rules();