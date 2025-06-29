<?php
$wp_customize->add_section(
	'archive_options',
	array(
		'title' => __( 'Archive Post Options', 'magze' ),
		'panel' => 'blog_options_panel',
	)
);

/* Archive Style */
$wp_customize->add_setting(
	'archive_style',
	array(
		'default'           => $theme_options_defaults['archive_style'],
		'sanitize_callback' => 'magze_sanitize_radio',
	)
);
$wp_customize->add_control(
	new Magze_Radio_Image_Control(
		$wp_customize,
		'archive_style',
		array(
			'label'    => __( 'Archive Style', 'magze' ),
			'section'  => 'archive_options',
			'choices'  => magze_get_archive_layouts(),
			'priority' => 10,
		)
	)
);

/*Archive Pagination Type*/
$wp_customize->add_setting(
	'pagination_type',
	array(
		'default'           => $theme_options_defaults['pagination_type'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'pagination_type',
	array(
		'label'    => __( 'Archive Pagination Type', 'magze' ),
		'section'  => 'archive_options',
		'type'     => 'select',
		'choices'  => array(
			'default'              => __( 'Default (Older / Newer Post)', 'magze' ),
			'none'                 => __( 'None', 'magze' ),
			'numeric'              => __( 'Numeric', 'magze' ),
			'button_click_load'    => __( 'Load more post on click', 'magze' ),
			'infinite_scroll_load' => __( 'Load more posts on scroll', 'magze' ),
		),
		'priority' => 20,
	)
);

// Center pagination.
$wp_customize->add_setting(
	'center_aligned_pagination',
	array(
		'default'           => $theme_options_defaults['center_aligned_pagination'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'center_aligned_pagination',
		array(
			'label'    => __( 'Center Align Pagination', 'magze' ),
			'section'  => 'archive_options',
			'priority' => 30,
		)
	)
);

/* Archive Meta */
$wp_customize->add_setting(
	'archive_post_meta',
	array(
		'default'           => $theme_options_defaults['archive_post_meta'],
		'sanitize_callback' => 'magze_sanitize_checkbox_multiple',
	)
);
$wp_customize->add_control(
	new Magze_Checkbox_Multiple(
		$wp_customize,
		'archive_post_meta',
		array(
			'label'       => __( 'Archive Post Meta', 'magze' ),
			'description' => __(
				'Choose the post meta you want to be displayed on archive post listings.
            Some meta values may not show on front end in case of certain archive style or if post have post-formats.',
				'magze'
			),
			'section'     => 'archive_options',
			'choices'     => array(
				'author'    => __( 'Author', 'magze' ),
				'read_time' => __( 'Post Read Time', 'magze' ),
				'date'      => __( 'Date', 'magze' ),
				'comment'   => __( 'Comment', 'magze' ),
				'category'  => __( 'Category', 'magze' ),
				'tags'      => __( 'Tags', 'magze' ),
			),
			'priority'    => 40,
		)
	)
);

// Show Post Meta Icon.
$wp_customize->add_setting(
	'show_archive_post_meta_icon',
	array(
		'default'           => $theme_options_defaults['show_archive_post_meta_icon'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'show_archive_post_meta_icon',
		array(
			'label'       => __( 'Show Post Meta Icon', 'magze' ),
			'description' => __( 'Some Icons may show up regardless to provide better info.', 'magze' ),
			'section'     => 'archive_options',
			'priority'    => 50,
		)
	)
);

// Archive Post Date Format.
$wp_customize->add_setting(
	'archive_date_format',
	array(
		'default'           => $theme_options_defaults['archive_date_format'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'archive_date_format',
	array(
		'label'       => __( 'Date Format', 'magze' ),
		'description' => __( 'Make sure to enable Date post meta from above for this to work.', 'magze' ),
		'section'     => 'archive_options',
		'type'        => 'select',
		'choices'     => array(
			'format_1' => __( 'Times Ago', 'magze' ),
			'format_2' => __( 'Default Format', 'magze' ),
		),
		'priority'    => 60,
	)
);

// Show Archive Post author image.
$wp_customize->add_setting(
	'enable_archive_author_image',
	array(
		'default'           => $theme_options_defaults['enable_archive_author_image'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'enable_archive_author_image',
		array(
			'label'       => __( 'Show Author Image', 'magze' ),
			'description' => __( 'Make sure to enable Author post meta from above for this to work.', 'magze' ),
			'section'     => 'archive_options',
			'priority'    => 70,
		)
	)
);

// Show Archive Category Label.
$wp_customize->add_setting(
	'enable_archive_cat_label',
	array(
		'default'           => $theme_options_defaults['enable_archive_cat_label'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'enable_archive_cat_label',
		array(
			'label'       => __( 'Show Category Label', 'magze' ),
			'description' => __( 'Make sure to enable Category post meta from above for this to work.', 'magze' ),
			'section'     => 'archive_options',
			'priority'    => 80,
		)
	)
);

// Archive Category Color Display.
$wp_customize->add_setting(
	'archive_category_color_display',
	array(
		'default'           => $theme_options_defaults['archive_category_color_display'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'archive_category_color_display',
	array(
		'label'    => __( 'Archive Category Color Display', 'magze' ),
		'section'  => 'archive_options',
		'type'     => 'select',
		'choices'  => magze_get_category_color_display(),
		'priority' => 90,
	)
);

/* Category Style in Archive Page*/
$wp_customize->add_setting(
	'archive_category_style',
	array(
		'default'           => $theme_options_defaults['archive_category_style'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'archive_category_style',
	array(
		'label'    => __( 'Archive Category Style', 'magze' ),
		'section'  => 'archive_options',
		'type'     => 'select',
		'choices'  => magze_get_category_styles(),
		'priority' => 100,
	)
);

// No of Archive Categories.
$wp_customize->add_setting(
	'archive_category_limit',
	array(
		'default'           => $theme_options_defaults['archive_category_limit'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'archive_category_limit',
	array(
		'label'       => __( 'Limit Categories To Display', 'magze' ),
		'description' => __( 'Use 0 for no limit.', 'magze' ),
		'section'     => 'archive_options',
		'type'        => 'number',
		'priority'    => 110,
	)
);

// Archive Category Position.
$wp_customize->add_setting(
	'archive_category_position',
	array(
		'default'           => $theme_options_defaults['archive_category_position'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'archive_category_position',
	array(
		'label'    => __( 'Archive Category Position', 'magze' ),
		'section'  => 'archive_options',
		'type'     => 'select',
		'choices'  => array(
			'before_title'  => __( 'Before Title', 'magze' ),
			'after_excerpt' => __( 'After Excerpt', 'magze' ),
		),
		'priority' => 120,
	)
);

// Show Archive Tag Label.
$wp_customize->add_setting(
	'enable_archive_tag_label',
	array(
		'default'           => $theme_options_defaults['enable_archive_tag_label'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'enable_archive_tag_label',
		array(
			'label'       => __( 'Show Tag Label', 'magze' ),
			'description' => __( 'Make sure to enable Tags post meta from above for this to work.', 'magze' ),
			'section'     => 'archive_options',
			'priority'    => 130,
		)
	)
);

/* Tag Style in Archive Page*/
$wp_customize->add_setting(
	'archive_tag_style',
	array(
		'default'           => $theme_options_defaults['archive_tag_style'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'archive_tag_style',
	array(
		'label'    => __( 'Archive Tag Style', 'magze' ),
		'section'  => 'archive_options',
		'type'     => 'select',
		'choices'  => magze_get_tag_styles(),
		'priority' => 140,
	)
);

// No of Archive Tags.
$wp_customize->add_setting(
	'archive_tag_limit',
	array(
		'default'           => $theme_options_defaults['archive_tag_limit'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'archive_tag_limit',
	array(
		'label'       => __( 'Limit Tags To Display', 'magze' ),
		'description' => __( 'Use 0 for no limit.', 'magze' ),
		'section'     => 'archive_options',
		'type'        => 'number',
		'priority'    => 150,
	)
);

// Show Post Format Icon.
$wp_customize->add_setting(
	'show_archive_post_format_icon',
	array(
		'default'           => $theme_options_defaults['show_archive_post_format_icon'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'show_archive_post_format_icon',
		array(
			'label'       => __( 'Show Post Format Icon', 'magze' ),
			'description' => __( 'Will not display on certain archive styles.', 'magze' ),
			'section'     => 'archive_options',
			'priority'    => 160,
		)
	)
);

// Archive Posts Title Limit.
$wp_customize->add_setting(
	'archive_posts_title_limit',
	array(
		'default'           => '',
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'archive_posts_title_limit',
	array(
		'label'    => __( 'Post Title Limit', 'magze' ),
		'section'  => 'archive_options',
		'type'     => 'select',
		'choices'  => magze_get_title_limit_choices(),
		'priority' => 170,
	)
);

// Show Excerpt.
$wp_customize->add_setting(
	'show_archive_excerpt',
	array(
		'default'           => $theme_options_defaults['show_archive_excerpt'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'show_archive_excerpt',
		array(
			'label'       => __( 'Show Excerpt', 'magze' ),
			'description' => __( 'Will not display on certain post formats and archive styles.', 'magze' ),
			'section'     => 'archive_options',
			'priority'    => 180,
		)
	)
);

/* Excerpt Length */
$wp_customize->add_setting(
	'excerpt_length',
	array(
		'default'           => $theme_options_defaults['excerpt_length'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'excerpt_length',
	array(
		'label'    => __( 'Excerpt Length', 'magze' ),
		'section'  => 'archive_options',
		'type'     => 'number',
		'priority' => 181,
	)
);

// Show Read More.
$wp_customize->add_setting(
	'show_archive_read_more',
	array(
		'default'           => $theme_options_defaults['show_archive_read_more'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'show_archive_read_more',
		array(
			'label'       => __( 'Show Read More', 'magze' ),
			'description' => __( 'Will not display on certain post formats and archive styles.', 'magze' ),
			'section'     => 'archive_options',
			'priority'    => 190,
		)
	)
);

// Read more stlye.
$wp_customize->add_setting(
	'archive_read_more_style',
	array(
		'default'           => $theme_options_defaults['archive_read_more_style'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'archive_read_more_style',
	array(
		'label'           => __( 'Read More Style', 'magze' ),
		'section'         => 'archive_options',
		'type'            => 'select',
		'choices'         => magze_get_read_more_styles(),
		'active_callback' => 'magze_is_archive_read_more_enabled',
		'priority'        => 200,
	)
);

/* Excerpt Read More Text */
$wp_customize->add_setting(
	'excerpt_read_more_text',
	array(
		'default'           => $theme_options_defaults['excerpt_read_more_text'],
		'sanitize_callback' => 'wp_filter_nohtml_kses',
	)
);
$wp_customize->add_control(
	'excerpt_read_more_text',
	array(
		'label'       => __( 'Read More Text', 'magze' ),
		'description' => __( 'Leave empty if you want to use default text "Read More".', 'magze' ),
		'section'     => 'archive_options',
		'type'        => 'text',
		'priority'    => 201,
	)
);

// Read More Icon.
$wp_customize->add_setting(
	'excerpt_read_more_icon',
	array(
		'default'           => $theme_options_defaults['excerpt_read_more_icon'],
		'sanitize_callback' => 'magze_sanitize_radio',
	)
);
$wp_customize->add_control(
	new Magze_Radio_Image_Control(
		$wp_customize,
		'excerpt_read_more_icon',
		array(
			'label'    => __( 'Read More Icon', 'magze' ),
			'section'  => 'archive_options',
			'choices'  => magze_get_read_more_icons(),
			'priority' => 202,
		)
	)
);