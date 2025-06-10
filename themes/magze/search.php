<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Magze
 */

get_header();

global $wp_query;

$page_layout   = magze_get_page_layout();
if( 'no-sidebar-narrow' == $page_layout ) {
	$class = ' default-max-width';
} else {
	$class = ' wide-max-width';
}

$archive_title = sprintf(
	'%1$s %2$s',
	'<span class="color-accent">' . __( 'Search:', 'magze' ) . '</span>',
	'&ldquo;' . get_search_query() . '&rdquo;'
);

if ( $wp_query->found_posts ) {
	$archive_subtitle = sprintf(
		/* translators: %s: Number of search results. */
		_n(
			'%s result for your search.',
			'%s results for your search.',
			$wp_query->found_posts,
			'magze'
		),
		number_format_i18n( $wp_query->found_posts )
	);
} else {
	$archive_subtitle = __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'magze' );
}
?>

<main id="site-content" role="main" class="wrapper<?php echo esc_attr( $class ); ?>">

	<div id="primary" class="content-area" data-template="archive_style_1">

		<div class="primary-content-area-wrapper">

				<?php if ( have_posts() ) : ?>

					<header class="archive-header">
						<h1 class="archive-title">
							<?php echo wp_kses_post( $archive_title ); ?>
						</h1>
						<div class="archive-subtitle"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
					</header><!-- .page-header -->

					<?php

					echo '<div class="magze-posts-lists">';

					get_template_part( 'template-parts/content/content', 'search' );

					echo '</div><!-- .magze-posts-lists -->';

					get_template_part( 'template-parts/pagination' );

				else :

					?>
					<header class="archive-header">
						<h1 class="archive-title">
							<?php echo wp_kses_post( $archive_title ); ?>
						</h1>
						<div class="archive-subtitle"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
					</header><!-- .page-header -->

					<div class="no-search-results-form">
						<?php
						get_search_form(
							array(
								'aria_label' => __( 'search again', 'magze' ),
							)
						);
						?>
					</div><!-- .no-search-results -->
					
					<?php

				endif;
				?>

		</div>
	</div> <!-- #primary -->

	<?php
	if ( 'no-sidebar' != $page_layout && 'no-sidebar-narrow' != $page_layout ) :
		get_sidebar();
	endif;
	?>

</main> <!-- #site-content -->

<?php
get_footer();