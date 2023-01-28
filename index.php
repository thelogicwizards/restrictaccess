<?php
/*
Plugin Name: Restrict Access
Description: Add [desktoponly] or [mobileonly] shortcodes to a Page or Post to restrict access by device type with redirects.
Version: 1.0
Author: Craig Culpepper-Boyd
Author URI: http://www.linkedin.com/in/craigbreeze
Plugin URI: http://www.logicwizards.one
Text Domain: Restrict Access
*/
?>
<?php

// Prevent direct access to this file
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// includes the main plugin file
require_once plugin_dir_path( __FILE__ ) . 'restrictaccess.php';

// registers the activation and deactivation hooks
register_activation_hook( __FILE__, 'activate_restrictaccess' );
register_deactivation_hook( __FILE__, 'deactivate_restrictaccess' );

// defines the functions that run on plugin activation and deactivation
function activate_restrictaccess() {
    // code to run on plugin activation
}
function deactivate_restrictaccess() {
    // code to run on plugin deactivation
}

// runs the main plugin file
run_restrictaccess();
?>