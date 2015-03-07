<?php defined( 'ABSPATH' ) or die( 'not found' );
/**
* 	GalleryController Registers Gallery Content Type and Shortcodes
*/
class JAGP_GalleryController
{
	/**
	 * Holds the singleton instance of this class
	 * @since 0.0.1
	 * @var Jagp
	 */
	private static $_instance = false;

	/**
	 * Singleton
	 * @static
	 */
	public static function init()
	{
		if ( ! self::$_instance )
			self::$_instance = new Jagp_FGallery;

		return self::$_instance;
	}

	/**
	 * Constructor.  Initializes WordPress hooks
	 *
	 * @return void
	 * @author Geraint Palmer
	 **/
	private function JAGP_GalleryController()
	{
		$this->constants();
		$this->register_post_type();
	}

	/**
	 * Defined constants used by the class
	 *
	 * @return void
	 * @author Geraint Palmer
	 **/
	private function constants()
	{		
		jagp_utils::define('JAGP_GALLERY_POST_TYPE_ID', apply_filters( 'jagp_gallery_post_id', 'jagpgallery' ) );
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author Geraint Palmer
	 **/
	private function register_post_type()
	{
		// Portfolio post type labels
		$labels = array (
			'name'                  => __( 'Galleries', 'jagp' ),
			'singular_name'         => __( 'Gallery', 'jagp' ),
			'add_new'               => __( 'Add New', 'jagp' ),
			'add_new_item'          => __( 'Create New Gallery', 'jagp' ),
			'edit'                  => __( 'Edit', 'jagp' ),
			'edit_item'             => __( 'Edit Gallery', 'jagp' ),
			'new_item'              => __( 'New Gallery', 'jagp' ),
			'view'                  => __( 'View Gallery', 'jagp' ),
			'view_item'             => __( 'View Gallery', 'jagp' ),
			'search_items'          => __( 'Search Gallerys', 'jagp' ),
			'not_found'             => __( 'No Gallery found', 'jagp' ),
			'not_found_in_trash'    => __( 'No Galleries found in Trash', 'jagp' ),
			'parent_item_colon'     => __( 'Gallery:', 'jagp' )
		);

		// Portfolio post type rewrite
		$rewrite = array (
			'slug'          => 'gallery',
			'with_front'    => false
		);

		// Portfolio post type supports
		$supports = array (
			'title',
			'editor',
			'thumbnail',
		);
		
		// Register Portfolio post type
		register_post_type (
			JAGP_GALLERY_POST_TYPE_ID,
			apply_filters( 'jagp_filter_gallery_register_post_type',
				array (
					'labels'            => $labels,
					'rewrite'           => $rewrite,
					'supports'          => $supports,
					'menu_position'     => '100',
					'public'            => true,
					'show_ui'           => true,
					'can_export'        => true,
					'capability_type'   => 'post',
					'hierarchical'      => false,
					'query_var'         => true,
					'menu_icon'         => get_bloginfo('wpurl').'/wp-admin/images/media-button-image.gif'
				)
			)
		);
		
		do_action ( 'jagp_gallery_register_post_type' );
	}

}
?>