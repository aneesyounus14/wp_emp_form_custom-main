<?php
/**
 * Plugin Name: Employee Custom Form
 * Description: Made for the customization of form.
 * Version: 1.1.1.7
 * Author: Codup
 * Author URI: https://codup.co/
 * Text Domain: employee-custom-form
 * Domain Path: /i18n/languages/
 * WC requires at least: 3.8.0
 * WC tested up to: 5.1.0
 *
 * @package employee-custom-form
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'EMP_PLUGIN_DIR' ) ) {
	define( 'EMP_PLUGIN_DIR', __DIR__ );
}

if ( ! defined( 'EMP_PLUGIN_DIR_URL' ) ) {
	define( 'EMP_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'EMP_ABSPATH' ) ) {
	define( 'EMP_ABSPATH', dirname( __FILE__ ) );
}

include_once EMP_ABSPATH . '/includes/class-employeeform-loader.php';