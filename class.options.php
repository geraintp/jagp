<?php defined( 'ABSPATH' ) or die( 'not found' );
/**
 * undocumented class
 *
 * @package Jagp
 * @author 
 **/
class Jagp_OptionRegistry
{
	private static $_instance = null;
	private $_key = '';
	private $_default = array();
	private $_option_cache = array();
	
	/**
	 * Singleton
	 * @static
	 */
	public static function init( $key, $defaults = array() )
	{	
		if ( ! self::$_instance )
			self::$_instance = new Jagp_OptionRegistry( $key, $defaults );

		return self::$_instance;
	}

	/**
	 * Constructor. not used
	 *
	 * @return void
	 * @author Geraint Palmer
	 **/
	private function Jagp_OptionRegistry( $key, $defaults ) 
	{
		$this->$_key = $key;
		$this->$_default = $defaults;
	}


	/**
	 * Fetches the value of an option. Returns `null` if the option is not set.
	 */
	public function get( $key, $default=null )
	{
		$this->_populate_option_cache();
		return isset($this->_option_cache[$key]) ? isset($this->_option_cache[$key]) : $default;
	}
	
	/**
	 * Sets or Updates option if it doesn't exist.
	 */
 	public function set( $key, $value , $commit=true )
	{
		$this->_populate_option_cache();
		$this->_option_cache[$key] = $value;

		$commit ? $this->save() : null;
	}
	
	/**
	 * Removes an option.
	 */
	public function delete( $key, $commit=true )
	{
		$this->_populate_option_cache();
		unset($this->_option_cache[$key]);

		$commit ? $this->save() : null;
	}
	
	/**
	 * Stores the settings to the wordpress db
	 *
	 * @return void
	 * @author 
	 **/
	private function save()
	{
		update_option( $this->_key, serialize( $this->_option_cache ) );
	}
	
	
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	private function _populate_option_cache()
	{
		if ( !$this->_option_cache ) {
			$options = get_option( $this->_key , false );
			$this->_option_cache = is_array( $options ) ? wp_parse_args( $options, $this->_default ) : 
								wp_parse_args( unserialize( $options ), $this->_default );
		}
		
		if ( !$this->_option_cache ) $this->_option_cache = $this->default;
	}
}
?>