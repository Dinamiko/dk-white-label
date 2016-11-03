<?php

if ( ! defined( 'ABSPATH' ) ) exit;

$plugin_nodes = array();

/**
* wp_before_admin_bar_render hook for populate 
*/
function add_all_node_ids_to_toolbar() {
	global $wp_admin_bar;
	$all_toolbar_nodes = $wp_admin_bar->get_nodes();
	$default_toolbar_nodes = array(
		'menu-toggle',
		'wp-logo',
		'site-name',
		'updates',
		'comments',
		'new-content',
		'top-secondary',
	);

	if ( $all_toolbar_nodes ) {
		foreach ( $all_toolbar_nodes as $node  ) {
			if( !$node->parent ) {
				if( !in_array($node->id, $default_toolbar_nodes) ) {
					echo $node->id.'<br>';
					array_push($plugin_nodes, $node->id);
				}				
			}
		}
	}
}
// use 'wp_before_admin_bar_render' hook to also get nodes produced by plugins.
add_action( 'wp_before_admin_bar_render', 'add_all_node_ids_to_toolbar' );
