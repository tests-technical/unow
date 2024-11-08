<?php

/**
 * Handles the shortcode and form submission
 */
class CFP_Shortcode
{

    /**
     * Initialize the shortcode
     */
    public static function init()
    {
        add_shortcode('contact_form', array(__CLASS__, 'render_form'));
        add_action('wp_enqueue_scripts', array(__CLASS__, 'enqueue_scripts'));
        add_action('wp_ajax_submit_contact_form', array(__CLASS__, 'handle_form_submission'));
        add_action('wp_ajax_nopriv_submit_contact_form', array(__CLASS__, 'handle_form_submission'));
    }

    /**
     * Enqueue necessary scripts and styles
     */
    public static function enqueue_scripts()
    {
        wp_enqueue_script('jquery');
        wp_enqueue_script('cfp-script', CFP_PLUGIN_URL . 'assets/js/cfp-script.js', array('jquery'), CFP_VERSION, true);
        wp_localize_script('cfp-script', 'cfp_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('cfp_nonce')
        ));
    }

    /**
     * Render the contact form
     */
    public static function render_form()
    {
        ob_start();
?>
        <form id="cfp-contact-form" class="cfp-form">
            <div class="cfp-form-group">
                <label for="cfp-name"><?php _e('Name', 'contact-form-plugin'); ?></label>
                <input type="text" id="cfp-name" name="name" required>
            </div>
            <div class="cfp-form-group">
                <label for="cfp-email"><?php _e('Email', 'contact-form-plugin'); ?></label>
                <input type="email" id="cfp-email" name="email" required>
            </div>
            <div class="cfp-form-group">
                <label for="cfp-message"><?php _e('Message', 'contact-form-plugin'); ?></label>
                <textarea id="cfp-message" name="message" required></textarea>
            </div>
            <div class="cfp-form-group">
                <button type="submit"><?php _e('Submit', 'contact-form-plugin'); ?></button>
            </div>
            <div id="cfp-form-message"></div>
        </form>
<?php
        return ob_get_clean();
    }

    /**
     * Handle form submission
     */
    public static function handle_form_submission()
    {
        check_ajax_referer('cfp_nonce', 'nonce');

        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);

        if (empty($name) || empty($email) || empty($message)) {
            wp_send_json_error(__('Please fill in all fields', 'contact-form-plugin'));
        }

        $result = CFP_Database::insert_submission($name, $email, $message);

        if ($result) {
            wp_send_json_success(__('Thank you for your message!', 'contact-form-plugin'));
        } else {
            wp_send_json_error(__('An error occurred. Please try again.', 'contact-form-plugin'));
        }
    }
}
