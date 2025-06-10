<?php
$wp_customize->add_section(
	'post_title_options',
	array(
		'title' => __( 'Post Title Options', 'magze' ),
		'panel' => 'general_options_panel',
	)
);

/*Show title hover line*/
$wp_customize->add_setting(
	'global_show_title_line_hover',
	array(
		'default'           => $theme_options_defaults['global_show_title_line_hover'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'global_show_title_line_hover',
		array(
			'label'       => __( 'Enable line on hover', 'magze' ),
			'description' => __( 'Enable animated line during hover on post title of various widgets and posts elements.', 'magze' ),
			'section'     => 'post_title_options',
			'priority'    => 10,
		)
	)
);
