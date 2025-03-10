<?php

/**
 * Single Post Options
 *
 * @package travel_vacation
 */

$wp_customize->add_section(
	'travel_vacation_single_post_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'travel-vacation' ),
		'panel' => 'travel_vacation_theme_options',
	)
);


// Post Options - Show / Hide Date.
$wp_customize->add_setting(
	'travel_vacation_single_post_hide_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_single_post_hide_date',
		array(
			'label'   => esc_html__( 'Show / Hide Date', 'travel-vacation' ),
			'section' => 'travel_vacation_single_post_options',
		)
	)
);

// Post Options - Show / Hide Author.
$wp_customize->add_setting(
	'travel_vacation_single_post_hide_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_single_post_hide_author',
		array(
			'label'   => esc_html__( 'Show / Hide Author', 'travel-vacation' ),
			'section' => 'travel_vacation_single_post_options',
		)
	)
);

// Post Options - Show / Hide Category.
$wp_customize->add_setting(
	'travel_vacation_single_post_hide_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_single_post_hide_category',
		array(
			'label'   => esc_html__( 'Show / Hide Category', 'travel-vacation' ),
			'section' => 'travel_vacation_single_post_options',
		)
	)
);

// Post Options - Show / Hide Tag.
$wp_customize->add_setting(
	'travel_vacation_post_hide_tags',
	array(
		'default'           => true,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_post_hide_tags',
		array(
			'label'   => esc_html__( 'Show / Hide Tag', 'travel-vacation' ),
			'section' => 'travel_vacation_single_post_options',
		)
	)
);


// Add Separator Custom Control
$wp_customize->add_setting( 'travel_vacation_related_post_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Travel_Vacation_Separator_Custom_Control( $wp_customize, 'travel_vacation_related_post_separator', array(
	'label' => __( 'Enable / Disable Related Post Section', 'travel-vacation' ),
	'section' => 'travel_vacation_single_post_options',
	'settings' => 'travel_vacation_related_post_separator',
) ) );


// Post Options - Show / Hide Related Posts.
$wp_customize->add_setting(
	'travel_vacation_post_hide_related_posts',
	array(
		'default'           => true,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Show / Hide Related Posts', 'travel-vacation' ),
			'section' => 'travel_vacation_single_post_options',
		)
	)
);

// Register setting for number of related posts
$wp_customize->add_setting(
    'travel_vacation_related_posts_count',
    array(
        'default'           => 3,
        'sanitize_callback' => 'absint', // Ensure it's an integer
    )
);

// Add control for number of related posts
$wp_customize->add_control(
    'travel_vacation_related_posts_count',
    array(
        'type'        => 'number',
        'label'       => esc_html__( 'Number of Related Posts to Display', 'travel-vacation' ),
        'section'     => 'travel_vacation_single_post_options',
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 3, // Adjust maximum based on your preference
            'step' => 1,
        ),
    )
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'travel_vacation_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'travel-vacation' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'travel_vacation_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'travel-vacation' ),
		'section'  => 'travel_vacation_single_post_options',
		'settings' => 'travel_vacation_post_related_post_label',
		'type'     => 'text',
	)
);


