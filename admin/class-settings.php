<?php
namespace SYNQ\UtilitySuite\Admin;

class Settings {

    public function __construct() {
        add_action( 'admin_menu', [ $this, 'add_settings_page' ] );
    }

    public function add_settings_page() {
        add_options_page( 'SYNQ Utility Suite', 'SYNQ Utility Suite', 'manage_options', 'synq-utility-suite', [ $this, 'render_settings_page' ] );
    }

    public function render_settings_page() {
        // Output settings form here.
    }
}

new Settings();