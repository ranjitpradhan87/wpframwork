<?php
/**
 * _s Theme Customizer
 *
 * @package magnithemes
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function magnithemescustomize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'magnithemescustomize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'magnithemescustomize_partial_blogdescription',
		) );
	}

    //  =============================
    //  = Magnitheme Setting =
    //  =============================


    //  =============================
    //  = Header Setting =
    //  =============================


   $wp_customize->add_section('magnitheme_header_setting_sec', array(
        'title'    => __('Header Option', 'magnitheme'),
        'priority' => 25,
        'description' => '',
    ));
 
    $wp_customize->add_setting('magnitheme_header_setting', array(
        'default'        => 'headerone'
    ));
 
    $wp_customize->add_control('magnitheme_header_setting', array(
        'label'      => __('Header Design', 'magnitheme'),
        'section'    => 'magnitheme_header_setting_sec',
        'settings'   => 'magnitheme_header_setting',
        'type'       => 'radio',
        'choices'    => array(
            'headerone' => 'Header Default',
            'headertwo' => 'Header Two',
            'headerthree' => 'Header Three',
            'headerfour' => 'Header Four',
            'headerfive' => 'Header Five',
            'headersix' => 'Header Six',
            'headerseven' => 'Header Seven',
            'headereight' => 'Header Eight',
        ),
    ));

    //  =============================
    //  = Layout Setting =
    //  =============================

   $wp_customize->add_section('magnitheme_layout_setting', array(
        'title'    => __('Layout Option', 'magnitheme'),
        'priority' => 30,
        'description' => '',
    ));
 
    $wp_customize->add_setting('magnitheme_layouts', array(
        'default'        => 'layoutone'
    ));
 
    $wp_customize->add_control('magnitheme_layouts', array(
        'label'      => __('Layout Design', 'magnitheme'),
        'section'    => 'magnitheme_layout_setting',
        'settings'   => 'magnitheme_layouts',
        'type'       => 'radio',
        'choices'    => array(
            'layoutdef' => 'Layout Default',
            'layoutone' => 'Layout One',
            'layouttwo' => 'Layout Two',
            'layoutthree' => 'Layout Three',
        ),
    ));


    // General
    //


   $wp_customize->add_section('section_footer_general', array(
        'title'    => __('Footer Option', 'magnitheme'),
        'priority' => 30,
        'description' => '',
    ));
    // Layout
    $wp_customize->add_setting( 'footer_layout', array(
      'default'           => '1',
    ) );
    $wp_customize->add_control( 'footer_layout', array(
      'label'   => esc_html__( 'Footer layout', 'magnitheme' ),
      'description'   => __( 'See available layouts in <a href="http://thetheme.io/thesaas/block-footer.html">here</a>', 'magnitheme' ),
      'type'    => 'select',
      'settings' => 'footer_layout',
      'section' => 'section_footer_general',
      'choices' => [
        '1' => esc_html__( "Layout 1", 'magnitheme' ),
        '2' => esc_html__( "Layout 2", 'magnitheme' ),
        '3' => esc_html__( "Layout 3", 'magnitheme' ),
        '4' => esc_html__( "Layout 4", 'magnitheme' ),
        '5' => esc_html__( "Layout 5", 'magnitheme' ),
      ],
    ));



    // Footer 1
    // 
    $wp_customize->add_section( 'section_footer_1', array(
      'title' => esc_html__( 'Footer 1', 'magnitheme' ),
      'section' => 'section_footer_general'
    ));

    // Copyright text
    $wp_customize->add_setting( 'footer1_copyright', [
      'default' => esc_html__( '', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer1_copyright', array(
      'label' => esc_html__( 'Copyright text', 'magnitheme' ),
      'description' => esc_html__( 'A text to display in the second row', 'magnitheme' ),
      'section' => 'section_footer_1',
      'type' => 'textarea',
    ));


    // Footer 2
    // 
    $wp_customize->add_section( 'section_footer_2', array(
      'title' => esc_html__( 'Footer 2', 'magnitheme' ),
      'section' => 'section_footer_general'
    ));

    // Copyright text
    $wp_customize->add_setting( 'footer2_copyright', [
      'default' => esc_html__( 'Copyright © 2017 TheThemeio. All rights reserved.', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer2_copyright', array(
      'label' => esc_html__( 'Copyright text', 'magnitheme' ),
      'section' => 'section_footer_2',
      'type' => 'textarea',
    ));


    // Footer 3
    // 
    $wp_customize->add_section( 'section_footer_3', array(
      'title' => esc_html__( 'Footer 3', 'magnitheme' ),
      'section' => 'section_footer_general'
    ));

    // Text
    $wp_customize->add_setting( 'footer3_text', [
      'default' => esc_html__( 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template; backed for entrepreneurs and powered by Bootstrap 4.', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer3_text', array(
      'label' => esc_html__( 'Text', 'magnitheme' ),
      'section' => 'section_footer_3',
      'type' => 'textarea',
    ));


    // Footer 4
    // 
    $wp_customize->add_section( 'section_footer_4', array(
      'title' => esc_html__( 'Footer 4', 'magnitheme' ),
      'section' => 'section_footer_general'
    ));

    // Col 1 - Title
    $wp_customize->add_setting( 'footer4_col1_title', [
      'default' => esc_html__( 'magnitheme', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer4_col1_title', array(
      'label' => esc_html__( 'Column 1 - Title', 'magnitheme' ),
      'section' => 'section_footer_4',
      'type' => 'text',
    ));

    // Col 1 - Text
    $wp_customize->add_setting( 'footer4_col1_text', [
      'default' => esc_html__( 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template; backed for entrepreneurs and powered by Bootstrap 4.', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer4_col1_text', array(
      'label' => esc_html__( 'Column 1 - Text', 'magnitheme' ),
      'section' => 'section_footer_4',
      'type' => 'textarea',
    ));

    // Col 1 - Copyright
    $wp_customize->add_setting( 'footer4_col1_copyright', [
      'default' => esc_html__( 'Copyright © 2017 TheThemeio. All rights reserved.', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer4_col1_copyright', array(
      'label' => esc_html__( 'Column 1 - Copyright', 'magnitheme' ),
      'section' => 'section_footer_4',
      'type' => 'textarea',
    ));


    // Col 2 - Title
    $wp_customize->add_setting( 'footer4_col2_title', [
      'default' => esc_html__( 'Company', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer4_col2_title', array(
      'label' => esc_html__( 'Column 2 - Title', 'magnitheme' ),
      'description' => esc_html__( 'Primary Footer Menu', 'magnitheme' ),
      'section' => 'section_footer_4',
      'type' => 'text',
    ));


    // Col 3 - Title
    $wp_customize->add_setting( 'footer4_col3_title', [
      'default' => esc_html__( 'Get Started', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer4_col3_title', array(
      'label' => esc_html__( 'Column 3 - Title', 'magnitheme' ),
      'section' => 'section_footer_4',
      'type' => 'text',
    ));

    // Col 3 - Text
    $wp_customize->add_setting( 'footer4_col3_text', [
      'default' => esc_html__( 'TheSaaS design is harmonious, clean and user friendly. Even though the template has a lot of content, it doesn’t looks messy and all files and code are well structured, commented and divided.', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer4_col3_text', array(
      'label' => esc_html__( 'Column 3 - Text', 'magnitheme' ),
      'section' => 'section_footer_4',
      'type' => 'textarea',
    ));

    // Col 3 - Btn1 - Title
    $wp_customize->add_setting( 'footer4_col3_btn1_text', [
      'default' => esc_html__( 'Take a test drive', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer4_col3_btn1_text', array(
      'label' => esc_html__( 'Column 3 - Button 1 - Text', 'magnitheme' ),
      'section' => 'section_footer_4',
      'type' => 'text',
    ));

    // Col 3 - Btn1 - Link
    $wp_customize->add_setting( 'footer4_col3_btn1_link', [
      'default' => '#'
    ]);
    $wp_customize->add_control( 'footer4_col3_btn1_link', array(
      'label' => esc_html__( 'Column 3 - Button 1 - Link', 'magnitheme' ),
      'section' => 'section_footer_4',
      'type' => 'text',
    ));

    // Col 3 - Btn1 - Color
    $wp_customize->add_setting( 'footer4_col3_btn1_color', array(
      'default'           => 'primary',
      'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( 'footer4_col3_btn1_color', array(
      'label'   => esc_html__( 'Column 3 - Button 1 - Color', 'magnitheme' ),
      'section' => 'section_footer_4',
      'type'    => 'select',
      'settings' => 'footer4_col3_btn1_color',
      'choices' => [
        'primary' => esc_html__( "Primary", 'magnitheme' ),
        'secondary' => esc_html__( "Secondary", 'magnitheme' ),
        'info' => esc_html__( "Info", 'magnitheme' ),
        'success' => esc_html__( "Success", 'magnitheme' ),
        'warning' => esc_html__( "Warning", 'magnitheme' ),
        'danger' => esc_html__( "Danger", 'magnitheme' ),
        'white' => esc_html__( "White", 'magnitheme' ),
        'dark' => esc_html__( "Dark", 'magnitheme' ),
      ],
    ));


    // Col 3 - Btn2 - Title
    $wp_customize->add_setting( 'footer4_col3_btn2_text', [
      'default' => esc_html__( 'Contact us', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer4_col3_btn2_text', array(
      'label' => esc_html__( 'Column 3 - Button 2 - Text', 'magnitheme' ),
      'section' => 'section_footer_4',
      'type' => 'text',
    ));

    // Col 3 - Btn2 - Link
    $wp_customize->add_setting( 'footer4_col3_btn2_link', [
      'default' => '#'
    ]);
    $wp_customize->add_control( 'footer4_col3_btn2_link', array(
      'label' => esc_html__( 'Column 3 - Button 2 - Link', 'magnitheme' ),
      'section' => 'section_footer_4',
      'type' => 'text',
    ));

    // Col 3 - Btn2 - Color
    $wp_customize->add_setting( 'footer4_col3_btn2_color', array(
      'default'           => 'secondary',
      'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( 'footer4_col3_btn2_color', array(
      'label'   => esc_html__( 'Column 3 - Button 2 - Color', 'magnitheme' ),
      'section' => 'section_footer_4',
      'type'    => 'select',
      'settings' => 'footer4_col3_btn2_color',
      'choices' => [
        'primary' => esc_html__( "Primary", 'magnitheme' ),
        'secondary' => esc_html__( "Secondary", 'magnitheme' ),
        'info' => esc_html__( "Info", 'magnitheme' ),
        'success' => esc_html__( "Success", 'magnitheme' ),
        'warning' => esc_html__( "Warning", 'magnitheme' ),
        'danger' => esc_html__( "Danger", 'magnitheme' ),
        'white' => esc_html__( "White", 'magnitheme' ),
        'dark' => esc_html__( "Dark", 'magnitheme' ),
      ],
    ));



    // Footer 5
    // 
    $wp_customize->add_section( 'section_footer_5', array(
      'title' => esc_html__( 'Footer 5', 'magnitheme' ),
      'section' => 'section_footer_general'
    ));


    // Col 1 - Text
    $wp_customize->add_setting( 'footer5_col1_text', [
      'default' => esc_html__( 'TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer5_col1_text', array(
      'label' => esc_html__( 'Column 1 - Text', 'magnitheme' ),
      'section' => 'section_footer_5',
      'type' => 'textarea',
    ));

    // Col 1 - Copyright
    $wp_customize->add_setting( 'footer5_col1_copyright', [
      'default' => esc_html__( 'Copyright © 2017 TheThemeio. All rights reserved.', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer5_col1_copyright', array(
      'label' => esc_html__( 'Column 1 - Copyright', 'magnitheme' ),
      'section' => 'section_footer_5',
      'type' => 'textarea',
    ));


    // Col 2 - Title
    $wp_customize->add_setting( 'footer5_col2_title', [
      'default' => esc_html__( 'Samples', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer5_col2_title', array(
      'label' => esc_html__( 'Column 2 - Title', 'magnitheme' ),
      'description' => esc_html__( 'Primary Footer Menu', 'magnitheme' ),
      'section' => 'section_footer_5',
      'type' => 'text',
    ));


    // Col 3 - Title
    $wp_customize->add_setting( 'footer5_col3_title', [
      'default' => esc_html__( 'Company', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer5_col3_title', array(
      'label' => esc_html__( 'Column 3 - Title', 'magnitheme' ),
      'description' => esc_html__( 'Secondary Footer Menu', 'magnitheme' ),
      'section' => 'section_footer_5',
      'type' => 'text',
    ));


    // Col 4 - Title
    $wp_customize->add_setting( 'footer5_col4_title', [
      'default' => esc_html__( 'Subscribe', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer5_col4_title', array(
      'label' => esc_html__( 'Column 4 - Title', 'magnitheme' ),
      'section' => 'section_footer_5',
      'type' => 'text',
    ));


    // Col 4 - Input placeholder
    $wp_customize->add_setting( 'footer5_col4_placeholder', [
      'default' => esc_html__( 'Email Address', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer5_col4_placeholder', array(
      'label' => esc_html__( 'Column 4 - Input Placeholder', 'magnitheme' ),
      'section' => 'section_footer_5',
      'type' => 'text',
    ));


    // Col 4 - Button color
    $wp_customize->add_setting( 'footer5_col4_btn_color', array(
      'default'           => 'primary',
      'sanitize_callback' => 'esc_attr',
    ) );
    $wp_customize->add_control( 'footer5_col4_btn_color', array(
      'label'   => esc_html__( 'Column 4 - Button Color', 'magnitheme' ),
      'section' => 'section_footer_5',
      'type'    => 'select',
      'settings' => 'footer5_col4_btn_color',
      'choices' => [
        'primary' => esc_html__( "Primary", 'magnitheme' ),
        'secondary' => esc_html__( "Secondary", 'magnitheme' ),
        'info' => esc_html__( "Info", 'magnitheme' ),
        'success' => esc_html__( "Success", 'magnitheme' ),
        'warning' => esc_html__( "Warning", 'magnitheme' ),
        'danger' => esc_html__( "Danger", 'magnitheme' ),
        'white' => esc_html__( "White", 'magnitheme' ),
        'dark' => esc_html__( "Dark", 'magnitheme' ),
      ],
    ));


    // Col 4 - MailChimp Form URL
    $wp_customize->add_setting( 'footer5_col4_mailchimp', [
      'default' => esc_html__( '', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer5_col4_mailchimp', array(
      'label' => esc_html__( 'Column 4 - MailChimp Form URL', 'magnitheme' ),
      'description' => '<a href="http://thetheme.io/thesaas/block-subscribe.html#mailchimp-integration" target="_blank">'. esc_html__( 'What is this?', 'magnitheme' ) .'</a>',
      'section' => 'section_footer_5',
      'type' => 'text',
    ));


    // Col 4 - Image
    $wp_customize->add_setting( 'footer5_col4_image', array(
      'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer5_col4_image', array(
      'label'      => esc_html__( 'Image', 'magnitheme' ),
      'description' => esc_html__( 'If you set an image, it will replace the subscribe form', 'magnitheme' ),
      'section'    => 'section_footer_5',
      'settings'   => 'footer5_col4_image',
    ) ) );


    // Col 4 - Image link address
    $wp_customize->add_setting( 'footer5_col4_image_link', [
      'default' => esc_html__( '', 'magnitheme' )
    ]);
    $wp_customize->add_control( 'footer5_col4_image_link', array(
      'label' => esc_html__( 'Column 4 - Image Link Address', 'magnitheme' ),
      'description' => esc_html__( 'A URL for image to be forward on click', 'magnitheme' ),
      'section' => 'section_footer_5',
      'type' => 'text',
    ));


}
add_action( 'customize_register', 'magnithemescustomize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function magnithemescustomize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function magnithemescustomize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function magnithemescustomize_preview_js() {
	wp_enqueue_script( '_s-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'magnithemescustomize_preview_js' );
