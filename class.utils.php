<?php 
/**
 * Utility (toolbelt) Class 
 */
class JAGP_Utils
{
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function define( $key, $value )
	{
		defined( $key ) or define( $key , $value );
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function pre_printr($value)
	{
		print "<pre>";
		print_r($value);
		print "</pre>";
	}
} ?>