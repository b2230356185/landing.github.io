<?php
/**
* Wizard
* @package Whizzie
* @since 1.0.0
*/

class Whizzie {
	protected $version = '1.1.0';
	protected $theme_name = '';
	protected $theme_title = '';
	protected $page_slug = '';
	protected $page_title = '';
	protected $config_steps = array();
	public $parent_slug;
	
	/**
	 * Constructor
	 * @param $config Configuration parameters
	 */
	public function __construct( $config ) {
		$this->set_vars( $config );
		$this->init();
	}

	/**
	 * Set variables based on configuration
	 * @param $config Configuration parameters
	 */
	public function set_vars( $config ) {
		if ( isset( $config['page_slug'] ) ) {
			$this->page_slug = esc_attr( $config['page_slug'] );
		}
		if ( isset( $config['page_title'] ) ) {
			$this->page_title = esc_attr( $config['page_title'] );
		}
		if ( isset( $config['steps'] ) ) {
			$this->config_steps = $config['steps'];
		}

		$current_theme = wp_get_theme();
		$this->theme_title = $current_theme->get( 'Name' );
		$this->theme_name = strtolower( preg_replace( '#[^a-zA-Z]#', '', $current_theme->get( 'Name' ) ) );
		$this->page_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_page_slug', $this->theme_name . '-wizard' );
		$this->parent_slug = apply_filters( $this->theme_name . '_theme_setup_wizard_parent_slug', '' );
	}

