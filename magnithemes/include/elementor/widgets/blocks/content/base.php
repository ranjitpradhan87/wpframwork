<?php
namespace MangiTheme\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Content extends The_Widget {

	public function get_name() {
		$this->load_blocks();
		return 'the-content';
	}

	public function get_title() {
		return esc_html__( 'Content', 'magnitheme' );
	}

	public function get_icon() {
		return 'eicon-flip-box';
	}

}
