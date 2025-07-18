<?php
$wp_customize->add_section(
	'single_related_post_options',
	array(
		'title' => __( 'Related Post Options', 'magze' ),
		'panel' => 'single_posts_options_panel',
	)
);

/*
Show Related Posts
*-------------------------------*/
$wp_customize->add_setting(
	'show_related_posts',
	array(
		'default'           => $theme_options_defaults['show_related_posts'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'show_related_posts',
		array(
			'label'    => __( 'Show Related Posts', 'magze' ),
			'section'  => 'single_related_post_options',
			'priority' => 10,
		)
	)
);

/*Related Posts Text.*/
$wp_customize->add_setting(
	'related_posts_text',
	array(
		'default'           => $theme_options_defaults['related_posts_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'related_posts_text',
	array(
		'label'           => __( 'Related Posts Title', 'magze' ),
		'section'         => 'single_related_post_options',
		'type'            => 'text',
		'active_callback' => 'magze_is_related_posts_enabled',
		'priority'        => 20,
	)
);

// Related Posts Title Style.
$wp_customize->add_setting(
	'related_posts_title_style',
	array(
		'default'           => $theme_options_defaults['related_posts_title_style'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'related_posts_title_style',
	array(
		'label'           => __( 'Related Posts Title Style', 'magze' ),
		'section'         => 'single_related_post_options',
		'type'            => 'select',
		'choices'         => magze_get_title_styles(),
		'active_callback' => 'magze_is_related_posts_enabled',
		'priority'        => 30,
	)
);

// Related Posts Title Align.
$wp_customize->add_setting(
	'related_posts_title_align',
	array(
		'default'           => $theme_options_defaults['related_posts_title_align'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'related_posts_title_align',
	array(
		'label'           => __( 'Related Posts Title Align', 'magze' ),
		'section'         => 'single_related_post_options',
		'type'            => 'select',
		'choices'         => magze_get_title_alignments(),
		'active_callback' => 'magze_is_related_posts_enabled',
		'priority'        => 40,
	)
);

/* Number of Related Posts */
$wp_customize->add_setting(
	'no_of_related_posts',
	array(
		'default'           => $theme_options_defaults['no_of_related_posts'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'no_of_related_posts',
	array(
		'label'           => __( 'Number of Related Posts', 'magze' ),
		'section'         => 'single_related_post_options',
		'type'            => 'number',
		'active_callback' => 'magze_is_related_posts_enabled',
		'priority'        => 50,
	)
);

/*Related Posts Orderby*/
$wp_customize->add_setting(
	'related_posts_orderby',
	array(
		'default'           => $theme_options_defaults['related_posts_orderby'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'related_posts_orderby',
	array(
		'label'           => __( 'Orderby', 'magze' ),
		'section'         => 'single_related_post_options',
		'type'            => 'select',
		'choices'         => array(
			'date'  => __( 'Date', 'magze' ),
			'id'    => __( 'ID', 'magze' ),
			'title' => __( 'Title', 'magze' ),
			'rand'  => __( 'Random', 'magze' ),
		),
		'active_callback' => 'magze_is_related_posts_enabled',
		'priority'        => 60,
	)
);

/*Related Posts Order*/
$wp_customize->add_setting(
	'related_posts_order',
	array(
		'default'           => $theme_options_defaults['related_posts_order'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'related_posts_order',
	array(
		'label'           => __( 'Order', 'magze' ),
		'section'         => 'single_related_post_options',
		'type'            => 'select',
		'choices'         => array(
			'asc'  => __( 'ASC', 'magze' ),
			'desc' => __( 'DESC', 'magze' ),
		),
		'active_callback' => 'magze_is_related_posts_enabled',
		'priority'        => 70,
	)
);

// Show Related Post Category.
$wp_customize->add_setting(
	'show_related_posts_category',
	array(
		'default'           => $theme_options_defaults['show_related_posts_category'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'show_related_posts_category',
		array(
			'label'           => __( 'Show Related Post Category', 'magze' ),
			'section'         => 'single_related_post_options',
			'active_callback' => 'magze_is_related_posts_enabled',
			'priority'        => 80,
		)
	)
);

// Related Posts Category Color Display.
$wp_customize->add_setting(
	'related_posts_category_color_display',
	array(
		'default'           => $theme_options_defaults['related_posts_category_color_display'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'related_posts_category_color_display',
	array(
		'label'           => __( 'Related Posts Category Color Display', 'magze' ),
		'section'         => 'single_related_post_options',
		'type'            => 'select',
		'choices'         => magze_get_category_color_display(),
		'active_callback' => function ( $control ) {
			return (
				magze_is_related_posts_enabled( $control )
				&&
				magze_is_related_posts_category_enabled( $control )
			);
		},
		'priority'        => 90,
	)
);

// Related Post Category Style.
$wp_customize->add_setting(
	'related_posts_category_style',
	array(
		'default'           => $theme_options_defaults['related_posts_category_style'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'related_posts_category_style',
	array(
		'label'           => __( 'Related Post Category Style', 'magze' ),
		'section'         => 'single_related_post_options',
		'type'            => 'select',
		'choices'         => magze_get_category_styles(),
		'active_callback' => function ( $control ) {
			return (
				magze_is_related_posts_enabled( $control )
				&&
				magze_is_related_posts_category_enabled( $control )
			);
		},
		'priority'        => 100,
	)
);

// No of Related Post Categories.
$wp_customize->add_setting(
	'related_posts_category_limit',
	array(
		'default'           => $theme_options_defaults['related_posts_category_limit'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'related_posts_category_limit',
	array(
		'label'           => __( 'Number of Categories To Display', 'magze' ),
		'section'         => 'single_related_post_options',
		'type'            => 'number',
		'active_callback' => function ( $control ) {
			return (
				magze_is_related_posts_enabled( $control )
				&&
				magze_is_related_posts_category_enabled( $control )
			);
		},
		'priority'        => 110,
	)
);

/* Related Posts Meta */
$wp_customize->add_setting(
	'related_post_meta',
	array(
		'default'           => $theme_options_defaults['related_post_meta'],
		'sanitize_callback' => 'magze_sanitize_checkbox_multiple',
	)
);
$wp_customize->add_control(
	new Magze_Checkbox_Multiple(
		$wp_customize,
		'related_post_meta',
		array(
			'label'           => __( 'Related Post Meta', 'magze' ),
			'section'         => 'single_related_post_options',
			'choices'         => array(
				'author'    => __( 'Author', 'magze' ),
				'read_time' => __( 'Post Read Time', 'magze' ),
				'date'      => __( 'Date', 'magze' ),
				'comment'   => __( 'Comment', 'magze' ),
			),
			'active_callback' => 'magze_is_related_posts_enabled',
			'priority'        => 120,
		)
	)
);

// Show Post Meta Icon.
$wp_customize->add_setting(
	'show_related_post_meta_icon',
	array(
		'default'           => $theme_options_defaults['show_related_post_meta_icon'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'show_related_post_meta_icon',
		array(
			'label'           => __( 'Show Post Meta Icon', 'magze' ),
			'description'     => __( 'Some Icons may show up regardless to provide better info.', 'magze' ),
			'section'         => 'single_related_post_options',
			'active_callback' => 'magze_is_related_posts_enabled',
			'priority'        => 130,
		)
	)
);

// Related Post Date Format
$wp_customize->add_setting(
	'related_posts_date_format',
	array(
		'default'           => $theme_options_defaults['related_posts_date_format'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'related_posts_date_format',
	array(
		'label'           => __( 'Date Format', 'magze' ),
		'description'     => __( 'Make sure to enable Date post meta from above for this to work.', 'magze' ),
		'section'         => 'single_related_post_options',
		'type'            => 'select',
		'choices'         => array(
			'format_1' => __( 'Times Ago', 'magze' ),
			'format_2' => __( 'Default Format', 'magze' ),
		),
		'active_callback' => 'magze_is_related_posts_enabled',
		'priority'        => 140,
	)
);

// Show Related Post related image.
$wp_customize->add_setting(
	'enable_related_posts_author_image',
	array(
		'default'           => $theme_options_defaults['enable_related_posts_author_image'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'enable_related_posts_author_image',
		array(
			'label'           => __( 'Show Author Image', 'magze' ),
			'description'     => __( 'Make sure to enable Author post meta from above for this to work.', 'magze' ),
			'section'         => 'single_related_post_options',
			'active_callback' => 'magze_is_related_posts_enabled',
			'priority'        => 150,
		)
	)
);

// Show desc.
$wp_customize->add_setting(
	'enable_related_posts_desc',
	array(
		'default'           => $theme_options_defaults['enable_related_posts_desc'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'enable_related_posts_desc',
		array(
			'label'           => __( 'Show Post Description', 'magze' ),
			'section'         => 'single_related_post_options',
			'active_callback' => 'magze_is_related_posts_enabled',
			'priority'        => 160,
		)
	)
);

// Related_post desc length.
$wp_customize->add_setting(
	'related_posts_desc_length',
	array(
		'default'           => $theme_options_defaults['related_posts_desc_length'],
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'related_posts_desc_length',
	array(
		'label'           => __( 'Post Description Length', 'magze' ),
		'section'         => 'single_related_post_options',
		'type'            => 'number',
		'active_callback' => function ( $control ) {
			return (
				magze_is_related_posts_enabled( $control )
				&&
				magze_is_related_posts_desc_enabled( $control )
			);
		},
		'priority'        => 170,
	)
);

// Show read more.
$wp_customize->add_setting(
	'enable_related_posts_read_more_btn',
	array(
		'default'           => $theme_options_defaults['enable_related_posts_read_more_btn'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'enable_related_posts_read_more_btn',
		array(
			'label'           => __( 'Show Read More', 'magze' ),
			'section'         => 'single_related_post_options',
			'active_callback' => 'magze_is_related_posts_enabled',
			'priority'        => 180,
		)
	)
);

// Read More Text.
$wp_customize->add_setting(
	'related_posts_read_more_btn_text',
	array(
		'default'           => $theme_options_defaults['related_posts_read_more_btn_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'related_posts_read_more_btn_text',
	array(
		'label'           => __( 'Read More Text', 'magze' ),
		'description'     => __( 'Leave empty if you want to use the default text "Read more".', 'magze' ),
		'section'         => 'single_related_post_options',
		'type'            => 'text',
		'active_callback' => function ( $control ) {
			return (
				magze_is_related_posts_enabled( $control )
				&&
				magze_is_related_posts_read_more_enabled( $control )
			);
		},
		'priority'        => 190,
	)
);

// Read more stlye.
$wp_customize->add_setting(
	'related_posts_read_more_style',
	array(
		'default'           => $theme_options_defaults['related_posts_read_more_style'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'related_posts_read_more_style',
	array(
		'label'           => __( 'Read More Style', 'magze' ),
		'section'         => 'single_related_post_options',
		'type'            => 'select',
		'choices'         => magze_get_read_more_styles(),
		'active_callback' => function ( $control ) {
			return (
				magze_is_related_posts_enabled( $control )
				&&
				magze_is_related_posts_read_more_enabled( $control )
			);
		},
		'priority'        => 200,
	)
);

// Read More Icon.
$wp_customize->add_setting(
	'related_posts_read_more_icon',
	array(
		'default'           => $theme_options_defaults['related_posts_read_more_icon'],
		'sanitize_callback' => 'magze_sanitize_radio',
	)
);
$wp_customize->add_control(
	new Magze_Radio_Image_Control(
		$wp_customize,
		'related_posts_read_more_icon',
		array(
			'label'           => __( 'Read More Icon', 'magze' ),
			'section'         => 'single_related_post_options',
			'choices'         => magze_get_read_more_icons(),
			'active_callback' => function ( $control ) {
				return (
					magze_is_related_posts_enabled( $control )
					&&
					magze_is_related_posts_read_more_enabled( $control )
				);
			},
			'priority'        => 210,
		)
	)
);

// Related Post Title Limit.
$wp_customize->add_setting(
	'related_posts_title_limit',
	array(
		'default'           => '',
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'related_posts_title_limit',
	array(
		'label'           => __( 'Post Title Limit', 'magze' ),
		'section'         => 'single_related_post_options',
		'type'            => 'select',
		'choices'         => magze_get_title_limit_choices(),
		'active_callback' => 'magze_is_related_posts_enabled',
		'priority'        => 220,
	)
);

// Show Post Format Icons.
$wp_customize->add_setting(
	'show_related_posts_post_format_icon',
	array(
		'default'           => $theme_options_defaults['show_related_posts_post_format_icon'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'show_related_posts_post_format_icon',
		array(
			'label'           => __( 'Show Post Format Icon', 'magze' ),
			'section'         => 'single_related_post_options',
			'active_callback' => 'magze_is_related_posts_enabled',
			'priority'        => 230,
		)
	)
);
