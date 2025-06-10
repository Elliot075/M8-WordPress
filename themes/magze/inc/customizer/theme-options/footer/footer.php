<?php

$widgets_link = admin_url( 'widgets.php' );

$wp_customize->add_section(
	'footer_options',
	array(
		'title' => __( 'Footer Options', 'magze' ),
		'panel' => 'footer_options_panel',
	)
);

// Footer Theme.
$wp_customize->add_setting(
	'footer_theme',
	array(
		'default'           => $theme_options_defaults['footer_theme'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'footer_theme',
	array(
		'label'    => __( 'Footer Theme', 'magze' ),
		'section'  => 'footer_options',
		'type'     => 'select',
		'choices'  => array(
			'light' => __( 'Light', 'magze' ),
			'dark'  => __( 'Dark', 'magze' ),
		),
		'priority' => 11,
	)
);

// Light Footer Background Color.
$wp_customize->add_setting(
	'footer_bg_color',
	array(
		'default'           => $theme_options_defaults['footer_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'footer_bg_color',
		array(
			'label'           => __( 'Light Theme Background', 'magze' ),
			'section'         => 'footer_options',
			'type'            => 'color',
			'active_callback' => 'magze_is_light_footer',
			'priority'        => 20,
		)
	)
);

// Dark Footer Background Color.
$wp_customize->add_setting(
	'dark_footer_bg_color',
	array(
		'default'           => $theme_options_defaults['dark_footer_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'dark_footer_bg_color',
		array(
			'label'           => __( 'Dark Theme Background', 'magze' ),
			'section'         => 'footer_options',
			'type'            => 'color',
			'active_callback' => 'magze_is_dark_footer',
			'priority'        => 30,
		)
	)
);

// Option to choose footer column layout.
$wp_customize->add_setting(
	'footer_column_layout',
	array(
		'default'           => $theme_options_defaults['footer_column_layout'],
		'sanitize_callback' => 'magze_sanitize_radio',
	)
);
$wp_customize->add_control(
	new Magze_Radio_Image_Control(
		$wp_customize,
		'footer_column_layout',
		array(
			'label'       => __( 'Footer Column Layout', 'magze' ),
			'description' => __( 'Some footer widgetareas will not be used based on the footer column layout chosen. Also make sure to insert at least one widget on the respective widgetarea for it to display.', 'magze' ),
			'section'     => 'footer_options',
			'choices'     => magze_get_footer_layouts(),
			'priority'    => 40,
		)
	)
);

/* Footer Widget heading style */
$wp_customize->add_setting(
	'footer_widget_heading_style',
	array(
		'default'           => $theme_options_defaults['footer_widget_heading_style'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'footer_widget_heading_style',
	array(
		'label'    => __( 'Footer Widgets Title Style', 'magze' ),
		'section'  => 'footer_options',
		'type'     => 'select',
		'choices'  => magze_get_title_styles(),
		'priority' => 50,
	)
);

/* Footer Widget heading Align */
$wp_customize->add_setting(
	'footer_widget_heading_align',
	array(
		'default'           => $theme_options_defaults['footer_widget_heading_align'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'footer_widget_heading_align',
	array(
		'label'    => __( 'Footer Widgets Title Alignment', 'magze' ),
		'section'  => 'footer_options',
		'type'     => 'select',
		'choices'  => magze_get_title_alignments(),
		'priority' => 60,
	)
);

// Enable Footer Background Image.
$wp_customize->add_setting(
	'enable_footer_bg_image',
	array(
		'default'           => $theme_options_defaults['enable_footer_bg_image'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'enable_footer_bg_image',
		array(
			'label'    => __( 'Enable Footer Background Image', 'magze' ),
			'section'  => 'footer_options',
			'priority' => 70,
		)
	)
);

// Footer background Image.
$wp_customize->add_setting(
	'footer_bg_image',
	array(
		'default'           => $theme_options_defaults['footer_bg_image'],
		'sanitize_callback' => 'magze_sanitize_image',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'footer_bg_image',
		array(
			'label'           => __( 'Footer Background Image', 'magze' ),
			'section'         => 'footer_options',
			'active_callback' => 'magze_is_footer_bg_enabled',
			'priority'        => 80,
		)
	)
);

// Footer Background Image Overlay Color.
$wp_customize->add_setting(
	'footer_bg_image_overlay_color',
	array(
		'default'           => $theme_options_defaults['footer_bg_image_overlay_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'footer_bg_image_overlay_color',
		array(
			'label'           => __( 'Image Overlay', 'magze' ),
			'section'         => 'footer_options',
			'type'            => 'color',
			'active_callback' => 'magze_is_footer_bg_enabled',
			'priority'        => 90,
		)
	)
);

// Footer background Image Opacity.
$wp_customize->add_setting(
	'footer_bg_image_opacity',
	array(
		'default'           => $theme_options_defaults['footer_bg_image_opacity'],
		'sanitize_callback' => 'magze_sanitize_float',
	)
);
$wp_customize->add_control(
	'footer_bg_image_opacity',
	array(
		'label'           => __( 'Overlay Opacity', 'magze' ),
		'section'         => 'footer_options',
		'type'            => 'number',
		'input_attrs'     => array(
			'min'   => 0,
			'max'   => 1,
			'step'  => 0.1,
			'style' => 'width: 150px;',
		),
		'active_callback' => 'magze_is_footer_bg_enabled',
		'priority'        => 100,
	)
);

// Enable Fixed Footer Background Image.
$wp_customize->add_setting(
	'footer_fixed_bg_image',
	array(
		'default'           => $theme_options_defaults['footer_fixed_bg_image'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'footer_fixed_bg_image',
		array(
			'label'           => __( 'Fixed Image Background', 'magze' ),
			'section'         => 'footer_options',
			'active_callback' => 'magze_is_footer_bg_enabled',
			'priority'        => 110,
		)
	)
);

// Enable Border Top.
$wp_customize->add_setting(
	'enable_border_above_footer',
	array(
		'default'           => $theme_options_defaults['enable_border_above_footer'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'enable_border_above_footer',
		array(
			'label'    => __( 'Enable a Border Above Footer', 'magze' ),
			'section'  => 'footer_options',
			'priority' => 120,
		)
	)
);
