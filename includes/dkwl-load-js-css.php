<?php

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_enqueue_scripts', 'dkwl_enqueue_styles', 15 );
add_action( 'wp_enqueue_scripts', 'dkwl_enqueue_scripts', 10 );
add_action( 'admin_enqueue_scripts', 'dkwl_admin_enqueue_scripts', 10, 1 );
add_action( 'admin_enqueue_scripts', 'dkwl_admin_enqueue_styles', 10, 1 );

function dkwl_enqueue_styles () {
	wp_register_style( 'dkwl-frontend', plugins_url( 'dk-white-label/assets/css/frontend.css' ), array(), DKWL_VERSION );
	wp_enqueue_style( 'dkwl-frontend' );
}

function dkwl_enqueue_scripts () {
	wp_register_script( 'dkwl-frontend', plugins_url( 'dk-white-label/assets/js/frontend.js' ), array( 'jquery' ), DKWL_VERSION, true );
	wp_enqueue_script( 'dkwl-frontend' );
}

function dkwl_admin_enqueue_styles ( $hook = '' ) {

	wp_enqueue_style( 'wp-color-picker' );

	wp_register_style( 'dkwl-admin', plugins_url( 'dk-white-label/assets/css/admin.css' ), array(), DKWL_VERSION );
	wp_enqueue_style( 'dkwl-admin' );
}

function dkwl_admin_enqueue_scripts ( $hook = '' ) {

	wp_enqueue_script( 'wp-color-picker');
	
	wp_register_script( 'dkwl-settings-admin', plugins_url( 'dk-white-label/assets/js/settings-admin.js' ), array( 'jquery' ), DKWL_VERSION );
	wp_enqueue_script( 'dkwl-settings-admin' );

	/*
	wp_register_script( 'dkwl-ace', plugins_url( 'dk-white-label/assets/js/src-min/ace.js' ), array(), DKWL_VERSION );
	wp_enqueue_script( 'dkwl-ace' );
	*/

	wp_register_script( 'dkwl-admin', plugins_url( 'dk-white-label/assets/js/admin.js' ), array( 'jquery' ), DKWL_VERSION );
	wp_enqueue_script( 'dkwl-admin' );					
}