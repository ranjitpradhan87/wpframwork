<?php
namespace MangiTheme\Widgets;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


class The_Feature_Block_3 {

	const ID = 3;

	public function controls( $widget ) {
		$widget->set_id( self::ID );
		$id = self::ID;

		$widget->panel( 'section', [
			'includes' => [ 'bg_gray' ],
		] );

		$widget->panel( 'header_content', [
			'small'  => esc_html__( 'Features', 'magnitheme' ),
			'header' => esc_html__( 'Full, Faster, Functional', 'magnitheme' ),
			'lead'   => esc_html__( 'Completely leverage other\'s covalent products whereas covalent manufactured products.', 'magnitheme' ),
		] );


		The_Controls::start_section( $widget, 'content', $id );

		$widget->add_control(
			't'. $id .'_number_1',
			[
				'label' => esc_html__( 'Number 1', 'magnitheme' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '100+', 'magnitheme' ),
				'label_block' => true,
				'separator' => 'before',
			]
		);

		$widget->add_control(
			't'. $id .'_text_1',
			[
				'label' => esc_html__( 'Text 1', 'magnitheme' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Screens', 'magnitheme' ),
				'label_block' => true,
			]
		);

		$widget->add_control(
			't'. $id .'_image_1',
			[
				'label' => esc_html__( 'Image 1', 'magnitheme' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => magnitheme_get_img_uri( 'header-color.jpg' ),
				],
			]
		);



		$widget->add_control(
			't'. $id .'_number_2',
			[
				'label' => esc_html__( 'Number 2', 'magnitheme' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '6.7x', 'magnitheme' ),
				'label_block' => true,
				'separator' => 'before',
			]
		);

		$widget->add_control(
			't'. $id .'_text_2',
			[
				'label' => esc_html__( 'Text 2', 'magnitheme' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Faster', 'magnitheme' ),
				'label_block' => true,
			]
		);

		$widget->add_control(
			't'. $id .'_image_2',
			[
				'label' => esc_html__( 'Image 2', 'magnitheme' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => magnitheme_get_img_uri( 'header-gradient.jpg' ),
				],
			]
		);



		$widget->add_control(
			't'. $id .'_number_3',
			[
				'label' => esc_html__( 'Number 3', 'magnitheme' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( '12', 'magnitheme' ),
				'label_block' => true,
				'separator' => 'before',
			]
		);

		$widget->add_control(
			't'. $id .'_text_3',
			[
				'label' => esc_html__( 'Text 3', 'magnitheme' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Mockups', 'magnitheme' ),
				'label_block' => true,
			]
		);

		$widget->add_control(
			't'. $id .'_image_3',
			[
				'label' => esc_html__( 'Image 3', 'magnitheme' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => magnitheme_get_img_uri( 'header-typing.jpg' ),
				],
			]
		);

		The_Controls::end_section( $widget );

	}



	public function html( $widget ) {
		$widget->set_id( self::ID );
		$settings = $widget->get_settings();
		?>
		<?php $widget->html('section_tag', [ 'class' => 'pb-0 overflow-hidden' ]); ?>
			<?php $widget->html('section_header'); ?>

      <div class="row gap-y text-center">

        <div class="col-md-4 d-flex flex-column">
          <div class="mb-60">
						<span class="text-info fs-50"><?php echo $settings['t3_number_1']; ?></span><br>
						<p><?php echo $settings['t3_text_1']; ?></p>
          </div>
          <div class="px-20 mt-auto">
						<?php if ($settings['t3_image_1']['url']): ?>
							<img class="shadow-2 opacity-80" src="<?php echo esc_url( $settings['t3_image_1']['url'] ); ?>" alt="<?php echo esc_attr( $settings['t3_text_1'] ); ?>" data-aos="slide-up" data-aos-delay="300">
						<?php endif; ?>
          </div>
        </div>

        <div class="col-md-4 d-flex flex-column">
          <div class="mb-7">
						<span class="text-info fs-50"><?php echo $settings['t3_number_2']; ?></span><br>
						<p><?php echo $settings['t3_text_2']; ?></p>
          </div>
          <div class="mt-auto">
						<?php if ($settings['t3_image_2']['url']): ?>
							<img class="shadow-4" src="<?php echo esc_url( $settings['t3_image_2']['url'] ); ?>" alt="<?php echo esc_attr( $settings['t3_text_2'] ); ?>" data-aos="slide-up">
						<?php endif; ?>
          </div>
        </div>

        <div class="col-md-4 d-flex flex-column">
          <div class="mb-7">
						<span class="text-info fs-50"><?php echo $settings['t3_number_3']; ?></span><br>
						<p><?php echo $settings['t3_text_3']; ?></p>
          </div>
          <div class="px-20 mt-auto">
						<?php if ($settings['t3_image_3']['url']): ?>
							<img class="shadow-2 opacity-80" src="<?php echo esc_url( $settings['t3_image_3']['url'] ); ?>" alt="<?php echo esc_attr( $settings['t3_text_3'] ); ?>" data-aos="slide-up" data-aos-delay="600">
						<?php endif; ?>
          </div>
        </div>

      </div>

		</div></section>
		<?php
	}



	public function javascript( $widget ) {
		$widget->set_id( self::ID );
		?>
		<?php $widget->js('section_tag', [ 'class' => 'pb-0 overflow-hidden' ]); ?>
			<?php $widget->js('section_header'); ?>


      <div class="row gap-y text-center">

        <div class="col-md-4 d-flex flex-column">
          <div class="mb-60">
						<span class="text-info fs-50">{{{ settings.t3_number_1 }}}</span><br>
						<p>{{{ settings.t3_text_1 }}}</p>
          </div>
          <div class="px-20 mt-auto">
						<# if ( settings.t3_image_1.url ) { #>
							<img class="shadow-2 opacity-80" src="{{ settings.t3_image_1.url }}" alt="{{ settings.t3_text_1 }}" data-aos="slide-up" data-aos-delay="300">
						<# } #>
          </div>
        </div>

        <div class="col-md-4 d-flex flex-column">
          <div class="mb-7">
						<span class="text-info fs-50">{{{ settings.t3_number_2 }}}</span><br>
						<p>{{{ settings.t3_text_2 }}}</p>
          </div>
          <div class="mt-auto">
						<# if ( settings.t3_image_2.url ) { #>
							<img class="shadow-4" src="{{ settings.t3_image_2.url }}" alt="{{ settings.t3_text_2 }}" data-aos="slide-up">
						<# } #>
          </div>
        </div>

        <div class="col-md-4 d-flex flex-column">
          <div class="mb-7">
						<span class="text-info fs-50">{{{ settings.t3_number_3 }}}</span><br>
						<p>{{{ settings.t3_text_3 }}}</p>
          </div>
          <div class="px-20 mt-auto">
						<# if ( settings.t3_image_3.url ) { #>
							<img class="shadow-2 opacity-80" src="{{ settings.t3_image_3.url }}" alt="{{ settings.t3_text_3 }}" data-aos="slide-up" data-aos-delay="600">
						<# } #>
          </div>
        </div>

      </div>


		</div></section>
		<?php
	}

}
