<?php
/**
 * Bloglife functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bloglife
 */

if ( ! function_exists( 'magze_add_new_read_more_styles' ) ) :
	function magze_add_new_read_more_styles( $styles ) {
		return array_merge(
			$styles,
			array(
				'style_4' => __( 'Style 4', 'magze' ),
			)
		);
	}
endif;
add_filter( 'magze_read_more_styles', 'magze_add_new_read_more_styles' );

function bloglife_set_theme_mods() {

	$fresh_site_activate = get_option( 'bloglife_site_activate' );
	if ( (bool) $fresh_site_activate === false ) {

		$options = array(
			'primary_font'                               => '"Montserrat", "100:200:300:regular:500:600:700:800:900:100italic:200italic:300italic:italic:500italic:600italic:700italic:800italic:900italic", sans-serif',
			'primary_font_weight'                        => 900,
			'secondary_font'                             => '"Montserrat", "100:200:300:regular:500:600:700:800:900:100italic:200italic:300italic:italic:500italic:600italic:700italic:800italic:900italic", sans-serif',
			'secondary_font_weight'                      => 'normal',
			'primary_menu_font'                          => '"Montserrat", "100:200:300:regular:500:600:700:800:900:100italic:200italic:300italic:italic:500italic:600italic:700italic:800italic:900italic", sans-serif',
			'primary_menu_font_weight'                   => 900,
			'sub_menu_font'                              => '"Montserrat", "100:200:300:regular:500:600:700:800:900:100italic:200italic:300italic:italic:500italic:600italic:700italic:800italic:900italic", sans-serif',
			'sub_menu_font_weight'                       => 500,
			'primary_color'                              => '#313131',
			'primary_menu_bg_color'                      => '#1d020b',
			'primary_menu_text_color'                    => '#ffffff',
			'primary_menu_text_hover_color'              => '#f7fa00',
			'primary_menu_text_hover_border'             => '#f7fa00',
			'primary_menu_active_item_color'             => '#f7fa00',
			'primary_menu_active_item_border'            => '#f7fa00',
			'primary_menu_desc_color'                    => '#dadada',
			'center_align_primary_nav'                   => true,
			'enable_top_bar'                             => false,
			'offcanvas_hide_desktop'                     => false,
			'offcanvas_icon_color'                       => '#ffffff',
			'accent_color'                               => '#1d020b',
			'header_social_links_icons_hover_color'      => '#f7fa00',
			'header_search_btn_bg_color'                 => '#1d020b',
			'top_bar_nav_menu_hover_color'               => '#f7fa00',
			'sub_menu_text_hover_color'                  => '#111111',
			'preloader_color'                            => '#f7fa00',
			'progressbar_color'                          => '#f7fa00',
			'breadcrumb_link_color'                      => '#111111',
			'global_buttons_bg_color'                    => '#eeeeee',
			'global_buttons_border_color'                => '#eeeeee',
			'global_buttons_bg_hover_color'              => '#f7fa00',
			'global_buttons_border_hover_color'          => '#f7fa00',
			'global_buttons_text_color'                  => '#111111',
			'global_buttons_text_hover_color'            => '#111111',
			'global_post_meta_icons_color'               => '#1d020b',
			'ticker_label_bg_color'                      => '#f7fa00',
			'dark_footer_bg_color'                       => '#1d020b',
			'dark_sub_footer_bg_color'                   => '#1d020b',
			'scroll_to_top_color'                        => '#111111',
			'scroll_to_top_hover_color'                  => '#111111',
			'scroll_to_top_bg_color'                     => '#eeeeee',
			'scroll_to_top_hover_bg_color'               => '#f7fa00',
			'archive_read_more_style'                    => 'style_3',
			'pagination_type'                            => 'numeric',
			'center_aligned_pagination'                  => false,
			'archive_category_color_display'             => 'as_bg',
			'archive_category_style'                     => 'style_1',
			'single_category_color_display'              => 'as_bg',
			'single_category_style'                      => 'style_1',
			'single_tag_style'                           => 'style_1',
			'enable_border_above_footer'                 => false,
			'enable_border_above_sub_footer'             => true,
			'home_col_two_widgetarea_heading_style'      => 'style_5',
			'home_col_two_widgetarea_heading_align'      => 'center',
			'show_author_info'                           => true,
			'show_related_posts'                         => true,
			'show_author_posts'                          => true,
		);

		foreach ( $options as $key => $value ) {
			set_theme_mod( $key, $value );
		}

		update_option( 'bloglife_site_activate', true );
	}
}
add_action( 'after_switch_theme', 'bloglife_set_theme_mods' );