	/*** Initialize hooks and actions ***/
	public function init() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'admin_menu', array( $this, 'menu_page' ) );
		add_action( 'wp_ajax_setup_widgets', array( $this, 'setup_widgets' ) );
	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'theme-wizard-style', get_template_directory_uri() . '/theme-wizard/assets/css/theme-wizard-style.css');
		wp_register_script( 'theme-wizard-script', get_template_directory_uri() . '/theme-wizard/assets/js/theme-wizard-script.js', array( 'jquery' ));
		wp_localize_script(
			'theme-wizard-script',
			'travel_vacation_whizzie_params',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'verify_text' => esc_html( 'verifying', 'travel-vacation' )
			)
		);
		wp_enqueue_script( 'theme-wizard-script' );
	}

	public function menu_page() {
		add_theme_page( esc_html( $this->page_title ), esc_html( $this->page_title ), 'manage_options', $this->page_slug, array( $this, 'travel_vacation_setup_wizard' ) );
	}

	/*** Display the wizard page content ***/
	public function wizard_page() { ?>
		<div class="main-wrap">
			<div class="card whizzie-wrap">
				<ul class="whizzie-menu">
					<?php foreach ( $this->get_steps() as $step ) : ?>
						<li data-step="<?php echo esc_attr( $step['id'] ); ?>" class="step step-<?php echo esc_attr( $step['id'] ); ?>">
							<h2><?php echo esc_html( $step['title'] ); ?></h2>
							<?php $content = call_user_func( array( $this, $step['view'] ) ); ?>
							<?php if ( isset( $content['summary'] ) ) : ?>
								<div class="summary"><?php echo wp_kses_post( $content['summary'] ); ?></div>
							<?php endif; ?>
							<?php if ( isset( $content['detail'] ) ) : ?>
								<p><a href="#" class="more-info"><?php esc_html_e( 'More Info', 'travel-vacation' ); ?></a></p>
								<div class="detail"><?php echo wp_kses_post( $content['detail'] ); ?></div>
							<?php endif; ?>
							<?php if ( isset( $step['button_text'] ) && $step['button_text'] ) : ?>
								<div class="button-wrap"><a href="#" class="button button-primary do-it" data-callback="<?php echo esc_attr( $step['callback'] ); ?>" data-step="<?php echo esc_attr( $step['id'] ); ?>"><?php echo esc_html( $step['button_text'] ); ?></a></div>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
				<div class="step-loading"><span class="spinner"></span></div>
			</div>
		</div>
	<?php }

	/*** Setup wizard page content and options ***/
	public function travel_vacation_setup_wizard() { ?>
		<div class="wrapper-info get-stared-page-wrap">
			<div class="tab-sec theme-option-tab">
				<div id="demo_offer" class="tabcontent">
					<?php $this->wizard_page(); ?>
				</div>
			</div>
		</div>
	<?php }

	/**
	 * Get the steps for the wizard
	 * @return array
	 */
	public function get_steps() {
		$steps = array(
			'intro' => array(
				'id' => 'intro',
				'title' => __( 'Welcome to ', 'travel-vacation' ) . $this->theme_title,
				'view' => 'get_step_intro',
				'callback' => 'do_next_step',
				'button_text' => __( 'Start Now', 'travel-vacation' ),
				'can_skip' => false
			),
			'widgets' => array(
				'id' => 'widgets',
				'title' => __( 'Demo Importer', 'travel-vacation' ),
				'view' => 'get_step_widgets',
				'callback' => 'install_widgets',
				'button_text' => __( 'Import Demo', 'travel-vacation' ),
				'can_skip' => true
			),
			'done' => array(
				'id' => 'done',
				'title' => __( 'All Done', 'travel-vacation' ),
				'view' => 'get_step_done'
			)
		);

		return $steps;
	}

	/*** Display the content for the intro step ***/
	public function get_step_intro() { ?>
		<div class="summary">
			<p style="text-align: center;"><?php esc_html_e( 'Thank you for choosing our theme! We are excited to help you get started with your new website.', 'travel-vacation' ); ?></p>
			<p style="text-align: center;"><?php esc_html_e( 'To ensure you make the most of our theme, we recommend following the setup steps outlined here. This process will help you configure the theme to best suit your needs and preferences. Click on the "Start Now" button to begin the setup.', 'travel-vacation' ); ?></p>
		</div>
	<?php }

	/*** Display the content for the widgets step ***/
	public function get_step_widgets() { ?>
		<div class="summary">
			<p><?php esc_html_e('To get started, use the button below to import demo content and add widgets to your site. After installation, you can manage settings and customize your site using the Customizer. Enjoy your new theme!', 'travel-vacation'); ?></p>
		</div>
	<?php }

	/*** Display the content for the final step ***/
	public function get_step_done() { ?>
		<div id="aster-demo-setup-guid">
			<div class="aster-setup-menu">
				<h3><?php esc_html_e('Setup Navigation Menu','travel-vacation'); ?></h3>
				<p><?php esc_html_e('Follow the following Steps to Setup Menu','travel-vacation'); ?></p>
				<h4><?php esc_html_e('A) Create Pages','travel-vacation'); ?></h4>
				<ol>
					<li><?php esc_html_e('Go to Dashboard >> Pages >> Add New','travel-vacation'); ?></li>
					<li><?php esc_html_e('Enter Page Details And Save Changes','travel-vacation'); ?></li>
				</ol>
				<h4><?php esc_html_e('B) Add Pages To Menu','travel-vacation'); ?></h4>
				<ol>
					<li><?php esc_html_e('Go to Dashboard >> Appearance >> Menu','travel-vacation'); ?></li>
					<li><?php esc_html_e('Click On The Create Menu Option','travel-vacation'); ?></li>
					<li><?php esc_html_e('Select The Pages And Click On The Add to Menu Button','travel-vacation'); ?></li>
					<li><?php esc_html_e('Select Primary Menu From The Menu Setting','travel-vacation'); ?></li>
					<li><?php esc_html_e('Click On The Save Menu Button','travel-vacation'); ?></li>
				</ol>
			</div>
			<div class="aster-setup-widget">
				<h3><?php esc_html_e('Setup Footer Widgets','travel-vacation'); ?></h3>
				<p><?php esc_html_e('Follow the following Steps to Setup Footer Widgets','travel-vacation'); ?></p>
				<ol>
					<li><?php esc_html_e('Go to Dashboard >> Appearance >> Widgets','travel-vacation'); ?></li>
					<li><?php esc_html_e('Drag And Add The Widgets In The Footer Columns','travel-vacation'); ?></li>
				</ol>
			</div>
			<div style="display:flex; justify-content: center; margin-top: 20px; gap:20px">
				<div class="aster-setup-finish">
					<a target="_blank" href="<?php echo esc_url(home_url()); ?>" class="button button-primary">Visit Site</a>
				</div>
				<div class="aster-setup-finish">
					<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>" class="button button-primary">Customize Your Demo</a>
				</div>
				<div class="aster-setup-finish">
					<a target="_blank" href="<?php echo esc_url( admin_url('themes.php?page=travel-vacation-getting-started') ); ?>" class="button button-primary">Getting Started</a>
				</div>
			</div>
		</div>
	<?php }


	//                      ------------- MENUS -----------------                    //

	public function travel_vacation_customizer_primary_menu(){

		// ------- Create Primary Menu --------
		$travel_vacation_menuname = $travel_vacation_themename . 'Primary Menu';
		$travel_vacation_bpmenulocation = 'primary';
		$travel_vacation_menu_exists = wp_get_nav_menu_object( $travel_vacation_menuname );

		if( !$travel_vacation_menu_exists){
			$travel_vacation_menu_id = wp_create_nav_menu($travel_vacation_menuname);
			$travel_vacation_parent_item = 
			wp_update_nav_menu_item($travel_vacation_menu_id, 0, array(
				'menu-item-title' =>  __('Home','travel-vacation'),
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url( '/' ),
				'menu-item-status' => 'publish'));

			wp_update_nav_menu_item($travel_vacation_menu_id, 0, array(
				'menu-item-title' =>  __('Holiday & Packages','travel-vacation'),
				'menu-item-classes' => 'holiday',
				'menu-item-url' => get_permalink(get_page_by_title('Holiday & Packages')),
				'menu-item-status' => 'publish'));

			wp_update_nav_menu_item($travel_vacation_menu_id, 0, array(
				'menu-item-title' =>  __('Best Destinations','travel-vacation'),
				'menu-item-classes' => 'destination',
				'menu-item-url' => get_permalink(get_page_by_title('Best Destinations')),
				'menu-item-status' => 'publish'));

			wp_update_nav_menu_item($travel_vacation_menu_id, 0, array(
				'menu-item-title' =>  __('About Us','travel-vacation'),
				'menu-item-classes' => 'about',
				'menu-item-url' => get_permalink(get_page_by_title('About Us')),
				'menu-item-status' => 'publish'));

			wp_update_nav_menu_item($travel_vacation_menu_id, 0, array(
				'menu-item-title' =>  __('Blogs','travel-vacation'),
				'menu-item-classes' => 'blog',
				'menu-item-url' => get_permalink(get_page_by_title('Blogs')),
				'menu-item-status' => 'publish'));

			if( !has_nav_menu( $travel_vacation_bpmenulocation ) ){
				$locations = get_theme_mod('nav_menu_locations');
				$locations[$travel_vacation_bpmenulocation] = $travel_vacation_menu_id;
				set_theme_mod( 'nav_menu_locations', $locations );
			}
		}
	}


	//                      ------------- /*** Imports demo content ***/ -----------------                    //

	public function setup_widgets() {

		// Create a front page and assigned the template
		$travel_vacation_home_title = 'Home';
		$travel_vacation_home_check = get_page_by_title($travel_vacation_home_title);
		$travel_vacation_home = array(
			'post_type' => 'page',
			'post_title' => $travel_vacation_home_title,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'home'
		);
		$travel_vacation_home_id = wp_insert_post($travel_vacation_home);

		//Set the static front page
		$travel_vacation_home = get_page_by_title( 'Home' );
		update_option( 'page_on_front', $travel_vacation_home->ID );
		update_option( 'show_on_front', 'page' );


		// Create a posts page and assigned the template
		$travel_vacation_blog_title = 'Blogs';
		$travel_vacation_blog = get_page_by_title($travel_vacation_blog_title);

		if (!$travel_vacation_blog) {
			$travel_vacation_blog = array(
				'post_type' => 'page',
				'post_title' => $travel_vacation_blog_title,
				'post_status' => 'publish',
				'post_author' => 1,
				'post_name' => 'blog'
			);
			$travel_vacation_blog_id = wp_insert_post($travel_vacation_blog);

			if (is_wp_error($travel_vacation_blog_id)) {
				// Handle error
			}
		} else {
			$travel_vacation_blog_id = $travel_vacation_blog->ID;
		}
		// Set the posts page
		update_option('page_for_posts', $travel_vacation_blog_id);

		
		// Create a about and assigned the template
		$travel_vacation_about_title = 'About Us';
		$travel_vacation_about_check = get_page_by_title($travel_vacation_about_title);
		$travel_vacation_about = array(
			'post_type' => 'page',
			'post_title' => $travel_vacation_about_title,
			'post_content' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'blog'
		);
		$travel_vacation_about_id = wp_insert_post($travel_vacation_about);

		
		// Create a Holiday & Packages and assigned the template
		$travel_vacation_holiday_title = 'Holiday & Packages';
		$travel_vacation_holiday_check = get_page_by_title($travel_vacation_holiday_title);
		$travel_vacation_holiday = array(
			'post_type' => 'page',
			'post_title' => $travel_vacation_holiday_title,
			'post_content' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'blog'
		);
		$travel_vacation_holiday_id = wp_insert_post($travel_vacation_holiday);

		
		// Create a Best Destinations and assigned the template
		$travel_vacation_destination_title = 'Best Destinations';
		$travel_vacation_destination_check = get_page_by_title($travel_vacation_destination_title);
		$travel_vacation_destination = array(
			'post_type' => 'page',
			'post_title' => $travel_vacation_destination_title,
			'post_content' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
			'post_status' => 'publish',
			'post_author' => 1,
			'post_slug' => 'blog'
		);
		$travel_vacation_destination_id = wp_insert_post($travel_vacation_destination);


		// ------------------------------------------ Blogs for Sections --------------------------------------

			// Create categories if not already created
			$travel_vacation_category_slider = wp_create_category('Slider');
			$travel_vacation_category_places = wp_create_category('Places');

			// Array of categories to assign to each set of posts
			$travel_vacation_categories = array($travel_vacation_category_slider, $travel_vacation_category_places);

			// Array of image URLs for the "Services" category
			$places_images = array(
				get_template_directory_uri() . '/resource/img/places1.png',
				get_template_directory_uri() . '/resource/img/places2.png',
				get_template_directory_uri() . '/resource/img/places3.png',
			);

			// Loop to create posts
			for ($i = 1; $i <= 6; $i++) {
				$title = array(
					'Start your SOLO TRAVEL with Us!',
					'Embark on your SOLO ADVENTURE with Us!',
					'Your SOLO ESCAPE Begins Here!',
					'Siberian Hill',
					'Taj Mahal',
					'Paris'
				);

				$content = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since.';

				// Determine category and post index to use for title
				$category_index = ($i <= 3) ? 0 : 1; // First 3 for Slider, next 3 for Blog
				$post_title = $title[$i - 1]; // Adjust for zero-based index in title array

				// Create post object
				$my_post = array(
					'post_title'    => wp_strip_all_tags($post_title),
					'post_content'  => $content,
					'post_status'   => 'publish',
					'post_type'     => 'post',
					'post_category' => array($travel_vacation_categories[$category_index]), // Assign Slider to first 3, Blog to next 3
				);

				// Insert the post into the database
				$post_id = wp_insert_post($my_post);

				// Determine the category and set image URLs based on category
				if ($category_index === 0) { // Slider category
					$travel_vacation_image_url = get_template_directory_uri() . '/resource/img/slider.png';
					$travel_vacation_image_name = 'slider.png';
				} else { // PLaces category
					// Use different images for each post in PLaces category
					$places_image_index = $i - 4; // Get the correct index for the PLaces images array (4, 5, 6, 7 corresponds to 0, 1, 2, 3)
					$travel_vacation_image_url = $places_images[$places_image_index];
					$travel_vacation_image_name = basename($travel_vacation_image_url);
				}

				$travel_vacation_upload_dir = wp_upload_dir();
				$travel_vacation_image_data = file_get_contents($travel_vacation_image_url);
				$travel_vacation_unique_file_name = wp_unique_filename($travel_vacation_upload_dir['path'], $travel_vacation_image_name);
				$filename = basename($travel_vacation_unique_file_name);

				if (wp_mkdir_p($travel_vacation_upload_dir['path'])) {
					$file = $travel_vacation_upload_dir['path'] . '/' . $filename;
				} else {
					$file = $travel_vacation_upload_dir['basedir'] . '/' . $filename;
				}

				if ( ! function_exists( 'WP_Filesystem' ) ) {
					require_once( ABSPATH . 'wp-admin/includes/file.php' );
				}
				
				WP_Filesystem();
				global $wp_filesystem;
				
				if ( ! $wp_filesystem->put_contents( $file, $travel_vacation_image_data, FS_CHMOD_FILE ) ) {
					wp_die( 'Error saving file!' );
				}

				$wp_filetype = wp_check_filetype($filename, null);
				$attachment = array(
					'post_mime_type' => $wp_filetype['type'],
					'post_title'     => sanitize_file_name($filename),
					'post_content'   => '',
					'post_status'    => 'inherit'
				);

				$travel_vacation_attach_id = wp_insert_attachment($attachment, $file, $post_id);

				require_once(ABSPATH . 'wp-admin/includes/image.php');

				$travel_vacation_attach_data = wp_generate_attachment_metadata($travel_vacation_attach_id, $file);
				wp_update_attachment_metadata($travel_vacation_attach_id, $travel_vacation_attach_data);
				set_post_thumbnail($post_id, $travel_vacation_attach_id);
			}

		
		// ---------------------------------------- Slider --------------------------------------------------- //

			for($i=1; $i<=3; $i++) {
				set_theme_mod('travel_vacation_banner_button_label_'.$i,'Explore Now');
				set_theme_mod('travel_vacation_banner_button_link_'.$i,'');
			}

		// ---------------------------------------- Services --------------------------------------------------- //

			set_theme_mod('travel_vacation_places_section_heading_','Recommended Places to Visit');
			set_theme_mod('travel_vacation_places_section_text_','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.');
			set_theme_mod('travel_vacation_places_button_label_','Discover More');
			set_theme_mod('travel_vacation_places_button_link_','#');
			set_theme_mod('travel_vacation_enable_service_section',true);

			$placescount  = array('300+','30k+','200+');
			$placestext = array('Destinations','Tourists','Hotels');

			for($i=1; $i<=3; $i++) {
				set_theme_mod( 'travel_vacation_places_count_heading_'.$i, $placescount[$i-1] );
				set_theme_mod( 'travel_vacation_places_count_text_'.$i, $placestext[$i-1] );
			}


		// ---------------------------------------- Footer section --------------------------------------------------- //	
		
			set_theme_mod('travel_vacation_footer_background_color_setting','#000000');
			
		// ---------------------------------------- Related post_tag --------------------------------------------------- //	
		
			set_theme_mod('travel_vacation_post_related_post_label','Related Posts');
			set_theme_mod('travel_vacation_related_posts_count','3');


		$this->travel_vacation_customizer_primary_menu();
	}
}