<?php
/**
 * Plugin Name: Test Scrollprogress Widget
 * Description: Test Scrollprogress Widget
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Odokiienko Serhii
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-scrollprogress-widget
 *
 * Elementor tested up to: 3.7.0
 * Elementor Pro tested up to: 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
const TM_SP_VERSION = '1.0';
define( 'TM_SP_PATH', plugin_dir_path( __FILE__ ) . '/' );
define( 'TM_SP_URL', plugin_dir_url( __FILE__ ) . '/' );
define( 'TM_SP_INC_PATH', TM_SP_PATH . 'inc/' );
require TM_SP_PATH . 'inc/class-elementor-scrollprogress-widget.php';

if ( class_exists( 'TM_SP' ) ) {
	$sp_widget = new TM_SP();
	$sp_widget->register();
}

register_activation_hook(
	__FILE__,
	array(
		$sp_widget,
		'activation',
	)
);

register_deactivation_hook(
	__FILE__,
	array(
		$sp_widget,
		'deactivation',
	)
);

/**
 * Register Scrollprogress Widget.
 *
 * Include widget file and register widget class.
 *
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 *
 * @return void
 * @since 1.0.0
 */
function register_scrollprogress_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/scrollprogress-widget.php' );

	$widgets_manager->register( new \Elementor_Scrollprogress_Widget() );

}
add_action( 'elementor/widgets/register', 'register_scrollprogress_widget' );


function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'test-plugin',
		[
			'title' => esc_html__( 'Test Plugin', 'elementor-scrollprogress-widget' ),
			'icon'  => 'eicon-site-identity',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );

