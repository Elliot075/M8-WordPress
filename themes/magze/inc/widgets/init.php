<?php

// Helpers.
require get_template_directory() . '/inc/widgets/helpers.php';

/* Theme Widget sidebars. */
require get_template_directory() . '/inc/widgets/widget-sidebars.php';
require get_template_directory() . '/inc/widgets/widget-base/abstract-widget-base.php';

require get_template_directory() . '/inc/widgets/class-heading.php';
require get_template_directory() . '/inc/widgets/class-ads-code.php';
require get_template_directory() . '/inc/widgets/class-address-info.php';
require get_template_directory() . '/inc/widgets/class-grid-posts.php';
require get_template_directory() . '/inc/widgets/class-single-column-posts.php';
require get_template_directory() . '/inc/widgets/class-list-posts.php';
require get_template_directory() . '/inc/widgets/class-popular-posts.php';
require get_template_directory() . '/inc/widgets/class-social-menu.php';
require get_template_directory() . '/inc/widgets/class-author-info.php';
require get_template_directory() . '/inc/widgets/class-mailchimp-form.php';
require get_template_directory() . '/inc/widgets/class-call-to-action.php';
require get_template_directory() . '/inc/widgets/class-tab-posts.php';
require get_template_directory() . '/inc/widgets/class-posts-carousel.php';
require get_template_directory() . '/inc/widgets/class-posts-slider.php';
require get_template_directory() . '/inc/widgets/class-post-ids-special-grid.php';
require get_template_directory() . '/inc/widgets/class-post-categories-grid.php';

/* Register site widgets */
if ( ! function_exists( 'magze_widgets' ) ) :
	/**
	 * Load widgets.
	 *
	 * @since 1.0.0
	 */
	function magze_widgets() {
		register_widget( 'Magze_Heading' );
		register_widget( 'Magze_Ads_Code' );
		register_widget( 'Magze_Address_Info' );
		register_widget( 'Magze_Grid_Posts' );
		register_widget( 'Magze_Single_Column_Posts' );
		register_widget( 'Magze_List_Posts' );
		register_widget( 'Magze_Popular_Posts' );
		register_widget( 'Magze_Social_Menu' );
		register_widget( 'Magze_Author_Info' );
		register_widget( 'Magze_Mailchimp_Form' );
		register_widget( 'Magze_Call_To_Action' );
		register_widget( 'Magze_Tab_Posts' );
		register_widget( 'Magze_Posts_Carousel' );
		register_widget( 'Magze_Posts_Slider' );
		register_widget( 'Magze_Post_Ids_Special_Grid' );
		register_widget( 'Magze_Post_Categories_Grid' );
	}
endif;
add_action( 'widgets_init', 'magze_widgets' );
