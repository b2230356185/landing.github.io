<?php

/**
 * WooCommerce Settings
 *
 * @package travel_vacation
 */

$wp_customize->add_section(
	'travel_vacation_woocommerce_settings',
	array(
		'panel' => 'travel_vacation_theme_options',
		'title' => esc_html__( 'WooCommerce Settings', 'travel-vacation' ),
	)
);

//WooCommerce - Products per page.
$wp_customize->add_setting( 'travel_vacation_products_per_page', array(
    'default'           => 9,
    'sanitize_callback' => 'absint',
));

$wp_customize->add_control( 'travel_vacation_products_per_page', array(
    'type'        => 'number',
    'section'     => 'travel_vacation_woocommerce_settings',
    'label'       => __( 'Products Per Page', 'travel-vacation' ),
    'input_attrs' => array(
        'min'  => 0,
        'max'  => 50,
        'step' => 1,
    ),
));

//WooCommerce - Products per row.
$wp_customize->add_setting( 'travel_vacation_products_per_row', array(
    'default'           => '3',
    'sanitize_callback' => 'travel_vacation_sanitize_choices',
) );

$wp_customize->add_control( 'travel_vacation_products_per_row', array(
    'label'    => __( 'Products Per Row', 'travel-vacation' ),
    'section'  => 'travel_vacation_woocommerce_settings',
    'settings' => 'travel_vacation_products_per_row',
    'type'     => 'select',
    'choices'  => array(
        '2' => '2',
		'3' => '3',
		'4' => '4',
    ),
) );

//WooCommerce - Show / Hide Related Product.
$wp_customize->add_setting(
	'travel_vacation_related_product_show_hide',
	array(
		'default'           => true,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new travel_vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_related_product_show_hide',
		array(
			'label'   => esc_html__( 'Show / Hide Related product', 'travel-vacation' ),
			'section' => 'travel_vacation_woocommerce_settings',
		)
	)
);



