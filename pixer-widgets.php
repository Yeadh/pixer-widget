<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://themepixer.com/
 * @since             1.0.0
 * @package           pixer-widgets
 *
 * @wordpress-plugin
 * Plugin Name:       Pixer Widgets
 * Plugin URI:        https://themebeyond.com/
 * Description:       About Site, Newsletter, recent-post Widgets for WordPress.
 * Version:           1.0.0
 * Author:            ThemeBeyond
 * Author URI:        https://themebeyond.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mcwrvp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;

 /**
 * Sets the path to the plugin directory.
 */
if ( !defined( 'MCWRVP_DIR' ) ) define( 'MCWRVP_DIR', plugin_dir_path( __FILE__ ) );


/**
 * Shortcodes 
 */
require_once plugin_dir_path( __FILE__ ) . '/settings-page.php';



require_once plugin_dir_path( __FILE__ ) . 'includes/recent-post.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/about-widget.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/subscribe-widget.php';

/**
 * Enqueue scripts and styles.
 */
function mcwrvp_scripts() {
   wp_enqueue_script( 'mcwrvp-main', plugin_dir_url( __FILE__ ) . '/main.js', ['jquery'], 1, false );
   wp_enqueue_style('mcwrvp-style', plugin_dir_url( __FILE__ ) . '/style.css', [], 1, 'all' );
   wp_enqueue_script( 'mcwrvp-main', plugin_dir_url( __FILE__ ) . '/slick/slick.min.js', ['jquery'], 1, true );
   wp_enqueue_style('mcwrvp-style', plugin_dir_url( __FILE__ ) . '/slick/slick.css', [], 1, 'all' );
}
add_action( 'wp_enqueue_scripts', 'mcwrvp_scripts' );



