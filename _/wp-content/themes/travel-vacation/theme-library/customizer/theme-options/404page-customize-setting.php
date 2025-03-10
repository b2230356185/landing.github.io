<?php

/**
 * 404 page
 *
 * @package travel_vacation
 */


/*=========================================
404 Page
=========================================*/
$wp_customize->add_section(
	'404_pg_options', array(
		'title' => esc_html__( '404 Page', 'travel-vacation' ),
		'panel' => 'travel_vacation_theme_options',
	)
);

/*=========================================
404 Page
=========================================*/
$wp_customize->add_setting( 'travel_vacation_404_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Travel_Vacation_Separator_Custom_Control( $wp_customize, 'travel_vacation_404_separators', array(
	'label' => __( '4040 Page Settings', 'travel-vacation' ),
	'section' => '404_pg_options',
	'settings' => 'travel_vacation_404_separators',
)));


//  Title // 
    $wp_customize->add_setting(
        'travel_vacation_pg_404_ttl',
        array(
            'default'			=> __('404 Page Not Found','travel-vacation'),
            'capability'     	=> 'edit_theme_options',
            'sanitize_callback' => 'travel_vacation_sanitize_html',
        )
    );	

    $wp_customize->add_control( 
        'travel_vacation_pg_404_ttl',
        array(
            'label'   => __('Title','travel-vacation'),
            'section' => '404_pg_options',
            'type'           => 'text',
        )  
    );

// Image //
    $wp_customize->add_setting('travel_vacation_pg_404_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'travel_vacation_pg_404_image', array(
        'label'    => __('404 Page Image', 'travel-vacation'),
        'section'  => '404_pg_options', // Add this section if it doesn't exist
        'settings' => 'travel_vacation_pg_404_image',
    )));

    // Existing settings for 404 title, text, button label, and link
    $wp_customize->add_setting('travel_vacation_pg_404_ttl', array(
        'default'           => '404 Page Not Found',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('travel_vacation_pg_404_ttl', array(
        'label'    => __('404 Page Title', 'travel-vacation'),
        'section'  => '404_pg_options',
        'settings' => 'travel_vacation_pg_404_ttl',
    ));

    $wp_customize->add_setting('travel_vacation_pg_404_text', array(
        'default'           => 'Apologies, but the page you are seeking cannot be found.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('travel_vacation_pg_404_text', array(
        'label'    => __('404 Page Text', 'travel-vacation'),
        'section'  => '404_pg_options',
        'settings' => 'travel_vacation_pg_404_text',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('travel_vacation_pg_404_btn_lbl', array(
        'default'           => 'Go Back Home',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('travel_vacation_pg_404_btn_lbl', array(
        'label'    => __('404 Button Label', 'travel-vacation'),
        'section'  => '404_pg_options',
        'settings' => 'travel_vacation_pg_404_btn_lbl',
    ));

    $wp_customize->add_setting('travel_vacation_pg_404_btn_link', array(
        'default'           => esc_url(home_url('/')),
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('travel_vacation_pg_404_btn_link', array(
        'label'    => __('404 Button Link', 'travel-vacation'),
        'section'  => '404_pg_options',
        'settings' => 'travel_vacation_pg_404_btn_link',
    ));