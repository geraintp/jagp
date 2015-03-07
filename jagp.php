<?php
/*
 * Plugin Name: Just another Gallery Plugin by @geraintp
 * Plugin URI: http://geraint.co/plugins/jagp/
 * Description: COMING SOON!
 * Author: Geraint Palmer
 * Version: 0.0.1
 * Author URI: http://geraint.co
 * License: GPL2+
 * Text Domain: jagp
 * Domain Path: /languages/
 */
defined( 'ABSPATH' ) or die( 'not found' );

define( 'JAGP__MINIMUM_WP_VERSION', '4.0' );
define( 'JAGP__VERSION',            '0.0.1' );
define( 'JAGP__PLUGIN_DIR',         plugin_dir_path( __FILE__ ) );
define( 'JAGP__PLUGIN_FILE',        __FILE__ );

require_once( JAGP__PLUGIN_DIR . 'class.utils.php' );
require_once( JAGP__PLUGIN_DIR . 'class.options.php' );
jagap_utils::define('DS', DIRECTORY_SEPARATOR );

require_once( JAGP__PLUGIN_DIR . 'class.jagp.php' );
require_once( JAGP__PLUGIN_DIR . 'controllers' . DS . 'class.fgallery.php' );

if ( is_admin() ) {
	//require_once( JAGP__PLUGIN_DIR . 'class.jagp-admin.php'     );
}

register_activation_hook( __FILE__, array( 'Jagp', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'Jagp', 'plugin_deactivation' ) );

add_action( 'init', array( 'Jagp', 'init' ) );
add_action( 'plugins_loaded', array( 'Jagp', 'load_modules' ), 100 );