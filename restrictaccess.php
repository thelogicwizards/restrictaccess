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