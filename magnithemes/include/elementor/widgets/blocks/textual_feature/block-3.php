<?php
namespace MangiTheme\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Textual_Feature_Block_3 {

	const ID = 3;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content', [
			'small'  => esc_html__( 'Features', 'magnitheme' ),
			'header' => esc_html__( 'More Than You Think', 'magnitheme' ),
			'lead'   => esc_html__( 'We are so excited and proud of our product. It\'s really easy to create a landing page for your awesome product.', 'magnitheme' ),
		] );

		The_Controls::start_section( $widget, 'features', $id );
		The_Controls::add_feature_img( $widget, $id );
		The_Controls::end_section( $widget );

	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		?>
		<?php $widget->html('section_tag'); ?>
			<?php $widget->html('section_header'); ?>

			<div class="row gap-y">

				<?php foreach ( $settings['t3_features'] as $feature ) : ?>
					<div class="col-12 col-md-6 col-xl-4 feature-1">
						<p class="feature-icon"><img src="<?php echo esc_url( $feature['image']['url'] ); ?>" alt="<?php echo esc_attr( $feature['title'] ); ?>"></p>
						<h5><?php echo $feature['title']; ?></h5>
						<p class="text-muted"><?php echo $feature['text']; ?></p>
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

				<# _.each( settings.t3_features, function( feature ) { #>
					<div class="col-12 col-md-6 col-xl-4 feature-1">
						<p class="feature-icon"><img src="{{ feature.image.url }}" alt="{{ settings.t3_header_text }}"></p>
						<h5>{{{ feature.title }}}</h5>
						<p class="text-muted">{{{ feature.text }}}</p>
					</div>
				<# } ); #>

			</div>

		</div></section>
		<?php
	}

}
