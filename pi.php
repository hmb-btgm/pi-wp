<?php
/*
Plugin Name: Project Inventory
Plugin URI: https://www.hmb.gov.tr
Description: IT Department's Project Inventory Tool
Author: BTGM
Author URI: https://www.hmb.gov.tr
Text Domain: pi
Domain Path: /languages/
Version: 1.0.0
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

define( 'PI_VERSION', '1.0.0' );
define( 'PI_REQUIRED_WP_VERSION', '5.7' );
define( 'PI_TEXT_DOMAIN', 'pi' );
define( 'PI_REDUX', 'pi' );
define( 'PI_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'PI_PLUGIN_INC', PI_PLUGIN_DIR.'includes/' );
define( 'PI_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once( PI_PLUGIN_INC.'plugin-activation.php' );
require_once( PI_PLUGIN_INC.'pi-custom-module.php' );
require_once( PI_PLUGIN_INC.'pi-redux.php' );
require_once( PI_PLUGIN_INC.'pi-rest-api.php' );