<?php
namespace SYNQ\UtilitySuite;

/**
 * Class responsible for handling security-related utilities.
 *
 * This class provides methods to enhance the security of the WordPress site
 * by implementing various security measures.
 */
class Security_Utility {

    /**
     * Constructor to initialize security hooks.
     */
    public function __construct() {
        $this->disable_xmlrpc();
        $this->remove_wp_version();
        $this->disallow_file_edit();
    }

    /**
     * Disable XML-RPC to prevent potential security vulnerabilities.
     */
    private function disable_xmlrpc() {
        add_filter( 'xmlrpc_enabled', '__return_false' );
    }

    /**
     * Remove WordPress version number from the head section for security.
     */
    private function remove_wp_version() {
        remove_action( 'wp_head', 'wp_generator' );
    }

    /**
     * Disallow file editing from the WordPress admin panel.
     */
    private function disallow_file_edit() {
        if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
            define( 'DISALLOW_FILE_EDIT', true );
        }
    }
}

// Initialize the Security_Utility class to apply security measures.
new Security_Utility();