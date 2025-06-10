<?php
/**
 * Displays the site navigation.
 *
 * @package Magze
 */

$class     = magze_get_sticky_menu();
$class    .= magze_get_menu_bar_border();
?>
<div class="site-header-row-wrapper magze-primary-bar-row<?php echo esc_attr( $class ); ?>">
	<div class="primary-bar-row-wrapper">
		<div class="uf-wrapper">
			<div class="magze-primary-bar-wrapper">

				<?php do_action( 'magze_primary_nav_items' ); ?>

				<div class="secondary-navigation magze-secondary-nav">
					<?php do_action( 'magze_secondary_nav_items' ); ?>
				</div>

			</div>
		</div>
	</div>
</div>