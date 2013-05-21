<?php
/*
 * Plugin Name: Strip Version from scripts
 * Plugin URI: http://wellrootedmedia.com/?p=1170
 * Description: This is a simple contact form with a captcha
 * Version: 1.0
 * Author: Well Rooted Media
 * Author URI: http://wellrootedmedia.com
 * License: GPL2
 */
add_filter( 'script_loader_src', 'remove_src_version' );
add_filter( 'style_loader_src', 'remove_src_version' );

function remove_src_version ( $src ) {

    global $wp_version;

    $version_str = '?ver='.$wp_version;
    $version_str_offset = strlen( $src ) - strlen( $version_str );

    if( substr( $src, $version_str_offset ) == $version_str )
        return substr( $src, 0, $version_str_offset );
    else
        return $src;

}
