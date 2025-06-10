<?php

// Topbar Time.
if ( ! function_exists( 'magze_topbar_time' ) ) :
	function magze_topbar_time() {
		if ( get_theme_mod( 'enable_todays_time', true ) ) :
			$time_settings['hour12'] = filter_var( get_theme_mod( 'todays_time_hr12_format', true ), FILTER_VALIDATE_BOOLEAN )
			?>
			<div class="magze-components-time" data-settings="<?php echo esc_attr( json_encode( $time_settings ) ); ?>"></div>
			<?php
		endif;
	}
endif;
add_action( 'magze_topbar_first_col_items', 'magze_topbar_time', 9 );

// Topbar Date.
if ( ! function_exists( 'magze_topbar_date' ) ) :
	function magze_topbar_date() {
		if ( get_theme_mod( 'enable_todays_date', true ) ) :
			$date_format = get_theme_mod( 'todays_date_format', 'F j, Y' );
			?>
			<div class="magze-components-date">
				<span><?php echo esc_html( wp_date( $date_format ) ); ?></span>
			</div>
			<?php
		endif;
	}
endif;
add_action( 'magze_topbar_first_col_items', 'magze_topbar_date', 10 );

// Topbar Nav.
if ( ! function_exists( 'magze_topbar_nav' ) ) :
	function magze_topbar_nav() {
		if ( get_theme_mod( 'enable_top_nav', true ) ) :
			wp_nav_menu(
				array(
					'theme_location'  => 'top-menu',
					'container_class' => 'magze-top-nav',
					'fallback_cb'     => false,
					'depth'           => 2,
					'menu_class'      => 'magze-top-menu reset-list-style',
				)
			);
		endif;
	}
endif;
add_action( 'magze_topbar_first_col_items', 'magze_topbar_nav', 20 );

// Topbar Social icons.
if ( ! function_exists( 'magze_topbar_social' ) ) :
	function magze_topbar_social() {
		if ( get_theme_mod( 'enable_topbar_social_nav', true ) ) :

			$menu_class         = ' reset-list-style magze-social-icons ';
			$social_link_style  = get_theme_mod( 'header_social_links_display_style', 'style_1' );
			$social_link_style .= magze_get_social_icons_class( $social_link_style );
			$social_link_color  = get_theme_mod( 'header_social_links_color_as', 'brand_color' );
			$menu_class        .= $social_link_style . ' ' . $social_link_color;

			$enable_header_social_label = get_theme_mod( 'enable_header_social_links_label' );
			if ( $enable_header_social_label ) {
				$header_social_label_txt = get_theme_mod( 'header_social_links_label_text' );
				if ( ! $header_social_label_txt ) {
					$header_social_label_txt = __( 'Follow Us :', 'magze' );
				}
			}
			?>
			<div class="magze-social-nav">
				<?php if ( $enable_header_social_label ) : ?>
					<div class="magze-social-nav-label">
						<?php echo esc_html( $header_social_label_txt ); ?>
					</div>
				<?php endif; ?>
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'social-menu',
						'container_class' => '',
						'fallback_cb'     => false,
						'depth'           => 1,
						'menu_class'      => $menu_class,
						'link_before'     => '<span class="screen-reader-text">',
						'link_after'      => '</span>',
					)
				);
				?>
			</div>
			<?php
		endif;
	}
endif;
add_action( 'magze_topbar_last_col_items', 'magze_topbar_social', 10 );

// Topbar WooCommerce Icons.
if ( ! function_exists( 'magze_topbar_woo_icons' ) ) :
	function magze_topbar_woo_icons() {

		if ( magze_is_wc_active() ) :

			if ( get_theme_mod( 'enable_woo_my_account_top_bar' ) ) :
				$my_account_page = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
				if ( is_user_logged_in() ) :
					?>
					<a href="<?php echo esc_url( $my_account_page ); ?>" class="site-header-account" title="<?php esc_attr_e( 'My Account', 'magze' ); ?>">
					<?php magze_the_theme_svg( 'login' ); ?>
					</a>
				<?php else : ?>
					<a href="<?php echo esc_url( $my_account_page ); ?>" class="site-header-account" title="<?php esc_attr_e( 'Login / Register', 'magze' ); ?>">
					<?php magze_the_theme_svg( 'login' ); ?>
					</a>
					<?php
				endif;
			endif;

			if ( get_theme_mod( 'enable_woo_mini_cart_top_bar' ) ) :
				magze_woocommerce_header_cart();
			endif;

		endif;
	}
endif;
add_action( 'magze_topbar_last_col_items', 'magze_topbar_woo_icons', 20 );

// Random Post.
if ( ! function_exists( 'magze_topbar_random_post' ) ) :
	function magze_topbar_random_post() {
		if ( get_theme_mod( 'enable_random_post_top_bar' ) ) :
			magze_random_post();
		endif;
	}
endif;
add_action( 'magze_topbar_last_col_items', 'magze_topbar_random_post', 29 );

