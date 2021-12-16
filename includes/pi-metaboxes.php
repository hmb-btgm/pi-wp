<?php
defined( 'ABSPATH' ) || exit;



Redux_Metaboxes::set_box(
	'pi-metaboxes',
	array(
		'id'         => 'opt-metaboxes',
		'title'      => esc_html__( 'Project Details', PI_TEXT_DOMAIN ),
		'post_types' => array( 'pi' ),
		'position'   => 'normal', // normal, advanced, side.
		'priority'   => 'high', // high, core, default, low.
		'sections'   => array(
			array(
				'title'  => esc_html__( 'General Information', PI_TEXT_DOMAIN ),
				'id'     => 'opt-basic-fields',
				'desc'   => esc_html__( 'Project General Information'),
				'icon'   => 'el-icon-cogs',
				'fields' => array(
					array(
					    'id'       => 'opt_multi_checkbox-general',
					    'type'     => 'checkbox',
					    'title'    => esc_html__('Project', PI_TEXT_DOMAIN), 
					    'options'  => array(
					        '1' => 'Is it Suitable for New Infrastructure',
					        '2' => 'Have a Login',
					        '3' => 'Have 2FA'
					    ),

					    //See how default has changed? you also don't need to specify opts that are 0.
					    'default' => array(
					        '1' => '0', 
					        '2' => '0', 
					        '3' => '0'
					    )
					),
					array(
						'id'       => 'opt-radio-general',
						'type'     => 'radio',
						'title'    => esc_html__( 'Criticality Level', PI_TEXT_DOMAIN ),
						'options'  => array(
							'1' => esc_html__( '1', PI_TEXT_DOMAIN ),
							'2' => esc_html__( '2', PI_TEXT_DOMAIN ),
							'3' => esc_html__( '3', PI_TEXT_DOMAIN ),
						),
						'default'  => '2',
					),
					array(
						'title' => esc_html__( 'Coordinatorship', PI_TEXT_DOMAIN ),
						'id'    => 'opt-text-general',
						'subtitle' => esc_html__( 'Indicate the Coordinatorship to which you are affiliated', PI_TEXT_DOMAIN ),
						'type'  => 'text',
					),
					array(
						'title' => esc_html__( 'People in the Project', PI_TEXT_DOMAIN ),
						'id'    => 'opt-textarea-general',
						'subtitle' => esc_html__( 'Specify people by separating them with commas.', PI_TEXT_DOMAIN ),
						'type'  => 'textarea',
					),
					array(
						'title' => esc_html__( 'Used technologies', PI_TEXT_DOMAIN ),
						'id'    => 'opt-textarea-general-2',
						'subtitle' => esc_html__( 'Specify people by separating them with commas.', PI_TEXT_DOMAIN ),
						'type'  => 'textarea',
					),
				),
			),

			array(
				'title'      => esc_html__( 'Database Information', PI_TEXT_DOMAIN ),
				'desc'       => esc_html__( 'Project Database Information'),
				'icon'       => 'el-icon-cog',
				'id'         => 'opt-text-fields-database',
				'subsection' => true,
				'fields'     => array(
					array(
					    'id'       => 'text-database',
					    'type'     => 'text',
					    'title'    => esc_html__('IP Addresses', PI_TEXT_DOMAIN),
					    'subtitle' => esc_html__('Enter the database IP addresses', PI_TEXT_DOMAIN),
					    'mode'     => 'text',
					    'options' => array(
					         'test' => 'Test Environment IP address',
					         'prod' => 'Prod Environment IP address',
					         'dev' => 'Dev Environment IP address',
					    ),
					),
					array(
						'title' => esc_html__( 'DB Type', PI_TEXT_DOMAIN ),
						'id'    => 'opt-text-database',
						'type'  => 'text',
					),
					array(
						'title' => esc_html__( 'DB Version', PI_TEXT_DOMAIN ),
						'id'    => 'opt-text-database-2',
						'type'  => 'text',
					),
					array(
						'title' => esc_html__( 'DB Principals', PI_TEXT_DOMAIN ),
						'id'    => 'opt-textarea-database',
						'subtitle' => esc_html__( 'Specify people by separating them with commas.', PI_TEXT_DOMAIN ),
						'type'  => 'textarea',
					),
					array(
						'id'       => 'opt-checkbox-database',
						'type'     => 'checkbox',
						'title'    => esc_html__( 'Is the database backed up?', PI_TEXT_DOMAIN ),
						'subtitle' => esc_html__( '', PI_TEXT_DOMAIN ),
						'default'  => false,
					),
					array(
						'id'       => 'opt-radio-database',
						'type'     => 'radio',
						'title'    => esc_html__( 'DB backup frequency?', PI_TEXT_DOMAIN ),
						'subtitle' => esc_html__( '', PI_TEXT_DOMAIN ),
						'options'  => array(
							'1' => esc_html__( '1 month', PI_TEXT_DOMAIN ),
							'2' => esc_html__( '2 month', PI_TEXT_DOMAIN ),
							'3' => esc_html__( '3 month', PI_TEXT_DOMAIN ),
							'4' => esc_html__( 'Not backed up', PI_TEXT_DOMAIN ),
						),
						'default'  => '4',
					),
				),
			),
			array(
				'title'      => esc_html__( 'Network Information', PI_TEXT_DOMAIN ),
				'desc'       => esc_html__( 'Project Network Information'),
				'icon'       => 'el-icon-cog',
				'id'         => 'opt-text-fields-network',
				'subsection' => true,
				'fields'     => array(
					array(
					    'id'       => 'opt_multi_checkbox-network',
					    'type'     => 'checkbox',
					    'title'    => esc_html__('Project', PI_TEXT_DOMAIN), 
					    'options'  => array(
					        '1' => 'Http',
					        '2' => 'Https',
					        '3' => 'Is the internet on',
					        '4' => 'WAF',
					        '5' => 'DB behind the firewall'
					    ),

					    //See how default has changed? you also don't need to specify opts that are 0.
					    'default' => array(
					        '1' => '0', 
					        '2' => '0', 
					        '3' => '0',
					        '4' => '0',
					        '5' => '0'
					    )
					),
					array(
						'title' => esc_html__( 'Internal IP addresses', PI_TEXT_DOMAIN ),
						'id'    => 'opt-text-network',
						'subtitle' => esc_html__( 'Specify people by separating them with commas.', PI_TEXT_DOMAIN ),
						'type'  => 'text',
					),
					array(
						'title' => esc_html__( 'Subnets', PI_TEXT_DOMAIN ),
						'id'    => 'opt-text-network-2',
						'subtitle' => esc_html__( 'Specify people by separating them with commas.', PI_TEXT_DOMAIN ),
						'type'  => 'text',
					),
				),
			),
			array(
				'title'      => esc_html__( 'System Information', PI_TEXT_DOMAIN ),
				'desc'       => esc_html__( 'Project System Information'),
				'icon'       => 'el-icon-cog',
				'id'         => 'opt-text-fields-system',
				'subsection' => true,
				'fields'     => array(
					array(
					    'id'       => 'opt_multi_checkbox-system',
					    'type'     => 'checkbox',
					    'title'    => esc_html__('Project', PI_TEXT_DOMAIN), 
					    'options'  => array(
					        '1' => 'Have Log',
					        '2' => 'Is it DMZ',
					        '3' => 'Does the server have internet?',
					        '4' => 'Is it up to date'
					    ),

					    //See how default has changed? you also don't need to specify opts that are 0.
					    'default' => array(
					        '1' => '0', 
					        '2' => '0', 
					        '3' => '0',
					        '4' => '0'
					    )
					),
					array(
						'title' => esc_html__( 'Log Type', PI_TEXT_DOMAIN ),
						'id'    => 'opt-text-system',
						'type'  => 'text',
					),
					array(
						'title' => esc_html__( 'Os Version', PI_TEXT_DOMAIN ),
						'id'    => 'opt-text-system-2',
						'type'  => 'text',
					),
				),
			),

			array(
				'title'      => esc_html__( 'Devops Information', PI_TEXT_DOMAIN ),
				'desc'       => esc_html__( 'Project Devops Information'),
				'icon'       => 'el-icon-cog',
				'id'         => 'opt-text-fields-devops',
				'subsection' => true,
				'fields'     => array(
					array(
						'title' => esc_html__( 'Pre-Prod Information', PI_TEXT_DOMAIN ),
						'id'    => 'opt-textarea-devops',
						'type'  => 'textarea',
					),
				),
			),
		),
	)
);
