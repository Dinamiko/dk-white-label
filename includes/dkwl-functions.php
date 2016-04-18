<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
* login logo
*/
function dkwl_login_logo(){

  $branding_logo = get_option( 'dkwl_branding_logo', '' );

  if( $branding_logo ){
    $logo = wp_get_attachment_image_src( $branding_logo, 'medium' );
    ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo $logo[0];?>) !important;
            background-size: <?php echo $logo[1];?>px <?php echo $logo[2];?>px !important;
            background-position: center center;
            background-repeat: no-repeat;
            width: <?php echo $logo[1];?>px !important;
            height: <?php echo $logo[2];?>px !important;
        }
    </style>
    <?php 
  } 

}  
add_action( 'login_enqueue_scripts', 'dkwl_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return '';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/**
* hide admin menus
*/
function dkwl_hide_admin_menus() {

    $hide_menu_pages = get_option( 'dkwl_hide_menu_pages', array() );

    if( $hide_menu_pages ) {
        foreach ( $hide_menu_pages as $page ) {
            if( $page == 'page' ) {
                remove_menu_page( 'edit.php?post_type=page' );  
            } else {
                remove_menu_page( $page.'.php' ); 
            }          
        }
    }
    
}
add_action( 'admin_menu', 'dkwl_hide_admin_menus' );

/**
* hide toolbar elements
*/
function dkwl_hide_toolbar_elements( $wp_admin_bar ) {

    $hide_toolbar_elements = get_option( 'dkwl_hide_toolbar_elements', array() );

    if( $hide_toolbar_elements ) {
        foreach ( $hide_toolbar_elements as $element ) { 
            $wp_admin_bar->remove_node( $element );     
        }
    } 

}
add_action( 'admin_bar_menu', 'dkwl_hide_toolbar_elements', 999 );

/**
*
*/
function dkwl_admin_footer_text( $text ) {

    $admin_footer_text = get_option( 'dkwl_admin_footer_text', '' );

    if( $admin_footer_text ) {
        echo $admin_footer_text;
    } else {
        echo $text;
    }

}
add_filter('admin_footer_text', 'dkwl_admin_footer_text');