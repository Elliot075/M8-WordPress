
<?php get_template_part( 'template-parts/single/entry-hero-single' ); ?>

<?php get_template_part( 'template-parts/single/entry-header-single' ); ?>

<?php do_action( 'magze_single_before_content' ); ?>

<div class="entry-content">
	<?php

	the_content(
		sprintf(
			wp_kses(
			/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'magze' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		)
	);

	wp_link_pages(
		array(
			'before' => '<nav class="page-links"><span class="label">' . __( 'Pages:', 'magze' ) . '</span>',
			'after'  => '</nav>',
		)
	);

	?>
</div><!-- .entry-content -->

<?php do_action( 'magze_single_after_content' ); ?>

<div class="single-footer-info">
	<?php

	do_action( 'magze_single_before_footer_meta' );

	$cat_position = get_theme_mod( 'single_category_position', 'before_title' );
	if ( 'after_content' == $cat_position ) {
		magze_single_categories( $enabled_post_meta );
	}
	magze_single_tags( $enabled_post_meta );
	magze_post_edit_link();

	do_action( 'magze_single_after_footer_meta' );
	?>
</div>
