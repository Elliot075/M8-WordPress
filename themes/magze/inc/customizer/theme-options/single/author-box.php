<?php
$wp_customize->add_section(
	'single_author_box_options',
	array(
		'title' => __( 'Author Info Box Options', 'magze' ),
		'panel' => 'single_posts_options_panel',
	)
);

$wp_customize->add_setting(
	'show_author_info',
	array(
		'default'           => $theme_options_defaults['show_author_info'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'show_author_info',
		array(
			'label'    => __( 'Show Author Info Box', 'magze' ),
			'section'  => 'single_author_box_options',
			'priority' => 10,
		)
	)
);

$wp_customize->add_setting(
	'enable_author_info_bg',
	array(
		'default'           => $theme_options_defaults['enable_author_info_bg'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'enable_author_info_bg',
		array(
			'label'           => __( 'Enable Info Box Background', 'magze' ),
			'section'         => 'single_author_box_options',
			'active_callback' => 'magze_is_author_info_enabled',
			'priority'        => 15,
		)
	)
);

$wp_customize->add_setting(
	'author_info_bg_color',
	array(
		'default'           => $theme_options_defaults['author_info_bg_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'author_info_bg_color',
		array(
			'label'           => __( 'Author Info Box Background Color', 'magze' ),
			'section'         => 'single_author_box_options',
			'type'            => 'color',
			'active_callback' => function ( $control ) {
				return (
					magze_is_author_info_enabled( $control )
					&&
					magze_is_author_box_bg_enabled( $control )
				);
			},
			'priority'        => 16,
		)
	)
);

/*Author Info Text.*/
$wp_customize->add_setting(
	'author_info_text',
	array(
		'default'           => $theme_options_defaults['author_info_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'author_info_text',
	array(
		'label'           => __( 'Author Info Title', 'magze' ),
		'section'         => 'single_author_box_options',
		'type'            => 'text',
		'active_callback' => 'magze_is_author_info_enabled',
		'priority'        => 20,
	)
);

// Author Info Title Style.
$wp_customize->add_setting(
	'author_info_title_style',
	array(
		'default'           => $theme_options_defaults['author_info_title_style'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'author_info_title_style',
	array(
		'label'           => __( 'Author Info Title Style', 'magze' ),
		'section'         => 'single_author_box_options',
		'type'            => 'select',
		'choices'         => magze_get_title_styles(),
		'active_callback' => 'magze_is_author_info_enabled',
		'priority'        => 30,
	)
);

// Author Info Title Align.
$wp_customize->add_setting(
	'author_info_title_align',
	array(
		'default'           => $theme_options_defaults['author_info_title_align'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'author_info_title_align',
	array(
		'label'           => __( 'Author Info Title Align', 'magze' ),
		'section'         => 'single_author_box_options',
		'type'            => 'select',
		'choices'         => magze_get_title_alignments(),
		'active_callback' => 'magze_is_author_info_enabled',
		'priority'        => 40,
	)
);

// Author Info Box Style.
$wp_customize->add_setting(
	'author_info_box_style',
	array(
		'default'           => $theme_options_defaults['author_info_box_style'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'author_info_box_style',
	array(
		'label'           => __( 'Author Info Box Style', 'magze' ),
		'section'         => 'single_author_box_options',
		'type'            => 'select',
		'choices'         => array(
			'style_1' => __( 'Style 1', 'magze' ),
			'style_2' => __( 'Style 2', 'magze' ),
		),
		'active_callback' => 'magze_is_author_info_enabled',
		'priority'        => 50,
	)
);

// Stack on responsive.
$wp_customize->add_setting(
	'stack_author_info_resposive',
	array(
		'default'           => $theme_options_defaults['stack_author_info_resposive'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'stack_author_info_resposive',
		array(
			'label'           => __( 'Stack on Responsive', 'magze' ),
			'section'         => 'single_author_box_options',
			'active_callback' => 'magze_is_author_info_enabled',
			'priority'        => 60,
		)
	)
);
