<?php
namespace MangiTheme\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Feature_Block_15 {

	const ID = 15;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_color', 'switch_sides', 'section_inverse' ],
			'bg_color' => '#4f8cf2',
			'inverse' => true,
		] );


		The_Controls::start_section( $widget, 'content', $id );
		The_Controls::add_header_text( $widget, $id, [ 'default' => esc_html__( 'Give a Fresh Design to Your SaaS', 'magnitheme' ) ] );
		The_Controls::add_text( $widget, $id, [ 'default' => esc_html__( 'Interactively productize worldwide potentialities before long-term high-impact initiatives. Completely disintermediate excellent leadership skills with client-centric content.', 'magnitheme' ) ] );
		The_Controls::add_image( $widget, $id, [ 'default' => magnitheme_get_img_uri('bg-laptop.jpg') ] );
		The_Controls::add_btn_color( $widget, $id, [
			'default' => 'btn-danger',
			'label'   => 'Button color',
		] );
		The_Controls::add_video_link( $widget, $id, [ 'default' => 'https://www.youtube.com/watch?v=ah4pcPbRi2M' ] );
		The_Controls::end_section( $widget );

	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		$image = $settings['t15_image']['url'];
		?>
		<?php $widget->html('section_tag', [ 'class' => 'p-0', 'wide_container' => true ]); ?>

      <div class="row no-gap">

				<?php if ( 'yes' !== $settings['t15_switch_sides'] ) : ?>

	        <div class="col-12 offset-md-1 col-md-6 bg-img order-md-last video-btn-wrapper" style="background-image: url(<?php echo esc_url( $image ); ?>); min-height: 300px;" data-overlay="4">
	          <a class="btn btn-lg btn-circular <?php echo esc_attr( $settings['t15_btn_color'] ); ?>" href="<?php echo esc_url( $settings['t15_video_link'] ); ?>" data-provide="lightbox"><i class="fa fa-play"></i></a>
	        </div>

	        <div class="offset-1 col-10 col-md-4 py-90 order-md-first">
	          <h5><?php echo $settings['t15_header_text']; ?></h5>
	          <p><?php echo $settings['t15_text']; ?></p>
	        </div>

				<?php else: ?>

	        <div class="col-12 offset-md-1 col-md-6 bg-img video-btn-wrapper" style="background-image: url(<?php echo esc_url( $image ); ?>); min-height: 300px;" data-overlay="4">
	          <a class="btn btn-lg btn-circular <?php echo esc_attr( $settings['t15_btn_color'] ); ?>" href="<?php echo esc_url( $settings['t15_video_link'] ); ?>" data-provide="lightbox"><i class="fa fa-play"></i></a>
	        </div>

	        <div class="offset-1 col-10 col-md-4 py-90">
	          <h5><?php echo $settings['t15_header_text']; ?></h5>
	          <p><?php echo $settings['t15_text']; ?></p>
	        </div>

				<?php endif; ?>

      </div>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag', [ 'class' => 'p-0', 'wide_container' => true ]); ?>

			<div class="row">

				<# if ( 'yes' !== settings.t15_switch_sides ) { #>

	        <div class="col-12 offset-md-1 col-md-6 bg-img order-md-last video-btn-wrapper" style="background-image: url({{ settings.t15_image.url }}); min-height: 300px;" data-overlay="4">
	          <a class="btn btn-lg btn-circular {{ settings.t15_btn_color }}" href="{{ settings.t15_video_link }}" data-provide="lightbox"><i class="fa fa-play"></i></a>
	        </div>

	        <div class="offset-1 col-10 col-md-4 py-90 order-md-first">
	          <h5>{{{ settings.t15_header_text }}}</h5>
	          <p>{{{ settings.t15_text }}}</p>
	        </div>

				<# } else { #>

	        <div class="col-12 offset-md-1 col-md-6 bg-img video-btn-wrapper" style="background-image: url({{ settings.t15_image.url }}); min-height: 300px;" data-overlay="4">
	          <a class="btn btn-lg btn-circular {{ settings.t15_btn_color }}" href="{{ settings.t15_video_link }}" data-provide="lightbox"><i class="fa fa-play"></i></a>
	        </div>

	        <div class="offset-1 col-10 col-md-4 py-90">
	          <h5>{{{ settings.t15_header_text }}}</h5>
	          <p>{{{ settings.t15_text }}}</p>
	        </div>

				<# } #>

			</div>

		</div></section>
		<?php
	}

}
