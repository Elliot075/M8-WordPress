<?php

$wp_customize->add_section(
	'below_footer_nc_widgetarea_options',
	array(
		'title' => __( 'Below Footer - No Container', 'magze' ),
		'panel' => 'widgetareas_options_panel',
	)
);

/* Below Footer NC Widgetareas heading style */
$wp_customize->add_setting(
	'below_footer_nc_widgetarea_heading_style',
	array(
		'default'           => $theme_options_defaults['below_footer_nc_widgetarea_heading_style'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'below_footer_nc_widgetarea_heading_style',
	array(
		'label'    => __( 'Widgets Title Style', 'magze' ),
		'section'  => 'below_footer_nc_widgetarea_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => magze_get_title_styles(),
	)
);

/* Below Footer NC Widgetarea heading Align */
$wp_customize->add_setting(
	'below_footer_nc_widgetarea_heading_align',
	array(
		'default'           => $theme_options_defaults['below_footer_nc_widgetarea_heading_align'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'below_footer_nc_widgetarea_heading_align',
	array(
		'label'    => __( 'Widgets Title Alignment', 'magze' ),
		'section'  => 'below_footer_nc_widgetarea_options',
		'priority' => 1,
		'type'     => 'select',
		'choices'  => magze_get_title_alignments(),
	)
);
