<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.muhammadshoaib.me
 * @since             1.0.0
 * @package           Ms_Taxamo
 *
 * @wordpress-plugin
 * Plugin Name:       MS Taxamo
 * Plugin URI:        https://www.muhammadshoaib.me/taxamo
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Muhammad Shoaib
 * Author URI:        https://www.muhammadshoaib.me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ms-taxamo
 * Domain Path:       /languages
 */
/*
This program is free software; you can redistribute it and/or

modify it under the terms of the GNU General Public License

as published by the Free Software Foundation; either version 2

of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,

but WITHOUT ANY WARRANTY; without even the implied warranty of

MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

GNU General Public License for more details.

You should have received a copy of the GNU General Public License

along with this program; if not, write to the Free Software

Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2020 Automattic, Inc.
*/

// If this file is called directly, abort.
defined( 'ABSPATH' ) or die('You cannot access this page directly!');

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPages;

if ( !class_exists( 'MsTaxamo' )) {

	Class MsTaxamo{
		
		public $plugin;

		/**
		 * 
		 * @description automatically call  
		 * 
		 */
		public function __construct(){

			$this->plugin = plugin_basename( __FILE__ );

			add_action('init', array($this, 'custom_post_type'));

			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

			add_action( 'admin_menu', array( $this, 'add_admin_pages' ));

			add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ));
		}

		/**
		 * 
		 * @description activate plugin 
		 * 
		 */
		public function settings_link( $links ) {
			$settings_link = '<a href="admin.php?page=ms_taxamo">Settings</a>';
			array_push( $links, $settings_link );
				return $links;
		}

		/**
		 * 
		 * @description activate plugin 
		 * 
		 */
		public function admin_index() {
			require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
		}

		/**
		 * 
		 * @description activate plugin 
		 * 
		 */
		public function add_admin_pages() {
			add_menu_page( 'Taxamo', 'Taxamo', 'manage_options', 'ms_taxamo', array( $this, 'admin_index' ), 'dashicons-store', 110 );
		}

		/**
		 * 
		 * @description custom Post Type for admin menu  
		 * 
		 */
		public function custom_post_type(){
			register_post_type('Taxamo', [ 'public' => true, 'label' => 'Taxamo' ]);
		}	

		/**
		 * 
		 * @description enqueue style and script
		 * 
		 */
		public function enqueue(){
			wp_enqueue_style( 'taxamostyle', plugins_url('/assets/css/style.css', __FILE__));
			wp_enqueue_script('taxamoscript', plugins_url('/assets/js/script.js', __FILE__));
		}
		
		/**
		 * 
		 * @description activate plugin 
		 * 
		 */
		public function activate(){
			Activate::activate();
		}
	}
}

/**
 * 
 * @description create instace of MsTaxamo class
 * 
 */
if(class_exists('MsTaxamo')){
	$MsTaxamo = new MsTaxamo();
	//$MsTaxamo->register_admin_scripts();
}

/**
 * 
 * @description activation dir
 * 
 */
register_activation_hook(__FILE__, array($MsTaxamo, 'activate'));

/**
 * 
 * @description deactivation dir 
 * 
 */
register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));;

//uninstall
