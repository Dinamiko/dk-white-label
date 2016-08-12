<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class DKWL_Settings {

	private static $_instance = null;
	public $parent = null;
	public $_token;
	public $base = '';
	public $settings = array();

	public function __construct ( $parent ) {

		$this->parent = $parent;

		$this->base = 'dkwl_';

		// Initialise settings
		add_action( 'init', array( $this, 'init_settings' ), 11 );

		// Register plugin settings
		add_action( 'admin_init' , array( $this, 'register_settings' ) );

		// Add settings page to menu
		add_action( 'admin_menu' , array( $this, 'add_menu_item' ) );

		// Add settings link to plugins page	
		add_filter( 'plugin_action_links_' . plugin_basename( DKWL_PLUGIN_FILE ) , array( $this, 'add_settings_link' ) );
	
	}

	/**
	 * Initialise settings
	 * @return void
	 */
	public function init_settings () {
		$this->settings = $this->settings_fields();
	}

	/**
	 * Adds DK White Label admin menu
	 * @return void
	 */
	public function add_menu_item () {
		$page = add_options_page( __( 'DK White Label', 'dkwl' ) , __( 'DK White Label', 'dkwl' ) , 'manage_options' , 'dkwl' . '_settings' ,  array( $this, 'settings_page' ) );
		add_action( 'admin_print_styles-' . $page, array( $this, 'settings_assets' ) );
	}

	/**
	 * Load settings JS & CSS
	 * @return void
	 */
	public function settings_assets () {

		/*
		// We're including the farbtastic script & styles here because they're needed for the colour picker
		// If you're not including a colour picker field then you can leave these calls out as well as the farbtastic dependency for the dkwl-admin-js script below
		wp_enqueue_style( 'farbtastic' );
    	wp_enqueue_script( 'farbtastic' );
    	*/

    	// We're including the WP media scripts here because they're needed for the image upload field
    	// If you're not including an image upload then you can leave this function call out
    	wp_enqueue_media();
  	
    	wp_register_script( 'dkwl' . '-settings-js', plugins_url( 'dk-white-label/assets/js/settings-admin.js' ), array( 'farbtastic', 'jquery' ), '1.0.0' );
    	wp_enqueue_script( 'dkwl' . '-settings-js' );   	
    	
	}

	/**
	 * Add settings link to plugin list table
	 * @param  array $links Existing links
	 * @return array 		Modified links
	 */
	public function add_settings_link ( $links ) {
		$settings_link = '<a href="admin.php?page=' . 'dkwl' . '_settings">' . __( 'Settings', 'dkwl' ) . '</a>';
  		array_push( $links, $settings_link );
  		return $links;
	}

	/**
	 * Build settings fields
	 * @return array Fields to be displayed on settings page
	 */
	private function settings_fields () {

		// login page
		$settings['loginpage'] = array(
			'title'	=> __( 'Login Screen', 'dkwl' ),
			'description'			=> '',
			'fields'				=> array(
				array(
					'id' 			=> 'loginpage_logo',
					'label'			=> __( 'Logo' , 'dkwl' ),
					'description'	=> '',
					'type'			=> 'image',
					'default'		=> '',
					'placeholder'	=> ''
				),
				array(
					'id' 			=> 'loginpage_bg_color',
					'label'			=> __( 'Background Color', 'dkwl' ),
					'description'	=> '',
					'type'			=> 'color',
					'default'		=> '#f1f1f1'
				),
			)
		);
		// elements
		$settings['admin_elements'] = array(
			'title'	=> __( 'UI Elements', 'dkwl' ),
			'description'			=> '',
			'fields'				=> array(
				array(
					'id' 			=> 'hide_frontend_toolbar',
					'label'			=> __( 'Hide Toolbar in front-end', 'dkwl' ),
					'description'	=> '',
					'type'			=> 'checkbox',
					'default'		=> ''
				),
				array(
					'id' 			=> 'hide_toolbar_elements',
					'label'			=> __( 'Hide Toolbar elements', 'dkwl' ),
					'description'	=> '',
					'type'			=> 'checkbox_multi',
					'options'		=> array( 'wp-logo' => 'WordPress logo',
											  'comments' => 'Comments',
											  'new-content' => 'New',
											),
					'default'		=> array()
				),
				array(
					'id' 			=> 'hide_menu_pages',
					'label'			=> __( 'Hide Menu pages', 'dkwl' ),
					'description'	=> '',
					'type'			=> 'checkbox_multi',
					'options'		=> array( 'index' => 'Dashboard', 
											  'edit' => 'Posts', 
											  'upload' => 'Media',
											  'page' => 'Pages', 
											  'edit-comments' => 'Comments',
											  'themes' => 'Appearance',
											  'plugins' => 'Plugins',
											  'users' => 'Users',
											  'tools' => 'Tools',
											  'options-general' => 'Settings',
											),
					'default'		=> array()
				),
				array(
					'id' 			=> 'hide_dashboard_metaboxes',
					'label'			=> __( 'Hide Dashboard Metaboxes', 'dkwl' ),
					'description'	=> '',
					'type'			=> 'checkbox_multi',
					'options'		=> array( 'welcome' => 'Welcome',
											  'dashboard_right_now' => 'At a Glance', 
											  'dashboard_quick_press' => 'Quick Draft', 
											  'dashboard_activity' => 'Activity',
											  'dashboard_primary' => 'WordPress News', 
											),
					'default'		=> array()
				),
				array(
					'id' 			=> 'hide_dashboard_help_tab',
					'label'			=> __( 'Hide Dashboard Help Tab', 'dkwl' ),
					'description'	=> '',
					'type'			=> 'checkbox',
					'default'		=> ''
				),
				array(
					'id' 			=> 'admin_footer_text',
					'label'			=> __( 'Footer Text' , 'dkwl' ),
					'description'	=> '',
					'type'			=> 'text',
					'default'		=> '',
					'placeholder'	=> ''
				),
			)
		);
		// color scheme
		$settings['admincolors'] = array(
			'title'	=> __( 'Color Scheme', 'dkwl' ),
			'description'			=> '',
			'fields'				=> array(
				array(
					'id' 			=> 'enable_custom_color_scheme',
					'label'			=> __( 'Enable Color Scheme', 'dkwl' ),
					'description'	=> '',
					'type'			=> 'checkbox',
					'default'		=> ''
				),
				array(
					'id' 			=> 'color_scheme_1',
					'label'			=> __( 'Color 1', 'dkwl' ),
					'description'	=> '',
					'type'			=> 'color',
					'default'		=> '#32373c'
				),
				array(
					'id' 			=> 'color_scheme_2',
					'label'			=> __( 'Color 2', 'dkwl' ),
					'description'	=> '',
					'type'			=> 'color',
					'default'		=> '#23282d'
				),
				array(
					'id' 			=> 'color_scheme_3',
					'label'			=> __( 'Color 3', 'dkwl' ),
					'description'	=> '',
					'type'			=> 'color',
					'default'		=> '#0073aa'
				),
				array(
					'id' 			=> 'color_scheme_4',
					'label'			=> __( 'Color 4', 'dkwl' ),
					'description'	=> '',
					'type'			=> 'color',
					'default'		=> '#999'
				),
				array(
					'id' 			=> 'color_scheme_link',
					'label'			=> __( 'Color Link', 'dkwl' ),
					'description'	=> '',
					'type'			=> 'color',
					'default'		=> '#0073aa'
				),
				array(
					'id' 			=> 'color_scheme_link_hover',
					'label'			=> __( 'Color Link Hover', 'dkwl' ),
					'description'	=> '',
					'type'			=> 'color',
					'default'		=> '#0096dd'
				),
			)
		);

		$settings = apply_filters( 'dkwl' . '_settings_fields', $settings );
		return $settings;

	}

	/**
	 * Register plugin settings
	 * @return void
	 */
	public function register_settings () {
		if ( is_array( $this->settings ) ) {

			// Check posted/selected tab
			$current_section = '';
			if ( isset( $_POST['tab'] ) && $_POST['tab'] ) {
				$current_section = $_POST['tab'];
			} else {
				if ( isset( $_GET['tab'] ) && $_GET['tab'] ) {
					$current_section = $_GET['tab'];
				}
			}

			foreach ( $this->settings as $section => $data ) {

				if ( $current_section && $current_section != $section ) continue;

				// Add section to page
				add_settings_section( $section, $data['title'], array( $this, 'settings_section' ), 'dkwl' . '_settings' );

				foreach ( $data['fields'] as $field ) {

					// Validation callback for field
					$validation = '';
					if ( isset( $field['callback'] ) ) {
						$validation = $field['callback'];
					}

					// Register field
					$option_name = $this->base . $field['id'];
					register_setting( 'dkwl' . '_settings', $option_name, $validation );

					// Add field to page
					add_settings_field( $field['id'], $field['label'], array( $this->parent->admin, 'display_field' ), 'dkwl' . '_settings', $section, array( 'field' => $field, 'prefix' => $this->base ) );
				}

				if ( ! $current_section ) break;
			}
		}
	}

	public function settings_section ( $section ) {
		$html = '<p> ' . $this->settings[ $section['id'] ]['description'] . '</p>' . "\n";
		echo $html;
	}

	/**
	 * Load settings page content
	 * @return void
	 */
	public function settings_page () {

		// Build page HTML
		$html = '<div class="wrap" id="' . 'dkwl' . '_settings">' . "\n";
			$html .= '<h2>' . __( 'DK White Label' , 'dkwl' ) . '</h2>' . "\n";

			$tab = '';
			if ( isset( $_GET['tab'] ) && $_GET['tab'] ) {
				$tab .= $_GET['tab'];
			}

			// Show page tabs
			if ( is_array( $this->settings ) && 1 < count( $this->settings ) ) {

				$html .= '<h2 class="nav-tab-wrapper">' . "\n";

				$c = 0;
				foreach ( $this->settings as $section => $data ) {

					// Set tab class
					$class = 'nav-tab';
					if ( ! isset( $_GET['tab'] ) ) {
						if ( 0 == $c ) {
							$class .= ' nav-tab-active';
						}
					} else {
						if ( isset( $_GET['tab'] ) && $section == $_GET['tab'] ) {
							$class .= ' nav-tab-active';
						}
					}

					// Set tab link
					$tab_link = add_query_arg( array( 'tab' => $section ) );
					if ( isset( $_GET['settings-updated'] ) ) {
						$tab_link = remove_query_arg( 'settings-updated', $tab_link );
					}

					// Output tab
					$html .= '<a href="' . $tab_link . '" class="' . esc_attr( $class ) . '">' . esc_html( $data['title'] ) . '</a>' . "\n";

					++$c;
				}

				$html .= '</h2>' . "\n";
			}

			$html .= '<form method="post" action="options.php" enctype="multipart/form-data">' . "\n";

				// Get settings fields
				ob_start();
				settings_fields( 'dkwl' . '_settings' );
				do_settings_sections( 'dkwl' . '_settings' );
				$html .= ob_get_clean();

				$html .= '<p class="submit">' . "\n";
					$html .= '<input type="hidden" name="tab" value="' . esc_attr( $tab ) . '" />' . "\n";
					$html .= '<input name="Submit" type="submit" class="button-primary" value="' . esc_attr( __( 'Save Settings' , 'dkwl' ) ) . '" />' . "\n";
				$html .= '</p>' . "\n";
			$html .= '</form>' . "\n";

		$html .= '</div>' . "\n";

		echo $html;
	}

	/**
	 * Main DKWL_Settings Instance
	 */
	public static function instance ( $parent ) {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self( $parent );
		}
		return self::$_instance;
	} // End instance()

	/**
	 * Cloning is forbidden.
	 */
	public function __clone () {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), $this->parent->_version );
	} // End __clone()

	/**
	 * Unserializing instances of this class is forbidden.
	 */
	public function __wakeup () {
		_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?' ), $this->parent->_version );
	} // End __wakeup()

}