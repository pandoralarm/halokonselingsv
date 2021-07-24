<?php

	/**
	 * @link              http://codeboxr.com
	 * @since             1.0.0
	 * @package           CBXInstaPhotos
	 *
	 * @wordpress-plugin
	 * Plugin Name:       CBX Insta Photos
	 * Plugin URI:        http://codeboxr.com/product/cbx-insta-photo-for-wordpress/
	 * Description:       Instagram photo display for wordpress
	 * Version:           1.0.7
	 * Author:            codeboxr
	 * Author URI:        http://codeboxr.com
	 * License:           GPL-2.0+
	 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
	 * Text Domain:       cbxinstaphotos
	 * Domain Path:       /languages
	 */

	// If this file is called directly, abort.
	if ( ! defined( 'WPINC' ) ) {
		die;
	}


	defined( 'CBXINSTAPHOTOS_PLUGIN' ) or define( 'CBXINSTAPHOTOS_PLUGIN', 'cbxinstaphotos' );
	defined( 'CBXINSTAPHOTOS_VERSION' ) or define( 'CBXINSTAPHOTOS_VERSION', '1.0.7' );
	defined( 'CBXINSTAPHOTOS_BASE_NAME' ) or define( 'CBXINSTAPHOTOS_BASE_NAME', plugin_basename( __FILE__ ) );
	defined( 'CBXINSTAPHOTOS_ROOT_PATH' ) or define( 'CBXINSTAPHOTOS_ROOT_PATH', plugin_dir_path( __FILE__ ) );
	defined( 'CBXINSTAPHOTOS_ROOT_URL' ) or define( 'CBXINSTAPHOTOS_ROOT_URL', plugin_dir_url( __FILE__ ) );


	/**
	 * The core plugin class that is used to define internationalization,
	 * admin-specific hooks, and public-facing site hooks.
	 */
	require plugin_dir_path( __FILE__ ) . 'includes/instaoauth/cbxinstagrammodinsta.php';
	require plugin_dir_path( __FILE__ ) . 'includes/cbxinstaphotos-functions.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-cbxinstaphotos-helper.php';
	require plugin_dir_path( __FILE__ ) . 'includes/class-cbxinstaphotos.php';

	/**
	 * The code that runs during plugin activation.
	 * This action is documented in includes/class-cbxinstaphotos-activator.php
	 */
	function activate_cbxinstaphotos() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-cbxinstaphotos-activator.php';
		CBXInstaPhotos_Activator::activate();
	}

	/**
	 * The code that runs during plugin deactivation.
	 * This action is documented in includes/class-cbxinstaphotos-deactivator.php
	 */
	function deactivate_cbxinstaphotos() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-cbxinstaphotos-deactivator.php';
		CBXInstaPhotos_Deactivator::deactivate();
	}

	register_activation_hook( __FILE__, 'activate_cbxinstaphotos' );
	register_deactivation_hook( __FILE__, 'deactivate_cbxinstaphotos' );

	/**
	 * Begins execution of the plugin.
	 *
	 * Since everything within the plugin is registered via hooks,
	 * then kicking off the plugin from this point in the file does
	 * not affect the page life cycle.
	 *
	 * @since    1.0.0
	 */
	function run_cbxinstaphotos() {

		$plugin = new CBXInstaPhotos();
		$plugin->run();

	}

	run_cbxinstaphotos();
