<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

/**
* Runs on plugin install
*/
function dkwl_install() {

	// create roles
	$roles = new DKWL_Roles;
	$roles->add_roles();
	//$roles->add_caps();

}
register_activation_hook( DKWL_PLUGIN_FILE, 'dkwl_install' );