// Topbar Search.
if ( ! function_exists( 'magze_topbar_search' ) ) :
	function magze_topbar_search() {
		if ( get_theme_mod( 'enable_search_on_top_bar' ) ) :
			?>
			<div class="magze-search-toggle">
				<button class="magze-search-canvas-btn magze-search search-icon toggle-search-block toggle" aria-label="<?php esc_attr_e( 'Search', 'magze' ); ?>" aria-expanded="false" data-block=".magze-search-block" data-body-class="showing-search-block" data-focus=".magze-search-form .search-field">
					<span class="search-label"><?php esc_html_e( 'Search', 'magze' ); ?></span>
					<?php magze_the_theme_svg( 'search' ); ?>
					<?php magze_the_theme_svg( 'cross' ); ?>
				</button>
				<div class="magze-search-form magze-canvas-modal">
					<div class="em-search-form-inner">
						<?php
						get_search_form(
							array(
								'aria_label' => __( 'Search for:', 'magze' ),
							)
						);
						?>
					</div>
				</div>
			</div>
			<?php
		endif;
	}
endif;
add_action( 'magze_topbar_last_col_items', 'magze_topbar_search', 30 );

// Primary Menu Bar Offcanvas Icon.
if ( ! function_exists( 'magze_primary_bar_offcanvas' ) ) :
	function magze_primary_bar_offcanvas() {
		$class = '';
		if ( get_theme_mod( 'offcanvas_hide_desktop', true ) ) {
			$class .= ' hide-on-desktop';
		}
		?>
		<div class="magze-offcanvas-toggle<?php echo esc_attr( $class ); ?>">
			<button class="magze-off-canvas-btn toggle toggle-off-canvas toggle-canvas-modal" data-modal=".magze-canvas-block" data-body-class="showing-offcanvas-modal" data-focus=".magze-off-canvas-close" aria-expanded="false">
				<span class="off-canvas-bars">
					<span class="bar-one"></span>
					<span class="bar-two"></span>
				</span>
				<span class="toggle-text screen-reader-text">
					<?php esc_html_e( 'Off Canvas', 'magze' ); ?>
				</span>
			</button>
		</div>
		<?php
	}
endif;
add_action( 'magze_primary_nav_items', 'magze_primary_bar_offcanvas', 10 );

// Primary Menu Bar Menu.
if ( ! function_exists( 'magze_primary_bar_menu' ) ) :
	function magze_primary_bar_menu() {
		if ( get_theme_mod( 'center_align_primary_nav' ) ) {
			$class = ' center-aligned-menu';
		} else {
			$class = ' left-aligned-menu';
		}
		?>
		<div id="site-navigation" class="main-navigation magze-primary-nav<?php echo esc_attr( $class ); ?>">
			
			<?php
			if ( has_nav_menu( 'primary-menu' ) ) :
				$menu_wrapper_class = '';

				$capitalize_primary_nav_text = get_theme_mod( 'capitalize_primary_nav_text' );
				if ( $capitalize_primary_nav_text ) {
					$menu_wrapper_class .= ' em-uppercase-primary-menu';
				}

				$capitalize_sub_nav_text = get_theme_mod( 'capitalize_sub_nav_text' );
				if ( $capitalize_sub_nav_text ) {
					$menu_wrapper_class .= ' em-uppercase-sub-menu';
				}
				?>
				<nav class="primary-menu-wrapper" aria-label="<?php echo esc_attr_x( 'Primary', 'menu', 'magze' ); ?>">
					<ul class="primary-menu reset-list-style<?php echo esc_attr( $menu_wrapper_class ); ?>">
					<?php
					wp_nav_menu(
						array(
							'container'      => '',
							'items_wrap'     => '%3$s',
							'theme_location' => 'primary-menu',
						)
					);
					?>
					</ul>
				</nav><!-- .primary-menu-wrapper -->
			<?php endif; ?>
		</div>
		<?php
	}
endif;
add_action( 'magze_primary_nav_items', 'magze_primary_bar_menu', 20 );

// Primary Menu Bar Site Branding.
if ( ! function_exists( 'magze_primary_bar_branding' ) ) :
	function magze_primary_bar_branding() {
		?>
		<div class="site-branding">
			<?php
			if ( get_theme_mod( 'enable_different_logo_menu_bar' ) ) {
				$logo_menu_bar = get_theme_mod( 'logo_menu_bar' );
				if ( $logo_menu_bar ) {
					$logo_menu_bar = "<img src='" . esc_url( $logo_menu_bar ) . "' decoding='async'>";
					?>
					<div class="site-logo">
						<?php
						$aria_current = ! is_paged() && ( is_front_page() || is_home() && ( (int) get_option( 'page_for_posts' ) !== get_queried_object_id() ) ) ? ' aria-current="page"' : '';
						$html = sprintf(
							'<a href="%1$s" class="custom-logo-link" rel="home"%2$s>%3$s</a>',
							esc_url( home_url( '/' ) ),
							$aria_current,
							$logo_menu_bar
						);
						echo $html;
						?>
					</div>
					<?php
				}
			} elseif ( has_custom_logo() ) {
				?>
				<div class="site-logo">
					<?php the_custom_logo(); ?>
				</div>
				<?php
			} else {
				$blog_info    = get_bloginfo( 'name' );
				$hide_title   = get_theme_mod( 'hide_title' );
				$header_class = $hide_title ? 'screen-reader-text' : 'site-title';
				if ( $blog_info ) {
					if ( ( is_front_page() || is_home() ) && ! is_page() ) {
						?>
						<h1 class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $blog_info ); ?></a></h1>
						<?php
					} else {
						?>
						<div class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $blog_info ); ?></a></div>
						<?php
					}
				}
			}
			?>
		</div>
		<?php
	}
