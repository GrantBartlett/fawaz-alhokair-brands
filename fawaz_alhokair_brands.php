<?php
/**
 * Plugin Name: Fawaz Alhokair Brands
 * Plugin URI:  http://smswmedia.com
 * Description: Plugin for the management of the Fawaz Alhokair brands.
 * Version:     0.1.0
 * Author:      Grant Bartlett
 * Author URI:  http://grant-bartlett.com
 * License:     GPLv2+
 * Text Domain: fawazbrands
 * Domain Path: /languages
 */

    if ( ! defined( 'WPINC' ) )
    {
        die;
    }

    /**
     * Useful global constants
     */

    define( 'FAWAZBRANDS_NAME', 'Fawaz Alhokair Brands' );
    define( 'FAWAZBRANDS_VERSION', '0.1.0' );
    define( 'FAWAZBRANDS_URL',     plugin_dir_url( __FILE__ ) );
    define( 'FAWAZBRANDS_PATH',    dirname( __FILE__ ) . '/' );

    $fawazbrands_options_data = get_option('fawazbrands_settings_data'); // Retrieve plugin settings from the options table
    $fawazbrands_options_total = get_option('fawazbrands_settings_total'); // Retrieve plugin settings from the options table
    $fawazbrands_specific_data = get_option('fawazbrands_settings_specific'); // Retrieve plugin settings from the options table


    /**
     * Global Array of Countries
     */

    $fawazbrands_countries = array(
        'SA' => 'Saudi Arabia',
        'KZ' => 'Kazakhstan',
        'AZ' => 'Azerbaijan',
        'GE' => 'Georgia',
        'AM' => 'Armenia',
        'US' => 'United States of America',
        'EG' => 'Egypt',
        'MA' => 'Morocco',
        'JO' => 'Jordan',
        'PT' => 'Portugal',
        'ES' => 'Spain',
        'BA' => 'Bosnia and Herzegovina',
        'RS' => 'Republic of Serbia',
        'ME' => 'Montenegro',
        'MK' => 'Macedonia',
    );


    /**
     * Default initialization for the plugin:
     * Registers the default textdomain.
     */

    function fawazbrands_init()
    {
        $locale = apply_filters( 'plugin_locale', get_locale(), 'fawazbrands' );
        load_textdomain( 'fawazbrands', WP_LANG_DIR . '/fawazbrands/fawazbrands-' . $locale . '.mo' );
        load_plugin_textdomain( 'fawazbrands', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
        include('admin/admin-settings.php');
    }


    /**
     * Activate the plugin
     */

    function fawazbrands_activate()
    {
        // First load the init scripts in case any rewrite functionality is being loaded
        fawazbrands_init();

        flush_rewrite_rules();
    }
    register_activation_hook( __FILE__, 'fawazbrands_activate' );


    /**
     * Deactivate the plugin
     * Uninstall routines should be in uninstall.php
     */

    function fawazbrands_deactivate()
    {

    }
    register_deactivation_hook( __FILE__, 'fawazbrands_deactivate' );


    /**
     * Admin Menu Page
     * add_menu_page( 'test', 'test', 'manage_options', 'test', 'test_options_page' );
     */

    function fawazbrands_add_menu_page()
    {
        add_menu_page( 'Brands', 'Brands','manage_options','manage-alhokair-brands','fawazbrands_options_page', 'dashicons-smiley' );
    }

    /**
     * Register All Settings
     * Settings must be specified here.
     */

    function fawazbrands_register_settings()
    {
        register_setting('fawazbrands_settings_data_group', 'fawazbrands_settings_data');
        register_setting('fawazbrands_settings_data_group', 'fawazbrands_settings_total');
        register_setting('fawazbrands_settings_data_group', 'fawazbrands_settings_specific');
    }


    function fawazbrands_include_stylesheets()
    {
        wp_enqueue_style('admin-settings', plugins_url('/assets/css/fawaz_alhokair_brands.min.css', __FILE__));

    }


    function fawazbrands_enqueue_color_picker( $hook_suffix ) {
        wp_enqueue_script('iris', admin_url( 'js/iris.min.js' ), plugins_url('admin/scripts.js', __FILE__ ), array( 'wp-color-picker' ),false,1);
    }

    /**
     * Actions
     */

    add_action( 'init', 'fawazbrands_init' );
    add_action('admin_init', 'fawazbrands_register_settings');
    add_action('admin_menu', 'fawazbrands_add_menu_page');
    add_action('admin_enqueue_scripts', 'fawazbrands_include_stylesheets');
    add_action( 'admin_enqueue_scripts', 'fawazbrands_enqueue_color_picker' );

