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
// Exit if accessed directly
if( !defined( 'ABSPATH' ) && !defined( 'WP_UNINSTALL_PLUGIN' ) )
    exit();

// Remove the shortcode options
delete_option('desktoponly_redirect_page');
delete_option('mobileonly_redirect_page');

// Remove the shortcode tags
remove_shortcode('desktoponly');
remove_shortcode('mobileonly');
?>