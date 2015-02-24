<?php
/*
 * Plugin Name: Just another Gallery Plugin by @geraintp
 * Plugin URI: http://geraint.co/plugins/jagp/
 * Description: Bring the power of the WordPress.com cloud to your self-hosted WordPress. Jetpack enables you to connect your blog to a WordPress.com account to use the powerful features normally only available to WordPress.com users.
 * Author: Geraint Palmer
 * Version: 0.0.1
 * Author URI: http://geraint.co
 * License: GPL2+
 * Text Domain: jagp
 * Domain Path: /languages/
 */

define( 'JAGP__MINIMUM_WP_VERSION', '4.0' );
define( 'JAGP__VERSION',            '0.0.1' );
define( 'JAGP__PLUGIN_DIR',         plugin_dir_path( __FILE__ ) );
define( 'JAGP__PLUGIN_FILE',        __FILE__ );

register_activation_hook( __FILE__, array( 'Jagp', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'Jagp', 'plugin_deactivation' ) );

require_once( JETPACK__PLUGIN_DIR . 'class.jagp.php' );