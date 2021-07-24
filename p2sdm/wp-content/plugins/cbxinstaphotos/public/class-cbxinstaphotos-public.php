<?php

	/**
	 * The public-facing functionality of the plugin.
	 *
	 * Defines the plugin name, version, and two examples hooks for how to
	 * enqueue the admin-specific stylesheet and JavaScript.
	 *
	 * @package    CBXInstaPhotos
	 * @subpackage CBXInstaPhotos/public
	 * @author     codeboxr <info@codeboxr.com>
	 */
	class CBXInstaPhotos_Public {

		/**
		 * The ID of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string $plugin_name The ID of this plugin.
		 */
		private $plugin_name;

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
		 * @param      string $plugin_name The name of the plugin.
		 * @param      string $version     The version of this plugin.
		 */
		public function __construct( $plugin_name, $version ) {
			$this->plugin_name = $plugin_name;
			$this->version     = $version;
		}//end of constructor

		/**
		 * Init shortcodes
		 */
		public function init_shortcodes() {
			add_shortcode( 'cbxinstaphotos', array( $this, 'cbxinstaphotos_shortcode' ) );
		}//end method init_shortcodes

		/**
		 * Register Widget
		 */
		public function register_widget() {
			register_widget( "CBXInstaPhotos_Widget" ); //register widget
		}//end method register_widget

		/**
		 * Shortcode [cbxinstaphotos] callback
		 */
		public function cbxinstaphotos_shortcode( $atts ) {
			$atts = shortcode_atts(
				array(
					'id'        => '',
					'layout'    => '',
					'count'     => '', //show follower count
					'follow'    => '', //show follow button
					'show_like' => '', //show like count
					'show_com'  => '' //show comment count
				),
				$atts, 'cbxinstaphotos' );


			if ( $atts['id'] == '' ) {
				return '';
			}

			$id = intval( $atts['id'] );


			$savedmeta = get_post_meta( $id, '_cbxinstaphotos', true );
			if ( ! is_array( $savedmeta ) ) {
				$savedmeta = array();
			}


			$savedmeta['authtype'] = isset( $savedmeta['authtype'] ) ? intval( $savedmeta['authtype'] ) : 1;


			//get the template defined
			$layouts = CBXInstaPhotosHelper::get_layouts();


			//for "count" override the post settings value by shortcode param
			if ( isset( $atts['count'] ) && $atts['count'] != '' ) {
				$savedmeta['count'] = intval( $atts['count'] );
			} else {
				$savedmeta['count'] = isset( $savedmeta['count'] ) ? intval( $savedmeta['count'] ) : 12;
			}

			if ( intval( $savedmeta['count'] ) == 0 ) {
				$savedmeta['count'] = 12;
			}

			if ( isset( $atts['layout'] ) && $atts['layout'] != '' ) {
				$savedmeta['layout'] = $atts['layout'];
			} else {
				$savedmeta['layout'] = isset( $savedmeta['layout'] ) ? esc_attr( $savedmeta['layout'] ) : 'default';
			}

			if ( $savedmeta['layout'] == '' ) {
				$savedmeta['layout'] = 'default';
			}

			//for "follow" override the post settings value by shortcode param
			if ( isset( $atts['follow'] ) && $atts['follow'] != '' ) {
				$savedmeta['follow'] = intval( $atts['follow'] );
			} else {
				$savedmeta['follow'] = isset( $savedmeta['follow'] ) ? esc_attr( $savedmeta['follow'] ) : 1;
			}

			if ( isset( $atts['show_like'] ) && $atts['show_like'] != '' ) {
				$savedmeta['show_like'] = intval( $atts['show_like'] );
			} else {
				$savedmeta['show_like'] = isset( $savedmeta['show_like'] ) ? esc_attr( $savedmeta['show_like'] ) : 1;
			}

			if ( isset( $atts['show_com'] ) && $atts['show_com'] != '' ) {
				$savedmeta['show_com'] = intval( $atts['show_com'] );
			} else {
				$savedmeta['show_com'] = isset( $savedmeta['show_com'] ) ? esc_attr( $savedmeta['show_com'] ) : 1;
			}

			extract( $savedmeta );

			if ( ! isset( $layouts[ $layout ] ) ) {
				$layout              = 'default';
				$savedmeta['layout'] = $layout;
			}


			$cache_time   = ( isset( $savedmeta['cache_time'] ) && $savedmeta['cache_time'] != '' ) ? intval( $savedmeta['cache_time'] ) : 12;
			$cache_enable = ( isset( $savedmeta['enable_cache'] ) && $savedmeta['enable_cache'] != '' ) ? intval( $savedmeta['enable_cache'] ) : 0;

			$post_id = $atts['id'];

			//end arranging params

			ob_start();

			if ( isset( $enable ) && $enable == 1 ) {

				$result = get_transient( 'cbxinstaphotos' . $post_id );

				//check for cache enable or not
				if ( $cache_enable ) {
					// Get any existing copy of our transient data
					if ( false === ( $result = get_transient( 'cbxinstaphotos' . $post_id ) ) ) {
						// It wasn't there, so regenerate the data and save the transient
						$result = $this->_getresult( $post_id, $savedmeta );
						set_transient( 'cbxinstaphotos' . $post_id, $result, HOUR_IN_SECONDS * $cache_time );
					}
				} else {
					delete_transient( 'cbxinstaphotos' . $post_id );
					$result = $this->_getresult( $post_id, $savedmeta );
				}

				if ( isset( $result['items'] ) ) {
					$result['items'] = array_slice( $result['items'], 0, $count );
				}


				//load the template
				$layout_include_url = $layouts[ $layout ]['template_dir'];
				include( $layout_include_url );
			}

			$output = ob_get_contents();
			ob_end_clean();

			return $output;
		}//end method cbxinstaphotos_shortcode

		/**
		 * Get User info and user profile items from instagram
		 *
		 * @param $post_id
		 * @param $savedmeta
		 *
		 * @return array
		 * @throws InstagramModTimelineException
		 */
		public function _getresult( $post_id, $savedmeta ) {
			$output             = array();
			$errors             = array();
			$output['error']    = true;
			$output['username'] = $savedmeta['client_username'];

			$authtype = isset( $savedmeta['authtype'] ) ? intval( $savedmeta['authtype'] ) : 1;
			$httpimg  = isset( $savedmeta['httpimg'] ) ? intval( $savedmeta['httpimg'] ) : 0;


			extract( $savedmeta );

			$count = 20; //maximum possible in one request


			if ( isset( $enable ) && ( $enable == 1 ) ) {
				if ( $authtype == 0 && ( $savedmeta['client_id'] == '' || $savedmeta['client_secret'] == '' ) ) {
					$errors[] = esc_html__( 'Api keys are missing or incorrect', 'cbxinstaphotos' );
				}
			}

			if ( $authtype == 0 && ( ! isset( $savedmeta['accesstoken'] ) || ( isset( $savedmeta['accesstoken'] ) && $savedmeta['accesstoken'] == '' ) ) ) {
				$errors[] = esc_html__( 'Access token missing or instagram not connected from backend', 'cbxinstaphotos' );
			}

			if ( ! isset( $savedmeta['client_username'] ) || ( isset( $savedmeta['client_username'] ) && $savedmeta['client_username'] == '' ) ) {
				$errors[] = esc_html__( 'Username is missing', 'cbxinstaphotos' );
			}


			if ( $authtype == 1 && sizeof( $errors ) == 0 ) {
				//if no api key method
				try {

					//$http_response = wp_remote_get( 'https://www.instagram.com/' . $savedmeta['client_username'] . '/?__a=1' );
					$http_response = wp_remote_get( 'https://www.instagram.com/' . $savedmeta['client_username']);


					if ( ! is_wp_error( $http_response ) ) {
						//$header = $response['headers']; // array of http header lines
						//$http_body = $http_response['body'];
						$http_body = wp_remote_retrieve_body( $http_response );

						$matches = array();
						//  /<script type="text\/javascript">window\._sharedData = (.*)<\/script>/
						$s = preg_match('/<script type="text\/javascript">window\._sharedData = (.*)<\/script>/', $http_body, $matches);

						if(isset($matches[1])){
							//$http_body_arr = json_decode( $http_body, true );
							$http_body_arr = json_decode(substr($matches[1], 0, -1), true);

							if ( isset( $http_body_arr['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) && is_array( $http_body_arr['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) && sizeof( $http_body_arr['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'] ) > 0 ) {

								$photos = $http_body_arr['entry_data']['ProfilePage'][0]['graphql']['user']['edge_owner_to_timeline_media']['edges'];

								$resultArray = array();
								$i           = 0;

								foreach ( $photos as $item ) {

									if ( $i == $count ) {
										break;
									}


									$node      = $item['node'];
									$node      = (object) $node;
									$shortcode = $node->shortcode;

									$resultArr = new stdClass();

									$link             = 'https://www.instagram.com/p/' . $shortcode . '/';
									$resultArr->link  = $link;
									$resultArr->title = isset( $node->edge_media_to_caption->edges[0]->node->text ) ? $node->edge_media_to_caption->edges[0]->node->text : '';
									$resultArr->desc  = $resultArr->title;

									$resultArr->like         = isset( $node->edge_liked_by['count'] ) ? intval( $node->edge_liked_by['count'] ) : 0;
									$resultArr->comment      = isset( $node->edge_media_to_comment['count'] ) ? intval( $node->edge_media_to_comment['count'] ) : 0;
									$resultArr->user         = $node->owner['username'];
									$resultArr->id           = $node->id;
									$resultArr->location     = $node->location;
									$resultArr->created_time = $node->taken_at_timestamp;


									if ( $node->__typename == 'GraphImage' ) {
										//for photo or image
										$resultArr->type                = 'image';
										$resultArr->thumb               = ( $httpimg ) ? CBXInstaPhotosHelper::toHttps( $node->thumbnail_src ) : $node->thumbnail_src;
										$resultArr->standard_resolution = $resultArr->thumb;
										//$resultArray->low_resolution      = $resultArray->thumb;
									} else {
										///for video
										$resultArr->type                = 'video';
										$resultArr->thumb               = ( $httpimg ) ? CBXInstaPhotosHelper::toHttps( $node->thumbnail_src ) : $node->thumbnail_src;
										$resultArr->standard_resolution = $resultArr->thumb;
										$resultArr->video_url           = $resultArr->link . 'embed';


									}

									//$resultArray[] = $resultArr;
									$resultArray[ $resultArr->created_time ] = $resultArr;
									$i ++;
								}


								//end foreach
								$output['items'] = $resultArray;
								$output['error'] = false;

								return $output;
							}
						}
						else{
							$errors[]           = esc_html__( 'Error retrieving data', 'cbxinstaphotos' );
						}


					} else if(is_wp_error($http_response)){
						//$http_response_code = isset( $http_response['response']['code'] ) ? $http_response['response']['code'] : esc_html__( 'Unknown code', 'cbxinstaphotos' );
						$errors[]           = sprintf( esc_html__( 'Error retrieving data. Error: %s', 'cbxinstaphotos' ), $http_response->get_error_message() );
					}
					else{
						$errors[]           = esc_html__( 'Error retrieving data. Error unknown', 'cbxinstaphotos' );
					}
				}
				catch ( Exception $e ) {
					$msg      = $e->getMessage(); // Returns "Normally you would have other code...
					$code     = $e->getCode(); // Returns '500';
					$errors[] = $msg . ' - ' . $code;
				}

			} else if ( $authtype == 0 && sizeof( $errors ) == 0 ) {
				//if api key method

				$config['redirect_uri']  = get_home_url();
				$config['client_id']     = $savedmeta['client_id'];
				$config['client_secret'] = $savedmeta['client_secret'];
				$config['grant_type']    = 'authorization_code';
				$instagram               = new CBXInstagramModInsta( $config );

				$instagram->SetAccessToken( $savedmeta['accesstoken'] );


				$userFeed = json_decode( $instagram->getUserRecent( $maxId = '', $minId = '', $maxTimestamp = '', $minTimestamp = '', $count ) );


				if ( ! is_object( $userFeed ) ) {
					$errors[] = esc_html__( 'General error to grab photos, please refresh or check api setting.', 'cbxinstaphotos' );
				} else if ( $userFeed->meta->code != '200' ) {
					$errors[] = sprintf( esc_html__( 'Error loading user photos. Error code: %d', 'cbxinstaphotos' ), $userFeed->meta->code );
				} else {
					//let's parse the feed

					$resultArray = array();
					$i           = 0;

					foreach ( $userFeed->data as $item ) {

						if ( $i == $count ) {
							break;
						}


						$resultArr = new stdClass();

						$link             = isset( $item->link ) ? ( $httpimg ? CBXInstaPhotosHelper::toHttps( $item->link ) : $item->link ) : '';
						$resultArr->link  = $link;
						$resultArr->title = isset( $item->caption->text ) ? esc_html( $item->caption->text ) : '';
						$resultArr->desc  = esc_html( $resultArr->title );

						$resultArr->username = $savedmeta['client_username'];

						$resultArr->like    = intval( $item->likes->count );
						$resultArr->comment = intval( $item->comments->count );
						$resultArr->user    = $item->user;
						$resultArr->id      = $item->id;
						//$resultArr->tags     = $item->tags;
						$resultArr->location = $item->location;
						//$resultArr->filter   = $item->filter;

						$resultArr->created_time = $item->created_time;


						if ( $item->type == 'image' ) {
							//for photo or image
							$resultArr->type                = $item->type;
							$resultArr->thumb               = ( $httpimg ) ? CBXInstaPhotosHelper::toHttps( $item->images->thumbnail->url ) : $item->images->thumbnail->url;
							$resultArr->standard_resolution = ( $httpimg ) ? CBXInstaPhotosHelper::toHttps( $item->images->standard_resolution->url ) : $item->images->standard_resolution->url;


						} else {
							///for video
							$resultArr->type                = $item->type;
							$resultArr->thumb               = ( $httpimg ) ? CBXInstaPhotosHelper::toHttps( $item->images->thumbnail->url ) : $item->images->thumbnail->url;
							$resultArr->standard_resolution = ( $httpimg ) ? CBXInstaPhotosHelper::toHttps( $item->images->standard_resolution->url ) : $item->images->standard_resolution->url;

							$resultArr->video_url = ( $httpimg ) ? CBXInstaPhotosHelper::toHttps( $item->videos->standard_resolution->url ) : $item->videos->standard_resolution->url;

							/*//taking care the video
							$video                      = new stdClass();
							$video->low_bandwidth       = ($httpimg) ? CBXInstaPhotosHelper::toHttps($item->videos->low_bandwidth->url) : $item->videos->low_bandwidth->url;
							$video->low_resolution      = ($httpimg) ? CBXInstaPhotosHelper::toHttps($item->videos->low_resolution->url) : $item->videos->low_resolution->url;
							$video->standard_resolution = ($httpimg) ? CBXInstaPhotosHelper::toHttps($item->videos->standard_resolution->url) : $item->videos->standard_resolution->url;
							$resultArr->video           = $video;*/


						}

						//$resultArray[] = $resultArr;
						$resultArray[ $resultArr->created_time ] = $resultArr;
						$i ++;
					}

					//end foreach
					$output['items'] = $resultArray;
					$output['error'] = false;


					return $output;

				}

			}

			$output['errors'] = $errors;

			return $output;

		}//end method _getresult

		/**
		 * Register the stylesheets for the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_styles() {
			wp_register_style( 'cbxinstaphotos-public', plugin_dir_url( __FILE__ ) . '../assets/css/cbxinstaphotos-public.css', array(), $this->version, 'all' );
			wp_enqueue_style( 'cbxinstaphotos-public' );
		}//end method enqueue_styles

		/**
		 * Register the JavaScript for the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_scripts() {
			//wp_register_script('cbxinstaphotos-public', plugin_dir_url(__FILE__) . '../assets/js/cbxinstaphotos-public.js', array('jquery'), $this->version, true);
			//wp_enqueue_script('cbxinstaphotos-public');

		}//end method enqueue_scripts

		/**
		 * Authentication redirect handle
		 */
		public function auth_redirect_handle() {

			$redirect = ( isset( $_GET['cbxinstaphotos'] ) && isset( $_GET['code'] ) && intval( $_GET['cbxinstaphotos'] ) > 0 && $_GET['code'] != '' ) ? true : false;

			if ( $redirect ) {

				$code    = esc_attr( $_GET['code'] );
				$post_id = intval( $_GET['cbxinstaphotos'] );


				if ( $code != '' && $post_id > 0 ) {
					$fieldValues = get_post_meta( $post_id, '_cbxinstaphotos', true );
					if ( ! is_array( $fieldValues ) ) {
						$fieldValues = array();
					}

					$client_id     = isset( $fieldValues['client_id'] ) ? sanitize_text_field( $fieldValues['client_id'] ) : '';
					$client_secret = isset( $fieldValues['client_secret'] ) ? sanitize_text_field( $fieldValues['client_secret'] ) : '';

					$callbackurl             = get_home_url() . '?cbxinstaphotos=' . $post_id;
					$config['base_url']      = get_home_url();
					$config['redirect_uri']  = $callbackurl;
					$config['client_id']     = $client_id;
					$config['client_secret'] = $client_secret;
					$config['grant_type']    = 'authorization_code';

					$instagram = new CBXInstagramModInsta( $config );

					$accesstoken = $instagram->getAccessToken();
					if ( ! $accesstoken ) {
						wp_redirect( admin_url( '/post.php?post=' . $post_id . '&action=edit' ) );
						exit();
					} else {
						$fieldValues['accesstoken']    = $accesstoken;
						$fieldValues['connected_date'] = current_time( 'mysql' );
						$storeval                      = update_post_meta( $post_id, '_cbxinstaphotos', $fieldValues );

						wp_redirect( admin_url( '/post.php?post=' . $post_id . '&action=edit' ) );
						exit();
					}
				}
			}
		}//end method auth_redirect_handle

		/**
		 * Convert http url to https
		 *
		 * @param $http_url
		 *
		 * @return mixed
		 */
		public function toHttps( $http_url ) {
			/*$http_url = str_replace('http://', 'https://', $http_url);
			return $http_url;*/

			return CBXInstaPhotosHelper::toHttps( $http_url );
		}//end method toHttps

		/**
		 * Init elementor widget
		 *
		 * @throws Exception
		 */
		public function init_elementor_widgets() {
			/*if ( defined( 'ELEMENTOR_PATH' ) && class_exists( 'Elementor\Widget_Base' ) ) {
				if ( class_exists( 'Elementor\Plugin' ) ) {
					if ( is_callable( 'Elementor\Plugin', 'instance' ) ) {
						$elementor = Elementor\Plugin::instance();
						if ( isset( $elementor->widgets_manager ) ) {
							if ( method_exists( $elementor->widgets_manager, 'register_widget_type' ) ) {
								// section heading start
								require_once plugin_dir_path( dirname( __FILE__ ) ) . 'widgets/elementor-elements/class-cbxinstaphotos-elemwidget.php';

								Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Elementor\CBXInstaPhotos_ElemWidget() );
								// section heading end
							}
						}
					}
				}
			}*/

			//include the file
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'widgets/elementor-elements/class-cbxinstaphotos-elemwidget.php';

			//register the widget
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new CBXInstaPhotosElemWidget\Widgets\CBXInstaPhotos_ElemWidget() );
		}//end method widgets_registered

		/**
		 * Add new category to elementor
		 *
		 * @param $elements_manager
		 */
		public function add_elementor_widget_categories( $elements_manager ) {
			$elements_manager->add_category(
				'codeboxr',
				array(
					'title' => esc_html__( 'Codeboxr Widgets', 'cbxinstaphotos' ),
					'icon'  => 'fa fa-plug',
				)
			);
		}//end method add_elementor_widget_categories

		/**
		 * Load Elementor Custom Icon
		 */
		function elementor_icon_loader() {
			wp_register_style( 'cbxinstaphotos_single_elementor_icon', CBXINSTAPHOTOS_ROOT_URL . 'widgets/elementor-elements/elementor-icon/icon.css', false, '1.0.0' );
			wp_enqueue_style( 'cbxinstaphotos_single_elementor_icon' );
		}//end method elementor_icon_loader

	}//end method CBXInstaPhotos_Public
