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
			self::$_instance = new JAGP_GalleryController;

		return self::$_instance;
	}

	/**
	 * shorthand to get controller instance.
	 *
	 * @return object
	 * @static
	 **/
	public static function fetch()
	{
		return self::init();
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

		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save_meta_box' ) );
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
		$labels = array(
			'name'               => _x( 'Galleries', 'post type general name', 'jagp' ),
			'singular_name'      => _x( 'Gallery', 'post type singular name', 'jagp' ),
			'menu_name'          => _x( 'Galleries', 'admin menu', 'jagp' ),
			'name_admin_bar'     => _x( 'Gallery', 'add new on admin bar', 'jagp' ),
			'add_new'            => _x( 'Add New', 'book', 'jagp' ),
			'add_new_item'       => __( 'Add New Gallery', 'jagp' ),
			'new_item'           => __( 'New Gallery', 'jagp' ),
			'edit_item'          => __( 'Edit Gallery', 'jagp' ),
			'view_item'          => __( 'View Gallery', 'jagp' ),
			'all_items'          => __( 'All Galleries', 'jagp' ),
			'search_items'       => __( 'Search Galleries', 'jagp' ),
			'parent_item_colon'  => __( 'Parent Galleries:', 'jagp' ),
			'not_found'          => __( 'No books found.', 'jagp' ),
			'not_found_in_trash' => __( 'No books found in Trash.', 'jagp' )
		);

		// Portfolio post type rewrite
		$rewrite = array (
			'slug'          => 'gallery',
			'with_front'    => false
		);

		// Portfolio post type supports
		$supports = array(
			'title', 
			'editor', 
			'author', 
			'thumbnail', 
			'excerpt', 
			'comments',
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => $rewrite,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 100,
			'supports'           => $supports,
			'menu_icon'   		 => 'dashicons-schedule',
		);
		
		// Register Portfolio post type
		register_post_type ( JAGP_GALLERY_POST_TYPE_ID, apply_filters( 'jagp_filter_gallery_register_post_type', $args) );

		do_action( 'jagp_gallery_register_post_type' );
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function add_meta_box( $post_type )
	{
		$post_types = array('post', 'page', JAGP_GALLERY_POST_TYPE_ID );     //limit meta box to certain post types
        
        if ( in_array( $post_type, $post_types )) {
			add_meta_box(
				'some_meta_box_name',
				__( 'Some Meta Box Headline', 'jagp' ),
				array( $this, 'render_meta_box_content' ),
				$post_type,
				'advanced',
				'high',
			);
        }
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function render_meta_box_content( $post )
	{
		# code...
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function save_meta_box( $post_id )
	{
		# code...
	}
}
?>