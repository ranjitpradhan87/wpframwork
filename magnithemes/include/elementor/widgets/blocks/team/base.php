<?php
namespace MangiTheme\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Team extends The_Widget {

	public function get_name() {
		$this->load_blocks();
		return 'the-team';
	}

	public function get_title() {
		return esc_html__( 'Team', 'magnitheme' );
	}

	public function get_icon() {
		return 'eicon-person';
	}

}
