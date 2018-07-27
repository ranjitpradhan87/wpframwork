<?php
namespace MangiTheme\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Feature_Block_17 {

	const ID = 17;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_image', 'overlay', 'section_inverse' ],
      'bg_image' => magnitheme_get_img_uri('bg-laptop.jpg'),
      'overlay'  => 6,
      'inverse'  => true,
		] );

		$widget->panel( 'header_content', [
			'small'  => '',
			'header' => esc_html__( 'Watch Video', 'magnitheme' ),
			'lead'   => esc_html__( 'Explore the best SaaS template in the market in a short 1-minute video.', 'magnitheme' ),
		] );

		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_image( $widget, $id, [ 'default' => magnitheme_get_img_uri('bg-laptop.jpg') ] );
		The_Controls::add_btn_color( $widget, $id, [
			'default' => 'btn-white',
			'label'   => 'Button color',
		] );
		The_Controls::add_video_link( $widget, $id, [ 'default' => 'https://www.youtube.com/watch?v=ah4pcPbRi2M' ] );
		The_Controls::end_section( $widget );

	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		$image = $settings['t17_image']['url'];

		?>
		<?php $widget->html('section_tag', [ 'class' => 'bg-img' ]); ?>
			<?php $widget->html('section_header'); ?>

      <div class="text-center mb-60">
        <a class="btn btn-lg btn-circular <?php echo esc_attr( $settings['t17_btn_color'] ); ?>" href="<?php echo esc_url( $settings['t17_video_link'] ); ?>" data-provide="lightbox"><i class="fa fa-play"></i></a>
      </div>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag', [ 'class' => 'bg-img' ]); ?>
			<?php $widget->js('section_header'); ?>

      <div class="text-center mb-60">
        <a class="btn btn-lg btn-circular {{ settings.t17_btn_color }}" href="{{ settings.t17_video_link }}" data-provide="lightbox"><i class="fa fa-play"></i></a>
      </div>

		</div></section>
		<?php
	}

}
