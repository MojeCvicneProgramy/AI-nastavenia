<?php
/*
Plugin Name: Under Construction
Description: A simple maintenance mode plugin to display a custom maintenance page for non-logged-in users.
Version: 1.0
Author: Your Name
*/

defined('ABSPATH') or die('No script kiddies please!');

// Function to check if maintenance mode is enabled
function mm_is_maintenance_mode() {
    return get_option('mm_enabled', false);
}

// Function to display the maintenance page
function mm_display_maintenance_page() {
    if ( !is_user_logged_in() && !current_user_can('manage_options') ) {
        // Set HTTP status to 503
        status_header(503);
        header('Retry-After: 3600');
        
        // Load the maintenance template
        include plugin_dir_path(__FILE__) . 'views/maintenance.php';
        exit;
    }
}

// Hook into the template_redirect action
add_action('template_redirect', 'mm_display_maintenance_page');

// Function to activate the maintenance mode
function mm_activate_maintenance_mode() {
    add_option('mm_enabled', true);
}

// Function to deactivate the maintenance mode
function mm_deactivate_maintenance_mode() {
    delete_option('mm_enabled');
}

// Register activation and deactivation hooks
register_activation_hook(__FILE__, 'mm_activate_maintenance_mode');
register_deactivation_hook(__FILE__, 'mm_deactivate_maintenance_mode');
?>