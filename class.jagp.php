<?php 

/**
* 
*/
class Jagp
{
	/**
	 * Holds the singleton instance of this class
	 * @since 0.0.1
	 * @var Jagp
	 */
	static $instance = false;

	/**
	 * Singleton
	 * @static
	 */
	public static function init()
	{
		if ( ! self::$instance ) {
			if ( did_action( 'plugins_loaded' ) )
				self::plugin_textdomain();
			else
				add_action( 'plugins_loaded', array( __CLASS__, 'plugin_textdomain' ), 99 );

			self::$instance = new Jagp;

			self::$instance->plugin_upgrade();
		}

		return self::$instance;
	}

	/**
	 * Constructor.  Initializes WordPress hooks
	 *
	 * @return void
	 * @author Geraint Palmer
	 **/
	private function Jagp()
	{
		# code...
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	private function plugin_upgrade()
	{
		# code...
	}

	/**
	 * Load language files
	 *
	 * @return void
	 * @author 
	 **/
	public static function plugin_textdomain()
	{
		load_plugin_textdomain( 'jagp', false, dirname( plugin_basename( JAGP__PLUGIN_FILE ) ) . '/languages/' );
	}

	/**
	 * Attached to activate_{ plugin_basename( __FILES__ ) } by register_activation_hook()
	 * @static
	 * @return void
	 */
	public static function plugin_activation()
	{
	}

	/**
	 * Removes all connection options
	 *
	 * @return void
	 * @author 
	 **/
	public static function plugin_deactivation()
	{
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function load_modules()
	{
	}
}

?>