<?php

/*Header Options*/
$wp_customize->add_section(
	'header_options',
	array(
		'title' => __( 'Header Options', 'magze' ),
		'panel' => 'header_options_panel',
	)
);

/* Header Background Color*/
$wp_customize->add_setting(
	'header_bg_color',
	array(
		'default'           => $theme_options_defaults['header_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'header_bg_color',
		array(
			'label'    => __( 'Header Background Color', 'magze' ),
			'section'  => 'header_options',
			'type'     => 'color',
			'priority' => 11,
		)
	)
);

/* Header Style */
$wp_customize->add_setting(
	'header_style',
	array(
		'default'           => $theme_options_defaults['header_style'],
		'sanitize_callback' => 'magze_sanitize_radio',
	)
);
$wp_customize->add_control(
	new Magze_Radio_Image_Control(
		$wp_customize,
		'header_style',
		array(
			'label'       => __( 'Header Style', 'magze' ),
			'description' => __( 'Some options related to header may not show in the front-end based on header style chosen.', 'magze' ),
			'section'     => 'header_options',
			'choices'     => magze_get_header_layouts(),
			'priority'    => 20,
		)
	)
);

/*Ad Banner Image*/
$wp_customize->add_setting(
	'ad_banner_image',
	array(
		'default'           => $theme_options_defaults['ad_banner_image'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new WP_Customize_Media_Control(
		$wp_customize,
		'ad_banner_image',
		array(
			'label'           => __( 'Ad Banner Image', 'magze' ),
			'description'     => __( 'Use image with 16:9 aspect ratio for best results', 'magze' ),
			'section'         => 'header_options',
			'active_callback' => 'magze_is_ad_banner_enabled',
			'priority'        => 30,
			'mime_type'       => 'image',
		)
	)
);

/*Ad Banner Link.*/
$wp_customize->add_setting(
	'ad_banner_link',
	array(
		'default'           => $theme_options_defaults['ad_banner_link'],
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'ad_banner_link',
	array(
		'label'           => __( 'Ad Banner Link', 'magze' ),
		'section'         => 'header_options',
		'type'            => 'text',
		'description'     => __( 'Leave empty if you don\'t want the image to have a link', 'magze' ),
		'active_callback' => 'magze_is_ad_banner_enabled',
		'priority'        => 40,
	)
);

/*Centered Logo*/
$wp_customize->add_setting(
	'center_logo',
	array(
		'default'           => $theme_options_defaults['center_logo'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'center_logo',
		array(
			'label'           => __( 'Centered Logo', 'magze' ),
			'description'     => __( 'Center the logo if no ad banner is present', 'magze' ),
			'section'         => 'header_options',
			'active_callback' => 'magze_is_ad_banner_enabled',
			'priority'        => 50,
		)
	)
);

// Padding Top.
$wp_customize->add_setting(
	'header_padding_desktop_top',
	array(
		'sanitize_callback' => 'magze_sanitize_empty_value_number',
	)
);
$wp_customize->add_control(
	'header_padding_desktop_top',
	array(
		'label'       => __( 'Header Padding Top', 'magze' ),
		'description' => __( 'Enter numeric value in px. For example, 20. Do not enter "px", only enter numeric value.', 'magze' ),
		'section'     => 'header_options',
		'type'        => 'text',
		'priority'    => 60,
	)
);

// Padding Bottom.
$wp_customize->add_setting(
	'header_padding_desktop_bottom',
	array(
		'sanitize_callback' => 'magze_sanitize_empty_value_number',
	)
);
$wp_customize->add_control(
	'header_padding_desktop_bottom',
	array(
		'label'       => __( 'Header Padding Bottom', 'magze' ),
		'description' => __( 'Enter numeric value in px. For example, 20. Do not enter "px", only enter numeric value.', 'magze' ),
		'section'     => 'header_options',
		'type'        => 'text',
		'priority'    => 60,
	)
);