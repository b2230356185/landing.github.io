<?php

/**
 * The template for displaying the footer
 * 
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package travel_vacation
 */

// Get the footer background color/image settings from customizer
$travel_vacation_footer_background_color = get_theme_mod('travel_vacation_footer_background_color_setting', ''); // Default to white if not set
$travel_vacation_footer_background_image = get_theme_mod('travel_vacation_footer_background_image_setting');

if (!is_front_page() || is_home()) {
    ?>
    </div>
    </div>
</div>
<?php } ?>

<footer id="colophon" class="site-footer" style="background-color: <?php echo esc_attr($travel_vacation_footer_background_color); ?>; <?php echo ($travel_vacation_footer_background_image) ? 'background-image: url(' . esc_url($travel_vacation_footer_background_image) . ');' : ''; ?>">
	<div class="site-footer-top">
		<div class="asterthemes-wrapper">
			<div class="footer-widgets-wrapper">

				<?php 
					// Footer Widget
					do_action('travel_vacation_footer_widget');
				?>
					

			</div>
		</div>
	</div>
	<div class="site-footer-bottom">
        <div class="asterthemes-wrapper">
            <div class="site-footer-bottom-wrapper">
                <div class="site-info">
                    <?php
                    do_action('travel_vacation_footer_copyright');
                    ?>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php
$travel_vacation_is_scroll_top_active = get_theme_mod( 'travel_vacation_scroll_top', true );
if ( $travel_vacation_is_scroll_top_active ) :
    $travel_vacation_scroll_position = get_theme_mod( 'travel_vacation_scroll_top_position', 'bottom-right' );
    $travel_vacation_scroll_shape = get_theme_mod( 'travel_vacation_scroll_top_shape', 'box' );
    ?>
    <style>
        #scroll-to-top {
            position: fixed;
            <?php
            switch ( $travel_vacation_scroll_position ) {
                case 'bottom-left':
                    echo 'bottom: 25px; left: 20px;';
                    break;
                case 'bottom-center':
                    echo 'bottom: 25px; left: 50%; transform: translateX(-50%);';
                    break;
                default: // 'bottom-right'
                    echo 'bottom: 25px; right: 90px;';
            }
            ?>
        }
    </style>
    <a href="#" id="scroll-to-top" class="travel-vacation-scroll-to-top <?php echo esc_attr($travel_vacation_scroll_shape); ?>"><i class="<?php echo esc_attr( get_theme_mod( 'travel_vacation_scroll_btn_icon', 'fas fa-chevron-up' ) ); ?>"></i></a>
<?php
endif;
?>

<?php wp_footer(); ?>

</body>

</html>