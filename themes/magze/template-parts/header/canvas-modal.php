<?php
// Inverted OffCanvas.
$wrapper_classes = 'magze-canvas-block';
if ( 'dark' == get_theme_mod( 'offcanvas_theme', 'light' ) ) {
	$wrapper_classes .= ' inverted-offcanvas';
}
?>
<div class="magze-canvas-modal <?php echo esc_attr( $wrapper_classes ); ?>" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Offcanvas', 'magze' ); ?>">
	<div class="magze-canvas-header">
		<?php
		$offcanvas_logo = get_theme_mod( 'offcanvas_logo' );
		if ( $offcanvas_logo ) {
			?>
			<div class="magze-offcanvas-logo">
				<img src="<?php echo esc_url( $offcanvas_logo ); ?>">
			</div>
			<?php
		}
		?>
		<button class="close-canvas-modal magze-off-canvas-close toggle fill-children-current-color">
			<span class="screen-reader-text"><?php esc_html_e( 'Close Off Canvas', 'magze' ); ?></span>
			<?php magze_the_theme_svg( 'modal-close' ); ?>
		</button>
	</div>
	<?php
	$heading_style = ' saga-title-style-' . get_theme_mod( 'offcanvas_widgetarea_heading_style', 'style_9' );
	$heading_align = ' saga-title-align-' . get_theme_mod( 'offcanvas_widgetarea_heading_align', 'left' );
	$class         = $heading_style . $heading_align;

	$offcanvas_menu_hide_desktop = get_theme_mod( 'offcanvas_menu_hide_desktop', true );
	if ( $offcanvas_menu_hide_desktop ) {
		$class .= ' offcanvas-menu-hide-desktop';
	}
	?>
	<div class="magze-canvas-content magze-secondary-column <?php echo esc_attr( $class ); ?>">
		<?php
		if ( is_active_sidebar( 'offcanvas-before-menu' ) ) :
			dynamic_sidebar( 'offcanvas-before-menu' );
		endif;
		?>
		<nav aria-label="<?php echo esc_attr_x( 'Mobile', 'menu', 'magze' ); ?>" role="navigation">
			<ul id="magze-mobile-nav" class="magze-responsive-menu reset-list-style">
				<?php
				if ( has_nav_menu( 'primary-menu' ) ) {
					wp_nav_menu(
						array(
							'container'      => '',
							'items_wrap'     => '%3$s',
							'show_toggles'   => true,
							'theme_location' => 'primary-menu',
						)
					);
				}
				?>
			</ul>
		</nav>
		<?php
		if ( is_active_sidebar( 'offcanvas-after-menu' ) ) :
			dynamic_sidebar( 'offcanvas-after-menu' );
		endif;
		?>
	</div>
</div>
