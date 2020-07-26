<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.muhammadshoaib.me
 * @since      1.0.0
 *
 * @package    Ms_Taxamo
 * @subpackage Ms_Taxamo/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ms_Taxamo
 * @subpackage Ms_Taxamo/includes
 * @author     Muhammad Shoaib <hello@muhammadshoaib.me>
 */
class Ms_Taxamo_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ms-taxamo',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
