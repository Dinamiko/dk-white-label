<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

class DKWL_Roles {

	/**
	* create roles
	*/
	public function add_roles() {

		// create client role with editor capabilities
		$editor = get_role( 'editor' );
	  	$editor_capabilities = $editor->capabilities;
	  	add_role( 'client', __( 'Client', 'dkwl' ), $editor_capabilities );

	}

	/**
	* create capabilities
	*/
	public function add_caps() {
		global $wp_roles;

		if ( class_exists('WP_Roles') ) {
			if ( ! isset( $wp_roles ) ) {
				$wp_roles = new WP_Roles();
			}
		}

		if ( is_object( $wp_roles ) ) {
			//$wp_roles->add_cap( 'client', 'cap_test' );
		}

	}

}