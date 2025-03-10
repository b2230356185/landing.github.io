<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! travel_vacation_has_page_header() ) {
    return;
}

$travel_vacation_classes = array( 'page-header' );
$travel_vacation_style = travel_vacation_page_header_style();

if ( $travel_vacation_style ) {
    $travel_vacation_classes[] = $travel_vacation_style . '-page-header';
}

$travel_vacation_visibility = get_theme_mod( 'travel_vacation_page_header_visibility', 'all-devices' );

if ( 'hide-all-devices' === $travel_vacation_visibility ) {
    // Don't show the header at all
    return;
}

if ( 'hide-tablet' === $travel_vacation_visibility ) {
    $travel_vacation_classes[] = 'hide-on-tablet';
} elseif ( 'hide-mobile' === $travel_vacation_visibility ) {
    $travel_vacation_classes[] = 'hide-on-mobile';
} elseif ( 'hide-tablet-mobile' === $travel_vacation_visibility ) {
    $travel_vacation_classes[] = 'hide-on-tablet-mobile';
}

$travel_vacation_PAGE_TITLE_background_color = get_theme_mod('travel_vacation_page_title_background_color_setting', '');

// Get the toggle switch value
$travel_vacation_background_image_enabled = get_theme_mod('travel_vacation_page_header_style', true);

// Add background image to the header if enabled
$travel_vacation_background_image = get_theme_mod( 'travel_vacation_page_header_background_image', '' );
$travel_vacation_background_height = get_theme_mod( 'travel_vacation_page_header_image_height', '200' );
$travel_vacation_inline_style = '';

if ( $travel_vacation_background_image_enabled && ! empty( $travel_vacation_background_image ) ) {
    $travel_vacation_inline_style .= 'background-image: url(' . esc_url( $travel_vacation_background_image ) . '); ';
    $travel_vacation_inline_style .= 'height: ' . esc_attr( $travel_vacation_background_height ) . 'px; ';
    $travel_vacation_inline_style .= 'background-size: cover; ';
    $travel_vacation_inline_style .= 'background-position: center center; ';

    // Add the unique class if the background image is set
    $travel_vacation_classes[] = 'has-background-image';
}

$travel_vacation_classes = implode( ' ', $travel_vacation_classes );
$travel_vacation_heading = get_theme_mod( 'travel_vacation_page_header_heading_tag', 'h1' );
$travel_vacation_heading = apply_filters( 'travel_vacation_page_header_heading', $travel_vacation_heading );

?>

<?php do_action( 'travel_vacation_before_page_header' ); ?>

<header class="<?php echo esc_attr( $travel_vacation_classes ); ?>" style="<?php echo esc_attr( $travel_vacation_inline_style ); ?> background-color: <?php echo esc_attr($travel_vacation_PAGE_TITLE_background_color); ?>;">

    <?php do_action( 'travel_vacation_before_page_header_inner' ); ?>

    <div class="asterthemes-wrapper page-header-inner">

        <?php if ( travel_vacation_has_page_header() ) : ?>

            <<?php echo esc_attr( $travel_vacation_heading ); ?> class="page-header-title">
                <?php echo wp_kses_post( travel_vacation_get_page_title() ); ?>
            </<?php echo esc_attr( $travel_vacation_heading ); ?>>

        <?php endif; ?>

        <?php if ( function_exists( 'travel_vacation_breadcrumb' ) ) : ?>
            <?php travel_vacation_breadcrumb(); ?>
        <?php endif; ?>

    </div><!-- .page-header-inner -->

    <?php do_action( 'travel_vacation_after_page_header_inner' ); ?>

</header><!-- .page-header -->

<?php do_action( 'travel_vacation_after_page_header' ); ?>