<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

class DKWL_Roles {

	/**
	* create roles
	*/
	public function add_roles() {

		remove_role('client');

		// create client role with editor capabilities
		$editor = get_role( 'editor' );
	  	$editor_capabilities = $editor->capabilities;
	  	add_role( 'client', __( 'Client', 'dkwl' ), $editor_capabilities );

	  	/*
		add_role( 'client', __( 'Client', 'dkwl' ), array(
			'read'                   => true,
			'edit_posts'             => true,
			'delete_posts'           => true,
			'unfiltered_html'        => true,
			'upload_files'           => true,
			'export'                 => true,
			'import'                 => true,
			'delete_others_pages'    => true,
			'delete_others_posts'    => true,
			'delete_pages'           => true,
			'delete_private_pages'   => true,
			'delete_private_posts'   => true,
			'delete_published_pages' => true,
			'delete_published_posts' => true,
			'edit_others_pages'      => true,
			'edit_others_posts'      => true,
			'edit_pages'             => true,
			'edit_private_pages'     => true,
			'edit_private_posts'     => true,
			'edit_published_pages'   => true,
			'edit_published_posts'   => true,
			'manage_categories'      => true,
			'manage_links'           => true,
			'moderate_comments'      => true,
			'publish_pages'          => true,
			'publish_posts'          => true,
			'read_private_pages'     => true,
			'read_private_posts'     => true
		) );
		*/

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
			$wp_roles->add_cap( 'client', 'cap_test' );
		}

	}

}