<?php

/**
 * Sidebar Position
 *
 * @package travel_vacation
 */

$wp_customize->add_section(
	'travel_vacation_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'travel-vacation' ),
		'panel' => 'travel_vacation_theme_options',
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'travel_vacation_global_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Travel_Vacation_Separator_Custom_Control( $wp_customize, 'travel_vacation_global_sidebar_separator', array(
	'label' => __( 'Global Sidebar Position', 'travel-vacation' ),
	'section' => 'travel_vacation_sidebar_position',
	'settings' => 'travel_vacation_global_sidebar_separator',
)));


// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'travel_vacation_sidebar_position',
	array(
		'sanitize_callback' => 'travel_vacation_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'travel_vacation_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'travel-vacation' ),
		'section' => 'travel_vacation_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'travel-vacation' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'travel-vacation' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'travel-vacation' ),
		),
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'travel_vacation_post_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Travel_Vacation_Separator_Custom_Control( $wp_customize, 'travel_vacation_post_sidebar_separator', array(
	'label' => __( 'Post Sidebar Position', 'travel-vacation' ),
	'section' => 'travel_vacation_sidebar_position',
	'settings' => 'travel_vacation_post_sidebar_separator',
)));


// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'travel_vacation_post_sidebar_position',
	array(
		'sanitize_callback' => 'travel_vacation_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'travel_vacation_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'travel-vacation' ),
		'section' => 'travel_vacation_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'travel-vacation' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'travel-vacation' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'travel-vacation' ),
		),
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'travel_vacation_page_sidebar_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Travel_Vacation_Separator_Custom_Control( $wp_customize, 'travel_vacation_page_sidebar_separator', array(
	'label' => __( 'Page Sidebar Position', 'travel-vacation' ),
	'section' => 'travel_vacation_sidebar_position',
	'settings' => 'travel_vacation_page_sidebar_separator',
)));



// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'travel_vacation_page_sidebar_position',
	array(
		'sanitize_callback' => 'travel_vacation_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'travel_vacation_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Select Sidebar Position', 'travel-vacation' ),
		'section' => 'travel_vacation_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'travel-vacation' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'travel-vacation' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'travel-vacation' ),
		),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'travel_vacation_sidebar_width_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Travel_Vacation_Separator_Custom_Control( $wp_customize, 'travel_vacation_sidebar_width_separator', array(
	'label' => __( 'Sidebar Width Setting', 'travel-vacation' ),
	'section' => 'travel_vacation_sidebar_position',
	'settings' => 'travel_vacation_sidebar_width_separator',
)));


$wp_customize->add_setting( 'travel_vacation_sidebar_width', array(
	'default'           => '30',
	'sanitize_callback' => 'travel_vacation_sanitize_range_value',
) );

$wp_customize->add_control(new Travel_Vacation_Customize_Range_Control($wp_customize, 'travel_vacation_sidebar_width', array(
	'section'     => 'travel_vacation_sidebar_position',
	'label'       => __( 'Adjust Sidebar Width', 'travel-vacation' ),
	'description' => __( 'Adjust the width of the sidebar.', 'travel-vacation' ),
	'input_attrs' => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
)));

$wp_customize->add_setting( 'travel_vacation_sidebar_widget_font_size', array(
    'default'           => 24,
    'sanitize_callback' => 'absint',
) );

// Add control for site title size
$wp_customize->add_control( 'travel_vacation_sidebar_widget_font_size', array(
    'type'        => 'number',
    'section'     => 'travel_vacation_sidebar_position',
    'label'       => __( 'Sidebar Widgets Heading Font Size ', 'travel-vacation' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
));