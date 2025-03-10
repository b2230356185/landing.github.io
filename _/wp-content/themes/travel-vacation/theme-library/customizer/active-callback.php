<?php

/**
 * Active Callbacks
 *
 * @package travel_vacation
 */

// Theme Options.
function travel_vacation_is_pagination_enabled( $travel_vacation_control ) {
	return ( $travel_vacation_control->manager->get_setting( 'travel_vacation_enable_pagination' )->value() );
}
function travel_vacation_is_breadcrumb_enabled( $travel_vacation_control ) {
	return ( $travel_vacation_control->manager->get_setting( 'travel_vacation_enable_breadcrumb' )->value() );
}
function travel_vacation_is_layout_enabled( $travel_vacation_control ) {
	return ( $travel_vacation_control->manager->get_setting( 'travel_vacation_website_layout' )->value() );
}
function travel_vacation_is_pagetitle_bcakground_image_enabled( $travel_vacation_control ) {
	return ( $travel_vacation_control->manager->get_setting( 'travel_vacation_page_header_style' )->value() );
}
function travel_vacation_is_preloader_style( $travel_vacation_control ) {
	return ( $travel_vacation_control->manager->get_setting( 'travel_vacation_enable_preloader' )->value() );
}

// Header Options.
function travel_vacation_is_topbar_enabled( $travel_vacation_control ) {
	return ( $travel_vacation_control->manager->get_Setting( 'travel_vacation_enable_topbar' )->value() );
}

// Banner Slider Section.
function travel_vacation_is_banner_slider_section_enabled( $travel_vacation_control ) {
	return ( $travel_vacation_control->manager->get_setting( 'travel_vacation_enable_banner_section' )->value() );
}
function travel_vacation_is_banner_slider_section_and_content_type_post_enabled( $travel_vacation_control ) {
	$travel_vacation_content_type = $travel_vacation_control->manager->get_setting( 'travel_vacation_banner_slider_content_type' )->value();
	return ( travel_vacation_is_banner_slider_section_enabled( $travel_vacation_control ) && ( 'post' === $travel_vacation_content_type ) );
}
function travel_vacation_is_banner_slider_section_and_content_type_page_enabled( $travel_vacation_control ) {
	$travel_vacation_content_type = $travel_vacation_control->manager->get_setting( 'travel_vacation_banner_slider_content_type' )->value();
	return ( travel_vacation_is_banner_slider_section_enabled( $travel_vacation_control ) && ( 'page' === $travel_vacation_content_type ) );
}

// Places section.
function travel_vacation_is_places_section_enabled( $travel_vacation_control ) {
	return ( $travel_vacation_control->manager->get_setting( 'travel_vacation_enable_service_section' )->value() );
}
function travel_vacation_is_places_section_and_content_type_post_enabled( $travel_vacation_control ) {
	$travel_vacation_content_type = $travel_vacation_control->manager->get_setting( 'travel_vacation_places_content_type' )->value();
	return ( travel_vacation_is_places_section_enabled( $travel_vacation_control ) && ( 'post' === $travel_vacation_content_type ) );
}
function travel_vacation_is_places_section_and_content_type_page_enabled( $travel_vacation_control ) {
	$travel_vacation_content_type = $travel_vacation_control->manager->get_setting( 'travel_vacation_places_content_type' )->value();
	return ( travel_vacation_is_places_section_enabled( $travel_vacation_control ) && ( 'page' === $travel_vacation_content_type ) );
}