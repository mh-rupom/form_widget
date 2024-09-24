<?php
/**
 * Plugin Name: Elementor-form-widget
 * Description: Hello Elementor 
 * Version: 1.0
 * Author: Rupom
 * Text Domain: elementor_form
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

function register_form_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/form-widget.php' );

	$widgets_manager->register( new \Elementor_form_Widget() );

}
add_action( 'elementor/widgets/register', 'register_form_widget' );

function my_widget_frontend_style() {
	wp_enqueue_style( 'frontent_custom_css',plugin_dir_url( __FILE__ ).'assets/css/style.css' );
}
add_action( 'elementor/frontend/after_enqueue_styles', 'my_widget_frontend_style' );

function elementor_form_widget_categories( $elements_manager ) {
	$elements_manager->add_category(
		'form-category',
		[
			'title' => esc_html__( 'Form Category', 'elementor_form' ),
			// 'icon' => 'fa fa-image',
		]
	);
}
add_action( 'elementor/elements/categories_registered', 'elementor_form_widget_categories' );