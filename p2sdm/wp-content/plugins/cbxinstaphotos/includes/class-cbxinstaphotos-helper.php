<?php
	// If this file is called directly, abort.
	if ( ! defined( 'WPINC' ) ) {
		die;
	}

	class CBXInstaPhotosHelper {
		// Define function to test
		public static function _is_curl_installed() {
			if ( in_array( 'curl', get_loaded_extensions() ) ) {
				return true;
			} else {
				return false;
			}
		}//end method _is_curl_installed

		/**
		 * Get Active Insta posts post types
		 */
		public static function get_active_instaposts() {
			$active_insta = array();

			$args = array(
				'post_type'      => 'cbxinstaphotos',
				'meta_key'       => '_cbxinstaphotos',
				'posts_per_page' => - 1,
				'post_status'    => array( 'publish' ),
			);


			$active_posts = get_posts( $args );

			global $post;
			foreach ( $active_posts as $post ) :
				CBXInstaPhotosHelper::setup_admin_postdata( $post );
				$post_id    = $post->ID;
				$post_title = get_the_title( $post_id );

				$post_meta = get_post_meta( $post_id, '_cbxinstaphotos', true );

				if ( isset( $post_meta['enable'] ) && $post_meta['enable'] == 1 ) {
					$active_insta[ $post_id ] = $post_title;
				}
			endforeach;
			CBXInstaPhotosHelper::wp_reset_admin_postdata();

			return $active_insta;
		}//end method get_active_instaposts

		/**
		 * Setup a post object and store the original loop item so we can reset it later
		 *
		 * @param obj $post_to_setup The post that we want to use from our custom loop
		 */
		public static function setup_admin_postdata( $post_to_setup ) {

			//only on the admin side
			if ( is_admin() ) {

				//get the post for both setup_postdata() and to be cached
				global $post;

				//only cache $post the first time through the loop
				if ( ! isset( $GLOBALS['post_cache'] ) ) {
					$GLOBALS['post_cache'] = $post;
				}

				//setup the post data as usual
				$post = $post_to_setup;
				setup_postdata( $post );
			} else {
				setup_postdata( $post_to_setup );
			}
		}//end method setup_admin_postdata


		/**
		 * Reset $post back to the original item
		 *
		 */
		public static function wp_reset_admin_postdata() {

			//only on the admin and if post_cache is set
			if ( is_admin() && ! empty( $GLOBALS['post_cache'] ) ) {

				//globalize post as usual
				global $post;

				//set $post back to the cached version and set it up
				$post = $GLOBALS['post_cache'];
				setup_postdata( $post );

				//cleanup
				unset( $GLOBALS['post_cache'] );
			} else {
				wp_reset_postdata();
			}
		}//end method wp_reset_admin_postdata

		/**
		 * Get avaliable layouts
		 * @return mixed|void
		 */
		public static function get_layouts() {
			$layouts = array(
				'default' => array(
					'title'        => esc_html__( 'Default', 'cbxinstaphotos' ),
					//'template_dir' => CBXINSTAPHOTOS_ROOT_PATH . 'templates/default.php'
					'template_dir' => cbxinstaphotos_locate_template( 'default.php' )
				),
			);

			return ( apply_filters( 'cbxinstaphotos_layouts', $layouts ) );
		}//end method get_layouts

		/**
		 * Elementor compatible layout dropdown data
		 *
		 *
		 * @return mixed|void
		 */
		public static function get_layouts_elementor_dropdown() {
			$layouts = CBXInstaPhotosHelper::get_layouts();

			$layouts_arr = array();

			foreach ( $layouts as $layout_key => $layout_info ) {
				$layouts_arr[ $layout_key ] = $layout_info['title'];
			}

			return $layouts_arr;
		}//end method get_layouts

		/**
		 * Get avaliable Cache periods
		 *
		 * @return mixed|void
		 */
		public static function get_cachetimes() {
			return array(
				'1'  => esc_html__( '1 Hour', 'cbxinstaphotos' ),
				'2'  => esc_html__( '2 Hour', 'cbxinstaphotos' ),
				'3'  => esc_html__( '3 Hour', 'cbxinstaphotos' ),
				'4'  => esc_html__( '4 Hour', 'cbxinstaphotos' ),
				'5'  => esc_html__( '5 Hour', 'cbxinstaphotos' ),
				'6'  => esc_html__( '6 Hour', 'cbxinstaphotos' ),
				'7'  => esc_html__( '7 Hour', 'cbxinstaphotos' ),
				'8'  => esc_html__( '8 Hour', 'cbxinstaphotos' ),
				'9'  => esc_html__( '9 Hour', 'cbxinstaphotos' ),
				'10' => esc_html__( '10 Hour', 'cbxinstaphotos' ),
				'11' => esc_html__( '11 Hour', 'cbxinstaphotos' ),
				'12' => esc_html__( '12 Hour', 'cbxinstaphotos' ),
				'13' => esc_html__( '13 Hour', 'cbxinstaphotos' ),
				'14' => esc_html__( '14 Hour', 'cbxinstaphotos' ),
				'15' => esc_html__( '15 Hour', 'cbxinstaphotos' ),
				'16' => esc_html__( '16 Hour', 'cbxinstaphotos' ),
				'17' => esc_html__( '17 Hour', 'cbxinstaphotos' ),
				'18' => esc_html__( '18 Hour', 'cbxinstaphotos' ),
				'19' => esc_html__( '19 Hour', 'cbxinstaphotos' ),
				'20' => esc_html__( '20 Hour', 'cbxinstaphotos' ),
				'21' => esc_html__( '21 Hour', 'cbxinstaphotos' ),
				'22' => esc_html__( '22 Hour', 'cbxinstaphotos' ),
				'23' => esc_html__( '23 Hour', 'cbxinstaphotos' ),
				'24' => esc_html__( '24 Hour', 'cbxinstaphotos' ),
			);

		}//end method get_cachetimes

		/**
		 * Convert http url to https
		 *
		 * @param $http_url
		 *
		 * @return mixed
		 */
		public static function toHttps( $http_url ) {
			$http_url = str_replace( 'http://', 'https://', $http_url );

			return $http_url;
		}//end method toHttps

	}//end class CBXInstaPhotosHelper