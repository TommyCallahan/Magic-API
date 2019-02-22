<?php
defined( 'ABSPATH' ) or die( 'RIP' );

/**
 * Plugin Name: TC's Magic Directory - Highspot
 * Plugin URI: iamtomcallahan.com
 * Description: Coding Challenge Plugin For Highspot.
 * Version: 1.0
 * Author: Tom Callahan
 * Author URI: http://iamtomcallahan.com
 */




  add_filter( 'template_include', 'custom_template' );

  function custom_template( $template )
  {
      if( isset( $_GET['magic']) && 'yes' == $_GET['magic'] )
          $template = plugin_dir_path( __FILE__ ) . 'magic.php';

      return $template;
}


?>
