<?php
$wp_customize->add_section(
	'widgets_css_options',
	array(
		'title' => __( 'Widgets CSS Optimization', 'magze' ),
		'panel' => 'performance_options_panel',
	)
);

$wp_customize->add_setting(
	'widgets_css_loading',
	array(
		'default'           => 'conditional',
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'widgets_css_loading',
	array(
		'label'       => __( 'Css Loading Options', 'magze' ),
		'description' => __( 'Choose whether to load widgets CSS as inline for only active items or load a single css file globally ( <strong>Loading globally can also be useful if you are using the widgets inside different wordpress blocks like columns or groups and the css for those widgets are not working</strong>).', 'magze' ),
		'section'     => 'widgets_css_options',
		'type'        => 'select',
		'choices'     => array(
			'conditional' => __( 'Load Conditionally', 'magze' ),
			'global'      => __( 'Load Globally', 'magze' ),
		),
		'priority'    => 10,
	)
);
