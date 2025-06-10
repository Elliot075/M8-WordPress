<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Magze
 */
?>

<?php do_action( 'magze_before_footer' ); ?>

<?php get_template_part( 'template-parts/footer/before-footer' ); ?>

<?php get_template_part( 'template-parts/footer/before-footer-no-container' ); ?>

<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

<?php get_template_part( 'template-parts/footer/footer-info' ); ?>

<?php get_template_part( 'template-parts/footer/after-footer' ); ?>

<?php get_template_part( 'template-parts/footer/after-footer-no-container' ); ?>

<?php do_action( 'magze_after_footer' ); ?>

<?php
if ( get_theme_mod( 'enable_scroll_to_top', true ) ) {
	$pos = get_theme_mod( 'scroll_to_top_pos', 'right' );
	?>
	<a href="#" class="magze-toggle-scroll-top magze-floating-scroll-top fill-children-current-color <?php echo esc_attr( $pos ); ?>" aria-label="<?php esc_attr_e('Scroll To Top', 'magze'); ?>">
		<?php magze_the_theme_svg( 'chevron-up' ); ?>
	</a>
	<?php
}
?>
	</div><!-- #site-content-wrapper -->
</div><!-- #page -->

<?php do_action( 'magze_after_site' ); ?>

<?php get_template_part( 'template-parts/header/canvas-modal' ); ?>

<?php wp_footer(); ?>

</body>
</html>
