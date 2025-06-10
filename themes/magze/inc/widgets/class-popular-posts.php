<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Magze_Popular_Posts extends Magze_Widget_Base {
	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'widget_magze_popular_posts';
		$this->widget_description = __( 'Displays popular posts with an image', 'magze' );
		$this->widget_id          = 'magze_popular_posts';
		$this->widget_name        = __( 'Magze: Popular Posts', 'magze' );
		$this->settings           = array(
			'title'                                 => array(
				'type'  => 'text',
				'label' => __( 'Title', 'magze' ),
			),
			'post_settings_heading'                 => array(
				'type'  => 'heading',
				'label' => __( 'Post Settings', 'magze' ),
			),
			'category'                              => array(
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
			'no_of_posts'                           => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 5,
				'label' => __( 'Number of posts to show', 'magze' ),
			),
			'offset'                                => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => '',
				'label' => __( 'Offset', 'magze' ),
				'desc'  => __( 'Can be useful if you want to skip certain number of posts. Leave as 0 if you do not want to use it.', 'magze' ),
			),
			'orderby'                               => array(
				'type'    => 'select',
				'std'     => 'date',
				'label'   => __( 'Order By', 'magze' ),
				'options' => array(
					'date'  => __( 'Date', 'magze' ),
					'ID'    => __( 'ID', 'magze' ),
					'title' => __( 'Title', 'magze' ),
					'rand'  => __( 'Random', 'magze' ),
				),
			),
			'order'                                 => array(
				'type'    => 'select',
				'std'     => 'desc',
				'label'   => __( 'Order', 'magze' ),
				'options' => array(
					'asc'  => __( 'ASC', 'magze' ),
					'desc' => __( 'DESC', 'magze' ),
				),
			),
			'meta_settings_heading'                 => array(
				'type'  => 'heading',
				'label' => __( 'Post Meta Settings', 'magze' ),
			),
			'post_meta'                             => array(
				'type'    => 'multi-checkbox',
				'label'   => __( 'Post Meta', 'magze' ),
				'options' => array(
					'author'    => __( 'Author', 'magze' ),
					'read_time' => __( 'Post Read Time', 'magze' ),
					'date'      => __( 'Date', 'magze' ),
					'comment'   => __( 'Comment', 'magze' ),
				),
				'std'     => array( 'author', 'date' ),
			),
			'show_meta_on_express_only'             => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Post Metas on Express Post Only', 'magze' ),
				'desc'  => __( 'Make sure to select post meta from above for this to work.', 'magze' ),
				'std'   => false,
			),
			'post_meta_icon'                        => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Post Meta Icon', 'magze' ),
				'desc'  => __( 'Some Icons may show up regardless to provide better info.', 'magze' ),
				'std'   => false,
			),
			'date_format'                           => array(
				'type'    => 'select',
				'label'   => __( 'Date Format', 'magze' ),
				'desc'    => __( 'Make sure to select Date from above for this to work.', 'magze' ),
				'options' => array(
					'format_1' => __( 'Times Ago', 'magze' ),
					'format_2' => __( 'Default Format', 'magze' ),
				),
				'std'     => 'format_2',
			),
			'author_image'                          => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Author Image', 'magze' ),
				'desc'  => __( 'Make sure to select Author from above for this to work. Will only show up in express post.', 'magze' ),
				'std'   => false,
			),
			'category_settings_heading'             => array(
				'type'  => 'heading',
				'label' => __( 'Category Settings', 'magze' ),
			),
			'show_category'                         => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Category', 'magze' ),
				'std'   => false,
			),
			'category_color'                        => array(
				'type'    => 'select',
				'label'   => __( 'Category Color', 'magze' ),
				'options' => magze_get_category_color_display(),
				'std'     => 'none',
			),
			'category_style'                        => array(
				'type'    => 'select',
				'label'   => __( 'Category Style', 'magze' ),
				'options' => magze_get_category_styles(),
				'std'     => 'style_1',
			),
			'no_of_category'                        => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 0,
				'max'   => '',
				'std'   => 1,
				'label' => __( 'Number of Category to Display', 'magze' ),
			),
			'show_cat_on_express_only'              => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Categories on Express Post Only', 'magze' ),
				'desc'  => __( 'Make sure to select Show Category from above for this to work.', 'magze' ),
				'std'   => false,
			),
			'widget_settings_heading'               => array(
				'type'  => 'heading',
				'label' => __( 'Widget Settings', 'magze' ),
			),
			'style'                                 => array(
				'type'    => 'select',
				'label'   => __( 'Style', 'magze' ),
				'options' => array(
					'style_1' => __( 'List Only', 'magze' ),
					'style_2' => __( 'Express + List', 'magze' ),
				),
				'std'     => 'style_1',
			),
			'counter_style'                         => array(
				'type'    => 'select',
				'label'   => __( 'Counter Style', 'magze' ),
				'options' => array(
					'style_1' => __( 'Plain', 'magze' ),
					'style_2' => __( 'Plain with a dot', 'magze' ),
					'style_3' => __( 'Plain with a border', 'magze' ),
					'style_4' => __( 'With Background', 'magze' ),
					'style_5' => __( 'With Circular Background', 'magze' ),
				),
				'std'     => 'style_5',
			),
			'counter_accent_color'                  => array(
				'type'  => 'checkbox',
				'label' => __( 'Use accent color for the counter', 'magze' ),
				'std'   => false,
			),
			'inverted_block_color'                  => array(
				'type'  => 'checkbox',
				'label' => __( 'Inverted Color', 'magze' ),
				'desc'  => __( 'Can be used if you have dark background and want lighter color on the text.', 'magze' ),
				'std'   => false,
			),
			'title_limit'                           => array(
				'type'    => 'select',
				'label'   => __( 'Post Title Limit', 'magze' ),
				'options' => magze_get_title_limit_choices(),
				'std'     => '',
			),
			'express_post_display_settings_heading' => array(
				'type'  => 'message',
				'label' => __( 'Express Posts Settings', 'magze' ),
			),
			'express_counter_style'                 => array(
				'type'    => 'select',
				'label'   => __( 'Express Post Counter Style', 'magze' ),
				'desc'    => __( 'Useful if you want different counter style on express post.', 'magze' ),
				'options' => array(
					''        => __( '&mdash; Inherit &mdash;', 'magze' ),
					'style_1' => __( 'Plain', 'magze' ),
					'style_2' => __( 'Plain with a dot', 'magze' ),
					'style_3' => __( 'Plain with a border', 'magze' ),
					'style_4' => __( 'With Background', 'magze' ),
					'style_5' => __( 'With Circular Background', 'magze' ),
				),
				'std'     => '',
			),
			'border_below_express_post'             => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Border Below Express Post', 'magze' ),
				'std'   => false,
			),
			'invert_express_post'                   => array(
				'type'  => 'checkbox',
				'label' => __( 'Invert Express Post', 'magze' ),
				'std'   => false,
			),
			'bigger_counter_express_post'           => array(
				'type'  => 'checkbox',
				'label' => __( 'Increase Counter Font Size on Express Post', 'magze' ),
				'std'   => false,
			),
			'list_post_display_settings_heading'    => array(
				'type'  => 'message',
				'label' => __( 'List Posts Settings', 'magze' ),
			),
			'invert_list_post'                      => array(
				'type'  => 'checkbox',
				'label' => __( 'Invert List Post', 'magze' ),
				'std'   => false,
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
		$number  = ! empty( $instance['no_of_posts'] ) ? absint( $instance['no_of_posts'] ) : $this->settings['no_of_posts']['std'];
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

		if ( ! empty( $instance['category'] ) && -1 !== $instance['category'] && 0 !== $instance['category'] ) {
			$query_args['tax_query'][] = array(
				'taxonomy' => 'category',
				'field'    => 'term_id',
				'terms'    => $instance['category'],
			);
		}

		return new WP_Query( apply_filters( 'magze_popular_posts_query_args', $query_args ) );
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

			do_action( 'magze_before_popular_posts_with_image' );

			$style        = isset( $instance['style'] ) ? $instance['style'] : $this->settings['style']['std'];
			$widget_class = $style;

			$title_limit          = isset( $instance['title_limit'] ) ? $instance['title_limit'] : $this->settings['title_limit']['std'];
			$counter_accent_color = isset( $instance['counter_accent_color'] ) ? $instance['counter_accent_color'] : $this->settings['counter_accent_color']['std'];
			$inverted_block_color = isset( $instance['inverted_block_color'] ) ? $instance['inverted_block_color'] : $this->settings['inverted_block_color']['std'];
			$counter_style        = isset( $instance['counter_style'] ) ? $instance['counter_style'] : $this->settings['counter_style']['std'];

			$show_category = isset( $instance['show_category'] ) ? $instance['show_category'] : $this->settings['show_category']['std'];
			if ( $show_category ) {
				$cat_style = isset( $instance['category_style'] ) ? $instance['category_style'] : $this->settings['category_style']['std'];
				$color     = isset( $instance['category_color'] ) ? $instance['category_color'] : $this->settings['category_color']['std'];
				$limit     = isset( $instance['no_of_category'] ) ? $instance['no_of_category'] : $this->settings['no_of_category']['std'];
			}
			$cat_on_express_only = isset( $instance['show_cat_on_express_only'] ) ? $instance['show_cat_on_express_only'] : $this->settings['show_cat_on_express_only']['std'];

			$enabled_post_meta             = isset( $instance['post_meta'] ) ? $instance['post_meta'] : $this->settings['post_meta']['std'];
			$meta_settings['date_format']  = isset( $instance['date_format'] ) ? $instance['date_format'] : $this->settings['date_format']['std'];
			$meta_settings['show_icons']   = isset( $instance['post_meta_icon'] ) ? $instance['post_meta_icon'] : $this->settings['post_meta_icon']['std'];
			$meta_settings['author_image'] = isset( $instance['author_image'] ) ? $instance['author_image'] : $this->settings['author_image']['std'];
			$meta_on_express_only          = isset( $instance['show_meta_on_express_only'] ) ? $instance['show_meta_on_express_only'] : $this->settings['show_meta_on_express_only']['std'];

			// Check for list only styles.
			$list_only_style = false;
			if ( 'style_1' == $style ) {
				$list_only_style = true;
			}

			$image_size         = 'magze-large-img';
			$express_post_style = 'style_1';

			// Counter Accent Color.
			if ( $counter_accent_color ) {
				$widget_class .= ' magze-is-counter-accent';
			}

			// Inverted Color.
			if ( $inverted_block_color ) {
				$widget_class .= ' saga-block-inverted-color';
			}

			// Border Below Express Post.
			$border_below_express_post = isset( $instance['border_below_express_post'] ) ? $instance['border_below_express_post'] : $this->settings['border_below_express_post']['std'];
			if ( $border_below_express_post ) {
				$widget_class .= ' magze-border-popular-express';
			}

			// Bigger Counter in Express Post.
			$bigger_counter_express_post = isset( $instance['bigger_counter_express_post'] ) ? $instance['bigger_counter_express_post'] : $this->settings['bigger_counter_express_post']['std'];
			if ( $bigger_counter_express_post ) {
				$widget_class .= ' magze-big-popular-express';
			}

			// Inverted Style.
			$invert_express_post = isset( $instance['invert_express_post'] ) ? $instance['invert_express_post'] : $this->settings['invert_express_post']['std'];
			$invert_list_post    = isset( $instance['invert_list_post'] ) ? $instance['invert_list_post'] : $this->settings['invert_list_post']['std'];
			if ( $invert_express_post ) {
				$widget_class .= ' magze-inverted-popular-express';
			}
			if ( $invert_list_post ) {
				$widget_class .= ' magze-inverted-popular-list';
			}

			$show_image      = false;
			$is_express_post = false;
			?>

			<div class="magze-popular-posts-widget <?php echo esc_attr( $widget_class ); ?>">
				<?php
				$counter     = 1;
				$total_posts = $posts->post_count;

				$post_counter_style = $counter_style;

				while ( $posts->have_posts() ) :
					$posts->the_post();

					if ( ! $list_only_style ) {
						
						if ( 1 == $counter ) {
							$is_express_post     = true;
							$wrapper_class_start = '<div class="magze-popular-express ' . $express_post_style . '">';
							$wrapper_class_end   = '</div>';

							// Check for different counter.
							$express_counter_style = isset( $instance['express_counter_style'] ) ? $instance['express_counter_style'] : $this->settings['express_counter_style']['std'];
							if ( $express_counter_style ) {
								$counter_style = $express_counter_style;
							}
						} else {
							$is_express_post = false;
							if ( 2 == $counter ) {
								$wrapper_class_start = '<div class="magze-list-posts">';
							}
							// Make sure to close on the last post.
							if ( $counter == $total_posts ) {
								$wrapper_class_end = '</div>';
							}

							$counter_style = $post_counter_style;
						}
					} else {
						$wrapper_class_start = '<div class="magze-list-posts">';
						$wrapper_class_end   = '</div>';
					}

					if ( $is_express_post ) {
						$show_image = true;
					} else {
						$show_image = false;
					}
					?>

					<?php echo wp_kses_post( $wrapper_class_start ); ?>

						<?php
						if ( $show_image ) :
							$this->display_image( $image_size );
						endif;
						?>

						<div class="magze-article-block-wrapper">

							<?php $this->display_counter( $counter, $counter_style ); ?>

							<div class="article-details">
								<?php

								if ( $show_category ) {
									if ( $cat_on_express_only ) {
										if ( $is_express_post ) {
											$this->display_categories( $cat_style, $color, $limit );
										}
									} else {
										$this->display_categories( $cat_style, $color, $limit );
									}
								}

								$this->display_title( $title_limit );

								if ( ! $is_express_post ) {
									$meta_settings['author_image'] = false;
								}
								if ( $meta_on_express_only ) {
									if ( $is_express_post ) {
										$this->display_meta( $enabled_post_meta, $meta_settings );
									}
								} else {
									$this->display_meta( $enabled_post_meta, $meta_settings );
								}
								?>

							</div>

						</div>

					<?php echo wp_kses_post( $wrapper_class_end ); ?>

					<?php
					++$counter;
				endwhile;
				wp_reset_postdata();
				?>
			</div>
			<?php

			do_action( 'magze_after_popular_posts_with_image' );

			$this->widget_end( $args );
		}

		echo ob_get_clean();
	}

	public function display_image( $size ) {
		if ( has_post_thumbnail() ) :
			?>
			<div class="entry-image img-animate-zoom magze-rounded-img">
				<a href="<?php the_permalink(); ?>">
				<?php
				the_post_thumbnail(
					$size,
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
		endif;
	}

	public function display_counter( $counter, $counter_style ) {
		?>
		<div class="article-counter <?php echo esc_attr( $counter_style ); ?>"><?php echo esc_html( sprintf( '%02d', $counter ) ); ?></div>
		<?php
	}

	public function display_title( $title_limit ) {
		?>
		<h3 class="article-title no-margin color-accent-hover magze-limit-lines <?php echo esc_attr( $title_limit ); ?>">
			<a href="<?php the_permalink(); ?>" class="text-decoration-none magze-title-line">
				<?php the_title(); ?>
			</a>
		</h3>
		<?php
	}

	public function display_categories( $cat_style, $color, $limit ) {
		?>
		<div class="article-cat-info">
			<?php magze_post_categories( $cat_style, $color, $limit ); ?>
		</div>
		<?php
	}

	public function display_meta( $enabled_post_meta, $meta_settings ) {
		magze_post_meta_info( $enabled_post_meta, $meta_settings );
	}

	public function enqueue_assets() {
		magze_widget_css( $this->id_base, 'popular-posts' );
	}
}
