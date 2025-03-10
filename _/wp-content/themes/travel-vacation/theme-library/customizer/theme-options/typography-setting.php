<?php

/**
 * Typography Settings
 *
 * @package travel_vacation
 */

// Typography Settings
$wp_customize->add_section(
    'travel_vacation_typography_setting',
    array(
        'panel' => 'travel_vacation_theme_options',
        'title' => esc_html__( 'Typography Settings', 'travel-vacation' ),
    )
);

$wp_customize->add_setting(
    'travel_vacation_site_title_font',
    array(
        'default'           => 'Raleway',
        'sanitize_callback' => 'travel_vacation_sanitize_google_fonts',
    )
);

$wp_customize->add_control(
    'travel_vacation_site_title_font',
    array(
        'label'    => esc_html__( 'Site Title Font Family', 'travel-vacation' ),
        'section'  => 'travel_vacation_typography_setting',
        'settings' => 'travel_vacation_site_title_font',
        'type'     => 'select',
        'choices'  => travel_vacation_get_all_google_font_families(),
    )
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'travel_vacation_site_description_font',
	array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'travel_vacation_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'travel_vacation_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'travel-vacation' ),
		'section'  => 'travel_vacation_typography_setting',
		'settings' => 'travel_vacation_site_description_font',
		'type'     => 'select',
		'choices'  => travel_vacation_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'travel_vacation_header_font',
	array(
		'default'           => 'Epilogue',
		'sanitize_callback' => 'travel_vacation_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'travel_vacation_header_font',
	array(
		'label'    => esc_html__( 'Heading Font Family', 'travel-vacation' ),
		'section'  => 'travel_vacation_typography_setting',
		'settings' => 'travel_vacation_header_font',
		'type'     => 'select',
		'choices'  => travel_vacation_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'travel_vacation_content_font',
	array(
		'default'           => 'Raleway',
		'sanitize_callback' => 'travel_vacation_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'travel_vacation_content_font',
	array(
		'label'    => esc_html__( 'Content Font Family', 'travel-vacation' ),
		'section'  => 'travel_vacation_typography_setting',
		'settings' => 'travel_vacation_content_font',
		'type'     => 'select',
		'choices'  => travel_vacation_get_all_google_font_families(),
	)
);
