<?php

/**
 * Handles database operations
 */
class CFP_Database
{

    /**
     * Create the database table
     */
    public static function create_table()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'cfp_submissions';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            name varchar(100) NOT NULL,
            email varchar(100) NOT NULL,
            message text NOT NULL,
            submitted_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY  (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }

    /**
     * Insert a new submission into the database
     */
    public static function insert_submission($name, $email, $message)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'cfp_submissions';

        return $wpdb->insert(
            $table_name,
            array(
                'name' => $name,
                'email' => $email,
                'message' => $message,
            ),
            array('%s', '%s', '%s')
        );
    }

    /**
     * Get all submissions from the database
     */
    public static function get_submissions($per_page = 10, $page_number = 1)
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'cfp_submissions';

        $sql = "SELECT * FROM $table_name ORDER BY submitted_at DESC";
        $sql .= " LIMIT $per_page";
        $sql .= ' OFFSET ' . ($page_number - 1) * $per_page;

        return $wpdb->get_results($sql, 'ARRAY_A');
    }

    /**
     * Get the total number of submissions
     */
    public static function record_count()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'cfp_submissions';

        $sql = "SELECT COUNT(*) FROM $table_name";

        return $wpdb->get_var($sql);
    }
}
