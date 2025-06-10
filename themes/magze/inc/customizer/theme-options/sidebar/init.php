<?php
// Add Sidebar Options Panel.
$wp_customize->add_panel(
	'theme_sidebar_panel',
	array(
		'title'       => __( 'Sidebar', 'magze' ),
		'description' => __( 'Contains all sidebar settings', 'magze' ),
		'priority'    => 44,
	)
);

require_once get_template_directory() . '/inc/customizer/theme-options/sidebar/front-page.php';
require_once get_template_directory() . '/inc/customizer/theme-options/sidebar/general.php';
