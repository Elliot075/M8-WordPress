<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Magze_Single_Column_Posts extends Magze_Widget_Base {
	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'magze_single_column_posts_widget';
		$this->widget_description = __( 'Displays posts in single column style', 'magze' );
		$this->widget_id          = 'magze_single_column_posts';
		$this->widget_name        = __( 'Magze: Single Column Posts', 'magze' );
		$this->settings           = array(
			'title'                     => array(
				'type'  => 'text',
				'label' => __( 'Title', 'magze' ),
			),
			'post_settings_heading'     => array(
				'type'  => 'heading',
				'label' => __( 'Post Settings', 'magze' ),
			),
			'category'                  => array(
				'type'  => 'dropdown-taxonomies',
				'label' => __( 'Select Category', 'magze' ),
				'desc'  => __( 'Leave empty if you don\'t want the posts to be category specific', 'magze' ),
				'args'  => array(
					'taxonomy'        => 'category',
					'class'           => 'widefat',
					'hierarchical'    => true,
					'show_count'      => 1,
					'show_option_all' => __( '&mdash; Select &mdash;', 'magze' ),
				),
			),
			'number'                    => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 5,
				'label' => __( 'Number of posts to show', 'magze' ),
			),
			'offset'                    => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => '',
				'label' => __( 'Offset', 'magze' ),
				'desc'  => __( 'Can be useful if you want to skip certain number of posts. Leave as 0 if you do not want to use it.', 'magze' ),
			),
			'orderby'                   => array(
				'type'    => 'select',
				'std'     => 'date',
				'label'   => __( 'Order by', 'magze' ),
				'options' => array(
					'date'  => __( 'Date', 'magze' ),
					'id'    => __( 'ID', 'magze' ),
					'title' => __( 'Title', 'magze' ),
					'rand'  => __( 'Random', 'magze' ),
				),
			),
			'order'                     => array(
				'type'    => 'select',
				'std'     => 'desc',
				'label'   => __( 'Order', 'magze' ),
				'options' => array(
					'asc'  => __( 'ASC', 'magze' ),
					'desc' => __( 'DESC', 'magze' ),
				),
			),
			'excerpt_settings_heading'  => array(
				'type'  => 'heading',
				'label' => __( 'Excerpt Settings', 'magze' ),
			),
			'show_excerpt'              => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Excerpt', 'magze' ),
				'std'   => true,
			),
			'excerpt_length'            => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => 20,
				'label' => __( 'Excerpt Length', 'magze' ),
			),
			'show_read_more'            => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Read More', 'magze' ),
				'std'   => false,
			),
			'read_more_text'            => array(
				'type'  => 'text',
				'label' => __( 'Read More Text', 'magze' ),
				'desc'  => __( 'Leave Empty if you want to use default text "Read More" ', 'magze' ),
			),
			'read_more_style'           => array(
				'type'    => 'select',
				'label'   => __( 'Read More Style', 'magze' ),
				'options' => magze_get_read_more_styles(),
				'std'     => 'style_2',
			),
			'read_more_icon'            => array(
				'type'    => 'select',
				'label'   => __( 'Read More Icon', 'magze' ),
				'options' => magze_get_read_more_icons_list(),
				'std'     => 'arrow-right',
			),
			'category_settings_heading' => array(
				'type'  => 'heading',
				'label' => __( 'Category Settings', 'magze' ),
			),
			'show_category'             => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Category', 'magze' ),
				'std'   => true,
			),
			'category_color'            => array(
				'type'    => 'select',
				'label'   => __( 'Category Color', 'magze' ),
				'options' => magze_get_category_color_display(),
				'std'     => 'as_bg',
			),
			'category_style'            => array(
				'type'    => 'select',
				'label'   => __( 'Category Style', 'magze' ),
				'options' => magze_get_category_styles(),
				'std'     => 'style_2',
			),
			'no_of_category'            => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => 1,
				'label' => __( 'Number of Category to Display', 'magze' ),
			),
			'meta_settings_heading'     => array(
				'type'  => 'heading',
				'label' => __( 'Post Meta Settings', 'magze' ),
			),
			'post_meta'                 => array(
				'type'    => 'multi-checkbox',
				'label'   => __( 'Post Meta', 'magze' ),
				'options' => array(
					'author'    => __( 'Author', 'magze' ),
					'read_time' => __( 'Post Read Time', 'magze' ),
					'date'      => __( 'Date', 'magze' ),
					'comment'   => __( 'Comment', 'magze' ),
				),
				'std'     => array(),
			),
			'post_meta_icon'            => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Post Meta Icon', 'magze' ),
				'desc'  => __( 'Some Icons may show up regardless to provide better info.', 'magze' ),
				'std'   => true,
			),
			'date_format'               => array(
				'type'    => 'select',
				'label'   => __( 'Date Format', 'magze' ),
				'desc'    => __( 'Make sure to select Date from above for this to work.', 'magze' ),
				'options' => array(
					'format_1' => __( 'Times Ago', 'magze' ),
					'format_2' => __( 'Default Format', 'magze' ),
				),
				'std'     => 'format_1',
			),
			'author_image'              => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Author Image', 'magze' ),
				'desc'  => __( 'Make sure to select Author from above for this to work.', 'magze' ),
				'std'   => false,
			),
			'widget_settings_heading'   => array(
				'type'  => 'heading',
				'label' => __( 'Widget Settings', 'magze' ),
			),
			'enable_post_format_icon'   => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Post Format Icon', 'magze' ),
				'std'   => false,
			),
			'inverted_block_color'      => array(
				'type'  => 'checkbox',
				'label' => __( 'Inverted Color', 'magze' ),
				'desc'  => __( 'Can be used if you have dark background and want lighter color on the text.', 'magze' ),
				'std'   => false,
			),
			'title_limit'               => array(
				'type'    => 'select',
				'label'   => __( 'Post Title Limit', 'magze' ),
				'options' => magze_get_title_limit_choices(),
				'std'     => '',
			),
		);

		parent::__construct();

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	/**
	 * Query the posts and return them.
	 *
	 * @param  array $args
	 * @param  array $instance
	 * @return WP_Query
	 */
	public function get_posts( $args, $instance ) {
		$number  = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];
		$orderby = ! empty( $instance['orderby'] ) ? sanitize_text_field( $instance['orderby'] ) : $this->settings['orderby']['std'];
		$order   = ! empty( $instance['order'] ) ? sanitize_text_field( $instance['order'] ) : $this->settings['order']['std'];
		$offset  = ! empty( $instance['offset'] ) ? sanitize_text_field( $instance['offset'] ) : $this->settings['offset']['std'];

		$query_args = array(
			'posts_per_page'      => $number,
			'post_status'         => 'publish',
			'no_found_rows'       => 1,
			'orderby'             => $orderby,
			'order'               => $order,
			'ignore_sticky_posts' => 1,
		);

		if ( $offset && 0 != $offset ) {
			$query_args['offset'] = absint( $offset );
		}

		if ( ! empty( $instance['category'] ) && -1 != $instance['category'] && 0 != $instance['category'] ) {
			$query_args['tax_query'][] = array(
				'taxonomy' => 'category',
				'field'    => 'term_id',
				'terms'    => $instance['category'],
			);
		}

		return new WP_Query( apply_filters( 'magze_single_column_posts_query_args', $query_args ) );
	}

	/**
	 * Output widget.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		ob_start();

		if ( ( $posts = $this->get_posts( $args, $instance ) ) && $posts->have_posts() ) {
			$this->widget_start( $args, $instance );

			do_action( 'magze_before_single_column_posts' );

			$title_limit             = isset( $instance['title_limit'] ) ? $instance['title_limit'] : $this->settings['title_limit']['std'];
			$enable_post_format_icon = isset( $instance['enable_post_format_icon'] ) ? $instance['enable_post_format_icon'] : $this->settings['enable_post_format_icon']['std'];
			$show_excerpt            = isset( $instance['show_excerpt'] ) ? $instance['show_excerpt'] : $this->settings['show_excerpt']['std'];
			$excerpt_length          = isset( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : $this->settings['excerpt_length']['std'];
			$show_read_more          = isset( $instance['show_read_more'] ) ? $instance['show_read_more'] : $this->settings['show_read_more']['std'];
			if ( $show_read_more ) {
				$read_more_text  = isset( $instance['read_more_text'] ) ? $instance['read_more_text'] : '';
				$read_more_style = isset( $instance['read_more_style'] ) ? $instance['read_more_style'] : $this->settings['read_more_style']['std'];
				$read_more_icon  = isset( $instance['read_more_icon'] ) ? $instance['read_more_icon'] : $this->settings['read_more_icon']['std'];
			}
			$show_category = isset( $instance['show_category'] ) ? $instance['show_category'] : $this->settings['show_category']['std'];
			if ( $show_category ) {
				$cat_style = isset( $instance['category_style'] ) ? $instance['category_style'] : $this->settings['category_style']['std'];
				$color     = isset( $instance['category_color'] ) ? $instance['category_color'] : $this->settings['category_color']['std'];
				$limit     = isset( $instance['no_of_category'] ) ? $instance['no_of_category'] : $this->settings['no_of_category']['std'];
			}
			$enabled_post_meta             = isset( $instance['post_meta'] ) ? $instance['post_meta'] : $this->settings['post_meta']['std'];
			$meta_settings['date_format']  = isset( $instance['date_format'] ) ? $instance['date_format'] : $this->settings['date_format']['std'];
			$meta_settings['author_image'] = isset( $instance['author_image'] ) ? $instance['author_image'] : $this->settings['author_image']['std'];
			$meta_settings['show_icons']   = isset( $instance['post_meta_icon'] ) ? $instance['post_meta_icon'] : $this->settings['post_meta_icon']['std'];
			$inverted_block_color          = isset( $instance['inverted_block_color'] ) ? $instance['inverted_block_color'] : $this->settings['inverted_block_color']['std'];

			$col_class = 'row row-cols-1 g-4';

			// Inverted Color.
			$widget_class = '';
			if ( $inverted_block_color ) {
				$widget_class .= ' saga-block-inverted-color';
			}
			?>

			<div class="magze-single-col-posts-widget <?php echo esc_attr( $widget_class ); ?>">
				<div class="<?php echo esc_attr( $col_class ); ?>">
					<?php
					while ( $posts->have_posts() ) :
						$posts->the_post();
						?>
							<div class="col">
								<div class="magze-article-block-wrapper img-animate-zoom">
									<?php
									if ( has_post_thumbnail() ) {
										?>
										<div class="article-image magze-rounded-img">
											<a href="<?php the_permalink(); ?>">
												<?php
												if ( $enable_post_format_icon ) {
													magze_post_format_icon( 'center' );
												}
												?>
												<?php
												the_post_thumbnail(
													'magze-large-img',
													array(
														'alt' => the_title_attribute(
															array(
																'echo' => false,
															)
														),
													)
												);
												?>
											</a>
										</div>
										<?php
									}
									?>
									<div class="article-details">
										<?php
										if ( $show_category ) {
											echo '<div class="article-cat-info">';
											magze_post_categories( $cat_style, $color, $limit );
											echo '</div>';
										}
										?>
										<h3 class="article-title no-margin color-accent-hover magze-limit-lines <?php echo esc_attr( $title_limit ); ?>">
											<a href="<?php the_permalink(); ?>" class="text-decoration-none magze-title-line">
												<?php the_title(); ?>
											</a>
										</h3>
										<?php
										magze_post_meta_info( $enabled_post_meta, $meta_settings );
										if ( $show_excerpt && $excerpt_length > 0 ) {
											?>
											<div class="article-excerpt">
												<p class="no-margin">
													<?php echo wp_trim_words( get_the_excerpt(), $excerpt_length, '&hellip;' ); ?>
												</p>
											</div>
										<?php } ?>
										<?php
										if ( $show_read_more ) {
											?>
											<div class="article-read-more">
												<a href="<?php the_permalink(); ?>" class="magze-btn-link text-decoration-none <?php echo esc_attr( $read_more_style ); ?>">
													<?php
													if ( $read_more_text ) {
														echo esc_html( $read_more_text );
													} else {
														esc_html_e( 'Read More', 'magze' );
													}
													if ( $read_more_icon ) {
														?>
														<span><?php magze_the_theme_svg( $read_more_icon ); ?></span>
														<?php
													}
													?>
												</a>
											</div>
											<?php
										}
										?>
									</div>
								</div>
							</div>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
			<?php

			do_action( 'magze_after_single_column_posts' );

			$this->widget_end( $args );
		}

		echo ob_get_clean();
	}

	public function enqueue_assets() {
		magze_widget_css( $this->id_base, 'single-column-posts' );
	}
}
