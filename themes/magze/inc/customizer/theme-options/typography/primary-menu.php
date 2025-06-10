<?php

// Add Primary Menu section.
$wp_customize->add_section(
	'primary_menu_typography_options',
	array(
		'title' => __( 'Primary Menu', 'magze' ),
		'panel' => 'typography_options_panel',
	)
);

// Primary Menu Font.
$wp_customize->add_setting(
	'primary_menu_font',
	array(
		'default'           => $theme_options_defaults['primary_menu_font'],
		'sanitize_callback' => 'magze_sanitize_special_select',
	)
);
$wp_customize->add_control(
	'primary_menu_font',
	array(
		'label'    => __( 'Primary Menu Font', 'magze' ),
		'section'  => 'primary_menu_typography_options',
		'type'     => 'select',
		'choices'  => magze_get_fonts(),
		'priority' => 10,
	)
);

// Primary Menu Font Weight.
$wp_customize->add_setting(
	'primary_menu_font_weight',
	array(
		'default'           => $theme_options_defaults['primary_menu_font_weight'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	'primary_menu_font_weight',
	array(
		'label'    => __( 'Primary Menu Font Weight', 'magze' ),
		'section'  => 'primary_menu_typography_options',
		'type'     => 'select',
		'choices'  => array(
			'normal'  => 'Normal',
			'bold'    => 'Bold',
			'bolder'  => 'Bolder',
			'lighter' => 'Lighter',
			'100'     => '100',
			'200'     => '200',
			'300'     => '300',
			'400'     => '400',
			'500'     => '500',
			'600'     => '600',
			'700'     => '700',
			'800'     => '800',
			'900'     => '900',
		),
		'priority' => 20,
	)
);
