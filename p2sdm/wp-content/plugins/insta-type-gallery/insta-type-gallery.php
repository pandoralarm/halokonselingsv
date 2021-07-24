<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
@package Insta Type Gallery 
Plugin Name: Stylish Profile Gallery
Plugin URI: http://awplife.com/
Description: Insta type gallery plugin with lightbox preview for Wordpress
Version: 1.1.11
Author: A WP Life
Author URI: http://awplife.com/
License: GPLv2 or later
Text Domain: insta-type-gallery
Domain Path: /languages

Insta Type Gallery is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Insta Type Gallery is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Insta Type Gallery. If not, see https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html.
*/

if ( ! class_exists( 'Instagram_Type_Gallery' ) ) {

	class Instagram_Type_Gallery {
		
		protected $protected_plugin_api;
		protected $ajax_plugin_nonce;
		
		public function __construct() {
			$this->_constants();
			$this->_hooks();
		}		
		
		protected function _constants() {
			//Plugin Version
			define( 'ITG_PLUGIN_VER', '1.1.11' );
			
			//Plugin Text Domain
			define("ITG_TXTDM","insta-type-gallery" );

			//Plugin Name
			define( 'ITG_PLUGIN_NAME', __( 'Stylish Profile Gallery', ITG_TXTDM ) );

			//Plugin Slug
			define( 'ITG_PLUGIN_SLUG', 'insta_type_gallery' );

			//Plugin Directory Path
			define( 'ITG_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

			//Plugin Directory URL
			define( 'ITG_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

			/**
			 * Create a key for the .htaccess secure download link.
			 * @uses    NONCE_KEY     Defined in the WP root config.php
			 */
			define( 'ITG_SECURE_KEY', md5( NONCE_KEY ) );
			
		} // end of constructor function
		
		
		/**
		 * Setup the default filters and actions
		 */
		protected function _hooks() {
			
			//Load text domain
			add_action( 'plugins_loaded', array( $this, '_load_textdomain' ) );
			
			//add insta type gallery menu item, change menu filter for multisite
			add_action( 'admin_menu', array( $this, '_insta_menu' ), 101 );
			
			//Create Insta type Gallery Custom Post
			add_action( 'init', array( $this, '_insta_Gallery' ));
			
			//Add meta box to custom post
			add_action( 'add_meta_boxes', array( $this, '_admin_add_meta_box' ) );
			 
			//loaded during admin init 
			add_action( 'admin_init', array( $this, '_admin_add_meta_box' ) );
			
			add_action('wp_ajax_insta_gallery_js', array(&$this, '_ajax_insta_gallery'));
		
			add_action('save_post', array(&$this, '_itg_save_settings'));

			//Shortcode Compatibility in Text Widgets
			add_filter('widget_text', 'do_shortcode');
			
			// add pfg cpt shortcode column - manage_{$post_type}_posts_columns
			add_filter( 'manage_insta_type_gallery_posts_columns', array(&$this, 'set_insta_type_gallery_shortcode_column_name') );
			
			// add pfg cpt shortcode column data - manage_{$post_type}_posts_custom_column
			add_action( 'manage_insta_type_gallery_posts_custom_column' , array(&$this, 'custom_insta_type_gallery_shodrcode_data'), 10, 2 );

			add_action( 'wp_enqueue_scripts', array(&$this, 'insta_enqueue_scripts_in_header') );
			
		} // end of hook function
		
		public function insta_enqueue_scripts_in_header() {
			wp_enqueue_script('jquery');
		}
		
		
		// Instagram type gallery cpt shortcode column before date columns
		public function set_insta_type_gallery_shortcode_column_name($defaults) {
			$new = array();
			$shortcode = $columns['insta_type_gallery_shortcode'];  // save the tags column
			unset($defaults['tags']);   // remove it from the columns list

			foreach($defaults as $key=>$value) {
				if($key=='date') {  // when we find the date column
				   $new['insta_type_gallery_shortcode'] = __( 'Shortcode', ITG_TXTDM );  // put the tags column before it
				}    
				$new[$key] = $value;
			}
			return $new;  
		}
		
		// Instagram type gallery cpt shortcode column data
		public function custom_insta_type_gallery_shodrcode_data( $column, $post_id ) {
			switch ( $column ) {
				case 'insta_type_gallery_shortcode' :
					echo "<input type='text' class='button button-primary' id='insta-type-shortcode-$post_id' value='[ITG id=$post_id]' style='font-weight:bold; background-color:#32373C; color:#FFFFFF; text-align:center;' />";
					echo "<input type='button' class='button button-primary' onclick='return INSTACopyShortcode$post_id();' readonly value='Copy' style='margin-left:4px;' />";
					echo "<span id='copy-msg-$post_id' class='button button-primary' style='display:none; background-color:#32CD32; color:#FFFFFF; margin-left:4px; border-radius: 4px;'>copied</span>";
					echo "<script>
						function INSTACopyShortcode$post_id() {
							var copyText = document.getElementById('insta-type-shortcode-$post_id');
							copyText.select();
							document.execCommand('copy');
							
							//fade in and out copied message
							jQuery('#copy-msg-$post_id').fadeIn('1000', 'linear');
							jQuery('#copy-msg-$post_id').fadeOut(2500,'swing');
						}
						</script>
					";
				break;
			}
		}
		
		/**
		 * Loads the text domain.
		 */
		public function _load_textdomain() {
			load_plugin_textdomain( ITG_TXTDM, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}
		
		
		/**
		 * Adds the Insta type Gallery menu item
		 */
		public function _insta_menu() {
			$help_menu = add_submenu_page( 'edit.php?post_type='.ITG_PLUGIN_SLUG, __( 'Docs', ITG_TXTDM ), __( 'Docs', ITG_TXTDM ), 'administrator', 'sr-doc-page', array( $this, '_itg_doc_page') );
			$our_theme = add_submenu_page( 'edit.php?post_type='.ITG_PLUGIN_SLUG, __( 'Our Theme', ITG_TXTDM ), __( 'Our Theme', ITG_TXTDM ), 'administrator', 'sr-theme-page', array( $this, '_itg_theme_page') );
		}
		
		
		/**
		 * insta type Gallery Custom Post
		 * Create gallery post type in admin dashboard.
		 */
		public function _Insta_Gallery() {
			$labels = array(
				'name'                => _x( 'Insta Type Gallery', 'Post Type General Name', ITG_TXTDM ),
				'singular_name'       => _x( 'Insta Type Gallery', 'Post Type Singular Name', ITG_TXTDM ),
				'menu_name'           => __( 'Insta Type Gallery', ITG_TXTDM ),
				'name_admin_bar'      => __( 'Insta Type Gallery', ITG_TXTDM ),
				'parent_item_colon'   => __( 'Parent Item:', ITG_TXTDM ),
				'all_items'           => __( 'All Insta Gallery', ITG_TXTDM ),
				'add_new_item'        => __( 'Add New Insta Gallery', ITG_TXTDM ),
				'add_new'             => __( 'Add Insta Gallery', ITG_TXTDM ),
				'new_item'            => __( 'New Insta Gallery', ITG_TXTDM ),
				'edit_item'           => __( 'Edit Insta Gallery', ITG_TXTDM ),
				'update_item'         => __( 'Update Insta Gallery', ITG_TXTDM ),
				'search_items'        => __( 'Search Insta Gallery', ITG_TXTDM ),
				'not_found'           => __( 'Insta Gallery Not found', ITG_TXTDM ),
				'not_found_in_trash'  => __( 'Insta Gallery Not found in Trash', ITG_TXTDM ),
			);
			$args = array(
				'label'               => __( 'Insta Type GalleryInsta Type Gallery', ITG_TXTDM ),
				'description'         => __( 'Custom Post Type For Insta Gallery', ITG_TXTDM ),
				'labels'              => $labels,
				'supports'            => array( 'title'),
				'taxonomies'          => array(),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_position'       => 65,
				'menu_icon'           => 'dashicons-camera',
				'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => true,
				'can_export'          => true,
				'has_archive'         => true,		
				'exclude_from_search' => false,
				'publicly_queryable'  => true,
				'capability_type'     => 'page',
			);
			register_post_type( 'insta_type_gallery', $args );
			
		} // end of post type function
		
		/**
		 * Adds Meta Boxes
		 * @access    private
		 * @since     3.0
		 * @return    void
		 */
		public function _admin_add_meta_box() {
			// Syntax: add_meta_box( $id, $title, $callback, $screen, $context, $priority, $callback_args );
			add_meta_box( '1', __('Copy Album Gallery Shortcode', ITG_TXTDM), array(&$this, '_itg_shortcode_left_metabox'), 'insta_type_gallery', 'side', 'default' );
			add_meta_box( __('Add Image', ITG_TXTDM), __('Add Image', ITG_TXTDM), array(&$this, 'itg_upload_multiple_images'), 'insta_type_gallery', 'normal', 'default' );
			add_meta_box( __('Rate Our Plugin', ITG_TXTDM), __('Rate Our Plugin', ITG_TXTDM), array(&$this, 'itg_rate_plugin'), 'insta_type_gallery', 'side', 'default' );
		}
		// Insta Type gallery copy shortcode meta box under publish button
		public function _itg_shortcode_left_metabox($post) { ?>
			<p class="input-text-wrap">
				<input type="text" name="insta-type-shortcode" id="insta-type-shortcode" value="<?php echo "[ITG id=".$post->ID."]"; ?>" readonly style="height: 60px; text-align: center; width:100%;  font-size: 24px; border: 2px dashed;">
				<p id="itg-copy-code"><?php _e('Shortcode copied to clipboard!', ITG_TXTDM); ?></p>
				<p style="margin-top: 10px"><?php _e('Copy & Embed shotcode into any Page/ Post to display gallery.', ITG_TXTDM); ?></p>
			</p>
			<span onclick="copyToClipboard('#insta-type-shortcode')" class="itg-copy dashicons dashicons-clipboard"></span>
			<style>
				.itg-copy {
					position: absolute;
					top: 9px;
					right: 24px;
					font-size: 26px;
					cursor: pointer;
				}
			</style>
			<script>
				jQuery( "#itg-copy-code" ).hide();
				function copyToClipboard(element) {
				  var $temp = jQuery("<input>");
				  jQuery("body").append($temp);
				  $temp.val(jQuery(element).val()).select();
				  document.execCommand("copy");
				  $temp.remove();
				  jQuery( "#insta-type-shortcode" ).select();
				  jQuery( "#itg-copy-code" ).fadeIn();
				}
			</script>
			<?php
		}
		
		// meta rate us
		Public function itg_rate_plugin() { ?>
		<div style="text-align:center">
			<p><?php _e('If you like our plugin then please', ITG_TXTDM); ?> <b><?php _e('Rate us', ITG_TXTDM); ?></b> <?php _e('on WordPress', ITG_TXTDM); ?></p>
		</div>
		<div style="text-align:center">
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
			<span class="dashicons dashicons-star-filled"></span>
		</div>
		<br>
		<div style="text-align:center">
			<a href="https://wordpress.org/support/plugin/insta-type-gallery/reviews/?filter=5" target="_new" class="button button-primary button-large" style="background: #496481; text-shadow: none;"><span class="dashicons dashicons-heart" style="line-height:1.4;" ></span> Please Rate Us</a>
		</div>	
		<?php }
		
		public function itg_upload_multiple_images($post) { 
			wp_enqueue_script('media-upload');
			wp_enqueue_script('itg-uploader.js', ITG_PLUGIN_URL . 'assets/js/awl-itg-uploader.js');
			wp_enqueue_style('itg-uploader-css', ITG_PLUGIN_URL . 'assets/css/awl-itg-uploader.css');
			wp_enqueue_media();
		?>
			<!--Add New Image Button-->
			<div class="row">
				<!--Add New Image Button-->
				<div class="file-upload">
					<div class="image-upload-wrap">
						<input class="add-new-slider file-upload-input" id="add-new-slider" name="add-new-slider" value="Upload Image" />
						<div class="drag-text">
							<h3><?php _e('ADD IMAGES', ITG_TXTDM); ?></h3>
						</div>
					</div>
				</div>
			</div>
			
			<?php
			require_once('include/insta-setting.php');
		} // end of upload multiple image
		
		public function _itg_ajax_callback_function($id) {
			//thumb, thumbnail, medium, large, post-thumbnail
			$thumbnail = wp_get_attachment_image_src($id, 'medium', true);
			$attachment = get_post( $id ); // $id = attachment id
			?>
			<li class="slide">
				<img class="new-slide" src="<?php echo $thumbnail[0]; ?>" alt="<?php echo get_the_title($id); ?>" style="height: 150px; width: 98%; border-radius: 8px;">
				<input type="hidden" id="slide-ids[]" name="slide-ids[]" value="<?php echo $id; ?>" />
				<input type="text" name="slide-title[]" id="slide-title[]" style="width: 100%;" placeholder="Image Title" value="<?php echo get_the_title($id); ?>">
				<input type="button" name="remove-slide" id="remove-slide" style="width: 100%;" class="button" value="Delete">
			</li>
			<?php
		}
		
		public function _ajax_insta_gallery() {
			echo $this->_itg_ajax_callback_function($_POST['slideId']);
			die;
		}
		
		public function _itg_save_settings($post_id) {
			if ( isset( $_POST['itg-settings'] ) == "itg-save-settings" ) {
				
				$show_pro 						= sanitize_text_field($_POST['show_pro']);
				$upload_image					= sanitize_text_field($_POST['upload_image']);
				$pro_title 						= sanitize_text_field($_POST['pro_title']);
				$pro_dec 						= sanitize_text_field($_POST['pro_dec']);
				$follow_btn_text 				= sanitize_text_field($_POST['follow_btn_text']);
				$insta_user						= sanitize_text_field($_POST['insta_user']);
				$num_post 						= sanitize_text_field($_POST['num_post']);
				$num_folo 						= sanitize_text_field($_POST['num_folo']);
				$num_of_folo 					= sanitize_text_field($_POST['num_of_folo']);
				$gal_thumb_size 				= sanitize_text_field($_POST['gal_thumb_size']);
				$col_large_desktops 			= sanitize_text_field($_POST['col_large_desktops']);
				$col_desktops 					= sanitize_text_field($_POST['col_desktops']);
				$col_tablets 					= sanitize_text_field($_POST['col_tablets']);
				$col_phones						= sanitize_text_field($_POST['col_phones']);
				$light_box 						= sanitize_text_field($_POST['light_box']);
				$image_hover_effect_type		= sanitize_text_field($_POST['image_hover_effect_type']);
				$image_hover_effect_four 		= sanitize_text_field($_POST['image_hover_effect_four']);
				$animation_effect 				= sanitize_text_field($_POST['animation_effect']);
				$no_spacing 					= sanitize_text_field($_POST['no_spacing']);
				$thumbnail_order 				= sanitize_text_field($_POST['thumbnail_order']);
				$i = 0;
				
				$image_ids_val = $_POST['slide-ids'];
				foreach($image_ids_val as $image_id) {
					
					$image_ids[]				= sanitize_text_field($_POST['slide-ids'][$i]);
					$image_titles[]				= sanitize_text_field($_POST['slide-title'][$i]);
					
					$single_image_update = array(
						'ID'           => $image_id,
						'post_title'   => $image_titles[$i],
					);
					
					wp_update_post( $single_image_update );
					$i++;
				}
				
				$insta_post_setting = array (
						'slide-ids'  						=> $image_ids,
						'slide-title'  						=> $image_titles,
						'show_pro'  						=> $show_pro,
						'upload_image' 	 					=> $upload_image,
						'pro_title'   						=> $pro_title,
						'pro_dec'   						=> $pro_dec,
						'follow_btn_text'   				=> $follow_btn_text,
						'insta_user'  		 				=> $insta_user,
						'num_post'  		 				=> $num_post,
						'num_folo'  		 				=> $num_folo,
						'num_of_folo'  		 				=> $num_of_folo,
						'gal_thumb_size'  					=> $gal_thumb_size,
						'col_large_desktops'  				=> $col_large_desktops,
						'col_desktops'  					=> $col_desktops,
						'col_tablets'  		 				=> $col_tablets,
						'col_phones'  		 				=> $col_phones,
						'light_box'  		 				=> $light_box,
						'image_hover_effect_type'  		 	=> $image_hover_effect_type,
						'image_hover_effect_four'  		 	=> $image_hover_effect_four,
						'animation_effect'  		 		=> $animation_effect,
						'no_spacing'  		 				=> $no_spacing,
						'thumbnail_order'  					=> $thumbnail_order,
				);
				$awl_insta_type_gallery_shortcode_setting = "awl_itg_settings_".$post_id;
				update_post_meta($post_id, $awl_insta_type_gallery_shortcode_setting, $insta_post_setting);
			}
		}// end save setting
		
		/**
		 * Insta type Gallery Docs Page
		 * Create doc page to help user to setup plugin
		 * @access    private
		 * @since     3.0
		 * @return    void.
		 */
		public function _itg_doc_page() {
			require_once('include/docs.php');
		}
		
		public function _itg_theme_page() {
			require_once('our-theme/awp-theme.php');
		}
		
	} // end of class

	/**
	 * Instantiates the Class
	 * @since     3.0
	 * @global    object	$itg_gallery_object
	 */
	$itg_gallery_object = new Instagram_Type_Gallery();
	require_once('include/shortcode.php');
} // end of class exists
?>