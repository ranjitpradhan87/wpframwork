<?php
namespace MangiTheme\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Editor extends The_Widget {

	public function get_name() {
		$this->load_blocks();
		return 'the-editor';
	}

	public function get_title() {
		return esc_html__( 'Editor', 'magnitheme' );
	}

	public function get_icon() {
		return 'eicon-align-left';
	}

}
