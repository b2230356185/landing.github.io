<?php

function travel_vacation_sanitize_select( $travel_vacation_input, $travel_vacation_setting ) {
	$travel_vacation_input = sanitize_key( $travel_vacation_input );
	$travel_vacation_choices = $travel_vacation_setting->manager->get_control( $travel_vacation_setting->id )->choices;
	return ( array_key_exists( $travel_vacation_input, $travel_vacation_choices ) ? $travel_vacation_input : $travel_vacation_setting->default );
}

function travel_vacation_sanitize_switch( $travel_vacation_input ) {
	if ( true === $travel_vacation_input ) {
		return true;
	} else {
		return false;
	}
}

function travel_vacation_sanitize_google_fonts( $travel_vacation_input, $travel_vacation_setting ) {
	$travel_vacation_choices = $travel_vacation_setting->manager->get_control( $travel_vacation_setting->id )->choices;
	return ( array_key_exists( $travel_vacation_input, $travel_vacation_choices ) ? $travel_vacation_input : $travel_vacation_setting->default );
}

/**
 * Sanitize HTML input.
 *
 * @param string $travel_vacation_input HTML input to sanitize.
 * @return string Sanitized HTML.
 */
function travel_vacation_sanitize_html( $travel_vacation_input ) {
    return wp_kses_post( $travel_vacation_input );
}

/**
 * Sanitize URL input.
 *
 * @param string $travel_vacation_input URL input to sanitize.
 * @return string Sanitized URL.
 */
function travel_vacation_sanitize_url( $travel_vacation_input ) {
    return esc_url_raw( $travel_vacation_input );
}
// Sanitize Scroll Top Position
function travel_vacation_sanitize_scroll_top_position( $travel_vacation_input ) {
    $valid_positions = array( 'bottom-right', 'bottom-left', 'bottom-center' );
    if ( in_array( $travel_vacation_input, $valid_positions ) ) {
        return $travel_vacation_input;
    } else {
        return 'bottom-right'; // Default to bottom-right if invalid value
    }
}

function travel_vacation_sanitize_choices( $travel_vacation_input, $travel_vacation_setting ) {
    global $wp_customize; 
    $travel_vacation_control = $wp_customize->get_control( $travel_vacation_setting->id ); 
    if ( array_key_exists( $travel_vacation_input, $travel_vacation_control->choices ) ) {
        return $travel_vacation_input;
    } else {
        return $travel_vacation_setting->default;
    }
}

function travel_vacation_sanitize_range_value( $travel_vacation_number, $travel_vacation_setting ) {

	// Ensure input is an absolute integer.
	$travel_vacation_number = absint( $travel_vacation_number );

	// Get the input attributes associated with the setting.
	$travel_vacation_atts = $travel_vacation_setting->manager->get_control( $travel_vacation_setting->id )->input_attrs;

	// Get minimum number in the range.
	$travel_vacation_min = ( isset( $travel_vacation_atts['min'] ) ? $travel_vacation_atts['min'] : $travel_vacation_number );

	// Get maximum number in the range.
	$travel_vacation_max = ( isset( $travel_vacation_atts['max'] ) ? $travel_vacation_atts['max'] : $travel_vacation_number );

	// Get step.
	$travel_vacation_step = ( isset( $travel_vacation_atts['step'] ) ? $travel_vacation_atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default.
	return ( $travel_vacation_min <= $travel_vacation_number && $travel_vacation_number <= $travel_vacation_max && is_int( $travel_vacation_number / $travel_vacation_step ) ? $travel_vacation_number : $travel_vacation_setting->default );
}