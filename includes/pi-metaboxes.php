<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux_Metaboxes' ) ) {
  return;
}

Redux_Metaboxes::set_box(
  PI_REDUX,
  array(
    'id'         => 'opt-metaboxes',
    'title'      => __( 'Project Details', PI_TEXT_DOMAIN ),
    'post_types' => array( 'pi' ),
    'position'   => 'normal', // normal, advanced, side.
    'priority'   => 'high', // high, core, default, low.
    'sections'   => array(
      array(
        'title'  => __( 'General Information', PI_TEXT_DOMAIN ),
        'id'     => 'general-information',
        'desc'   => __( 'Project General Information'),
        'icon'   => 'el-icon-book',
        'fields' => array(
          array(
            'id'       => 'general-info',
            'type'     => 'checkbox',
            'title'    => __( 'Project', PI_TEXT_DOMAIN ), 
            'options'  => array(
                '1' => __( 'Is it Suitable for New Infrastructure' ),
                '2' => __( 'Have a Login' ),
                '3' => __( 'Have 2FA' )
            )
          ),
          array(
            'id'       => 'criticality-level',
            'type'     => 'radio',
            'title'    => __( 'Criticality Level', PI_TEXT_DOMAIN ),
            'options'  => array(
              '1' => __( '1', PI_TEXT_DOMAIN ),
              '2' => __( '2', PI_TEXT_DOMAIN ),
              '3' => __( '3', PI_TEXT_DOMAIN )
            ),
            'default'  => '2'
          ),
          array(
            'title' => __( 'Coordinatorship', PI_TEXT_DOMAIN ),
            'id'    => 'coordinatorship',
            'subtitle' => __( 'Indicate the Coordinatorship to which you are affiliated', PI_TEXT_DOMAIN ),
            'type'  => 'text'
          ),
          array(
            'title' => __( 'People in the Project', PI_TEXT_DOMAIN ),
            'id'    => 'people-in-project',
            'subtitle' => __( 'Specify people by separating them with commas.', PI_TEXT_DOMAIN ),
            'type'  => 'textarea'
          ),
          array(
            'title' => __( 'Used technologies', PI_TEXT_DOMAIN ),
            'id'    => 'used-technologies',
            'subtitle' => __( 'Specify people by separating them with commas.', PI_TEXT_DOMAIN ),
            'type'  => 'textarea'
          )
        )
      ),

      array(
        'title'      => __( 'Database Information', PI_TEXT_DOMAIN ),
        'desc'       => __( 'Project Database Information'),
        'icon'       => 'el-icon-cog',
        'id'         => 'database-information',
        'subsection' => true,
        'fields'     => array(
          array(
            'id'       => 'ip-addresses',
            'type'     => 'text',
            'title'    => __('IP Addresses', PI_TEXT_DOMAIN),
            'subtitle' => __('Enter the database IP addresses', PI_TEXT_DOMAIN),
            'mode'     => 'text',
            'options' => array(
              'test' => __( 'Test Environment IP address'),
              'prod' => __( 'Prod Environment IP address'),
              'dev' => __( 'Dev Environment IP address')
            )
          ),
          array(
            'title' => __( 'DB Type', PI_TEXT_DOMAIN ),
            'id'    => 'db-type',
            'type'  => 'text'
          ),
          array(
            'title' => __( 'DB Version', PI_TEXT_DOMAIN ),
            'id'    => 'db-version',
            'type'  => 'text'
          ),
          array(
            'title' => __( 'DB Principals', PI_TEXT_DOMAIN ),
            'id'    => 'db-principals',
            'subtitle' => __( 'Specify people by separating them with commas.', PI_TEXT_DOMAIN ),
            'type'  => 'textarea'
          ),
          array(
            'id'       => 'back-up',
            'type'     => 'checkbox',
            'title'    => __( 'Is the database backed up?', PI_TEXT_DOMAIN ),
            'subtitle' => __( '', PI_TEXT_DOMAIN ),
            'default'  => false
          ),
          array(
            'id'       => 'db-backup-frequency',
            'type'     => 'radio',
            'title'    => __( 'DB backup frequency?', PI_TEXT_DOMAIN ),
            'subtitle' => __( '', PI_TEXT_DOMAIN ),
            'options'  => array(
              '1' => __( '1 month', PI_TEXT_DOMAIN ),
              '2' => __( '2 month', PI_TEXT_DOMAIN ),
              '3' => __( '3 month', PI_TEXT_DOMAIN ),
              '4' => __( 'Not backed up', PI_TEXT_DOMAIN )
            ),
            'default'  => '4',
          )
        )
      ),
      array(
        'title'      => __( 'Network Information', PI_TEXT_DOMAIN ),
        'desc'       => __( 'Project Network Information'),
        'icon'       => 'el-icon-cog',
        'id'         => 'network-information',
        'subsection' => true,
        'fields'     => array(
          array(
              'id'       => 'network-info',
              'type'     => 'checkbox',
              'title'    => __('Project', PI_TEXT_DOMAIN), 
              'options'  => array(
                '1' => __( 'HTTP', PI_TEXT_DOMAIN ),
                '2' => __( 'HTTPS', PI_TEXT_DOMAIN ),
                '3' => __( 'Is the internet on', PI_TEXT_DOMAIN ),
                '4' => __( 'WAF', PI_TEXT_DOMAIN ),
                '5' => __( 'DB behind the firewall', PI_TEXT_DOMAIN )
              )
          ),
          array(
            'title' => __( 'Internal IP addresses', PI_TEXT_DOMAIN ),
            'id'    => 'internal-ip-addresses',
            'subtitle' => __( 'Specify people by separating them with commas.', PI_TEXT_DOMAIN ),
            'type'  => 'text'
          ),
          array(
            'title' => __( 'Subnets', PI_TEXT_DOMAIN ),
            'id'    => 'subnets',
            'subtitle' => __( 'Specify people by separating them with commas.', PI_TEXT_DOMAIN ),
            'type'  => 'text'
          )
        )
      ),
      array(
        'title'      => __( 'System Information', PI_TEXT_DOMAIN ),
        'desc'       => __( 'Project System Information'),
        'icon'       => 'el-icon-cog',
        'id'         => 'system-information',
        'subsection' => true,
        'fields'     => array(
          array(
            'id'       => 'system-info',
            'type'     => 'checkbox',
            'title'    => __('Project', PI_TEXT_DOMAIN), 
            'options'  => array(
              '1' => __( 'Have Log', PI_TEXT_DOMAIN ),
              '2' => __( 'Is it DMZ', PI_TEXT_DOMAIN ),
              '3' => __( 'Does the server have internet?', PI_TEXT_DOMAIN ),
              '4' => __( 'Is it up to date', PI_TEXT_DOMAIN )
            )
          ),
          array(
            'title' => __( 'Log Type', PI_TEXT_DOMAIN ),
            'id'    => 'log-type',
            'type'  => 'text'
          ),
          array(
            'title' => __( 'Os Version', PI_TEXT_DOMAIN ),
            'id'    => 'os-version',
            'type'  => 'text'
          )
        ),
      ),

      array(
        'title'      => __( 'Devops Information', PI_TEXT_DOMAIN ),
        'desc'       => __( 'Project Devops Information'),
        'icon'       => 'el-icon-cog',
        'id'         => 'devops-information',
        'subsection' => true,
        'fields'     => array(
          array(
            'title' => __( 'Pre-Prod Information', PI_TEXT_DOMAIN ),
            'id'    => 'pre-prod-information',
            'type'  => 'textarea',
          ),
        ),
      ),
    ),
  )
);