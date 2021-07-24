<?php

	/**
	 * The file that defines the core plugin class
	 *
	 * A class definition that includes attributes and functions used across both the
	 * public-facing side of the site and the admin area.
	 *
	 * @link       http://codeboxr.com
	 * @since      1.0.0
	 *
	 * @package    CBXInstaPhotos
	 * @subpackage CBXInstaPhotos/includes
	 */

	/**
	 * The core plugin class.
	 *
	 * This is used to define internationalization, admin-specific hooks, and
	 * public-facing site hooks.
	 *
	 * Also maintains the unique identifier of this plugin as well as the current
	 * version of the plugin.
	 *
	 * @since      1.0.0
	 * @package    CBXInstaPhotos
	 * @subpackage CBXInstaPhotos/includes
	 * @author     codeboxr <info@codeboxr.com>
	 */
	class CBXInstaPhotos {

		/**
		 * The loader that's responsible for maintaining and registering all hooks that power
		 * the plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      CBXInstaPhotos_Loader $loader Maintains and registers all hooks for the plugin.
		 */
		protected $loader;

		/**
		 * The unique identifier of this plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string $plugin_name The string used to uniquely identify this plugin.
		 */
		protected $plugin_name;

		/**
		 * The current version of the plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string $version The current version of the plugin.
		 */
		protected $version;

		/**
		 * Define the core functionality of the plugin.
		 *
		 * Set the plugin name and the plugin version that can be used throughout the plugin.
		 * Load the dependencies, define the locale, and set the hooks for the admin area and
		 * the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function __construct() {

			$this->plugin_name = CBXINSTAPHOTOS_PLUGIN;
			$this->version     = CBXINSTAPHOTOS_VERSION;

			$this->load_dependencies();
			$this->set_locale();
			$this->define_admin_hooks();
			$this->define_public_hooks();

		}

		/**
		 * Load the required dependencies for this plugin.
		 *
		 * Include the following files that make up the plugin:
		 *
		 * - CBXInstaPhotos_Loader. Orchestrates the hooks of the plugin.
		 * - CBXInstaPhotos_i18n. Defines internationalization functionality.
		 * - CBXInstaPhotos_Admin. Defines all hooks for the admin area.
		 * - CBXInstaPhotos_Public. Defines all hooks for the public side of the site.
		 *
		 * Create an instance of the loader which will be used to register the hooks
		 * with WordPress.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function load_dependencies() {

			/**
			 * The class responsible for orchestrating the actions and filters of the
			 * core plugin.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-cbxinstaphotos-loader.php';

			/**
			 * The class responsible for defining internationalization functionality
			 * of the plugin.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-cbxinstaphotos-i18n.php';


			/**
			 * Single instagram account photo shows
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'widgets/cbxinstaphotos-widget/cbxinstaphotos-widget.php';

			/**
			 * The class responsible for defining all actions that occur in the admin area.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-cbxinstaphotos-admin.php';


			/**
			 * The class responsible for defining all actions that occur in the public-facing
			 * side of the site.
			 */

			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-cbxinstaphotos-public.php';

			$this->loader = new CBXInstaPhotos_Loader();

		}

		/**
		 * Define the locale for this plugin for internationalization.
		 *
		 * Uses the CBXInstaPhotos_i18n class in order to set the domain and to register the hook
		 * with WordPress.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function set_locale() {

			$plugin_i18n = new CBXInstaPhotos_i18n();

			$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

		}

		/**
		 * Register all of the hooks related to the admin area functionality
		 * of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function define_admin_hooks() {

			$plugin_admin = new CBXInstaPhotos_Admin( $this->get_plugin_name(), $this->get_version() );

			//new post type declaration named "cbxinstaphotos"
			$this->loader->add_action( 'init', $plugin_admin, 'create_cbxinstaphotos', 10 );

			//post type meta
			$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'add_meta_boxes' );
			//save post type meta
			$this->loader->add_action( 'save_post', $plugin_admin, 'save_post', 10, 2 );

			//custom collumn header in listing for incoming webhook
			$this->loader->add_filter( 'manage_cbxinstaphotos_posts_columns', $plugin_admin, 'columns_header' );
			$this->loader->add_action( 'manage_cbxinstaphotos_posts_custom_column', $plugin_admin, 'custom_column_row', 10, 2 );

			//adding custom css and js
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

			//enable/disable for instaphotos post type
			$this->loader->add_action( 'wp_ajax_cbxinstaphotos_enable_disable', $plugin_admin, 'cbxinstaphotos_enable_disable' );

			//reset cache
			$this->loader->add_action( 'wp_ajax_cbxinstaphotos_reset_transient', $plugin_admin, 'cbxinstaphotos_reset_transient' );

			//remove admin menu
			$this->loader->add_action( 'admin_menu', $plugin_admin, 'remove_menus' );

			//actual menu remove from core
			$this->loader->add_action( 'cbxinstaphotos_remove', $plugin_admin, 'cbxinstaphotos_remove_core', 10 );

			$this->loader->add_action( 'admin_init', $plugin_admin, 'cbxinstaphotos_notice' );

			$this->loader->add_filter( 'plugin_row_meta', $plugin_admin, 'support_link', 10, 2 );

			//gutenberg
			$this->loader->add_action( 'init', $plugin_admin, 'gutenberg_blocks' );
			$this->loader->add_filter( 'block_categories', $plugin_admin, 'gutenberg_block_categories', 10, 2 );
			$this->loader->add_action( 'enqueue_block_editor_assets', $plugin_admin, 'enqueue_block_editor_assets' );

		}

		/**
		 * Register all of the hooks related to the public-facing functionality
		 * of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function define_public_hooks() {

			$plugin_public = new CBXInstaPhotos_Public( $this->get_plugin_name(), $this->get_version() );

			$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
			$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

			//shortcodes
			$this->loader->add_action( 'init', $plugin_public, 'init_shortcodes' );

			//widget
			$this->loader->add_action( 'widgets_init', $plugin_public, 'register_widget' );

			//authentication direct
			$this->loader->add_action( 'template_redirect', $plugin_public, 'auth_redirect_handle' );

			//elementor
			//$this->loader->add_action( 'elementor/init', $plugin_public, 'init_elementor_widgets' );
			$this->loader->add_action( 'elementor/widgets/widgets_registered', $plugin_public, 'init_elementor_widgets' );
			$this->loader->add_action( 'elementor/elements/categories_registered', $plugin_public, 'add_elementor_widget_categories' );
			$this->loader->add_action( 'elementor/editor/before_enqueue_scripts', $plugin_public, 'elementor_icon_loader', 99999 );
		}

		/**
		 * Run the loader to execute all of the hooks with WordPress.
		 *
		 * @since    1.0.0
		 */
		public function run() {
			$this->loader->run();
		}

		/**
		 * The name of the plugin used to uniquely identify it within the context of
		 * WordPress and to define internationalization functionality.
		 *
		 * @since     1.0.0
		 * @return    string    The name of the plugin.
		 */
		public function get_plugin_name() {
			return $this->plugin_name;
		}

		/**
		 * The reference to the class that orchestrates the hooks with the plugin.
		 *
		 * @since     1.0.0
		 * @return    CBXInstaPhotos_Loader    Orchestrates the hooks of the plugin.
		 */
		public function get_loader() {
			return $this->loader;
		}

		/**
		 * Retrieve the version number of the plugin.
		 *
		 * @since     1.0.0
		 * @return    string    The version number of the plugin.
		 */
		public function get_version() {
			return $this->version;
		}

	}//end class CBXInstaPhotos
