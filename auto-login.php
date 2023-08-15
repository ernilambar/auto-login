<?php
/*
Plugin Name: Auto Login
Plugin URI: https://github.com/ernilambar/auto-login/
Description: Auto login MU plugin.
Author: Nilambar Sharma
Version: 1.0.0
Author URI: https://www.nilambar.net/
*/

/**
 * Login by ID.
 *
 * @since 1.0.0
 */
add_action(
  'init',
  function() {
    if ( isset( $_GET['autologin'] ) && absint( $_GET['autologin'] ) > 0 ) {
      $user = get_user_by('id', absint( $_GET['autologin'] ) );

      if ( false !== $user ) {
        wp_set_current_user( $user->ID, $user->user_login );
        wp_set_auth_cookie( $user->ID );
        do_action( 'wp_login', $user->user_login );

        wp_redirect( admin_url() );
        exit;
      }
    }
} );

