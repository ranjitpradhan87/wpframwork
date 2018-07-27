<?php
namespace MangiTheme\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Partner_Block_3 {

	const ID = 3;

	public function controls( $widget ) {
		$widget->set_id( self::ID );

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content', [
			'small'  => '',
			'header' => esc_html__( 'Partners', 'magnitheme' ),
			'lead'   => esc_html__( 'Join thousands of satisfied customers using our template globally.', 'magnitheme' ),
		] );

		$widget->panel( 'partners', [
			'images' => [
				magnitheme_get_img_uri( 'partner-1.png' ),
				magnitheme_get_img_uri( 'partner-2.png' ),
				magnitheme_get_img_uri( 'partner-3.png' ),
				magnitheme_get_img_uri( 'partner-4.png' ),
			]
		] );
	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->html('section_tag'); ?>
			<?php $widget->html('section_header'); ?>

			<div class="row gap-y partner">
				<?php $widget->html('gallery', [
					'prefix'  => '<div class="col-6 col-md-3">',
					'postfix' => '</div>',
				]); ?>
			</div>
		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag'); ?>
			<?php $widget->js('section_header'); ?>

			<div class="row gap-y partner">
				<?php $widget->js('gallery', [
					'prefix'  => '<div class="col-6 col-md-3">',
					'postfix' => '</div>',
				]); ?>
			</div>
		</div></section>
		<?php
	}

}
