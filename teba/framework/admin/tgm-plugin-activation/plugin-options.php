<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.3.6
 * @author     Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once TEBA_ABS_PATH.'/framework/admin/tgm-plugin-activation/class-tgm-plugin-activation.php';
add_action('tgmpa_register', 'teba_register_required_plugins');
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function teba_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
	$root = get_template_directory() . '/framework/admin/tgm-plugin-activation/plugins/';
    $root_motivo = 'https://motivoweb.com/plugins/';

    $plugins = array(
		array(
            'name'               => 'Teba Core',
            'slug'               => 'teba_core',
            'source'             => $root .'teba_core.zip',
            'required'           => true,
			'external_url' 	 => '',
        ),
        array(
            'name'               => 'WPBakery Page Builder',
            'slug'               => 'js_composer',
            'source'             => $root_motivo .'js_composer.zip',
            'required'           => true,
			'external_url' 		 => '', 
        ),
		array(
            'name'               => 'Revolution Slider',
            'slug'               => 'revslider',
            'source'             => $root_motivo .'revslider.zip',
            'required'           => true,
			'external_url' 		 => '', 
        ),
		 array(
            'name'               => 'WooCommerce - excelling eCommerce',
            'slug'               => 'woocommerce',
            'required'           => false,
        ),
		array(
            'name'               => 'Contact Form 7',
            'slug'               => 'contact-form-7',
            'required'           => false,
        ),
		array(
            'name'               => 'MailChimp for WordPress',
            'slug'               => 'mailchimp-for-wp',
            'required'           => false,
        ),
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain' => 'teba', // Text domain - likely want to be the same as your theme.
        'default_path' => '',
        //'parent_menu_slug' => 'themes.php', // Default parent menu slug
        //'parent_url_slug' => 'themes.php', // Default parent URL slug
        'menu' => 'install-required-plugins', // Menu slug
        'has_notices' => true, // Show admin notices or not
        'is_automatic' => false, // Automatically activate plugins after installation or not
        'message' => '', // Message to output right before the plugins table
        'strings' => array(
            'page_title' => esc_html__('Install Required Plugins', 'teba'),
            'menu_title' => esc_html__('Install Plugins', 'teba'),
            'installing' => esc_html__('Installing Plugin: %s', 'teba'), // %1$s = plugin name
            'oops' => esc_html__('Something went wrong with the plugin API.', 'teba'),
            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'teba'), // %1$s = plugin name(s)
            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'teba'), // %1$s = plugin name(s)
            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'teba'), // %1$s = plugin name(s)
            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'teba'), // %1$s = plugin name(s)
            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'teba'), // %1$s = plugin name(s)
            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'teba'), // %1$s = plugin name(s)
            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'teba'), // %1$s = plugin name(s)
            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'teba'), // %1$s = plugin name(s)
            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins', 'teba'),
            'activate_link' => _n_noop('Activate installed plugin', 'Activate installed plugins', 'teba'),
            'return' => esc_html__('Return to Required Plugins Installer', 'teba'),
            'plugin_activated' => esc_html__('Plugin activated successfully.', 'teba'),
            'complete' => esc_html__('All plugins installed and activated successfully. %s', 'teba'), // %1$s = dashboard link
            'nag_type' => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );
    tgmpa($plugins, $config);
}