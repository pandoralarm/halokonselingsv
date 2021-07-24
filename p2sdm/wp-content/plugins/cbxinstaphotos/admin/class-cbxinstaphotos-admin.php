<?php

	/**
	 * The admin-specific functionality of the plugin.
	 *
	 * Defines the plugin name, version, and two examples hooks for how to
	 * enqueue the admin-specific stylesheet and JavaScript.
	 *
	 * @package    CBXInstaPhotos
	 * @subpackage CBXInstaPhotos/admin
	 * @author     codeboxr <info@codeboxr.com>
	 */
	class CBXInstaPhotos_Admin {

		/**
		 * The ID of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string $plugin_name The ID of this plugin.
		 */
		private $plugin_name;

		/**
		 * The plugin basename of the plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string $plugin_basename The plugin basename of the plugin.
		 */
		protected $plugin_basename;


		/**
		 * Slug of the plugin screen.
		 *
		 * @since    1.0.0
		 *
		 * @var      string
		 */
		protected $plugin_screen_hook_suffix = null;

		/**
		 * The version of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string $version The current version of this plugin.
		 */
		private $version;

		/**
		 * Initialize the class and set its properties.
		 *
		 * @since    1.0.0
		 *
		 * @param      string $plugin_name The name of this plugin.
		 * @param      string $version     The version of this plugin.
		 */
		public function __construct( $plugin_name, $version ) {
			$this->plugin_name = $plugin_name;
			$this->version     = $version;

			$this->plugin_basename = plugin_basename( plugin_dir_path( __DIR__ ) . $this->plugin_name . '.php' );
		}//end of constructor

		/**
		 * Get Active Insta posts post types
		 */
		public function get_active_instaposts() {
			return CBXInstaPhotosHelper::get_active_instaposts();
		}//end method get_active_instaposts

		/**
		 * Register the stylesheets for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_styles( $hook ) {
			global $post_type;

			wp_register_style( 'cbxinstaphotos-admin', plugin_dir_url( __FILE__ ) . '../assets/css/cbxinstaphotos-admin.css', array(), $this->version, 'all' );
			wp_register_style( 'switcherycss', plugin_dir_url( __FILE__ ) . '../assets/css/switchery.min.css', array(), $this->version, 'all' );

			if ( ( $hook == 'post.php' || $hook == 'post-new.php' || $hook == 'edit.php' ) && ( 'cbxinstaphotos' == $post_type ) ) {
				wp_enqueue_style( 'switcherycss' );
				wp_enqueue_style( 'cbxinstaphotos-admin' );
			}
		}//end method enqueue_styles

		/**
		 * Register the JavaScript for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_scripts( $hook ) {

			global $post_type;

			wp_register_script( 'switchery-js', plugin_dir_url( __FILE__ ) . '../assets/js/switchery.js', array( 'jquery' ), $this->version, true );
			wp_register_script( 'cbxinstaphotos-admin', plugin_dir_url( __FILE__ ) . '../assets/js/cbxinstaphotos-admin.js', array(
				'jquery',
				'switchery-js'
			), $this->version, true );


			if ( ( $hook == 'post.php' || $hook == 'post-new.php' || $hook == 'edit.php' ) && ( 'cbxinstaphotos' == $post_type ) ) {

				$cbxinstaphotos_translation = array(
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
					'nonce'   => wp_create_nonce( 'cbxinstaphotos' ),
				);
				wp_localize_script( 'cbxinstaphotos-admin', 'cbxinstaphotos', $cbxinstaphotos_translation );

				wp_enqueue_script( 'switchery-js' );
				wp_enqueue_script( 'cbxinstaphotos-admin' );
			}

		}//end method enqueue_scripts

		/**
		 * Register Custom Post Type "cbxinstaphotos"
		 */
		public function create_cbxinstaphotos() {

			$labels = array(
				'name'               => esc_html_x( 'CBX Insta Photos', 'Post Type General Name', 'cbxinstaphotos' ),
				'singular_name'      => esc_html_x( 'CBX Insta Photo', 'Post Type Singular Name', 'cbxinstaphotos' ),
				'menu_name'          => esc_html__( 'CBX Insta Photos', 'cbxinstaphotos' ),
				'parent_item_colon'  => esc_html__( 'Parent CBX Insta Photos:', 'cbxinstaphotos' ),
				'all_items'          => esc_html__( 'All CBX Insta Photos', 'cbxinstaphotos' ),
				'view_item'          => esc_html__( 'View CBX Insta Photo', 'cbxinstaphotos' ),
				'add_new_item'       => esc_html__( 'Add New CBX Insta Photo', 'cbxinstaphotos' ),
				'add_new'            => esc_html__( 'Add New', 'cbxinstaphotos' ),
				'edit_item'          => esc_html__( 'Edit CBX Insta Photo', 'cbxinstaphotos' ),
				'update_item'        => esc_html__( 'Update CBX Insta Photo', 'cbxinstaphotos' ),
				'search_items'       => esc_html__( 'Search CBX Insta Photo', 'cbxinstaphotos' ),
				'not_found'          => esc_html__( 'Not found', 'cbxinstaphotos' ),
				'not_found_in_trash' => esc_html__( 'Not found in Trash', 'cbxinstaphotos' ),
			);

			$args = array(
				'label'               => esc_html__( 'cbxinstaphotos', 'cbxinstaphotos' ),
				'description'         => esc_html__( 'CBX Insta Photos', 'cbxinstaphotos' ),
				'labels'              => $labels,
				'supports'            => array( 'title' ),
				'hierarchical'        => false,
				'public'              => false,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'show_in_nav_menus'   => true,
				'show_in_admin_bar'   => true,
				//'menu_position'       => 5,
				'menu_icon'           => esc_url( CBXINSTAPHOTOS_ROOT_URL . 'assets/images/menu_icon.png' ),
				'can_export'          => true,
				'has_archive'         => true,
				'exclude_from_search' => true,
				'publicly_queryable'  => false,
				'capability_type'     => 'post',
			);

			register_post_type( 'cbxinstaphotos', $args );

		}//end method create_cbxinstaphotos


		/**
		 * Adding meta box under cbxinstaphotos custom post types
		 */
		public function add_meta_boxes() {
			//settings
			add_meta_box(
				'cbxinstaphotosmetabox', esc_html__( 'CBX Insta Phostos Settings', 'cbxinstaphotos' ), array(
				$this,
				'cbxinstaphotosmetabox_display'
			), 'cbxinstaphotos', 'normal', 'high'
			);

			//shortcode
			add_meta_box(
				'cbxinstaphotosmetabox_shortcode', esc_html__( 'Get the Shortcode', 'cbxinstaphotos' ), array(
				$this,
				'cbxinstaphotosmetabox_shortcode_display'
			), 'cbxinstaphotos', 'side', 'low'
			);

			//delete transient
			add_meta_box(
				'cbxinstaphotosmetabox_transient_reset', esc_html__( 'Reset Cache', 'cbxinstaphotos' ), array(
				$this,
				'cbxinstaphotosmetabox_transient_reset_display'
			), 'cbxinstaphotos', 'side', 'low'
			);

		}//end emthod add_meta_boxes

		/**
		 * Get avaliable layouts
		 * @return mixed|void
		 */
		public function get_layouts() {
			return CBXInstaPhotosHelper::get_layouts();
		}//end method get_layouts


		/**
		 * Get avaliable Cache periods
		 *
		 * @return mixed|void
		 */
		public function get_cachetimes() {
			return CBXInstaPhotosHelper::get_cachetimes();
		}//end method get_cachetimes


		/**
		 * Render Metabox under custom post type
		 *
		 * @param $post
		 *
		 * @since 1.0
		 *
		 */
		public function cbxinstaphotosmetabox_shortcode_display( $post ) {
			$post_id = intval( $post->ID );

			echo '<span class="cbxinstaphotosshortcodecopy" id="cbxinstaphotosshortcode' . $post->ID . '">[cbxinstaphotos  id="' . $post_id . '"]</span>
             <span class="button cbxinstaphotosshortcodetrigger" data-clipboard-target="#cbxinstaphotosshortcode' . $post_id . '" title="' . esc_html__( "Copy to clipboard", "cbxinstaphotos" ) . '"><img style="width: 16px; height: 16px;" src="' . plugin_dir_url( __FILE__ ) . '../assets/images/clippy.svg' . '" alt="' . esc_html__( 'Copy to clipboard', 'cbxinstaphotos' ) . '"></span>';
		}

		/**
		 * Ajax Callback for reseting transient
		 */
		public function cbxinstaphotos_reset_transient() {
			check_ajax_referer( 'cbxinstaphotos', 'security' );


			$delete_status = delete_transient( $_POST['transientid'] );

			echo ( $delete_status ) ? 1 : 0;

			wp_die();
		}//end method cbxinstaphotos_reset_transient

		/**
		 * Render Metabox under custom post type
		 *
		 * @param $post
		 *
		 * @since 1.0
		 *
		 */
		public function cbxinstaphotosmetabox_transient_reset_display( $post ) {
			$cbx_ajax_icon = plugin_dir_url( __FILE__ ) . '../assets/images/busy.gif';
			echo sprintf( '<input class="button-primary cbxinstaphotos_reset_cache" type="submit" value="%s" data-transientid="%s" name="cbxinstaphotos_reset_cache" />', esc_html__( 'Reset', 'cbxinstaphotos' ), 'cbxinstaphotos' . $post->ID ) . '<span data-busy="0" class="cbxinstaphotos_ajax_icon"><img src="' . esc_url( $cbx_ajax_icon ) . '"/></span>';
		}

		/**
		 * Convert number of seconds into hours, minutes and seconds
		 * and return an array containing those values
		 *
		 * @param integer $seconds Number of seconds to parse
		 *
		 * @return array
		 */
		public function secondsToTime( $seconds ) {
			$dtF = new \DateTime( '@0' );
			$dtT = new \DateTime( "@$seconds" );

			return $dtF->diff( $dtT )->format( '%a' );
		}

		/**
		 * Displaying Meta boxes
		 *
		 * @param $post
		 *
		 * @throws InstagramModTimelineException
		 */
		public function cbxinstaphotosmetabox_display( $post ) {

			$post_id = intval( $post->ID );

			$curl_installed = CBXInstaPhotosHelper::_is_curl_installed();
			$code           = isset( $_GET['code'] ) ? sanitize_text_field( $_GET['code'] ) : '';
			$removeapp      = isset( $_GET['removeapp'] ) ? intval( $_GET['removeapp'] ) : 0;

			$removeurl   = get_edit_post_link( $post_id );
			$callbackurl = get_home_url() . '?cbxinstaphotos=' . $post_id;


			if ( $removeapp ) {
				$fieldValues = get_post_meta( $post_id, '_cbxinstaphotos', true );
				//delete access token and connected date
				if ( isset( $fieldValues['accesstoken'] ) ) {
					unset( $fieldValues['accesstoken'] );
				}
				if ( isset( $fieldValues['connected_date'] ) ) {
					unset( $fieldValues['connected_date'] );
				}

				//delete cache
				delete_transient( 'cbxinstaphotos' . intval( $post_id ) );
				update_post_meta( $post_id, '_cbxinstaphotos', $fieldValues );

			}

			$fieldValues = get_post_meta( $post_id, '_cbxinstaphotos', true );
			wp_nonce_field( 'cbxinstaphotosmetabox', 'cbxinstaphotosmetabox[nonce]' );

			$enable          = isset( $fieldValues['enable'] ) ? intval( $fieldValues['enable'] ) : 1;
			$authtype        = isset( $fieldValues['authtype'] ) ? intval( $fieldValues['authtype'] ) : 1; //1 = no api key 0 = api key
			$client_id       = isset( $fieldValues['client_id'] ) ? sanitize_text_field( $fieldValues['client_id'] ) : '';
			$client_secret   = isset( $fieldValues['client_secret'] ) ? sanitize_text_field( $fieldValues['client_secret'] ) : '';
			$client_username = isset( $fieldValues['client_username'] ) ? sanitize_text_field( $fieldValues['client_username'] ) : '';
			$accesstoken     = isset( $fieldValues['accesstoken'] ) ? esc_attr( $fieldValues['accesstoken'] ) : '';
			$connected_date  = isset( $fieldValues['connected_date'] ) ? esc_attr( $fieldValues['connected_date'] ) : '';


			$follow    = isset( $fieldValues['follow'] ) ? intval( $fieldValues['follow'] ) : 1;
			$show_like = isset( $fieldValues['show_like'] ) ? intval( $fieldValues['show_like'] ) : 1;
			$show_com  = isset( $fieldValues['show_com'] ) ? intval( $fieldValues['show_com'] ) : 1;


			$count      = isset( $fieldValues['count'] ) ? intval( $fieldValues['count'] ) : 12;
			$httpimg    = isset( $fieldValues['httpimg'] ) ? intval( $fieldValues['httpimg'] ) : 0;
			$layout     = isset( $fieldValues['layout'] ) ? esc_attr( $fieldValues['layout'] ) : 'default';
			$cache_time = isset( $fieldValues['cache_time'] ) ? esc_attr( $fieldValues['cache_time'] ) : '12';

			$enable_cache = isset( $fieldValues['enable_cache'] ) ? intval( $fieldValues['enable_cache'] ) : 0;

			$layouts    = CBXInstaPhotosHelper::get_layouts();
			$cachetimes = CBXInstaPhotosHelper::get_cachetimes();

			$api_hide_class = ( $authtype ) ? 'cbxinstaphotosmetabox_api_hide' : '';


			echo '<div id="cbxinstaphotosmetabox_wrapper">';
			?>

			<table class="form-table">
				<tbody>
				<tr valign="top">
					<th scope="row"><label
							for="cbxinstaphotosmetabox_fields_class"><?php esc_html_e( 'Enable/Disable', 'cbxinstaphotos' ) ?></label>
					</th>
					<td class="inline-radio-buttons">
						<legend class="screen-reader-text"><span>input type="radio"</span></legend>
						<label title='g:i a'> <input type="radio" name="cbxinstaphotosmetabox[enable]"
													 value="1" <?php checked( $enable, '1', true ); ?> />
							<span><?php esc_html_e( 'Yes', 'cbxinstaphotos' ); ?></span> </label> <label title='g:i a'>
							<input type="radio" name="cbxinstaphotosmetabox[enable]"
								   value="0" <?php checked( $enable, '0', true ); ?> />
							<span><?php esc_html_e( 'No', 'cbxinstaphotos' ); ?></span> </label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label
							for="cbxinstaphotosmetabox_fields_client_username"><?php esc_html_e( 'Instagram Username', 'cbxinstaphotos' ) ?></label>
					</th>
					<td>
						<input id="cbxinstaphotosmetabox_fields_before_client_username" class="regular-text" type="text"
							   name=cbxinstaphotosmetabox[client_username]" placeholder="client-username"
							   value="<?php echo sanitize_text_field( $client_username ); ?>" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label
							for="cbxinstaphotosmetabox_fields_client_count"><?php esc_html_e( 'Photo Count', 'cbxinstaphotos' ) ?></label>
					</th>
					<td>
						<input id="cbxinstaphotosmetabox_fields_before_count" class="regular-text" type="number"
							   name=cbxinstaphotosmetabox[count]" placeholder="count"
							   value="<?php echo intval( $count ); ?>" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label
							for="cbxinstaphotosmetabox_fields_client_layout"><?php esc_html_e( 'Layout', 'cbxinstaphotos' ) ?></label>
					</th>
					<td>
						<select name="cbxinstaphotosmetabox[layout]">
							<?php foreach ( $layouts as $key => $value ) { ?>
								<option value="<?php echo $key; ?>" <?php selected( $key, $layout ); ?>><?php echo $value['title']; ?></option>
							<?php } ?>

						</select>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><label
							for="cbxinstaphotosmetabox_fields_class"><?php esc_html_e( 'Authentication Method', 'cbxinstaphotos' ) ?></label>
					</th>
					<td class="inline-radio-buttons">
						<legend class="screen-reader-text"><span>input type="radio"</span></legend>
						<label title='g:i a'> <input type="radio" name="cbxinstaphotosmetabox[authtype]"
													 value="1" <?php checked( $authtype, '1', true ); ?> />
							<span><?php esc_html_e( 'No Api Key(Simple)', 'cbxinstaphotos' ); ?></span> </label>
						<label title='g:i a'> <input type="radio" name="cbxinstaphotosmetabox[authtype]"
													 value="0" <?php checked( $authtype, '0', true ); ?> />
							<span><?php esc_html_e( 'Api Key(Advance)', 'cbxinstaphotos' ); ?></span> </label>
					</td>
				</tr>

				<tr class="cbxinstaphotosmetabox_api <?php echo esc_attr( $api_hide_class ); ?>" valign="top">
					<th scope="row"><label
							for="cbxinstaphotosmetabox_fields_client_id"><?php esc_html_e( 'Client ID', 'cbxinstaphotos' ); ?></label>
					</th>
					<td>
						<input id="cbxinstaphotosmetabox_fields_client_id" class="regular-text" type="text"
							   name="cbxinstaphotosmetabox[client_id]" placeholder="client-id"
							   value="<?php echo sanitize_text_field( $client_id ); ?>" />
					</td>
				</tr>
				<tr class="cbxinstaphotosmetabox_api <?php echo esc_attr( $api_hide_class ); ?>" valign="top">
					<th scope="row"><label
							for="cbxinstaphotosmetabox_fields_client_secret"><?php esc_html_e( 'Client Secret', 'cbxinstaphotos' ) ?></label>
					</th>
					<td>
						<input id="cbxinstaphotosmetabox_fields_before_client_secret" class="regular-text" type="text"
							   name=cbxinstaphotosmetabox[client_secret]" placeholder="client-secret"
							   value="<?php echo sanitize_text_field( $client_secret ); ?>" />
					</td>
				</tr>
				<tr class="cbxinstaphotosmetabox_api <?php echo esc_attr( $api_hide_class ); ?>" valign="top">
					<th scope="row"><label
							for="cbxinstaphotosmetabox_fields_client_secret"><?php esc_html_e( 'Instagram Connect', 'cbxinstaphotos' ) ?></label>
					</th>
					<td>
						<?php
							//render connect/disconnect button
							$config['base_url']      = get_home_url();
							$config['redirect_uri']  = $callbackurl;
							$config['client_id']     = $client_id;
							$config['client_secret'] = $client_secret;
							$config['grant_type']    = 'authorization_code';

							$instagram = new CBXInstagramModInsta( $config );

							ob_start();

							if ( empty( $client_id ) || empty( $client_secret ) ):
								echo '<div class="notice  notice-info inline cbxinstaphoto-notice"><p>' . esc_html__( 'Please add Client ID and Client Secret', 'cbxinstaphotos' ) . '</p></div>';
								echo '<br/><a href="http://instagram.com/developer/clients/manage/" target="_blank">' . esc_html__( 'Go to Instagram Developer portal to create app', 'cbxinstaphotos' ) . '</a>';
								echo '<br/> ' . sprintf( __( 'Use "<strong>%s</strong>" as redeirect url in app setting.', 'cbxinstaphotos' ), get_home_url() );

							else:
								if ( empty( $accesstoken ) ) {
									if ( $curl_installed ) {
										echo '<div class="notice  notice-success inline cbxinstaphoto-notice"><p>' . esc_html__( 'cURL is installed on this server', 'cbxinstaphotos' ) . '</p></div>';
									} else {
										echo '<div class="notice  notice-error inline cbxinstaphoto-notice"><p>' . esc_html__( 'cURL is NOT installed on this server, Php curl extension is needed to make this extension work.', 'cbxinstaphotos' ) . '</p></div>';
									}

									echo '<a href="http://instagram.com/developer/clients/manage/" target="_blank">' . esc_html__( 'Go to Instagram Developer portal to create app', 'cbxinstaphotos' ) . '</a>';
									echo '<br/> ' . sprintf( __( 'Use "<strong>%s</strong>" as redeirect url in app setting.', 'cbxinstaphotos' ), get_home_url() );
									echo '<br/><a style="float:left; display:inline;" href="' . $instagram->getAuthorizationUrl() . '"><img src="' . CBXINSTAPHOTOS_ROOT_URL . 'assets/images/instagram_signin.png" alt="' . esc_attr__( 'Connect Instagram', 'cbxinstaphotos' ) . '"/></a>';
								} else {
									echo '<p><a href="' . $removeurl . '&removeapp=1"><img src="' . CBXINSTAPHOTOS_ROOT_URL . 'assets/images/instagram_disconnect.png" alt="' . esc_attr__( 'Remove Instagram', 'cbxinstaphotos' ) . '"/></a></p>';

									echo '<div class="notice  notice-info inline cbxinstaphoto-notice"><p>' . sprintf( '%s : <strong>%s</strong> , <strong>%s</strong> %s', esc_html__( 'Connected', 'cbxinstaphotos' ), $connected_date, $this->secondsToTime( strtotime( $connected_date ) - strtotime( current_time( 'mysql' ) ) ), esc_html__( 'Days ago', 'cbxinstaphotos' ) ) . '</p></div>';

									if ( $this->secondsToTime( strtotime( $connected_date ) - strtotime( current_time( 'mysql' ) ) ) > 60 ) {
										echo '<div class="notice  notice-info inline cbxinstaphoto-notice"><p>' . esc_attr__( 'Instagram connection expires in 60 days. Please disconnect and reconnect it again', 'cbxinstaphotos' ) . '</p></div>';
									}
								}

							endif;
							$html = ob_get_contents();
							ob_end_clean();

							echo $html;

						?>

					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="cbxinstaphotosmetabox_fields_follow"><?php esc_html_e( 'Show Follow Button', 'cbxinstaphotos' ) ?></label>
					</th>
					<td class="inline-radio-buttons">
						<legend class="screen-reader-text"><span>input type="radio"</span></legend>
						<label title='g:i a'> <input type="radio" name="cbxinstaphotosmetabox[follow]"
													 value="1" <?php checked( $follow, '1', true ); ?> />
							<span><?php esc_html_e( 'Yes', 'cbxinstaphotos' ); ?></span> </label> <label title='g:i a'>
							<input type="radio" name="cbxinstaphotosmetabox[follow]"
								   value="0" <?php checked( $follow, '0', true ); ?> />
							<span><?php esc_html_e( 'No', 'cbxinstaphotos' ); ?></span> </label>

					</td>
				</tr>

				<tr valign="top">
					<th scope="row">
						<label for="cbxinstaphotosmetabox_fields_follow"><?php esc_html_e( 'Show Like Count', 'cbxinstaphotos' ) ?></label>
					</th>
					<td class="inline-radio-buttons">
						<legend class="screen-reader-text"><span>input type="radio"</span></legend>
						<label title='g:i a'> <input type="radio" name="cbxinstaphotosmetabox[show_like]"
													 value="1" <?php checked( $show_like, '1', true ); ?> />
							<span><?php esc_html_e( 'Yes', 'cbxinstaphotos' ); ?></span> </label> <label title='g:i a'>
							<input type="radio" name="cbxinstaphotosmetabox[show_like]"
								   value="0" <?php checked( $show_like, '0', true ); ?> />
							<span><?php esc_html_e( 'No', 'cbxinstaphotos' ); ?></span> </label>

					</td>
				</tr>

				<tr valign="top">
					<th scope="row">
						<label for="cbxinstaphotosmetabox_fields_follow"><?php esc_html_e( 'Show Comment Count', 'cbxinstaphotos' ) ?></label>
					</th>
					<td class="inline-radio-buttons">
						<legend class="screen-reader-text"><span>input type="radio"</span></legend>
						<label title='g:i a'> <input type="radio" name="cbxinstaphotosmetabox[show_com]"
													 value="1" <?php checked( $show_com, '1', true ); ?> />
							<span><?php esc_html_e( 'Yes', 'cbxinstaphotos' ); ?></span> </label> <label title='g:i a'>
							<input type="radio" name="cbxinstaphotosmetabox[show_com]"
								   value="0" <?php checked( $show_com, '0', true ); ?> />
							<span><?php esc_html_e( 'No', 'cbxinstaphotos' ); ?></span> </label>

					</td>
				</tr>


				<tr valign="top">
					<th scope="row"><label
							for="cbxinstaphotosmetabox_fields_httpimg"><?php esc_html_e( 'Load Https Image url', 'cbxinstaphotos' ) ?></label>
					</th>
					<td class="inline-radio-buttons">
						<legend class="screen-reader-text"><span>input type="radio"</span></legend>
						<label title='g:i a'> <input type="radio" name="cbxinstaphotosmetabox[httpimg]"
													 value="0" <?php checked( $httpimg, '0', true ); ?> />
							<span><?php esc_html_e( 'No', 'cbxinstaphotos' ); ?></span> </label> <label title='g:i a'>
							<input type="radio" name="cbxinstaphotosmetabox[httpimg]"
								   value="1" <?php checked( $httpimg, '1', true ); ?> />
							<span><?php esc_html_e( 'Yes', 'cbxinstaphotos' ); ?></span> </label>

					</td>
				</tr>


				<tr valign="top">
					<th scope="row"><label
							for="cbxinstaphotosmetabox_fields_enable_cache"><?php esc_html_e( 'Cache Enabled', 'cbxinstaphotos' ) ?></label>
					</th>
					<td class="inline-radio-buttons">
						<legend class="screen-reader-text"><span>input type="radio"</span></legend>
						<label title='g:i a'> <input type="radio" name="cbxinstaphotosmetabox[enable_cache]"
													 value="1" <?php checked( $enable_cache, '1', true ); ?> />
							<span><?php esc_html_e( 'Yes', 'cbxinstaphotos' ); ?></span> </label> <label title='g:i a'>
							<input type="radio" name="cbxinstaphotosmetabox[enable_cache]"
								   value="0" <?php checked( $enable_cache, '0', true ); ?> />
							<span><?php esc_html_e( 'No', 'cbxinstaphotos' ); ?></span> </label>

					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><label
							for="cbxinstaphotosmetabox_fields_cache_time"><?php esc_html_e( 'Cache Time', 'cbxinstaphotos' ) ?></label>
					</th>
					<td>
						<select name="cbxinstaphotosmetabox[cache_time]">
							<?php foreach ( $cachetimes as $key => $value ) { ?>
								<option value="<?php echo $key; ?>" <?php selected( $key, $cache_time ); ?>><?php echo $value; ?></option>
							<?php } ?>

						</select>
					</td>
				</tr>


				</tbody>
			</table>

			<?php
			echo '</div>';

		}//end display metabox

		/**
		 * Saving post with post meta.
		 *
		 * @param        int $post_id The ID of the post being save
		 * @param            bool                Whether or not the user has the ability to save this post.
		 */
		public function save_post( $post_id, $post ) {

			$post_type = 'cbxinstaphotos';

			if ( $post_type != $post->post_type ) {
				return;
			}

			if ( ! empty( $_POST['cbxinstaphotosmetabox'] ) ) {

				$postData = $_POST['cbxinstaphotosmetabox'];

				if ( $this->user_can_save( $post_id, 'cbxinstaphotosmetabox', $postData['nonce'] ) ) {


					$fieldValues = get_post_meta( $post_id, '_cbxinstaphotos', true );
					if ( ! is_array( $fieldValues ) ) {
						$fieldValues = array();
					}


					$fieldValues['enable']          = intval( $postData['enable'] );
					$fieldValues['authtype']        = isset( $postData['authtype'] ) ? intval( $postData['authtype'] ) : 1; //1 = no api key, 0 = api key
					$fieldValues['client_id']       = isset( $postData['client_id'] ) ? esc_attr( $postData['client_id'] ) : '';
					$fieldValues['client_secret']   = isset( $postData['client_secret'] ) ? esc_attr( $postData['client_secret'] ) : '';
					$fieldValues['client_username'] = esc_attr( $postData['client_username'] );


					$fieldValues['count']        = intval( $postData['count'] );
					$fieldValues['layout']       = esc_attr( $postData['layout'] );
					$fieldValues['follow']       = intval( $postData['follow'] );
					$fieldValues['show_like']    = intval( $postData['show_like'] );
					$fieldValues['show_com']     = intval( $postData['show_com'] );
					$fieldValues['httpimg']      = intval( $postData['httpimg'] );
					$fieldValues['cache_time']   = intval( $postData['cache_time'] );
					$fieldValues['enable_cache'] = intval( $postData['enable_cache'] );

					update_post_meta( $post_id, '_cbxinstaphotos', $fieldValues );
				}
			}
		}


		/**
		 * Determines whether or not the current user has the ability to save meta data associated with this post.
		 *
		 * @param $post_id
		 * @param $action
		 * @param $nonce
		 *
		 * @return bool
		 */
		public function user_can_save( $post_id, $action, $nonce ) {

			$is_autosave    = wp_is_post_autosave( $post_id );
			$is_revision    = wp_is_post_revision( $post_id );
			$is_valid_nonce = ( isset( $nonce ) && wp_verify_nonce( $nonce, $action ) );

			// Return true if the user is able to save; otherwise, false.
			return ! ( $is_autosave || $is_revision ) && $is_valid_nonce;

		}// end user_can_save

		/**
		 * Listing of incoming posts Column Header
		 *
		 * @param $columns
		 *
		 * @return mixed
		 */
		public function columns_header( $columns ) {

			unset( $columns['date'] );

			$columns['enable']    = esc_html__( 'Status', 'cbxinstaphotos' );
			$columns['layout']    = esc_html__( 'Layout', 'cbxinstaphotos' );
			$columns['shortcode'] = esc_html__( 'Shortcode', 'cbxinstaphotos' );


			return $columns;
		}//end method columns_header

		/**
		 * Listing of incoming each row of post type.
		 *
		 * @param $column
		 * @param $post_id
		 */
		public function custom_column_row( $column, $post_id ) {
			$fields = get_post_meta( $post_id, '_cbxinstaphotos', true );

			switch ( $column ) {

				case 'enable':
					$enable = ! empty( $fields['enable'] ) ? intval( $fields['enable'] ) : 0;
					echo '<input data-postid="' . $post_id . '" ' . ( ( $enable == 1 ) ? ' checked="checked" ' : '' ) . ' type="checkbox"  value="' . $enable . '" class="js-switch cbxinstaphotosjs-switch" autocomplete="off" />';
					break;
				case 'layout':
					$layout = ! empty( $fields['layout'] ) ? esc_attr( $fields['layout'] ) : 'default';
					//$layouts = $this->get_layouts();
					$layouts = CBXInstaPhotosHelper::get_layouts();
					if ( ! isset( $layouts[ $layout ] ) ) {
						$layout = 'default';
					}
					$layout = $layouts[ $layout ];
					echo $layout['title'];
					break;
				case 'shortcode':
					echo '<span class="cbxinstaphotosshortcodecopy" id="cbxinstaphotosshortcode' . $post_id . '">[cbxinstaphotos  id="' . $post_id . '"]</span>
                <span class="button cbxinstaphotosshortcodetrigger" data-clipboard-target="#cbxinstaphotosshortcode' . $post_id . '" title="' . esc_attr__( "Copy to clipboard", "cbxinstaphotos" ) . '"><img style="width: 16px; height: 16px;" src="' . plugin_dir_url( __FILE__ ) . '../assets/images/clippy.svg' . '" alt="' . esc_attr__( 'Copy to clipboard', 'cbxinstaphotos' ) . '"></span>';
					break;
			}
		}//end method custom_column_row

		/**
		 * Slack In Enable/Disable
		 */
		public function cbxinstaphotos_enable_disable() {

			check_ajax_referer( 'cbxinstaphotos', 'security' );


			$enable      = ( isset( $_POST['enable'] ) && $_POST['enable'] != null ) ? intval( $_POST['enable'] ) : 0;
			$post_id     = ( isset( $_POST['postid'] ) && $_POST['postid'] != null ) ? intval( $_POST['postid'] ) : 0;
			$fieldValues = get_post_meta( $post_id, '_cbxinstaphotos', true );

			if ( ! is_array( $fieldValues ) ) {
				$fieldValues = array();
			}
			if ( $post_id > 0 ) {
				$fieldValues['enable'] = $enable;
				update_post_meta( $post_id, '_cbxinstaphotos', $fieldValues );
			}

			echo $enable;

			wp_die();
		}//end method cbxinstaphotos_enable_disable


		/**
		 * Remove Add new menu
		 */
		public function remove_menus() {

			$button_count = wp_count_posts( 'cbxinstaphotos' );


			//remove add button option if already one button is created //maximum 1
			if ( $button_count->publish > 0 ) {
				do_action( 'cbxinstaphotos_remove', $this );

			}

		}

		/**
		 * Callback action for 'cbxinstaphotos_remove' from core
		 */
		public function cbxinstaphotos_remove_core() {
			remove_submenu_page( 'edit.php?post_type=cbxinstaphotos', 'post-new.php?post_type=cbxinstaphotos' );        //remove add instaphoto menu

			$result    = stripos( $_SERVER['REQUEST_URI'], 'post-new.php' );
			$post_type = isset( $_REQUEST['post_type'] ) ? esc_attr( $_REQUEST['post_type'] ) : '';

			if ( $result !== false ) {
				if ( $post_type == 'cbxinstaphotos' ) {
					wp_redirect( get_option( 'siteurl' ) . '/wp-admin/edit.php?post_type=cbxinstaphotos&cbxinstaphotos_error=true' );
				}

			}
		}

		/**
		 * Showing Admin notice
		 *
		 */
		function permissions_admin_notice() {
			echo "<div id='permissions-warning' class='error fade'><p><strong>" . sprintf( __( 'Sorry, you can not create more than one post in free verion, <a target="_blank" href="%s">Grab Pro</a>', 'cbxinstaphotos' ), 'http://codeboxr.com/product/cbx-insta-photo-for-wordpress/' ) . "</strong></p></div>";
		}

		/**
		 * Admin notice if user try to create new button in free version
		 */
		function cbxinstaphotos_notice() {
			if ( isset( $_GET['cbxinstaphotos_error'] ) ) {
				add_action( 'admin_notices', array( $this, 'permissions_admin_notice' ) );
			}
		}

		/**
		 * Add support link to plugin description in /wp-admin/plugins.php
		 *
		 * @param  array  $plugin_meta
		 * @param  string $plugin_file
		 *
		 * @return array
		 */
		public function support_link( $plugin_meta, $plugin_file ) {

			if ( 'cbxinstaphotos' == $plugin_file ) {
				$plugin_meta[] = sprintf(
					'<a target="_blank" href="%s">%s</a>', 'http://codeboxr.com/product/cbx-insta-photo-for-wordpress/', esc_html__( 'Get Pro', 'cbxinstaphotos' )
				);
			}

			return $plugin_meta;
		}//end method support_link

		/**
		 * Init all gutenberg blocks
		 */
		public function gutenberg_blocks() {

			$active_insta = CBXInstaPhotosHelper::get_active_instaposts();
			$layouts      = CBXInstaPhotosHelper::get_layouts();

			$active_insta_posts = array();

			$active_insta_posts[] = array(
				'label' => esc_html__( 'Select Instagram Post', 'cbxinstaphotos' ),
				'value' => '0'
			);

			foreach ( $active_insta as $key => $label ) {
				$active_insta_posts[] = array(
					'label' => esc_html( $label ),
					'value' => intval( $key )
				);
			}

			$layouts_options = array();


			foreach ( $layouts as $key => $value ) {
				$layouts_options[] = array(
					'label' => esc_html( $value['title'] ),
					'value' => esc_attr( $key )
				);
			}


			wp_register_script( 'cbxinstaphotos-block', plugin_dir_url( __FILE__ ) . '../assets/js/cbxinstaphotos-block.js', array(
				'wp-blocks',
				'wp-element',
				'wp-components',
				'wp-editor',
				//'jquery',
				//'codeboxrflexiblecountdown-public'
			), filemtime( plugin_dir_path( __FILE__ ) . '../assets/js/cbxinstaphotos-block.js' ) );

			wp_register_style( 'cbxinstaphotos-block', plugin_dir_url( __FILE__ ) . '../assets/css/cbxinstaphotos-block.css', array(), filemtime( plugin_dir_path( __FILE__ ) . '../assets/css/cbxinstaphotos-block.css' ) );

			$js_vars = apply_filters( 'cbxinstaphotos_block_js_vars',
				array(
					'block_title'      => esc_html__( 'Insta Photos', 'cbxinstaphotos' ),
					'block_category'   => 'codeboxr',
					'block_icon'       => 'universal-access-alt',
					'general_settings' => array(
						'title'          => esc_html__( 'Insta Photos Settings', 'cbxinstaphotos' ),
						'id'             => esc_html__( 'Select Instagram Post', 'cbxinstaphotos' ),
						'id_options'     => $active_insta_posts,
						'layout'         => esc_html__( 'Select Layout', 'cbxinstaphotos' ),
						'layout_default' => 'default',
						'layout_options' => $layouts_options,
						'count'          => esc_html__( 'Photo count', 'cbxinstaphotos' ),
						'count_default'  => 12,
						'follow'         => esc_html__( 'Show Follow Button', 'cbxinstaphotos' ),
						//'follow_default'    => 1,
						'show_like'      => esc_html__( 'Show Like', 'cbxinstaphotos' ),
						//'show_like_default' => 1,
						'show_com'       => esc_html__( 'Show Comments', 'cbxinstaphotos' ),
						//'show_com_default'  => 1

					),
				) );

			wp_localize_script( 'cbxinstaphotos-block', 'cbxinstaphotos_block', $js_vars );

			register_block_type( 'codeboxr/cbxinstaphotos', array(
				'editor_script'   => 'cbxinstaphotos-block',
				'editor_style'    => 'cbxinstaphotos-block',
				'attributes'      => apply_filters( 'cbxinstaphotos_block_attributes', array(
					//general
					'id'        => array(
						'type'    => 'integer',
						'default' => '0',
					),
					'layout'    => array(
						'type'    => 'string',
						'default' => 'default'
					),
					'count'     => array(
						'type'    => 'integer',
						'default' => 12
					),
					'follow'    => array(
						'type'    => 'boolean',
						'default' => true
					),
					'show_like' => array(
						'type'    => 'boolean',
						'default' => true
					),
					'show_com'  => array(
						'type'    => 'boolean',
						'default' => true
					)
				) ),
				'render_callback' => array( $this, 'cbxinstaphotos_block_render' )
			) );

		}//end method gutenberg_blocks

		/**
		 * Getenberg server side render
		 *
		 * @param $settings
		 *
		 * @return string
		 */
		public function cbxinstaphotos_block_render( $attributes ) {
			$attr = array();

			$attr['id']     = $id = isset( $attributes['id'] ) ? intval( $attributes['id'] ) : 0;
			$attr['layout'] = $layout = isset( $attributes['layout'] ) ? sanitize_text_field( $attributes['layout'] ) : 'default';
			$attr['count']  = $count = isset( $attributes['count'] ) ? sanitize_text_field( $attributes['count'] ) : 12;


			$attr['follow']    = $follow = isset( $attributes['follow'] ) ? $attributes['follow'] : 'true';
			$attr['show_like'] = $show_like = isset( $attributes['show_like'] ) ? $attributes['show_like'] : 'true';
			$attr['show_com']  = $show_com = isset( $attributes['show_com'] ) ? $attributes['show_com'] : 'true';


			$attr['follow']    = ( $follow == 'true' ) ? 1 : 0;
			$attr['show_like'] = ( $show_like == 'true' ) ? 1 : 0;
			$attr['show_com']  = ( $show_com == 'true' ) ? 1 : 0;

			$attr = apply_filters( 'cbxinstaphotos_block_shortcode_builder_attr', $attr, $attributes );

			$attr_html = '';

			foreach ( $attr as $key => $value ) {
				$attr_html .= ' ' . $key . '="' . $value . '" ';
			}

			//return do_shortcode( '[cbxinstaphotos ' . $attr_html . ']' );
			return '[cbxinstaphotos ' . $attr_html . ']';
		}//end method cbxinstaphotos_block_render

		/**
		 * Register New Gutenberg block Category if need
		 *
		 * @param $categories
		 * @param $post
		 *
		 * @return mixed
		 */
		public function gutenberg_block_categories( $categories, $post ) {
			$found = false;

			foreach ( $categories as $category ) {
				if ( $category['slug'] == 'codeboxr' ) {
					$found = true;
					break;
				}
			}

			if ( ! $found ) {
				return array_merge(
					$categories,
					array(
						array(
							'slug'  => 'codeboxr',
							'title' => esc_html__( 'CBX Blocks', 'cbxinstaphotos' ),
						),
					)
				);
			}

			return $categories;
		}//end method gutenberg_block_categories


		/**
		 * Enqueue style for block editor
		 */
		public function enqueue_block_editor_assets() {

		}//end method enqueue_block_editor_assets
	}//end class CBXInstaPhotos_Admin
