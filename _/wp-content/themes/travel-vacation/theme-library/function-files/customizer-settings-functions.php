<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package travel_vacation
 */


 function travel_vacation_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_html( get_theme_mod( 'primary_color', '#4EC9FF' ) ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'travel_vacation_customize_css' );


function travel_vacation_enqueue_selected_fonts() {
    $travel_vacation_fonts_url = travel_vacation_get_fonts_url();
    if (!empty($travel_vacation_fonts_url)) {
        wp_enqueue_style('travel-vacation-google-fonts', $travel_vacation_fonts_url, array(), null);
    }
}
add_action('wp_enqueue_scripts', 'travel_vacation_enqueue_selected_fonts');

function travel_vacation_layout_customizer_css() {
    $travel_vacation_margin = get_theme_mod('travel_vacation_layout_width_margin', 50);
    ?>
    <style type="text/css">
        body.site-boxed--layout #page  {
            margin: 0 <?php echo esc_attr($travel_vacation_margin); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'travel_vacation_layout_customizer_css');

function travel_vacation_blog_layout_customizer_css() {
    // Retrieve the blog layout option
    $travel_vacation_blog_layout_option = get_theme_mod('travel_vacation_blog_layout_option_setting', 'Left');

    // Initialize custom CSS variable
    $travel_vacation_custom_css = '';

    // Generate custom CSS based on the layout option
    if ($travel_vacation_blog_layout_option === 'Default') {
        $travel_vacation_custom_css .= '.mag-post-detail { text-align: center; }';
    } elseif ($travel_vacation_blog_layout_option === 'Left') {
        $travel_vacation_custom_css .= '.mag-post-detail { text-align: left; }';
    } elseif ($travel_vacation_blog_layout_option === 'Right') {
        $travel_vacation_custom_css .= '.mag-post-detail { text-align: right; }';
    }

    // Output the combined CSS
    ?>
    <style type="text/css">
        <?php echo wp_kses($travel_vacation_custom_css, array( 'style' => array(), 'text-align' => array() )); ?>
    </style>
    <?php
}
add_action('wp_head', 'travel_vacation_blog_layout_customizer_css');

function travel_vacation_sidebar_width_customizer_css() {
    $travel_vacation_sidebar_width = get_theme_mod('travel_vacation_sidebar_width', '30');
    ?>
    <style type="text/css">
        .right-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: auto <?php echo esc_attr($travel_vacation_sidebar_width); ?>%;
        }
        .left-sidebar .asterthemes-wrapper .asterthemes-page {
            grid-template-columns: <?php echo esc_attr($travel_vacation_sidebar_width); ?>% auto;
        }
    </style>
    <?php
}
add_action('wp_head', 'travel_vacation_sidebar_width_customizer_css');

if ( ! function_exists( 'travel_vacation_get_page_title' ) ) {
    function travel_vacation_get_page_title() {
        $travel_vacation_title = '';

        if (is_404()) {
            $travel_vacation_title = esc_html__('Page Not Found', 'travel-vacation');
        } elseif (is_search()) {
            $travel_vacation_title = esc_html__('Search Results for: ', 'travel-vacation') . esc_html(get_search_query());
        } elseif (is_home() && !is_front_page()) {
            $travel_vacation_title = esc_html__('Blogs', 'travel-vacation');
        } elseif (function_exists('is_shop') && is_shop()) {
            $travel_vacation_title = esc_html__('Shop', 'travel-vacation');
        } elseif (is_page()) {
            $travel_vacation_title = get_the_title();
        } elseif (is_single()) {
            $travel_vacation_title = get_the_title();
        } elseif (is_archive()) {
            $travel_vacation_title = get_the_archive_title();
        } else {
            $travel_vacation_title = get_the_archive_title();
        }

        return apply_filters('travel_vacation_page_title', $travel_vacation_title);
    }
}

if ( ! function_exists( 'travel_vacation_has_page_header' ) ) {
    function travel_vacation_has_page_header() {
        // Default to true (display header)
        $travel_vacation_return = true;

        // Custom conditions for disabling the header
        if ('hide-all-devices' === get_theme_mod('travel_vacation_page_header_visibility', 'all-devices')) {
            $travel_vacation_return = false;
        }

        // Apply filters and return
        return apply_filters('travel_vacation_display_page_header', $travel_vacation_return);
    }
}

if ( ! function_exists( 'travel_vacation_page_header_style' ) ) {
    function travel_vacation_page_header_style() {
        $travel_vacation_style = get_theme_mod('travel_vacation_page_header_style', 'default');
        return apply_filters('travel_vacation_page_header_style', $travel_vacation_style);
    }
}

function travel_vacation_page_title_customizer_css() {
    $travel_vacation_layout_option = get_theme_mod('travel_vacation_page_header_layout', 'left');
    ?>
    <style type="text/css">
        .asterthemes-wrapper.page-header-inner {
            <?php if ($travel_vacation_layout_option === 'flex') : ?>
                display: flex;
                justify-content: space-between;
                align-items: center;
            <?php else : ?>
                text-align: <?php echo esc_attr($travel_vacation_layout_option); ?>;
            <?php endif; ?>
        }
    </style>
    <?php
}
add_action('wp_head', 'travel_vacation_page_title_customizer_css');

function travel_vacation_pagetitle_height_css() {
    $travel_vacation_height = get_theme_mod('travel_vacation_pagetitle_height', 50);
    ?>
    <style type="text/css">
        header.page-header {
            padding: <?php echo esc_attr($travel_vacation_height); ?>px 0;
        }
    </style>
    <?php
}
add_action('wp_head', 'travel_vacation_pagetitle_height_css');

function travel_vacation_site_logo_width() {
    $travel_vacation_site_logo_width = get_theme_mod('travel_vacation_site_logo_width', 200);
    ?>
    <style type="text/css">
        .site-logo img {
            max-width: <?php echo esc_attr($travel_vacation_site_logo_width); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'travel_vacation_site_logo_width');

function travel_vacation_menu_font_size_css() {
    $travel_vacation_menu_font_size = get_theme_mod('travel_vacation_menu_font_size', 15);
    ?>
    <style type="text/css">
        .main-navigation a {
            font-size: <?php echo esc_attr($travel_vacation_menu_font_size); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'travel_vacation_menu_font_size_css');

function travel_vacation_sidebar_widget_font_size_css() {
    $travel_vacation_sidebar_widget_font_size = get_theme_mod('travel_vacation_sidebar_widget_font_size', 24);
    ?>
    <style type="text/css">
        h2.wp-block-heading,aside#secondary .widgettitle,aside#secondary .widget-title {
            font-size: <?php echo esc_attr($travel_vacation_sidebar_widget_font_size); ?>px;
        }
    </style>
    <?php
}
add_action('wp_head', 'travel_vacation_sidebar_widget_font_size_css');

// Woocommerce Related Products Settings
function travel_vacation_related_product_css() {
    $travel_vacation_related_product_show_hide = get_theme_mod('travel_vacation_related_product_show_hide', true);

    if ( $travel_vacation_related_product_show_hide != true) {
        ?>
        <style type="text/css">
            .related.products {
                display: none;
            }
        </style>
        <?php
    }
}
add_action('wp_head', 'travel_vacation_related_product_css');
