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
require_once plugin_dir_path( __FILE__ ) . 'ajax/ajax-handle-form.php';

function register_form_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/form-widget.php' );
	require_once( __DIR__ . '/widgets/logout.php' );
	require_once( __DIR__ . '/widgets/send.php' );

	$widgets_manager->register( new \Elementor_form_Widget() );
	$widgets_manager->register( new \Elementor_logout_Widget() );
	$widgets_manager->register( new \Elementor_send_message_Widget() );

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

function my_widgets_editor_scripts(){
	wp_enqueue_script( 'custom_main_js', plugin_dir_url( __FILE__ ).'assets/js/main.js', array('jquery'),null,'true');
	wp_localize_script('custom_main_js', 'ajaxurl', array(
		'url' => admin_url('admin-ajax.php'),
	));
}
add_action( 'elementor/frontend/after_enqueue_scripts', 'my_widgets_editor_scripts' );