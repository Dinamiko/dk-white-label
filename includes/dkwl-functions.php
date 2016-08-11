<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
* login logo
*/
function dkwl_login_styles(){

  $loginpage_logo = get_option( 'dkwl_loginpage_logo', '' );
  $loginpage_bg_color = get_option( 'dkwl_loginpage_bg_color', '#f1f1f1' );

  if( $loginpage_logo ){
    $logo = wp_get_attachment_image_src( $loginpage_logo, 'medium' );
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
        body, html {
            background: <?php echo $loginpage_bg_color;?> !important;
        }
    </style>
    <?php 
  } 

}  
add_action( 'login_enqueue_scripts', 'dkwl_login_styles' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return '';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/**
* hide toolbar in front-end
*/
function dkwl_hide_frontend_toolbar_function(){
    $hide_frontend_toolbar = get_option('dkwl_hide_frontend_toolbar', '' );
    if( $hide_frontend_toolbar == 'on' ) {
        return false;
    } else {
        return true;
    }    
}
add_filter( 'show_admin_bar' , 'dkwl_hide_frontend_toolbar_function' );

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
* hide dashboard metaboxes
*/
function dkwl_hide_dashboard_metaboxes() {

    $hide_dashboard_metaboxes = get_option( 'dkwl_hide_dashboard_metaboxes', array() );

    if( $hide_dashboard_metaboxes ) {
        foreach ( $hide_dashboard_metaboxes as $element ) { 
            if( $element == 'welcome' ) {
                global $wp_filter;
                unset( $wp_filter['welcome_panel'] );
            } else if( $element == 'dashboard_activity' || $element == 'dashboard_right_now' ) {
                remove_meta_box( $element, 'dashboard', 'normal' );
            } else {
                remove_meta_box( $element, 'dashboard', 'side' );
            }                
        }
    } 

}
add_action( 'wp_dashboard_setup', 'dkwl_hide_dashboard_metaboxes' );

/**
* hide dashboard help tab
*/
function dkwl_hide_dashboard_help_tab( $old_help, $screen_id, $screen ){

    $hide_dashboard_help_tab = get_option('dkwl_hide_dashboard_help_tab', '' );

    if( $hide_dashboard_help_tab == 'on' ) {
        $screen->remove_help_tabs();
        return $old_help;
    } 

}
add_filter( 'contextual_help', 'dkwl_hide_dashboard_help_tab', 999, 3 );

/**
* change admin footer text 
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

/**
*
*/
function dkwl_get_custom_color_scheme_css() {

    $enable_custom_color_scheme = get_option('dkwl_enable_custom_color_scheme', '' );

    if( $enable_custom_color_scheme == 'on' ) {

        if ( isset( $_GET['dk-white-label-custom-color-scheme'] ) ) {
            dkwl_print_custom_color_scheme_css();
            exit;
        }
        
    }

}
add_action('admin_init', 'dkwl_get_custom_color_scheme_css', 0);

/**
*
*/
function dkwl_print_custom_color_scheme_css() {

    $enable_custom_color_scheme = get_option('dkwl_enable_custom_color_scheme', '' );

    if( $enable_custom_color_scheme == 'on' ) {
        header("Content-type: text/css");
        require_once(plugin_dir_path(__FILE__) . '/dk-white-label-custom-color-scheme.php');
    }

}

/**
*
*/
function dkwl_create_custom_color_scheme() {

    $enable_custom_color_scheme = get_option('dkwl_enable_custom_color_scheme', '' );

    if( $enable_custom_color_scheme == 'on' ) {
    
        $color_scheme_1 = get_option('dkwl_color_scheme_1', '#333' );
        $color_scheme_2 = get_option('dkwl_color_scheme_2', '#222' );
        $color_scheme_3 = get_option('dkwl_color_scheme_3', '#0073aa' );
        $color_scheme_4 = get_option('dkwl_color_scheme_4', '#999' );

        wp_admin_css_color( 'dkwl_custom_color_scheme', __( 'Custom Color Scheme' ),
            admin_url('?dk-white-label-custom-color-scheme', __FILE__),
            array( $color_scheme_2, $color_scheme_1, $color_scheme_3, $color_scheme_4 )
        );

        remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

    }

}
add_action('admin_init', 'dkwl_create_custom_color_scheme');

/**
*
*/
function dkwl_assign_color_scheme( $result, $option, $user ) {

    $enable_custom_color_scheme = get_option('dkwl_enable_custom_color_scheme', '' );

    if( $enable_custom_color_scheme == 'on' ) {
        return 'dkwl_custom_color_scheme';
    }

}
add_filter( 'get_user_option_admin_color', 'dkwl_assign_color_scheme', 5, 3 );

/**
* sanitize dkwl options
*/ 
function dkwl_sanitize_options() {
    add_filter( 'pre_update_option_dkwl_admin_footer_text', 'dkwl_update_field_admin_footer_text', 10, 2 );  
}
add_action( 'init', 'dkwl_sanitize_options' );

/**
* sanitizes dkwl_admin_footer_text option
*/
function dkwl_update_field_admin_footer_text( $new_value, $old_value ) {

    $arr = array(
        'a' => array(
            'href' => array(),
            'title' => array(),
            'class' => array(),
            'id' => array(),
            'style' => array()
        ),
        'em' => array(),
        'strong' => array(),
        'span' => array(
           'title' => array(),
           'class' => array(),
           'id' => array(),
           'style' => array()
        ),
    );

    $new_value = wp_kses( $new_value, $arr );
    return $new_value;

}




