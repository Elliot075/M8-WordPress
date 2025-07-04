<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Magze_Post_Categories_Grid extends Magze_Widget_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'magze_post_categories_grid_widget';
		$this->widget_description = __( 'Displays post categories with image in grid', 'magze' );
		$this->widget_id          = 'magze_post_categories_grid_widget';
		$this->widget_name        = __( 'Magze: Categories Grid', 'magze' );

		$post_categories = array();
		$categories      = get_categories(
			array(
				'orderby' => 'name',
				'order'   => 'ASC',
			)
		);

		if ( ! empty( $categories ) ) {
			foreach ( $categories as $cat ) {
				$post_categories[ $cat->term_id ] = $cat->name;
			}
		}

		$this->settings = array(
			'title'                 => array(
				'type'  => 'text',
				'label' => __( 'Title', 'magze' ),
			),
			'categories'            => array(
				'type'    => 'multi-checkbox',
				'label'   => __( 'Select Categories', 'magze' ),
				'options' => $post_categories,
			),
			'no_of_column'          => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => 5,
				'std'   => 2,
				'label' => __( 'Number of Column', 'magze' ),
			),
			'display_style'         => array(
				'type'    => 'select',
				'label'   => __( 'Display Style', 'magze' ),
				'options' => array(
					'style_1' => __( 'Default', 'magze' ),
					'style_2' => __( 'Category on Bottom', 'magze' ),
					'style_3' => __( 'Category on Center', 'magze' ),
					'style_4' => __( 'Small Height', 'magze' ),
				),
				'std'     => 'style_1',
			),
			'show_post_count'       => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Post Count', 'magze' ),
				'std'   => false,
			),
			'capitalize_cat_name'   => array(
				'type'  => 'checkbox',
				'label' => __( 'Capitalize Category Name', 'magze' ),
				'std'   => true,
			),
			'overlay_color'         => array(
				'type'  => 'color',
				'label' => __( 'Overlay Color', 'magze' ),
				'std'   => '#000000',
			),
			'use_cat_color_overlay' => array(
				'type'  => 'checkbox',
				'label' => __( 'Use category color for the overlay', 'magze' ),
				'desc'  => __( 'Will override the overlay color if the category has its own color', 'magze' ),
				'std'   => false,
			),
			'overlay_opacity'       => array(
				'type'  => 'number',
				'step'  => 10,
				'min'   => 0,
				'max'   => 100,
				'std'   => 50,
				'label' => __( 'Overlay Opacity', 'magze' ),
			),
		);

		parent::__construct();

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
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

		if ( ! empty( $instance['categories'] ) ) {

			$this->widget_start( $args, $instance );

			do_action( 'magze_before_post_cat_grid' );

			$cat_label_class = '';

			$column          = $instance['no_of_column'];
			$display_style   = $instance['display_style'];
			$show_post_count = isset( $instance['show_post_count'] ) ? $instance['show_post_count'] : $this->settings['show_post_count']['std'];

			$overlay_color         = isset( $instance['overlay_color'] ) ? $instance['overlay_color'] : $this->settings['overlay_color']['std'];
			$use_cat_color_overlay = isset( $instance['use_cat_color_overlay'] ) ? $instance['use_cat_color_overlay'] : $this->settings['use_cat_color_overlay']['std'];
			$overlay_opacity       = isset( $instance['overlay_opacity'] ) ? $instance['overlay_opacity'] : $this->settings['overlay_opacity']['std'];
			$overlay_opacity       = $overlay_opacity / 100;

			$capitalize_cat_name = isset( $instance['capitalize_cat_name'] ) ? $instance['capitalize_cat_name'] : $this->settings['capitalize_cat_name']['std'];

			if ( 'style_4' == $display_style ) {
				$gap = ' g-2';
			} else {
				$gap = ' g-4';
			}

			$col_class = 'row row-cols-1 row-cols-sm-2';

			if ( 2 == $column ) {
				$col_class .= ' magze-grid-2';
			} elseif ( 3 == $column ) {
				$col_class .= ' row-cols-md-2 row-cols-lg-3 magze-grid-3';
			} elseif ( 4 == $column ) {
				$col_class .= ' row-cols-md-2 row-cols-xl-4 magze-grid-4';
			} elseif ( 5 == $column ) {
				$col_class .= ' row-cols-md-3 row-cols-lg-4 row-cols-xl-5 magze-grid-5';
			} else {
				$col_class = ' row row-cols-1';
			}

			$col_class .= $gap;

			$img_size = 'magze-large-img';

			$wrapper_class = $display_style;
			if ( $show_post_count ) {
				$wrapper_class .= ' magze-cat-post-count-active';
			}

			if ( $capitalize_cat_name ) {
				$cat_label_class .= ' magze-uppercase-text';
			}

			$style_attr = ' style="background-color:value;"';
			?>

			<div class="magze-posts-categories-grid-widget <?php echo esc_attr( $wrapper_class ); ?>">
				<div class="<?php echo esc_attr( $col_class ); ?>">
					<?php
					foreach ( $instance['categories'] as $category ) {
						$cat_info = get_category( $category );
						if ( ! empty( $cat_info ) && ! is_wp_error( $cat_info ) ) {
							$thumbnail_id = get_term_meta( $category, 'thumbnail_id', true );
							$image_tag    = wp_get_attachment_image( $thumbnail_id, $img_size );

							if ( $image_tag ) {

								$color = $overlay_val = '';

								$term_link  = get_category_link( $category );
								$post_count = $cat_info->count;
								$color      = get_term_meta( $cat_info->term_id, 'category_color', true );

								$build_style_attr = '';
								if ( $color ) {
									$build_style_attr = str_replace( 'value', $color, $style_attr );
									if ( $use_cat_color_overlay ) {
										$overlay_val = $color;
									}
								} else {
									$overlay_val      = $overlay_color;
									$build_style_attr = '';
								}

								$style  = 'background-color:' . $overlay_val . ';';
								$style .= 'opacity:' . $overlay_opacity . ';';
								?>
								<div class="col">
									<div class="saga-block-item-w-overlay img-animate-zoom">
										<div class="saga-block-image-w-overlay magze-rounded-img">
											<a href="<?php echo esc_url( $term_link ); ?>" class="">
											<span aria-hidden="true" class="magze-block-overlay" style="<?php echo esc_attr( $style ); ?>"></span>
												<?php echo $image_tag; ?>
											</a>
										</div>
										<div class="saga-block-overlay-content">
											<span class="saga-block-overlay-title">
												<a href="<?php echo esc_url( $term_link ); ?>" class="text-decoration-none">
													<span class="magze-cat-label<?php echo esc_attr( $cat_label_class ); ?>"><?php echo esc_html( $cat_info->name ); ?></span>
													<?php if ( $show_post_count ) : ?>
														<span class="magze-cat-post-count" <?php echo $build_style_attr; ?>><?php echo esc_html( $post_count ); ?></span>
													<?php endif; ?>
												</a>
											</span>
										</div>
									</div>
								</div>
								<?php
							}
						}
					}
					?>
				</div>
			</div>
			<?php

			do_action( 'magze_after_post_cat_grid' );

			$this->widget_end( $args );

		}

		echo ob_get_clean();
	}

	public function enqueue_assets() {
		magze_widget_css( $this->id_base, 'post-categories-grid' );
	}
}
