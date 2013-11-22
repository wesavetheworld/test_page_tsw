<?php
/**
 * IvanPaulin_tsw Theme Customizer
 *
 * @package IvanPaulin_tsw
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ip_tsw_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$wp_customize->add_section('ip_tsw_logo_upload', array(
        'title'    => __('Logo upload', 'ip_tsw'),
        'priority' => 120,
    ));
	$wp_customize->add_setting('ip_tsw_logo', array('default' => get_template_directory_uri(). '/images/logo.png') );
	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'ip_tsw_logo', array(
								'label'	=>	__('Header Logo', 'ip_tsw'), 
								'section'	=>	'ip_tsw_logo_upload',
								'settings'	=>	'ip_tsw_logo')
								));
}
add_action( 'customize_register', 'ip_tsw_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ip_tsw_customize_preview_js() {
	wp_enqueue_script( 'ip_tsw_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'ip_tsw_customize_preview_js' );
