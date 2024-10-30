<?php
/**
 * Plugin Name: ConBiz Lite CPT and Shortcodes
 * Plugin URI: http://wingthemes.com/conbiz-lite-cpt-and-shortcode
 * Description: ConBiz Lite WordPress theme's custom post types and shortcodes. This plugin is required for ConBiz Lite WordPress theme.
 * Version:     1.0
 * Author:      WingThemes
 * Author URI:  https://wingthemes.com/about/
 * Text Domain: conbiz-cpt-shortcode
 * Domain Path: /languages/
 */


/**
 * Localization
 */

function conbiz_cpt_n_shortcode_localization() {
	load_plugin_textdomain( 'conbiz-cpt-shortcode', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'init', 'conbiz_cpt_n_shortcode_localization' );


/**
 * Require Files
 */

require_once dirname( __FILE__ ) . '/inc/conbiz-post-types.php';
require_once dirname( __FILE__ ) . '/inc/conbiz-shortcode.php';