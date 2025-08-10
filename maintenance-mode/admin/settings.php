<?php
// Admin settings for the Under Construction plugin

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Add menu item for the settings page
add_action( 'admin_menu', 'mm_add_admin_menu' );
function mm_add_admin_menu() {
    add_options_page( 'Maintenance Mode Settings', 'Maintenance Mode', 'manage_options', 'maintenance_mode', 'mm_settings_page' );
}

// Register settings
add_action( 'admin_init', 'mm_settings_init' );
function mm_settings_init() {
    register_setting( 'mm_options_group', 'mm_enabled' );
    register_setting( 'mm_options_group', 'mm_message' );
    register_setting( 'mm_options_group', 'mm_retry_after' );
    register_setting( 'mm_options_group', 'mm_whitelisted_ips' );
}

// Settings page callback
function mm_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Maintenance Mode Settings', 'maintenance-mode' ); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'mm_options_group' );
            do_settings_sections( 'mm_options_group' );
            ?>
            <h2><?php esc_html_e( 'General Settings', 'maintenance-mode' ); ?></h2>
            <label for="mm_enabled">
                <input type="checkbox" name="mm_enabled" id="mm_enabled" value="1" <?php checked( get_option( 'mm_enabled' ), 1 ); ?> />
                <?php esc_html_e( 'Enable Maintenance Mode', 'maintenance-mode' ); ?>
            </label>
            <br>
            <label for="mm_message"><?php esc_html_e( 'Maintenance Message:', 'maintenance-mode' ); ?></label>
            <textarea name="mm_message" id="mm_message" rows="5" cols="50"><?php echo esc_textarea( get_option( 'mm_message' ) ); ?></textarea>
            <br>
            <label for="mm_retry_after"><?php esc_html_e( 'Retry-After (seconds):', 'maintenance-mode' ); ?></label>
            <input type="number" name="mm_retry_after" id="mm_retry_after" value="<?php echo esc_attr( get_option( 'mm_retry_after', 3600 ) ); ?>" />
            <br>
            <label for="mm_whitelisted_ips"><?php esc_html_e( 'Whitelisted IPs (comma separated):', 'maintenance-mode' ); ?></label>
            <input type="text" name="mm_whitelisted_ips" id="mm_whitelisted_ips" value="<?php echo esc_attr( get_option( 'mm_whitelisted_ips' ) ); ?>" />
            <br>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
?>