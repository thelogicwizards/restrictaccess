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

// [desktoponly] shortcode //
add_shortcode('desktoponly', 'wp_snippet_desktop_only_shortcode');
function wp_snippet_desktop_only_shortcode($atts, $content = null){ 
if( !wp_is_mobile() ){ 
   return wpautop( do_shortcode( $content ) ); 
} else {
   $desktop_redirect = get_option( 'desktop_redirect' );
   wp_redirect($desktop_redirect); 
} 
}
// [mobileonly] shortcode //
add_shortcode('mobileonly', 'wp_snippet_mobile_only_shortcode');
function wp_snippet_mobile_only_shortcode($atts, $content = null){ 
   if( wp_is_mobile() ){ 
      return  wpautop( do_shortcode( $content ) ); 
   } else {
   $mobile_redirect = get_option( 'mobile_redirect' );
   wp_redirect($mobile_redirect); 
}
}
require_once dirname(__FILE__) . '/admin-options.php';

?>
<?php
function wp_snippet_create_menu() {
    add_options_page( 'Redirect Settings', 'Redirect Settings', 'manage_options', 'redirect-settings', 'wp_snippet_settings_page' );
}
add_action( 'admin_menu', 'wp_snippet_create_menu' );

function wp_snippet_settings_page() {

<div class="wrap">
    <h1>Redirect Settings</h1>
    <form method="post" action="options.php">
        <?php settings_fields( 'redirect-settings-group' ); ?>
        <?php do_settings_sections( 'redirect-settings-group' ); ?>
        <table class="form-table">
            <tr valign="top">
            <th scope="row">Desktop Redirect</th>
            <td>
                <?php
                $args = array(
                    'depth'                 => 0,
                    'child_of'              => 0,
                    'selected'              => get_option('desktop_redirect'),
                    'echo'                  => 1,
                    'name'                  => 'desktop_redirect',
                    'id'                    => null,
                    'class'                 => null,
                    'show_option_none'      => null,
                    'show_option_no_change' => null,
                    'option_none_value'     => null,
                );
                wp_dropdown_pages( $args );
                ?>
            </td>
            </tr>
             
            <tr valign="top">
            <th scope="row">Mobile Redirect</th>
            <td>
                <?php
                $args = array(
                    'depth'                 => 0,
                    'child_of'              => 0,
                    'selected'              => get_option('mobile_redirect'),
                    'echo'                  => 1,
                    'name'                  => 'mobile_redirect',
                    'id'                    => null,
                    'class'                 => null,
                    'show_option_none'      => null,
                    'show_option_no_change' => null,
                    'option_none_value'     => null,
                );

                }              