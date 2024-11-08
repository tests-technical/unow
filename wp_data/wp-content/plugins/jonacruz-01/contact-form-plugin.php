<?php

/**
 * Plugin Name: Jonacruz - Contact Form Plugin
 * Plugin URI: https://example.com/plugins/contact-form-plugin/
 * Description: A simple contact form plugin with admin listing for unow.
 * Version: 1.0
 * Author: Your Name
 * Author URI: https://example.com/
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: contact-form-plugin
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Define plugin constants
define('CFP_VERSION', '1.0.0');
define('CFP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('CFP_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include necessary files
require_once CFP_PLUGIN_DIR . 'includes/shortcode.php';
require_once CFP_PLUGIN_DIR . 'includes/database.php';
require_once CFP_PLUGIN_DIR . 'includes/admin-page.php';

// Activation hook
register_activation_hook(__FILE__, 'cfp_activate');

function cfp_activate()
{
    // Create database table
    CFP_Database::create_table();
}

// Deactivation hook
register_deactivation_hook(__FILE__, 'cfp_deactivate');

function cfp_deactivate()
{
    // Cleanup tasks if needed
}

// Initialize the plugin
add_action('plugins_loaded', 'cfp_init');

function cfp_init()
{
    // Initialize shortcode
    CFP_Shortcode::init();

    // Initialize admin page
    if (is_admin()) {
        CFP_Admin_Page::init();
    }
}
