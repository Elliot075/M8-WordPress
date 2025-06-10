<?php

// Sticky menu options.
$wp_customize->add_section(
	'sticky_menu_options',
	array(
		'title' => __( 'Sticky Menu Options', 'magze' ),
		'panel' => 'header_options_panel',
	)
);

/*Enable Sticky Menu*/
$wp_customize->add_setting(
	'enable_sticky_menu',
	array(
		'default'           => $theme_options_defaults['enable_sticky_menu'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'enable_sticky_menu',
		array(
			'label'    => __( 'Enable Sticky Menu', 'magze' ),
			'section'  => 'sticky_menu_options',
			'priority' => 10,
		)
	)
);
