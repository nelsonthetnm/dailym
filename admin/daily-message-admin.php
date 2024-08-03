<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

add_action('admin_menu', 'daily_message_admin_menu');
add_action('admin_init', 'daily_message_settings_init');

function daily_message_admin_menu() {
    add_menu_page(
        'Daily Message', 
        'Daily Message', 
        'manage_options', 
        'daily-message', 
        'daily_message_options_page'
    );
}

function daily_message_settings_init() {
    register_setting('dailyMessageGroup', 'daily_message');

    add_settings_section(
        'daily_message_section',
        __('Daily Message Settings', 'daily-message'),
        null,
        'dailyMessageGroup'
    );

    add_settings_field(
        'daily_message_field',
        __('Daily Message', 'daily-message'),
        'daily_message_field_render',
        'dailyMessageGroup',
        'daily_message_section'
    );
}

function daily_message_field_render() {
    $daily_message = get_option('daily_message');
    ?>
    <textarea name="daily_message" rows="5" cols="50"><?php echo esc_html($daily_message); ?></textarea>
    <?php
}

function daily_message_options_page() {
    ?>
    <form action='options.php' method='post'>
        <h2>Daily Message</h2>
        <?php
        settings_fields('dailyMessageGroup');
        do_settings_sections('dailyMessageGroup');
        submit_button();
        ?>
    </form>
    <?php
}
?>
