<?php
//
require_once( PI_PLUGIN_INC.'/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'pi_register_required_plugins' );

function pi_register_required_plugins() {
  //
	$plugins = array(
		array(
			'name'      => 'Redux Framework',
			'slug'      => 'redux-framework',
			'required'  => true
		)
	);

	$config = array(
		'id'           => PI_TEXT_DOMAIN,
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'plugins.php',
		'capability'   => 'manage_options',
		'has_notices'  => false,
		'dismissable'  => false,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => ''
	);

	tgmpa( $plugins, $config );
}