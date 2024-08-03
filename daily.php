<?php
/**
 * Plugin Name: Daily Message
 * Description: Allows the admin to input a daily message which will be displayed on the home page.
 * Version: 1.1
 * Author: Your Name
 * Update URI: https://github.com/your-github-username/your-repo
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Include the admin settings page
require_once(plugin_dir_path(__FILE__) . 'admin/daily-message-admin.php');

// Function to display the daily message on the home page
function display_daily_message() {
    if (is_front_page()) {
        $daily_message = get_option('daily_message');
        if ($daily_message) {
            echo '<div class="daily-message">' . esc_html($daily_message) . '</div>';
        }
    }
}
add_action('wp_footer', 'display_daily_message');

// Enqueue plugin styles
function daily_message_enqueue_styles() {
    wp_enqueue_style('daily-message-styles', plugin_dir_url(__FILE__) . 'css/daily-message.css');
}
add_action('wp_enqueue_scripts', 'daily_message_enqueue_styles');
?>
