<?php

/**
 * Footer Options
 *
 * @package travel_vacation
 */

$wp_customize->add_section(
	'travel_vacation_footer_options',
	array(
		'panel' => 'travel_vacation_theme_options',
		'title' => esc_html__( 'Footer Options', 'travel-vacation' ),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'travel_vacation_footer_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Travel_Vacation_Separator_Custom_Control( $wp_customize, 'travel_vacation_footer_separators', array(
	'label' => __( 'Footer Settings', 'travel-vacation' ),
	'section' => 'travel_vacation_footer_options',
	'settings' => 'travel_vacation_footer_separators',
)));


	// column // 
$wp_customize->add_setting(
	'travel_vacation_footer_widget_column',
	array(
        'default'			=> '4',
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'travel_vacation_sanitize_select',
		
	)
);	

$wp_customize->add_control(
	'travel_vacation_footer_widget_column',
	array(
	    'label'   		=> __('Select Widget Column','travel-vacation'),
		'description' => __('Note: Default footer widgets are shown. Add your preferred widgets in (Appearance > Widgets > Footer) to see changes.', 'travel-vacation'),
	    'section' 		=> 'travel_vacation_footer_options',
		'type'			=> 'select',
		'choices'        => 
		array(
			'' => __( 'None', 'travel-vacation' ),
			'1' => __( '1 Column', 'travel-vacation' ),
			'2' => __( '2 Column', 'travel-vacation' ),
			'3' => __( '3 Column', 'travel-vacation' ),
			'4' => __( '4 Column', 'travel-vacation' )
		) 
	) 
);

//  BG Color // 
$wp_customize->add_setting('travel_vacation_footer_background_color_setting', array(
    'default' => '#000',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_vacation_footer_background_color_setting', array(
    'label' => __('Footer Background Color', 'travel-vacation'),
    'section' => 'travel_vacation_footer_options',
)));


// Footer Background Image Setting
$wp_customize->add_setting('travel_vacation_footer_background_image_setting', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'travel_vacation_footer_background_image_setting', array(
    'label' => __('Footer Background Image', 'travel-vacation'),
    'section' => 'travel_vacation_footer_options',
)));

$wp_customize->add_setting('footer_text_transform', array(
    'default' => 'none',
    'sanitize_callback' => 'sanitize_text_field',
));

// Add Footer Heading Text Transform Control
$wp_customize->add_control('footer_text_transform', array(
    'label' => __('Footer Heading Text Transform', 'travel-vacation'),
    'section' => 'travel_vacation_footer_options',
    'settings' => 'footer_text_transform',
    'type' => 'select',
    'choices' => array(
        'none' => __('None', 'travel-vacation'),
        'capitalize' => __('Capitalize', 'travel-vacation'),
        'uppercase' => __('Uppercase', 'travel-vacation'),
        'lowercase' => __('Lowercase', 'travel-vacation'),
    ),
));


$wp_customize->add_setting(
	'travel_vacation_footer_copyright_text',
	array(
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'travel_vacation_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'travel-vacation' ),
		'section'  => 'travel_vacation_footer_options',
		'settings' => 'travel_vacation_footer_copyright_text',
		'type'     => 'textarea',
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'travel_vacation_scroll_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Travel_Vacation_Separator_Custom_Control( $wp_customize, 'travel_vacation_scroll_separators', array(
	'label' => __( 'Scroll Top Settings', 'travel-vacation' ),
	'section' => 'travel_vacation_footer_options',
	'settings' => 'travel_vacation_scroll_separators',
)));


// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'travel_vacation_scroll_top',
	array(
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'travel-vacation' ),
			'section' => 'travel_vacation_footer_options',
		)
	)
);

// icon // 
$wp_customize->add_setting(
	'travel_vacation_scroll_btn_icon',
	array(
        'default' => 'fas fa-chevron-up',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
		
	)
);	

$wp_customize->add_control(new Travel_Vacation_Change_Icon_Control($wp_customize, 
	'travel_vacation_scroll_btn_icon',
	array(
	    'label'   		=> __('Scroll Top Icon','travel-vacation'),
	    'section' 		=> 'travel_vacation_footer_options',
		'iconset' => 'fa',
	))  
);

$wp_customize->add_setting( 'travel_vacation_scroll_top_position', array(
    'default'           => 'bottom-right',
    'sanitize_callback' => 'travel_vacation_sanitize_scroll_top_position',
) );

// Add control for Scroll Top Button Position
$wp_customize->add_control( 'travel_vacation_scroll_top_position', array(
    'label'    => __( 'Scroll Top Button Position', 'travel-vacation' ),
    'section'  => 'travel_vacation_footer_options',
    'settings' => 'travel_vacation_scroll_top_position',
    'type'     => 'select',
    'choices'  => array(
        'bottom-right' => __( 'Bottom Right', 'travel-vacation' ),
        'bottom-left'  => __( 'Bottom Left', 'travel-vacation' ),
        'bottom-center'=> __( 'Bottom Center', 'travel-vacation' ),
    ),
) );

$wp_customize->add_setting( 'travel_vacation_scroll_top_shape', array(
    'default'           => 'box',
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'travel_vacation_scroll_top_shape', array(
    'label'    => __( 'Scroll to Top Button Shape', 'travel-vacation' ),
    'section'  => 'travel_vacation_footer_options',
    'settings' => 'travel_vacation_scroll_top_shape',
    'type'     => 'radio',
    'choices'  => array(
        'box'        => __( 'Box', 'travel-vacation' ),
        'curved-box' => __( 'Curved Box', 'travel-vacation' ),
        'circle'     => __( 'Circle', 'travel-vacation' ),
    ),
) );