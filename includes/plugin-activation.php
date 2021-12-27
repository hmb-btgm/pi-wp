<?php
//
require_once( PI_PLUGIN_INC.'/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'pi_register_required_plugins' );

function pi_register_required_plugins() {
  //
	$plugins = array(
		array(
			'name'      				=> 'Redux Framework',
			'slug'     	 				=> 'redux-framework',
			'required'  				=> true,
			'force_activation'	=> true
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
		'message'      => '',
		'strings'      => array(
			'page_title'	=> __( 'Install Required Plugins', PI_TEXT_DOMAIN ),
			'menu_title'  => __( 'Install Plugins', PI_TEXT_DOMAIN )
		)
	);

	tgmpa( $plugins, $config );
}