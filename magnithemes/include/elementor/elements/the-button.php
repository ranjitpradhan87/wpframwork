<?php
namespace MangiTheme\Elements;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Button extends Widget_Base {

	public function get_name() {
		return 'the-button';
	}

	public function need_common() {
		return false;
	}

	public function get_title() {
		return __( 'Button', 'magnitheme' );
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public function get_categories() {
		return [ 'basic' ];
	}


	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Basic', 'magnitheme' ),
				'tab' => Controls_Manager::TAB_SETTINGS,
			]
		);

		$this->add_control(
			'text',
			[
				'label' => __( 'Text', 'magnitheme' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Button Text', 'magnitheme' ),
				'placeholder' => __( 'Button Text', 'magnitheme' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'magnitheme' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'magnitheme' ),
				'tab' => Controls_Manager::TAB_SETTINGS,
			]
		);

		$this->add_control(
			'outline',
			[
				'label' => __( 'Outline', 'magnitheme' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'No', 'magnitheme' ),
				'label_on' => __( 'Yes', 'magnitheme' ),
				'return_value' => 'btn-outline',
			]
		);

		$this->add_control(
			'round',
			[
				'label' => __( 'Rounded', 'magnitheme' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'No', 'magnitheme' ),
				'label_on' => __( 'Yes', 'magnitheme' ),
				'return_value' => 'btn-round',
			]
		);

		$this->add_control(
			'circle',
			[
				'label' => __( 'Circle', 'magnitheme' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'No', 'magnitheme' ),
				'label_on' => __( 'Yes', 'magnitheme' ),
				'return_value' => 'btn-circular',
			]
		);

		$this->add_control(
			'google',
			[
				'label' => __( 'Google Play badge', 'magnitheme' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'No', 'magnitheme' ),
				'label_on' => __( 'Yes', 'magnitheme' ),
				'return_value' => magnitheme_get_img_uri( 'badge-google.png' ),
			]
		);

		$this->add_control(
			'apple',
			[
				'label' => __( 'Apple Store badge', 'magnitheme' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'No', 'magnitheme' ),
				'label_on' => __( 'Yes', 'magnitheme' ),
				'return_value' => magnitheme_get_img_uri( 'badge-apple.png' ),
			]
		);

		$this->add_control(
			'color',
			[
				'label' => __( 'Color', 'magnitheme' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'primary',
				'options' => [
					'primary'   => __( 'Default', 'magnitheme' ),
					'secondary' => __( 'Secondary', 'magnitheme' ),
					'info'      => __( 'Info', 'magnitheme' ),
					'success'   => __( 'Success', 'magnitheme' ),
					'warning'   => __( 'Warning', 'magnitheme' ),
					'danger'    => __( 'Danger', 'magnitheme' ),
					'white'     => __( 'White', 'magnitheme' ),
					'dark'      => __( 'Dark', 'magnitheme' ),
				],
			]
		);

		$this->add_control(
			'size',
			[
				'label' => __( 'Size', 'magnitheme' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'md',
				'options' => [
					'xs' => __( 'Extra Small', 'magnitheme' ),
					'sm' => __( 'Small', 'magnitheme' ),
					'md' => __( 'Medium', 'magnitheme' ),
					'lg' => __( 'Large', 'magnitheme' ),
					'xl' => __( 'Extra Large', 'magnitheme' ),
				],
			]
		);



		$this->end_controls_section();



	}

	protected function render() {
		$settings = $this->get_settings();

		if ( ! empty( $settings['google'] ) ) {
			$this->add_render_attribute( 'link', 'href', $settings['link']['url'] );

			if ( ! empty( $settings['link']['is_external'] ) ) {
				$this->add_render_attribute( 'link', 'target', '_blank' );
			}

			echo '<a '. $this->get_render_attribute_string( 'link' ) .'><img src="'. $settings['google'] .'" alt="download on google play"></a>';
			return;
		}

		if ( ! empty( $settings['apple'] ) ) {
			$this->add_render_attribute( 'link', 'href', $settings['link']['url'] );

			if ( ! empty( $settings['link']['is_external'] ) ) {
				$this->add_render_attribute( 'link', 'target', '_blank' );
			}

			echo '<a '. $this->get_render_attribute_string( 'link' ) .'><img src="'. $settings['apple'] .'" alt="download on app store"></a>';
			return;
		}

		$this->add_render_attribute( 'button', 'class', 'btn' );
		$this->add_render_attribute( 'button', 'class', 'btn-'. $settings['color'] );
		$this->add_render_attribute( 'button', 'class', 'btn-'. $settings['size'] );

		$this->add_render_attribute( 'button', 'class', $settings['round'] );
		$this->add_render_attribute( 'button', 'class', $settings['outline'] );
		$this->add_render_attribute( 'button', 'class', $settings['circle'] );

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_render_attribute( 'button', 'href', $settings['link']['url'] );

			if ( ! empty( $settings['link']['is_external'] ) ) {
				$this->add_render_attribute( 'button', 'target', '_blank' );
			}

			echo '<a '. $this->get_render_attribute_string( 'button' ) .'>'. $settings['text'] .'</a>';
		}
		else {
			echo '<button '. $this->get_render_attribute_string( 'button' ) .'>'. $settings['text'] .'</button>';
		}



	}

	protected function _content_template() {
		?>
		<# if ( '' !== settings.google ) { #>
			<a href="{{ settings.link.url }}"><img src="{{ settings.google }}"></a>

		<# } else if ( '' !== settings.apple ) { #>
			<a href="{{ settings.link.url }}"><img src="{{ settings.apple }}"></a>

		<# } else { #>
			<a class="btn btn-{{ settings.size }} btn-{{ settings.color }} {{ settings.round }} {{ settings.outline }} {{ settings.circle }}" href="{{ settings.link.url }}">{{{ settings.text }}}</a>
		<# } #>
		<?php
	}
}
