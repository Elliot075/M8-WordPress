<?php
/**
 * Color Options added to default color section
 * */

/*Primary Color*/
$wp_customize->add_setting(
	'primary_color',
	array(
		'default'           => $theme_options_defaults['primary_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'label'       => __( 'Primary Color', 'magze' ),
			'description' => __( 'Body text color', 'magze' ),
			'section'     => 'colors',
			'type'        => 'color',
			'priority'    => 11,
		)
	)
);

/*Accent Color*/
$wp_customize->add_setting(
	'accent_color',
	array(
		'default'           => $theme_options_defaults['accent_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'accent_color',
		array(
			'label'       => __( 'Accent Color', 'magze' ),
			'description' => __( 'Unique color for the theme', 'magze' ),
			'section'     => 'colors',
			'type'        => 'color',
			'priority'    => 20,
		)
	)
);

/*Link Color*/
$wp_customize->add_setting(
	'link_color',
	array(
		'default'           => $theme_options_defaults['link_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'link_color',
		array(
			'label'    => __( 'Link Color', 'magze' ),
			'section'  => 'colors',
			'type'     => 'color',
			'priority' => 30,
		)
	)
);

/*Link Hover Color*/
$wp_customize->add_setting(
	'link_color_hover',
	array(
		'default'           => $theme_options_defaults['link_color_hover'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'link_color_hover',
		array(
			'label'    => __( 'Link Color Hover', 'magze' ),
			'section'  => 'colors',
			'type'     => 'color',
			'priority' => 40,
		)
	)
);

/*H1 Color*/
$wp_customize->add_setting(
	'h1_color',
	array(
		'default'           => $theme_options_defaults['h1_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'h1_color',
		array(
			'label'    => __( 'H1 Color', 'magze' ),
			'section'  => 'colors',
			'type'     => 'color',
			'priority' => 50,
		)
	)
);
/*H2 Color*/
$wp_customize->add_setting(
	'h2_color',
	array(
		'default'           => $theme_options_defaults['h2_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'h2_color',
		array(
			'label'    => __( 'H2 Color', 'magze' ),
			'section'  => 'colors',
			'type'     => 'color',
			'priority' => 60,
		)
	)
);
/*H3 Color*/
$wp_customize->add_setting(
	'h3_color',
	array(
		'default'           => $theme_options_defaults['h3_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'h3_color',
		array(
			'label'    => __( 'H3 Color', 'magze' ),
			'section'  => 'colors',
			'type'     => 'color',
			'priority' => 70,
		)
	)
);
/*H4 Color*/
$wp_customize->add_setting(
	'h4_color',
	array(
		'default'           => $theme_options_defaults['h4_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'h4_color',
		array(
			'label'    => __( 'H4 Color', 'magze' ),
			'section'  => 'colors',
			'type'     => 'color',
			'priority' => 80,
		)
	)
);
/*H5 Color*/
$wp_customize->add_setting(
	'h5_color',
	array(
		'default'           => $theme_options_defaults['h5_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'h5_color',
		array(
			'label'    => __( 'H5 Color', 'magze' ),
			'section'  => 'colors',
			'type'     => 'color',
			'priority' => 90,
		)
	)
);
/*H6 Color*/
$wp_customize->add_setting(
	'h6_color',
	array(
		'default'           => $theme_options_defaults['h6_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'h6_color',
		array(
			'label'    => __( 'H6 Color', 'magze' ),
			'section'  => 'colors',
			'type'     => 'color',
			'priority' => 100,
		)
	)
);
