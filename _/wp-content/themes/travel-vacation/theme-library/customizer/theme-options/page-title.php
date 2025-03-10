<?php

/**
 * Pige Title Options
 *
 * @package travel_vacation
 */



$wp_customize->add_section(
	'travel_vacation_page_title_options',
	array(
		'panel' => 'travel_vacation_theme_options',
		'title' => esc_html__( 'Page Title', 'travel-vacation' ),
	)
);

$wp_customize->add_setting(
    'travel_vacation_page_header_visibility',
    array(
        'default'           => 'all-devices',
        'sanitize_callback' => 'travel_vacation_sanitize_select',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'travel_vacation_page_header_visibility',
        array(
            'label'    => esc_html__( 'Page Header Visibility', 'travel-vacation' ),
            'type'     => 'select',
            'section'  => 'travel_vacation_page_title_options',
            'settings' => 'travel_vacation_page_header_visibility',
            'priority' => 10,
            'choices'  => array(
                'all-devices'        => esc_html__( 'Show on all devices', 'travel-vacation' ),
                'hide-tablet'        => esc_html__( 'Hide on Tablet', 'travel-vacation' ),
                'hide-mobile'        => esc_html__( 'Hide on Mobile', 'travel-vacation' ),
                'hide-tablet-mobile' => esc_html__( 'Hide on Tablet & Mobile', 'travel-vacation' ),
                'hide-all-devices'   => esc_html__( 'Hide on all devices', 'travel-vacation' ),
            ),
        )
    )
);


$wp_customize->add_setting( 'travel_vacation_page_title_background_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Travel_Vacation_Separator_Custom_Control( $wp_customize, 'travel_vacation_page_title_background_separator', array(
	'label' => __( 'Page Title BG Image & Color Setting', 'travel-vacation' ),
	'section' => 'travel_vacation_page_title_options',
	'settings' => 'travel_vacation_page_title_background_separator',
)));


$wp_customize->add_setting(
	'travel_vacation_page_header_style',
	array(
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
		'default'           => False,
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_page_header_style',
		array(
			'label'   => esc_html__('Page Title Background Image', 'travel-vacation'),
			'section' => 'travel_vacation_page_title_options',
		)
	)
);

$wp_customize->add_setting( 'travel_vacation_page_header_background_image', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'travel_vacation_page_header_background_image', array(
    'label'    => __( 'Background Image', 'travel-vacation' ),
    'section'  => 'travel_vacation_page_title_options',
	'description' => __('Choose either a background image or a color. If a background image is selected, the background color will not be visible.', 'travel-vacation'),
    'settings' => 'travel_vacation_page_header_background_image',
	'active_callback' => 'travel_vacation_is_pagetitle_bcakground_image_enabled',
)));


$wp_customize->add_setting('travel_vacation_page_header_image_height', array(
	'default'           => 200,
	'sanitize_callback' => 'travel_vacation_sanitize_range_value',
));

$wp_customize->add_control(new Travel_Vacation_Customize_Range_Control($wp_customize, 'travel_vacation_page_header_image_height', array(
		'label'       => __('Image Height', 'travel-vacation'),
		'section'     => 'travel_vacation_page_title_options',
		'settings'    => 'travel_vacation_page_header_image_height',
		'active_callback' => 'travel_vacation_is_pagetitle_bcakground_image_enabled',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 1000,
			'step' => 5,
		),
)));


$wp_customize->add_setting('travel_vacation_page_title_background_color_setting', array(
    'default' => '#f5f5f5',
    'sanitize_callback' => 'sanitize_hex_color',
));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_vacation_page_title_background_color_setting', array(
    'label' => __('Page Title Background Color', 'travel-vacation'),
    'section' => 'travel_vacation_page_title_options',
)));

$wp_customize->add_setting('travel_vacation_pagetitle_height', array(
    'default'           => 50,
    'sanitize_callback' => 'travel_vacation_sanitize_range_value',
));

$wp_customize->add_control(new Travel_Vacation_Customize_Range_Control($wp_customize, 'travel_vacation_pagetitle_height', array(
    'label'       => __('Set Height', 'travel-vacation'),
    'description' => __('This setting controls the page title height when no background image is set. If a background image is set, this setting will not apply.', 'travel-vacation'),
    'section'     => 'travel_vacation_page_title_options',
    'settings'    => 'travel_vacation_pagetitle_height',
    'input_attrs' => array(
        'min'  => 0,
        'max'  => 300,
        'step' => 5,
    ),
)));


$wp_customize->add_setting( 'travel_vacation_page_title_style_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Travel_Vacation_Separator_Custom_Control( $wp_customize, 'travel_vacation_page_title_style_separator', array(
	'label' => __( 'Page Title Styling Setting', 'travel-vacation' ),
	'section' => 'travel_vacation_page_title_options',
	'settings' => 'travel_vacation_page_title_style_separator',
)));

$wp_customize->add_setting( 'travel_vacation_page_header_heading_tag', array(
	'default'   => 'h1',
	'sanitize_callback' => 'travel_vacation_sanitize_select',
) );

$wp_customize->add_control( 'travel_vacation_page_header_heading_tag', array(
	'label'   => __( 'Page Title Heading Tag', 'travel-vacation' ),
	'section' => 'travel_vacation_page_title_options',
	'type'    => 'select',
	'choices' => array(
		'h1' => __( 'H1', 'travel-vacation' ),
		'h2' => __( 'H2', 'travel-vacation' ),
		'h3' => __( 'H3', 'travel-vacation' ),
		'h4' => __( 'H4', 'travel-vacation' ),
		'h5' => __( 'H5', 'travel-vacation' ),
		'h6' => __( 'H6', 'travel-vacation' ),
		'p' => __( 'p', 'travel-vacation' ),
		'a' => __( 'a', 'travel-vacation' ),
		'div' => __( 'div', 'travel-vacation' ),
		'span' => __( 'span', 'travel-vacation' ),
	),
) );

$wp_customize->add_setting('travel_vacation_page_header_layout', array(
	'default' => 'left',
	'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('travel_vacation_page_header_layout', array(
	'label' => __('Style', 'travel-vacation'),
	'section' => 'travel_vacation_page_title_options',
	'description' => __('"Flex Layout Style" wont work below 600px (mobile media)', 'travel-vacation'),
	'settings' => 'travel_vacation_page_header_layout',
	'type' => 'radio',
	'choices' => array(
		'left' => __('Classic', 'travel-vacation'),
		'right' => __('Aligned Right', 'travel-vacation'),
		'center' => __('Centered Focus', 'travel-vacation'),
		'flex' => __('Flex Layout', 'travel-vacation'),
	),
));