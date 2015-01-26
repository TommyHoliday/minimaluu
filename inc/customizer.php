<?php
/**
 * minimaluu Theme Customizer
 *
 * @package minimaluu
 * @since minimaluu 1.0
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 *
 * @since minimaluu 1.0
 */
function minimaluu_customize_register( $wp_customize ) {

	$wp_customize->remove_section( 'colors' );



	$wp_customize->add_section( 'minimaluu_themeoptions', array(
		'title'         => __( 'Theme Options', 'minimaluu' ),
		'priority'      => 135,
	) );

	// Add Favicon Upload
	$wp_customize->add_setting( 'fav_icon', array(
	    'default'	=> '',
	));
	 
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'fav_icon', array(
	    'label'    => __('Upload Favicon (png, jpg, gif)', 'minimaluu'),
	    'section'  => 'minimaluu_themeoptions',
	    'settings' => 'fav_icon',
	)));

	// Add the custom settings and controls.
	$wp_customize->add_setting( 'grid', array(
		'default'       => '3-column',
		'sanitize_callback' => 'minimaluu_sanitize_grid',
	) );

	$wp_customize->add_control( 'grid', array(
		'label'         => __( 'Default Image Grid', 'minimaluu' ),
		'section'       => 'minimaluu_themeoptions',
		'type'          => 'select',
		'choices' 		=> array(
					'1-column'	=> __( '1-column', 'minimaluu' ),
					'2-column'	=> __( '2-column', 'minimaluu' ),
               		'3-column'	=> __( '3-column', 'minimaluu' ),
			   		'4-column' 	=> __( '4-column', 'minimaluu' ),
			   		'5-column' 	=> __( '5-column', 'minimaluu' ),
		),
		'priority'      => 1,
	) );

	$wp_customize->add_setting( 'thumbnailformat', array(
		'default'       => 'landscape',
		'sanitize_callback' => 'minimaluu_sanitize_thumbnailformat',
	) );

	$wp_customize->add_control( 'thumbnailformat', array(
		'label'         => __( 'Thumbnail Format', 'minimaluu' ),
		'section'       => 'minimaluu_themeoptions',
		'type'          => 'select',
		'choices' 		=> array(
               		'landscape'	=> __( 'Landscape', 'minimaluu' ),
               		'portrait'	=> __( 'Portrait', 'minimaluu' ),
			   		'square' 	=> __( 'Square', 'minimaluu' ),
		),
		'priority'      => 1,
	) );

	$wp_customize->add_setting( 'ajax_load', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'ajax_load', array(
		'label'         => __( 'Load older posts via Ajax', 'minimaluu' ),
		'section'       => 'minimaluu_themeoptions',
		'type'          => 'checkbox',
	) );	

	$wp_customize->add_setting( 'footer_text', array(
		'default'       => '',
	) );

	$wp_customize->add_control( 'footer_text', array(
		'label'         => __( 'Custom Footer Text', 'minimaluu' ),
		'section'       => 'minimaluu_themeoptions',
		'type'          => 'text',
	) );

}
add_action( 'customize_register', 'minimaluu_customize_register' );


/**
 * Sanitize the Grid Column values.
 */
function minimaluu_sanitize_grid( $grid ) {
	if ( ! in_array( $grid, array( '1-column', '2-column', '3-column', '3-column', '4-column', '5-column' ) ) ) {
		$grid = '3-column';
	}

	return $grid;
}

/**
 * Sanitize the Thumbnail Format values.
 */
function minimaluu_sanitize_thumbnailformat( $thumbnailformat ) {
	if ( ! in_array( $thumbnailformat, array( 'portrait', 'landscape', 'square' ) ) ) {
		$thumbnailformat = 'portrait';
	}

	return $thumbnailformat;
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function minimaluu_customize_preview_js() {
	wp_enqueue_script( 'minimaluu-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20131221', true );
}
add_action( 'customize_preview_init', 'minimaluu_customize_preview_js' );