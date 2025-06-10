<?php

$wp_customize->add_section(
	'scroll_top_options',
	array(
		'title' => __( 'Scroll To Top', 'magze' ),
		'panel' => 'footer_options_panel',
	)
);

/*Enable scroll to top*/
$wp_customize->add_setting(
	'enable_scroll_to_top',
	array(
		'default'           => $theme_options_defaults['enable_scroll_to_top'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'enable_scroll_to_top',
		array(
			'label'    => __( 'Show Scroll to Top', 'magze' ),
			'section'  => 'scroll_top_options',
			'priority' => 10,
		)
	)
);

// Scroll To Top Position.
$wp_customize->add_setting(
	'scroll_to_top_pos',
	array(
		'default'           => $theme_options_defaults['scroll_to_top_pos'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'scroll_to_top_pos',
	array(
		'label'           => __( 'Scroll to Top Position', 'magze' ),
		'section'         => 'scroll_top_options',
		'type'            => 'select',
		'choices'         => array(
			'left'  => __( 'Left', 'magze' ),
			'right' => __( 'Right', 'magze' ),
		),
		'active_callback' => 'magze_is_scroll_top_enabled',
		'priority'        => 20,
	)
);

// Icon Color.
$wp_customize->add_setting(
	'scroll_to_top_color',
	array(
		'default'           => $theme_options_defaults['scroll_to_top_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'scroll_to_top_color',
		array(
			'label'           => __( 'Scroll To Top Icon', 'magze' ),
			'section'         => 'scroll_top_options',
			'type'            => 'color',
			'active_callback' => 'magze_is_scroll_top_enabled',
			'priority'        => 30,
		)
	)
);

// Hover Icon Color.
$wp_customize->add_setting(
	'scroll_to_top_hover_color',
	array(
		'default'           => $theme_options_defaults['scroll_to_top_hover_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'scroll_to_top_hover_color',
		array(
			'label'           => __( 'Scroll To Top Icon Hover', 'magze' ),
			'section'         => 'scroll_top_options',
			'type'            => 'color',
			'active_callback' => 'magze_is_scroll_top_enabled',
			'priority'        => 40,
		)
	)
);

// Background Color.
$wp_customize->add_setting(
	'scroll_to_top_bg_color',
	array(
		'default'           => $theme_options_defaults['scroll_to_top_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'scroll_to_top_bg_color',
		array(
			'label'           => __( 'Scroll To Top Background', 'magze' ),
			'section'         => 'scroll_top_options',
			'type'            => 'color',
			'active_callback' => 'magze_is_scroll_top_enabled',
			'priority'        => 50,
		)
	)
);

// Hover Background Color.
$wp_customize->add_setting(
	'scroll_to_top_hover_bg_color',
	array(
		'default'           => $theme_options_defaults['scroll_to_top_hover_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'scroll_to_top_hover_bg_color',
		array(
			'label'           => __( 'Scroll To Top Hover Background', 'magze' ),
			'section'         => 'scroll_top_options',
			'type'            => 'color',
			'active_callback' => 'magze_is_scroll_top_enabled',
			'priority'        => 60,
		)
	)
);
