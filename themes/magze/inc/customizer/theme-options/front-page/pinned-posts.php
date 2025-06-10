<?php
// Pinned Posts Options.
$wp_customize->add_section(
	'home_page_pinned_posts_options',
	array(
		'title'           => __( 'Pinned Post Options', 'magze' ),
		'panel'           => 'theme_home_option_panel',
		'active_callback' => function( $control ) {
			return (
				magze_is_home_banner_enabled( $control )
				&&
				magze_is_home_banner_not_fullwidth( $control )
			);
		},
	)
);

// Enable Pinned Posts.
$wp_customize->add_setting(
	'enable_pinned_posts',
	array(
		'default'           => $theme_options_defaults['enable_pinned_posts'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'enable_pinned_posts',
		array(
			'label'   => __( 'Enable Pinned Posts', 'magze' ),
			'section' => 'home_page_pinned_posts_options',
		)
	)
);

// Pinned Posts Title.
$wp_customize->add_setting(
	'pinned_posts_title',
	array(
		'default'           => $theme_options_defaults['pinned_posts_title'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'pinned_posts_title',
	array(
		'label'           => __( 'Pinned Posts Title', 'magze' ),
		'description'     => __( 'Leave empty if you don\'t want to show the title.', 'magze' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'text',
		'active_callback' => 'magze_is_pinned_posts_enabled',
	)
);

// Pinned Posts Title Style.
$wp_customize->add_setting(
	'pinned_posts_title_style',
	array(
		'default'           => $theme_options_defaults['pinned_posts_title_style'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'pinned_posts_title_style',
	array(
		'label'           => __( 'Pinned Posts Title Style', 'magze' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'select',
		'choices'         => magze_get_title_styles(),
		'active_callback' => 'magze_is_pinned_posts_enabled',
	)
);

// Pinned Posts Title Align.
$wp_customize->add_setting(
	'pinned_posts_title_align',
	array(
		'default'           => $theme_options_defaults['pinned_posts_title_align'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'pinned_posts_title_align',
	array(
		'label'           => __( 'Pinned Posts Title Alignment', 'magze' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'select',
		'choices'         => magze_get_title_alignments(),
		'active_callback' => 'magze_is_pinned_posts_enabled',
	)
);

// Pinned Posts Content from ids or category.
$wp_customize->add_setting(
	'pinned_posts_content_from',
	array(
		'default'           => $theme_options_defaults['pinned_posts_content_from'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'pinned_posts_content_from',
	array(
		'label'           => __( 'Get Pinned Posts From', 'magze' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'select',
		'choices'         => array(
			'category' => __( 'Category', 'magze' ),
			'post_ids' => __( 'Post ID\'s', 'magze' ),
		),
		'active_callback' => 'magze_is_pinned_posts_enabled',
	)
);

// Pinned Posts Category.
$wp_customize->add_setting(
	'pinned_posts_cat',
	array(
		'default'           => $theme_options_defaults['pinned_posts_cat'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Magze_Dropdown_Taxonomies_Control(
		$wp_customize,
		'pinned_posts_cat',
		array(
			'label'           => __( 'Choose Pinned Posts Category', 'magze' ),
			'section'         => 'home_page_pinned_posts_options',
			'active_callback' => function( $control ) {
				return (
					magze_is_pinned_posts_enabled( $control )
					&&
					magze_pinned_posts_content_from_category( $control )
				);
			},
		)
	)
);

// Pinned Post IDs.
$wp_customize->add_setting(
	'pinned_posts_ids',
	array(
		'default'           => $theme_options_defaults['pinned_posts_ids'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'pinned_posts_ids',
	array(
		'label'           => __( 'Post ID\'s', 'magze' ),
		'description'     => __( 'Comma ( , ) separated posts ids. Ex: 1, 2. Only a fixed amount of posts will be shown based on relative pinned posts style.', 'magze' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'text',
		'active_callback' => function( $control ) {
			return (
				magze_is_pinned_posts_enabled( $control )
				&&
				magze_pinned_posts_content_from_post_ids( $control )
			);
		},
	)
);

// Enable Pinned Posts Overlay.
$wp_customize->add_setting(
	'enable_pinned_posts_overlay',
	array(
		'default'           => $theme_options_defaults['enable_pinned_posts_overlay'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'enable_pinned_posts_overlay',
		array(
			'label'           => __( 'Show Pinned Posts Overlay', 'magze' ),
			'section'         => 'home_page_pinned_posts_options',
			'active_callback' => 'magze_is_pinned_posts_enabled',
		)
	)
);

// Pinned Posts overlay color.
$wp_customize->add_setting(
	'pinned_posts_overlay_color',
	array(
		'default'           => $theme_options_defaults['pinned_posts_overlay_color'],
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'pinned_posts_overlay_color',
		array(
			'label'           => __( 'Overlay Color', 'magze' ),
			'section'         => 'home_page_pinned_posts_options',
			'type'            => 'color',
			'active_callback' => function( $control ) {
				return (
					magze_is_pinned_posts_enabled( $control )
					&&
					magze_is_pinned_overlay_enabled( $control )
				);
			},
		)
	)
);

// Pinned Post Overlay Opacity.
$wp_customize->add_setting(
	'pinned_posts_overlay_opacity',
	array(
		'default'           => $theme_options_defaults['pinned_posts_overlay_opacity'],
		'sanitize_callback' => 'magze_sanitize_float',
	)
);
$wp_customize->add_control(
	'pinned_posts_overlay_opacity',
	array(
		'label'           => __( 'Overlay Opacity', 'magze' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'number',
		'input_attrs'     => array(
			'min'   => 0,
			'max'   => 1,
			'step'  => 0.1,
			'style' => 'width: 150px;',
		),
		'active_callback' => function( $control ) {
			return (
				magze_is_pinned_posts_enabled( $control )
				&&
				magze_is_pinned_overlay_enabled( $control )
			);
		},
	)
);

// Show Pinned Post Category.
$wp_customize->add_setting(
	'show_pinned_posts_category',
	array(
		'default'           => $theme_options_defaults['show_pinned_posts_category'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'show_pinned_posts_category',
		array(
			'label'           => __( 'Show Category', 'magze' ),
			'section'         => 'home_page_pinned_posts_options',
			'active_callback' => 'magze_is_pinned_posts_enabled',
		)
	)
);

// Pinned Posts Category Color Display.
$wp_customize->add_setting(
	'pinned_posts_category_color_display',
	array(
		'default'           => $theme_options_defaults['pinned_posts_category_color_display'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'pinned_posts_category_color_display',
	array(
		'label'           => __( 'Pinned Posts Category Color Display', 'magze' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'select',
		'choices'         => magze_get_category_color_display(),
		'active_callback' => function( $control ) {
			return (
				magze_is_pinned_posts_enabled( $control )
				&&
				magze_is_pinned_posts_category_enabled( $control )
			);
		},
	)
);

// Pinned Post Category Style.
$wp_customize->add_setting(
	'pinned_posts_category_style',
	array(
		'default'           => $theme_options_defaults['pinned_posts_category_style'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'pinned_posts_category_style',
	array(
		'label'           => __( 'Pinned Post Category Style', 'magze' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'select',
		'choices'         => magze_get_category_styles(),
		'active_callback' => function( $control ) {
			return (
				magze_is_pinned_posts_enabled( $control )
				&&
				magze_is_pinned_posts_category_enabled( $control )
			);
		},
	)
);

// No of Pinned Post Categories.
$wp_customize->add_setting(
	'pinned_posts_category_limit',
	array(
		'default'           => $theme_options_defaults['pinned_posts_category_limit'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'pinned_posts_category_limit',
	array(
		'label'           => __( 'Number of Categories To Display', 'magze' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'number',
		'active_callback' => function( $control ) {
			return (
				magze_is_pinned_posts_enabled( $control )
				&&
				magze_is_pinned_posts_category_enabled( $control )
			);
		},
	)
);

/* Pinned Posts Meta */
$wp_customize->add_setting(
	'pinned_post_meta',
	array(
		'default'           => $theme_options_defaults['pinned_post_meta'],
		'sanitize_callback' => 'magze_sanitize_checkbox_multiple',
	)
);
$wp_customize->add_control(
	new Magze_Checkbox_Multiple(
		$wp_customize,
		'pinned_post_meta',
		array(
			'label'           => __( 'Pinned Post Meta', 'magze' ),
			'section'         => 'home_page_pinned_posts_options',
			'choices'         => array(
				'author'    => __( 'Author', 'magze' ),
				'read_time' => __( 'Post Read Time', 'magze' ),
				'date'      => __( 'Date', 'magze' ),
				'comment'   => __( 'Comment', 'magze' ),
			),
			'active_callback' => 'magze_is_pinned_posts_enabled',
		)
	)
);

// Show Post Meta Icon.
$wp_customize->add_setting(
	'show_pinned_post_meta_icon',
	array(
		'default'           => $theme_options_defaults['show_pinned_post_meta_icon'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'show_pinned_post_meta_icon',
		array(
			'label'       => __( 'Show Post Meta Icon', 'magze' ),
			'description' => __( 'Some Icons may show up regardless to provide better info.', 'magze' ),
			'section'     => 'home_page_pinned_posts_options',
			'active_callback' => 'magze_is_pinned_posts_enabled',
		)
	)
);

// Pinned Posts Date Format
$wp_customize->add_setting(
	'pinned_posts_date_format',
	array(
		'default'           => $theme_options_defaults['pinned_posts_date_format'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'pinned_posts_date_format',
	array(
		'label'           => __( 'Date Format', 'magze' ),
		'description'     => __( 'Make sure to enable Date post meta from above for this to work.', 'magze' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'select',
		'choices'         => array(
			'format_1' => __( 'Times Ago', 'magze' ),
			'format_2' => __( 'Default Format', 'magze' ),
		),
		'active_callback' => 'magze_is_pinned_posts_enabled',
	)
);

// Show Pinned Posts author image.
$wp_customize->add_setting(
	'enable_pinned_posts_author_image',
	array(
		'default'           => $theme_options_defaults['enable_pinned_posts_author_image'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'enable_pinned_posts_author_image',
		array(
			'label'           => __( 'Show Author Image', 'magze' ),
			'description'     => __( 'Make sure to enable Author post meta from above for this to work.', 'magze' ),
			'section'         => 'home_page_pinned_posts_options',
			'active_callback' => 'magze_is_pinned_posts_enabled',
		)
	)
);

// Post Title Limit.
$wp_customize->add_setting(
	'pinned_posts_title_limit',
	array(
		'default'           => '',
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'pinned_posts_title_limit',
	array(
		'label'           => __( 'Post Title Limit', 'magze' ),
		'section'         => 'home_page_pinned_posts_options',
		'type'            => 'select',
		'choices'         => magze_get_title_limit_choices(),
		'active_callback' => 'magze_is_pinned_posts_enabled',
	)
);

// Show Post Format Icons.
$wp_customize->add_setting(
	'show_pinned_posts_post_format_icon',
	array(
		'default'           => $theme_options_defaults['show_pinned_posts_post_format_icon'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'show_pinned_posts_post_format_icon',
		array(
			'label'           => __( 'Show Post Format Icon', 'magze' ),
			'section'         => 'home_page_pinned_posts_options',
			'active_callback' => 'magze_is_pinned_posts_enabled',
		)
	)
);
