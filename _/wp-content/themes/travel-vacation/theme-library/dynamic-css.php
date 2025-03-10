<?php

/**
 * Dynamic CSS
 */
function travel_vacation_dynamic_css() {
	$travel_vacation_primary_color = get_theme_mod( 'primary_color', '#4EC9FF' );

	$travel_vacation_site_title_font       = get_theme_mod( 'travel_vacation_site_title_font', 'Raleway' );
	$travel_vacation_site_description_font = get_theme_mod( 'travel_vacation_site_description_font', 'Raleway' );
	$travel_vacation_header_font           = get_theme_mod( 'travel_vacation_header_font', 'Epilogue' );
	$travel_vacation_content_font             = get_theme_mod( 'travel_vacation_content_font', 'Raleway' );

	// Enqueue Google Fonts
	$fonts_url = travel_vacation_get_fonts_url();
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'travel-vacation-google-fonts', esc_url( $fonts_url ), array(), null );
	}

	$travel_vacation_custom_css  = '';
	$travel_vacation_custom_css .= '
    /* Color */
    :root {
        --primary-color: ' . esc_attr( $travel_vacation_primary_color ) . ';
        --header-text-color: ' . esc_attr( '#' . get_header_textcolor() ) . ';
    }
    ';

	$travel_vacation_custom_css .= '
    /* Typography */
    :root {
        --font-heading: "' . esc_attr( $travel_vacation_header_font ) . '", serif;
        --font-main: -apple-system, BlinkMacSystemFont, "' . esc_attr( $travel_vacation_content_font ) . '", "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
    }

    body,
	button, input, select, optgroup, textarea, p {
        font-family: "' . esc_attr( $travel_vacation_content_font ) . '", serif;
	}

	.site-identity p.site-title, h1.site-title a, h1.site-title, p.site-title a, .site-branding h1.site-title a {
        font-family: "' . esc_attr( $travel_vacation_site_title_font ) . '", serif;
	}
    
	p.site-description {
        font-family: "' . esc_attr( $travel_vacation_site_description_font ) . '", serif !important;
	}
    ';

	wp_add_inline_style( 'travel-vacation-style', $travel_vacation_custom_css );
}
add_action( 'wp_enqueue_scripts', 'travel_vacation_dynamic_css', 99 );