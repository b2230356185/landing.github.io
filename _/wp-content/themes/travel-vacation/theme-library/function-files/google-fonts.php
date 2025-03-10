<?php
function travel_vacation_get_all_google_fonts() {
    $travel_vacation_webfonts_json = get_template_directory() . '/theme-library/google-webfonts.json';
    if ( ! file_exists( $travel_vacation_webfonts_json ) ) {
        return array();
    }

    $travel_vacation_fonts_json_data = file_get_contents( $travel_vacation_webfonts_json );
    if ( false === $travel_vacation_fonts_json_data ) {
        return array();
    }

    $travel_vacation_all_fonts = json_decode( $travel_vacation_fonts_json_data, true );
    if ( json_last_error() !== JSON_ERROR_NONE ) {
        return array();
    }

    $travel_vacation_google_fonts = array();
    foreach ( $travel_vacation_all_fonts as $travel_vacation_font ) {
        $travel_vacation_google_fonts[ $travel_vacation_font['family'] ] = array(
            'family'   => $travel_vacation_font['family'],
            'variants' => $travel_vacation_font['variants'],
        );
    }
    return $travel_vacation_google_fonts;
}


function travel_vacation_get_all_google_font_families() {
    $travel_vacation_google_fonts  = travel_vacation_get_all_google_fonts();
    $travel_vacation_font_families = array();
    foreach ( $travel_vacation_google_fonts as $travel_vacation_font ) {
        $travel_vacation_font_families[ $travel_vacation_font['family'] ] = $travel_vacation_font['family'];
    }
    return $travel_vacation_font_families;
}

function travel_vacation_get_fonts_url() {
    $travel_vacation_fonts_url = '';
    $travel_vacation_fonts     = array();

    $travel_vacation_all_fonts = travel_vacation_get_all_google_fonts();

    if ( ! empty( get_theme_mod( 'travel_vacation_site_title_font', 'Raleway' ) ) ) {
        $travel_vacation_fonts[] = get_theme_mod( 'travel_vacation_site_title_font', 'Raleway' );
    }

    if ( ! empty( get_theme_mod( 'travel_vacation_site_description_font', 'Raleway' ) ) ) {
        $travel_vacation_fonts[] = get_theme_mod( 'travel_vacation_site_description_font', 'Raleway' );
    }

    if ( ! empty( get_theme_mod( 'travel_vacation_header_font', 'Epilogue' ) ) ) {
        $travel_vacation_fonts[] = get_theme_mod( 'travel_vacation_header_font', 'Epilogue' );
    }

    if ( ! empty( get_theme_mod( 'travel_vacation_content_font', 'Raleway' ) ) ) {
        $travel_vacation_fonts[] = get_theme_mod( 'travel_vacation_content_font', 'Raleway' );
    }

    $travel_vacation_fonts = array_unique( $travel_vacation_fonts );

    foreach ( $travel_vacation_fonts as $travel_vacation_font ) {
        $travel_vacation_variants      = $travel_vacation_all_fonts[ $travel_vacation_font ]['variants'];
        $travel_vacation_font_family[] = $travel_vacation_font . ':' . implode( ',', $travel_vacation_variants );
    }

    $travel_vacation_query_args = array(
        'family' => urlencode( implode( '|', $travel_vacation_font_family ) ),
    );

    if ( ! empty( $travel_vacation_font_family ) ) {
        $travel_vacation_fonts_url = add_query_arg( $travel_vacation_query_args, 'https://fonts.googleapis.com/css' );
    }

    return $travel_vacation_fonts_url;
}

