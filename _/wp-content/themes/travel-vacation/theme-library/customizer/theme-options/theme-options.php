<?php

/**
 * Header Options
 *
 * @package travel_vacation
 */
// ---------------------------------------- GENERAL OPTIONBS ----------------------------------------------------


// ---------------------------------------- PRELOADER ----------------------------------------------------

$wp_customize->add_section(
	'travel_vacation_general_options',
	array(
		'panel' => 'travel_vacation_theme_options',
		'title' => esc_html__( 'General Options', 'travel-vacation' ),
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'travel_vacation_preloader_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Travel_Vacation_Separator_Custom_Control( $wp_customize, 'travel_vacation_preloader_separator', array(
	'label' => __( 'Enable / Disable Site Preloader Section', 'travel-vacation' ),
	'section' => 'travel_vacation_general_options',
	'settings' => 'travel_vacation_preloader_separator',
) ) );


// General Options - Enable Preloader.
$wp_customize->add_setting(
	'travel_vacation_enable_preloader',
	array(
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_enable_preloader',
		array(
			'label'   => esc_html__( 'Enable Preloader', 'travel-vacation' ),
			'section' => 'travel_vacation_general_options',
		)
	)
);

// Preloader Style Setting
$wp_customize->add_setting(
    'travel_vacation_preloader_style',
    array(
        'default'           => 'style1',
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'travel_vacation_preloader_style',
    array(
        'type'     => 'select',
        'label'    => esc_html__('Select Preloader Styles', 'travel-vacation'),
		'active_callback' => 'travel_vacation_is_preloader_style',
        'section'  => 'travel_vacation_general_options',
        'choices'  => array(
            'style1' => esc_html__('Style 1', 'travel-vacation'),
            'style2' => esc_html__('Style 2', 'travel-vacation'),
            'style3' => esc_html__('Style 3', 'travel-vacation'),
        ),
    )
);



// ---------------------------------------- PAGINATION ----------------------------------------------------

// Add Separator Custom Control
$wp_customize->add_setting( 'travel_vacation_pagination_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Travel_Vacation_Separator_Custom_Control( $wp_customize, 'travel_vacation_pagination_separator', array(
	'label' => __( 'Enable / Disable Pagination Section', 'travel-vacation' ),
	'section' => 'travel_vacation_general_options',
	'settings' => 'travel_vacation_pagination_separator',
) ) );

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'travel_vacation_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'travel-vacation' ),
			'section'  => 'travel_vacation_general_options',
			'settings' => 'travel_vacation_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'travel_vacation_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'travel_vacation_sanitize_select',
	)
);

$wp_customize->add_control(
	'travel_vacation_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'travel-vacation' ),
		'section'         => 'travel_vacation_general_options',
		'settings'        => 'travel_vacation_pagination_type',
		'active_callback' => 'travel_vacation_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'travel-vacation' ),
			'numeric' => __( 'Numeric', 'travel-vacation' ),
		),
	)
);




// ---------------------------------------- BREADCRUMB ----------------------------------------------------


// Add Separator Custom Control
$wp_customize->add_setting( 'travel_vacation_breadcrumb_separators', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Travel_Vacation_Separator_Custom_Control( $wp_customize, 'travel_vacation_breadcrumb_separators', array(
	'label' => __( 'Enable / Disable Breadcrumb Section', 'travel-vacation' ),
	'section' => 'travel_vacation_general_options',
	'settings' => 'travel_vacation_breadcrumb_separators',
)));


// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'travel_vacation_enable_breadcrumb',
	array(
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'travel-vacation' ),
			'section' => 'travel_vacation_general_options',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'travel_vacation_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'travel_vacation_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'travel-vacation' ),
		'active_callback' => 'travel_vacation_is_breadcrumb_enabled',
		'section'         => 'travel_vacation_general_options',
	)
);


// ---------------------------------------- Website layout ----------------------------------------------------


// Add Separator Custom Control
$wp_customize->add_setting( 'travel_vacation_layuout_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Travel_Vacation_Separator_Custom_Control( $wp_customize, 'travel_vacation_layuout_separator', array(
	'label' => __( 'Website Layout Setting', 'travel-vacation' ),
	'section' => 'travel_vacation_general_options',
	'settings' => 'travel_vacation_layuout_separator',
)));


$wp_customize->add_setting(
	'travel_vacation_website_layout',
	array(
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_website_layout',
		array(
			'label'   => esc_html__('Boxed Layout', 'travel-vacation'),
			'section' => 'travel_vacation_general_options',
		)
	)
);

$wp_customize->add_setting('travel_vacation_layout_width_margin', array(
	'default'           => 50,
	'sanitize_callback' => 'travel_vacation_sanitize_range_value',
));

$wp_customize->add_control(new Travel_Vacation_Customize_Range_Control($wp_customize, 'travel_vacation_layout_width_margin', array(
		'label'       => __('Set Width', 'travel-vacation'),
		'description' => __('Adjust the width around the website layout by moving the slider. Use this setting to customize the appearance of your site to fit your design preferences.', 'travel-vacation'),
		'section'     => 'travel_vacation_general_options',
		'settings'    => 'travel_vacation_layout_width_margin',
		'active_callback' => 'travel_vacation_is_layout_enabled',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 130,
			'step' => 1,
		),
)));

// ---------------------------------------- HEADER OPTIONS ----------------------------------------------------


