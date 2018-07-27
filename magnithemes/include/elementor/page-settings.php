<?php
namespace MangiTheme;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Main Plugin Class. Register new elementor widget.
 */
class Page_Settings {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->add_actions();
	}


	/**
	 * Add Actions
	 */
	private function add_actions() {

		add_action( 'elementor/element/page-settings-'. get_the_ID() .'/section_page_settings/after_section_end', function( $element, $args ) {
			$this->topbar_settings( $element );
			$this->custom_css_settings( $element );
			$this->custom_js_settings( $element );
			$this->og_settings( $element );
		}, 10, 2 );

		add_action( 'elementor/element/page-settings-'. get_the_ID() .'/section_page_settings/before_section_end', function( $element, $args ) {

			$element->add_control(
				'page_body_class',
				[
					'label' => esc_html__( 'Extra body classes', 'magnitheme' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'description' => esc_html__( 'Space separated class names', 'magnitheme' ),
					'label_block' => true,
				]
			);
		}, 10, 2 );

	}



	/**
	 * Topbar configs.
	 */
	private function topbar_settings( $element ) {

		$post_id = get_the_ID();
		$page = \Elementor\PageSettings\Manager::get_page( $post_id ); 

		$element->start_controls_section(
			'topbar_settings_section',
			[
				'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
				'label' => esc_html__( 'Topbar settings', 'magnitheme' ),
			]
		);

		$element->add_control(
		  'html_msg',
		  [
		     'type'    => \Elementor\Controls_Manager::RAW_HTML,
		     'raw' => '<i>'. esc_html__( 'Refresh is required to see the changes.', 'magnitheme' ) .'</i>',
			 'content_classes' => '',
		  ]
		);

		$menu_arr = array();
		$menu_arr[ 'default' ] = esc_html__( 'Default', 'magnitheme' );
		$menu_arr[ 'none' ] = esc_html__( 'None', 'magnitheme' );

		$menus = get_terms( 'nav_menu' );
		foreach( $menus as $menu ) {
		  $menu_arr[ $menu->slug ] = $menu->name;
		}

		$element->add_control(
			'topbar_menu',
			[
				'label' => esc_html__( 'Menu', 'magnitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $menu_arr,
				'default' => 'default',
			]
		);

		$element->add_control(
			'topbar_is_sticky',
			[
				'label' => esc_html__( 'Sticky topbar', 'magnitheme' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'No', 'magnitheme' ),
				'label_on' => esc_html__( 'Yes', 'magnitheme' ),
				'default' => 'topbar-sticky',
				'return_value' => 'topbar-sticky',
			]
		);

		$element->add_control(
			'topbar_inverse',
			[
				'label' => esc_html__( 'Light text color', 'magnitheme' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'No', 'magnitheme' ),
				'label_on' => esc_html__( 'Yes', 'magnitheme' ),
				'default' => 'topbar-inverse',
				'return_value' => 'topbar-inverse',
			]
		);

		$element->add_control(
			'topbar_breakpoint',
			[
				'label' => esc_html__( 'Breakpoint', 'magnitheme' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'xs'    => [
						'title' => esc_html__( 'Extra small', 'magnitheme' ),
						'icon' => 'fa fa-mobile',
					],
					'sm' => [
						'title' => esc_html__( 'Small', 'magnitheme' ),
						'icon' => 'fa fa-tablet',
					],
					'md' => [
						'title' => esc_html__( 'Medium', 'magnitheme' ),
						'icon' => 'fa fa-laptop',
					],
					'lg' => [
						'title' => esc_html__( 'Large', 'magnitheme' ),
						'icon' => 'fa fa-tv',
					],
				],
				'default' => 'md',
			]
		);


		$element->add_control(
			'topbar_container',
			[
				'label' => esc_html__( 'Container', 'magnitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'container',
				'options' => [
					'container'       => esc_html__( 'Default', 'magnitheme' ),
					'container-fluid' => esc_html__( 'Fluid', 'magnitheme' ),
					'container-wide'  => esc_html__( 'Wide', 'magnitheme' ),
				],
			]
		);


		/**
		 * Button 1
		 */
		$element->add_control(
			'topbar_btn_1_text',
			[
				'label' => esc_html__( 'Button 1 text', 'magnitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
				'separator' => 'before',
			]
		);


		$element->add_control(
			'topbar_btn_1_link',
			[
				'label' => esc_html__( 'Button 1 link', 'magnitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '',
			]
		);

		$element->add_control(
			'topbar_btn_1_color',
			[
				'label' => esc_html__( 'Button 1 color', 'magnitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'white',
				'options' => [
					'primary'   => esc_html__( 'Primary', 'magnitheme' ),
					'secondary' => esc_html__( 'Secondary', 'magnitheme' ),
					'info'      => esc_html__( 'Info', 'magnitheme' ),
					'success'   => esc_html__( 'Success', 'magnitheme' ),
					'warning'   => esc_html__( 'Warning', 'magnitheme' ),
					'danger'    => esc_html__( 'Danger', 'magnitheme' ),
					'white'     => esc_html__( 'White', 'magnitheme' ),
					'dark'      => esc_html__( 'Dark', 'magnitheme' ),
				],
			]
		);

		$element->add_control(
			'topbar_btn_1_outline',
			[
				'label' => esc_html__( 'Outline 1 style', 'magnitheme' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'No', 'magnitheme' ),
				'label_on' => esc_html__( 'Yes', 'magnitheme' ),
				'default' => '',
				'return_value' => 'btn-outline',
			]
		);


		/**
		 * Button 2
		 */
		$element->add_control(
			'topbar_btn_2_text',
			[
				'label' => esc_html__( 'Button 2 text', 'magnitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
				'separator' => 'before',
			]
		);


		$element->add_control(
			'topbar_btn_2_link',
			[
				'label' => esc_html__( 'Button 2 link', 'magnitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '',
			]
		);

		$element->add_control(
			'topbar_btn_2_color',
			[
				'label' => esc_html__( 'Button 2 color', 'magnitheme' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'white',
				'options' => [
					'primary'   => esc_html__( 'Primary', 'magnitheme' ),
					'secondary' => esc_html__( 'Secondary', 'magnitheme' ),
					'info'      => esc_html__( 'Info', 'magnitheme' ),
					'success'   => esc_html__( 'Success', 'magnitheme' ),
					'warning'   => esc_html__( 'Warning', 'magnitheme' ),
					'danger'    => esc_html__( 'Danger', 'magnitheme' ),
					'white'     => esc_html__( 'White', 'magnitheme' ),
					'dark'      => esc_html__( 'Dark', 'magnitheme' ),
				],
			]
		);

		$element->add_control(
			'topbar_btn_2_outline',
			[
				'label' => esc_html__( 'Outline 2 style', 'magnitheme' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'No', 'magnitheme' ),
				'label_on' => esc_html__( 'Yes', 'magnitheme' ),
				'default' => 'btn-outline',
				'return_value' => 'btn-outline',
			]
		);


		$element->end_controls_section();

	}



	/**
	 * Custom CSS code for page
	 */
	private function custom_css_settings( $element ) {

		$element->start_controls_section(
			'custom_css_settings_section',
			[
				'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
				'label' => esc_html__( 'Custom CSS', 'magnitheme' ),
			]
		);


		/**
		 * Input
		 */
		$element->add_control(
			'page_custom_css',
			[
				//'label' => esc_html__(''),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'description' => esc_html__( 'Requires page reload', 'magnitheme' ),
			]
		);


		$element->end_controls_section();

	}



	/**
	 * Custom JS code for page
	 */
	private function custom_js_settings( $element ) {

		$element->start_controls_section(
			'custom_js_settings_section',
			[
				'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
				'label' => esc_html__( 'Custom Javascript', 'magnitheme' ),
			]
		);


		/**
		 * Input
		 */
		$element->add_control(
			'page_custom_js',
			[
				//'label' => esc_html__(''),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
				'description' => esc_html__( 'Requires page reload.<br>Please note that JS error can break your page\'s functionality.', 'magnitheme' ),
			]
		);


		$element->end_controls_section();

	}




	/**
	 * Open Graph Meta tags.
	 */
	private function og_settings( $element ) {

		$element->start_controls_section(
			'og_settings_section',
			[
				'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
				'label' => esc_html__( 'Open Graph meta tags', 'magnitheme' ),
			]
		);


		/**
		 * Image
		 */
		$element->add_control(
			'og_image',
			[
				'label' => esc_html__( 'Image', 'magnitheme' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);


		/**
		 * Title
		 */
		$element->add_control(
			'og_title',
			[
				'label' => esc_html__( 'Title', 'magnitheme' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);


		/**
		 * Description
		 */
		$element->add_control(
			'og_description',
			[
				'label' => esc_html__( 'Description', 'magnitheme' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);


		$element->end_controls_section();

	}


}


new Plugin();
