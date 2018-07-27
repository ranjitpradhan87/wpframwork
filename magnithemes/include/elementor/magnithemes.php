<?php

/**
 * Elementor configuration file.
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'ELEMENTOR_MangiTheme__FILE__', __FILE__ );

/**
 * Load MangiTheme
 */
function MangiTheme_load() {

	// Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'MangiTheme_elementor_fail_load' );
		return;
	}

	// PHP Version
	if ( ! version_compare( PHP_VERSION, '5.6', '>=' ) ) {
		add_action( 'admin_notices', 'magnitheme_fail_php_version' );
		return;
	}

	// Check version required
	$elementor_version_required = '1.0.0';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		add_action( 'admin_notices', 'magnitheme_elementor_fail_load_out_of_date' );
		return;
	}

	// Require the main plugin file
	require get_template_directory() . '/include/elementor/plugin.php';
}
add_action( 'after_setup_theme', 'MangiTheme_load' );



function MangiTheme_elementor_fail_load() {
	?>
	<div class="notice notice-error is-dismissible">
		<p><?php esc_html_e( 'You need to install and activate TheElementor page builder plugin to use this theme.', 'magnitheme' ); ?></p>
	</div>
	<?php
}


function magnitheme_fail_php_version() {
	$message = esc_html__( 'MangiTheme requires PHP version 5.6+. Please contact your host provide to update PHP.', 'magnitheme' );
	$html_message = sprintf( '<div class="error">%s</div>', wpautop( $message ) );
	echo wp_kses_post( $html_message );
}


function magnitheme_elementor_fail_load_out_of_date() {
	?>
	<div class="notice notice-error is-dismissible">
		<p><?php esc_html_e( 'Your TheElementor plugin is old. Please update it to the most recent version.', 'magnitheme' ); ?></p>
	</div>
	<?php
}
