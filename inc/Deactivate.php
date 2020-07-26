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
 */

namespace Inc;

 Class Deactivate{

    public static function deactivate(){
        flush_rewrite_rules();
    }
 }