endif;
add_action( 'magze_primary_nav_items', 'magze_primary_bar_branding', 30 );

// Primary Menu Bar Social icons.
if ( ! function_exists( 'magze_primary_bar_social' ) ) :
	function magze_primary_bar_social() {
		if ( get_theme_mod( 'show_menu_bar_social_nav' ) ) :

			$menu_class         = ' reset-list-style magze-social-icons ';
			$social_link_style  = get_theme_mod( 'header_social_links_display_style', 'style_1' );
			$social_link_style .= magze_get_social_icons_class( $social_link_style );
			$social_link_color  = get_theme_mod( 'header_social_links_color_as', 'brand_color' );
			$menu_class        .= $social_link_style . ' ' . $social_link_color;

			$enable_header_social_label = get_theme_mod( 'enable_header_social_links_label' );
			if ( $enable_header_social_label ) {
				$header_social_label_txt = get_theme_mod( 'header_social_links_label_text' );
				if ( ! $header_social_label_txt ) {
					$header_social_label_txt = __( 'Follow Us :', 'magze' );
				}
			}
			?>
			<div class="magze-social-nav">
				<?php if ( $enable_header_social_label ) : ?>
					<div class="magze-social-nav-label">
						<?php echo esc_html( $header_social_label_txt ); ?>
					</div>
				<?php endif; ?>
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'social-menu',
						'container_class' => '',
						'fallback_cb'     => false,
						'depth'           => 1,
						'menu_class'      => $menu_class,
						'link_before'     => '<span class="screen-reader-text">',
						'link_after'      => '</span>',
					)
				);
				?>
			</div>
			<?php
		endif;
	}
endif;
add_action( 'magze_secondary_nav_items', 'magze_primary_bar_social', 10 );

// Primary Menu Bar WooCommerce Icons.
if ( ! function_exists( 'magze_primary_bar_woo_icons' ) ) :
	function magze_primary_bar_woo_icons() {

		if ( magze_is_wc_active() ) :

			if ( get_theme_mod( 'enable_woo_my_account_menu_bar', true ) ) :
				$my_account_page = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
				if ( is_user_logged_in() ) :
					?>
					<a href="<?php echo esc_url( $my_account_page ); ?>" class="site-header-account" title="<?php esc_attr_e( 'My Account', 'magze' ); ?>">
					<?php magze_the_theme_svg( 'login' ); ?>
					</a>
				<?php else : ?>
					<a href="<?php echo esc_url( $my_account_page ); ?>" class="site-header-account" title="<?php esc_attr_e( 'Login / Register', 'magze' ); ?>">
					<?php magze_the_theme_svg( 'login' ); ?>
					</a>
					<?php
				endif;
			endif;

			if ( get_theme_mod( 'enable_woo_mini_cart_menu_bar', true ) ) :
				magze_woocommerce_header_cart();
			endif;

		endif;
	}
endif;
add_action( 'magze_secondary_nav_items', 'magze_primary_bar_woo_icons', 20 );

// Random Post.
if ( ! function_exists( 'magze_primary_bar_random_post' ) ) :
	function magze_primary_bar_random_post() {
		if ( get_theme_mod( 'enable_random_post_menu_bar', true ) ) :
			magze_random_post();
		endif;
	}
endif;
add_action( 'magze_secondary_nav_items', 'magze_primary_bar_random_post', 29 );

// Primary Menu Bar Search Icon.
if ( ! function_exists( 'magze_primary_bar_search' ) ) :
	function magze_primary_bar_search() {
		if ( get_theme_mod( 'enable_search_on_menu_bar', true ) ) :
			?>
			<div class="magze-search-toggle">
				<button class="magze-search-canvas-btn magze-search search-icon toggle-search-block toggle" aria-label="<?php esc_attr_e( 'Search', 'magze' ); ?>" aria-expanded="false" data-block=".magze-search-block" data-body-class="showing-search-block" data-focus=".magze-search-form .search-field">
					<span class="search-label"><?php esc_html_e( 'Search', 'magze' ); ?></span>
					<?php magze_the_theme_svg( 'search' ); ?>
					<?php magze_the_theme_svg( 'cross' ); ?>
				</button>
				<div class="magze-search-form magze-canvas-modal">
					<div class="em-search-form-inner">
						<?php
						get_search_form(
							array(
								'aria_label' => __( 'Search for:', 'magze' ),
							)
						);
						?>
					</div>
				</div>
			</div>
			<?php
		endif;
	}
endif;
add_action( 'magze_secondary_nav_items', 'magze_primary_bar_search', 30 );
