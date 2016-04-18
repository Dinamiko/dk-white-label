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

		/*
		// Add settings link to plugins page	
		add_filter( 'plugin_action_links_' . plugin_basename( DKWL_PLUGIN_FILE ) , array( $this, 'add_settings_link' ) );
		*/		
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
		
		// main menu
		//$page = add_menu_page( 'DK White Label', 'DK White Label', 'manage_options', 'dkwl' . '_settings',  array( $this, 'settings_page' ) );	
		$page = add_options_page( __( 'DK White Label', 'dkwl' ) , __( 'DK White Label', 'dkwl' ) , 'manage_options' , 'dkwl' . '_settings' ,  array( $this, 'settings_page' ) );
		
		// settings assets
		add_action( 'admin_print_styles-' . $page, array( $this, 'settings_assets' ) );

		/*
		// Addons submenu
		add_submenu_page( 'dkwl' . '_settings', 'Addons', 'Addons', 'manage_options', 'dkwl-addons', array( $this, 'dkwl_addons_screen' ));
		// support
		add_submenu_page( 'dkwl' . '_settings', 'Support', 'Support', 'manage_options', 'dkwl-support', array( $this, 'dkwl_support_screen' ));
		*/

	}

	public function dkwl_support_screen() { ?>
		
		<div class="wrap">
			<h2>DK White Label Support</h2>

			<div class="dkwl-item">			
				<h3>Documentation</h3>
				<p>Everything you need to know for getting DK White Label up and running.</p>
				<p><a href="http://wp.dinamiko.com/demos/dkwl/documentation/" target="_blank">Go to Documentation</a></p>
			</div>

			<div class="dkwl-item">			
				<h3>Support</h3>
				<p>Having trouble? don't worry, create a ticket in the support forum.</p>
				<p><a href="https://wordpress.org/support/plugin/dk-white-label" target="_blank">Go to Support</a></p>
			</div>

		</div>

	<?php }

	public function dkwl_addons_screen() { ?>

		<div class="wrap">
			<h2>DK White Label Addons</h2>

			<div class="dkwl-item">			
				<h3>DK White Label Generator</h3>
				<p>Allows creating White Label documents with your selected WordPress content, also allows adding a Cover and a Table of contents.</p>
				<p><a href="http://codecanyon.net/item/dk-white-label-generator/13530581" target="_blank">Go to DK White Label Generator</a></p>
			</div>

		</div>

	<?php }

	/**
	 * Load settings JS & CSS
	 * @return void
	 */
	public function settings_assets () {

		// We're including the farbtastic script & styles here because they're needed for the colour picker
		// If you're not including a colour picker field then you can leave these calls out as well as the farbtastic dependency for the dkwl-admin-js script below
		wp_enqueue_style( 'farbtastic' );
    	wp_enqueue_script( 'farbtastic' );

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

		// branding
		$settings['branding'] = array(
			'title'	=> __( 'Branding', 'dkwl' ),
			'description'			=> '',
			'fields'				=> array(
				array(
					'id' 			=> 'branding_logo',
					'label'			=> __( 'Logo' , 'dkwl' ),
					'description'	=> '',
					'type'			=> 'image',
					'default'		=> '',
					'placeholder'	=> ''
				),
				array(
					'id' 			=> 'color_scheme_1',
					'label'			=> __( 'Color 1', 'dkpdfg' ),
					'description'	=> '',
					'type'			=> 'color',
					'default'		=> '#222'
				),
				array(
					'id' 			=> 'color_scheme_2',
					'label'			=> __( 'Color 2', 'dkpdfg' ),
					'description'	=> '',
					'type'			=> 'color',
					'default'		=> '#333'
				),
				array(
					'id' 			=> 'color_scheme_3',
					'label'			=> __( 'Color 3', 'dkpdfg' ),
					'description'	=> '',
					'type'			=> 'color',
					'default'		=> '#0073aa'
				),	
				array(
					'id' 			=> 'color_scheme_4',
					'label'			=> __( 'Color 4', 'dkpdfg' ),
					'description'	=> '',
					'type'			=> 'color',
					'default'		=> '#00a0d2'
				),
			)
		);
		// ...
		$settings['admin_elements'] = array(
			'title'	=> __( 'Admin elements', 'dkwl' ),
			'description'			=> '',
			'fields'				=> array(
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
					'id' 			=> 'admin_footer_text',
					'label'			=> __( 'Admin Footer text' , 'dkwl' ),
					'description'	=> '',
					'type'			=> 'text',
					'default'		=> '',
					'placeholder'	=> ''
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