$wp_customize->add_section(
	'travel_vacation_header_options',
	array(
		'panel' => 'travel_vacation_theme_options',
		'title' => esc_html__( 'Header Options', 'travel-vacation' ),
	)
);

$wp_customize->add_setting(
	'travel_vacation_enable_header_search_section',
	array(
		'default'           => true,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_enable_header_search_section',
		array(
			'label'    => esc_html__( 'Enable Search Section', 'travel-vacation' ),
			'section'  => 'travel_vacation_header_options',
			'settings' => 'travel_vacation_enable_header_search_section',
		)
	)
);


// Add setting for sticky header
$wp_customize->add_setting(
	'travel_vacation_enable_sticky_header',
	array(
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
		'default'           => false,
	)
);

// Add control for sticky header setting
$wp_customize->add_control(
	new travel_vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_enable_sticky_header',
		array(
			'label'   => esc_html__( 'Enable Sticky Header', 'travel-vacation' ),
			'section' => 'travel_vacation_header_options',
		)
	)
);

// Add Separator Custom Control
$wp_customize->add_setting( 'travel_vacation_menu_separator', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( new Travel_Vacation_Separator_Custom_Control( $wp_customize, 'travel_vacation_menu_separator', array(
	'label' => __( 'Menu Settings', 'travel-vacation' ),
	'section' => 'travel_vacation_header_options',
	'settings' => 'travel_vacation_menu_separator',
)));

$wp_customize->add_setting( 'travel_vacation_menu_font_size', array(
    'default'           => 15,
    'sanitize_callback' => 'absint',
) );

// Add control for site title size
$wp_customize->add_control( 'travel_vacation_menu_font_size', array(
    'type'        => 'number',
    'section'     => 'travel_vacation_header_options',
    'label'       => __( 'Menu Font Size ', 'travel-vacation' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
));

$wp_customize->add_setting( 'travel_vacation_menu_text_transform', array(
    'default'           => 'capitalize', // Default value for text transform
    'sanitize_callback' => 'sanitize_text_field',
) );

// Add control for menu text transform
$wp_customize->add_control( 'travel_vacation_menu_text_transform', array(
    'type'     => 'select',
    'section'  => 'travel_vacation_header_options', // Adjust the section as needed
    'label'    => __( 'Menu Text Transform', 'travel-vacation' ),
    'choices'  => array(
        'none'       => __( 'None', 'travel-vacation' ),
        'capitalize' => __( 'Capitalize', 'travel-vacation' ),
        'uppercase'  => __( 'Uppercase', 'travel-vacation' ),
        'lowercase'  => __( 'Lowercase', 'travel-vacation' ),
    ),
) );



// ----------------------------------------SITE IDENTITY----------------------------------------------------

// Site Logo - Enable Setting.
$wp_customize->add_setting(
	'travel_vacation_enable_site_logo',
	array(
		'default'           => true, // Default is to display the logo.
		'sanitize_callback' => 'travel_vacation_sanitize_switch', // Sanitize using a custom switch function.
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_enable_site_logo',
		array(
			'label'    => esc_html__( 'Enable Site Logo', 'travel-vacation' ),
			'section'  => 'title_tagline', // Section to add this control.
			'settings' => 'travel_vacation_enable_site_logo',
		)
	)
);

// Site Title - Enable Setting.
$wp_customize->add_setting(
	'travel_vacation_enable_site_title_setting',
	array(
		'default'           => false,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_enable_site_title_setting',
		array(
			'label'    => esc_html__( 'Enable Site Title', 'travel-vacation' ),
			'section'  => 'title_tagline',
			'settings' => 'travel_vacation_enable_site_title_setting',
		)
	)
);


// Tagline - Enable Setting.
$wp_customize->add_setting(
	'travel_vacation_enable_tagline_setting',
	array(
		'default'           => false,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_enable_tagline_setting',
		array(
			'label'    => esc_html__( 'Enable Tagline', 'travel-vacation' ),
			'section'  => 'title_tagline',
			'settings' => 'travel_vacation_enable_tagline_setting',
		)
	)
);

$wp_customize->add_setting( 'travel_vacation_site_title_size', array(
    'default'           => 30, // Default font size in pixels
    'sanitize_callback' => 'absint', // Sanitize the input as a positive integer
) );

// Add control for site title size
$wp_customize->add_control( 'travel_vacation_site_title_size', array(
    'type'        => 'number',
    'section'     => 'title_tagline', // You can change this section to your preferred section
    'label'       => __( 'Site Title Font Size ', 'travel-vacation' ),
    'input_attrs' => array(
        'min'  => 10,
        'max'  => 100,
        'step' => 1,
    ),
) );


$wp_customize->add_setting('travel_vacation_site_logo_width', array(
    'default'           => 200,
    'sanitize_callback' => 'travel_vacation_sanitize_range_value',
));

$wp_customize->add_control(new Travel_Vacation_Customize_Range_Control($wp_customize, 'travel_vacation_site_logo_width', array(
    'label'       => __('Adjust Site Logo Width', 'travel-vacation'),
    'description' => __('This setting controls the Width of Site Logo', 'travel-vacation'),
    'section'     => 'title_tagline',
    'settings'    => 'travel_vacation_site_logo_width',
    'input_attrs' => array(
        'min'  => 0,
        'max'  => 400,
        'step' => 5,
    ),
)));