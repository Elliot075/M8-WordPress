<?php

$layouts = magze_get_general_layouts();
unset( $layouts['no-sidebar-narrow'] );

$wp_customize->add_section(
	'shop_page_options',
	array(
		'title' => __( 'Shop Page Options', 'magze' ),
		'panel' => 'woocommerce',
	)
);

$wp_customize->add_setting(
	'shop_page_layout',
	array(
		'default'           => $theme_options_defaults['shop_page_layout'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	new Magze_Radio_Image_Control(
		$wp_customize,
		'shop_page_layout',
		array(
			'label'    => __( 'Shop Page Sidebar Layout', 'magze' ),
			'section'  => 'shop_page_options',
			'choices'  => $layouts,
			'priority' => 10,
		)
	)
);

$wp_customize->add_setting(
	'shop_page_enable_sidebar',
	array(
		'default'           => $theme_options_defaults['shop_page_enable_sidebar'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'shop_page_enable_sidebar',
		array(
			'label'    => __( 'Enable Different Sidebar for Shop Page', 'magze' ),
			'section'  => 'shop_page_options',
			'priority' => 20,
		)
	)
);

$wp_customize->add_setting(
	'shop_page_disable_breadcrumb',
	array(
		'default'           => $theme_options_defaults['shop_page_disable_breadcrumb'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'shop_page_disable_breadcrumb',
		array(
			'label'    => __( 'Disable Shop page breadcrumb', 'magze' ),
			'section'  => 'shop_page_options',
			'priority' => 21,
		)
	)
);

$wp_customize->add_setting(
	'product_page_layout',
	array(
		'default'           => $theme_options_defaults['product_page_layout'],
		'sanitize_callback' => 'magze_sanitize_select',
	)
);
$wp_customize->add_control(
	new Magze_Radio_Image_Control(
		$wp_customize,
		'product_page_layout',
		array(
			'label'    => __( 'Product Page Sidebar Layout', 'magze' ),
			'section'  => 'shop_page_options',
			'choices'  => $layouts,
			'priority' => 30,

		)
	)
);

$wp_customize->add_setting(
	'product_page_enable_sidebar',
	array(
		'default'           => $theme_options_defaults['product_page_enable_sidebar'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'product_page_enable_sidebar',
		array(
			'label'    => __( 'Enable Different Sidebar for Product Page', 'magze' ),
			'section'  => 'shop_page_options',
			'priority' => 40,
		)
	)
);

$wp_customize->add_setting(
	'product_page_disable_breadcrumb',
	array(
		'default'           => $theme_options_defaults['product_page_disable_breadcrumb'],
		'sanitize_callback' => 'magze_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Magze_Toggle_Control(
		$wp_customize,
		'product_page_disable_breadcrumb',
		array(
			'label'    => __( 'Disable Product page breadcrumb', 'magze' ),
			'section'  => 'shop_page_options',
			'priority' => 41,
		)
	)
);
