<?php

/**
 * Handles the admin page for displaying submissions
 */
class CFP_Admin_Page
{

    /**
     * Initialize the admin page
     */
    public static function init()
    {
        add_action('admin_menu', array(__CLASS__, 'add_admin_menu'));
    }

    /**
     * Add the admin menu item
     */
    public static function add_admin_menu()
    {
        add_menu_page(
            __('Contact Form Submissions', 'contact-form-plugin'),
            __('Contact Submissions', 'contact-form-plugin'),
            'manage_options',
            'cfp-submissions',
            array(__CLASS__, 'render_admin_page'),
            'dashicons-email',
            30
        );
    }

    /**
     * Render the admin page
     */
    public static function render_admin_page()
    {
        $per_page = 10;
        $current_page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
        $total_items = CFP_Database::record_count();
        $total_pages = ceil($total_items / $per_page);

        $submissions = CFP_Database::get_submissions($per_page, $current_page);

?>
        <div class="wrap">
            <h1><?php _e('Contact Form Submissions', 'contact-form-plugin'); ?></h1>
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th><?php _e('Name', 'contact-form-plugin'); ?></th>
                        <th><?php _e('Email', 'contact-form-plugin'); ?></th>
                        <th><?php _e('Message', 'contact-form-plugin'); ?></th>
                        <th><?php _e('Submitted At', 'contact-form-plugin'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($submissions as $submission) : ?>
                        <tr>
                            <td><?php echo esc_html($submission['name']); ?></td>
                            <td><?php echo esc_html($submission['email']); ?></td>
                            <td><?php echo esc_html($submission['message']); ?></td>
                            <td><?php echo esc_html($submission['submitted_at']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php
            echo paginate_links(array(
                'base' => add_query_arg('paged', '%#%'),
                'format' => '',
                'prev_text' => __('&laquo;'),
                'next_text' => __('&raquo;'),
                'total' => $total_pages,
                'current' => $current_page
            ));
            ?>
        </div>
<?php
    }
}
