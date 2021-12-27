<?php
defined( 'ABSPATH' ) || exit;

function pi_redux($args) {
	$args = array(
		'opt_name'		  => PI_REDUX,
		'display_name'    => PI_REDUX,
		'display_version' => PI_VERSION
	);

	Redux::set_args( PI_REDUX, $args );
	
	// disable demo mode
	Redux::disable_demo();

	// project metaboxes settings
	require_once( PI_PLUGIN_INC.'pi-metaboxes.php' );
}

add_action( 'redux/init', 'pi_redux' );