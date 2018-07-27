<?php
namespace MangiTheme\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Textual_Feature_Block_7 {

	const ID = 7;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content' );

		The_Controls::start_section( $widget, 'features', $id );
		The_Controls::add_feature_textual( $widget, $id );
		The_Controls::end_section( $widget );

	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		?>
		<?php $widget->html('section_tag'); ?>
			<?php $widget->html('section_header'); ?>

			<div class="row gap-y">

				<?php foreach ( $settings['t7_features'] as $feature ) : ?>
				<div class="col-12 col-lg-4">
					<div class="card card-bordered">
						<div class="card-block">
							<h4 class="card-title"><?php echo $feature['title']; ?></h4>
							<p class="card-text"><?php echo $feature['text']; ?></p>
							<a class="fw-600 fs-12" href="<?php echo esc_url( $feature['more_link'] ); ?>"><?php echo $feature['more_text']; ?> <i class="fa fa-chevron-right fs-9 pl-5"></i></a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>

			</div>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag'); ?>
			<?php $widget->js('section_header'); ?>

			<div class="row gap-y">

				<# _.each( settings.t7_features, function( feature ) { #>
					<div class="col-12 col-lg-4">
						<div class="card card-bordered">
							<div class="card-block">
								<h4 class="card-title">{{{ feature.title }}}</h4>
								<p class="card-text">{{{ feature.text }}}</p>
								<a class="fw-600 fs-12" href="{{ feature.more_link }}">{{{ feature.more_text }}} <i class="fa fa-chevron-right fs-9 pl-5"></i></a>
							</div>
						</div>
					</div>
				<# } ); #>

			</div>

		</div></section>
		<?php
	}

}
