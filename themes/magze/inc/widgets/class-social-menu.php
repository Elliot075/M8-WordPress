<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Magze_Social_Menu extends Magze_Widget_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'widget_magze_social_menu';
		$this->widget_description = __( 'Displays social menu if you have set it.', 'magze' );
		$this->widget_id          = 'magze_social_menu';
		$this->widget_name        = __( 'Magze: Social Menu', 'magze' );
		$this->settings           = array(
			'title'      => array(
				'type'  => 'text',
				'label' => __( 'Title', 'magze' ),
			),
			'color'      => array(
				'type'    => 'select',
				'label'   => __( 'Social Links Color', 'magze' ),
				'options' => array(
					'theme_color' => __( 'Use Theme Color', 'magze' ),
					'brand_color' => __( 'Use Brand Color', 'magze' ),
				),
				'std'     => 'theme_color',
			),
			'style'      => array(
				'type'    => 'select',
				'label'   => __( 'Style', 'magze' ),
				'options' => magze_get_social_links_styles(),
				'std'     => 'style_1',
			),
			'show_label' => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Label', 'magze' ),
				'std'   => false,
			),
			'column'     => array(
				'type'    => 'select',
				'label'   => __( 'Column', 'magze' ),
				'desc'    => __( 'Will only work when label is enabled from above and there is enough space to display the columns.', 'magze' ),
				'options' => array(
					'one'   => __( 'One', 'magze' ),
					'two'   => __( 'Two', 'magze' ),
					'three' => __( 'Three', 'magze' ),
				),
				'std'     => 'two',
			),
			'align'      => array(
				'type'    => 'select',
				'label'   => __( 'Alignment', 'magze' ),
				'options' => array(
					'left'   => __( 'Left', 'magze' ),
					'center' => __( 'Center', 'magze' ),
					'right'  => __( 'Right', 'magze' ),
				),
				'std'     => 'left',
			),
			'inverted_block_color'      => array(
				'type'  => 'checkbox',
				'label' => __( 'Inverted Color', 'magze' ),
				'desc'  => __( 'Can be used if you have dark background and some social brands color are also dark', 'magze' ),
				'std'   => false,
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

		$this->widget_start( $args, $instance );

		do_action( 'magze_before_social_menu' );

		$wrapper_class = isset( $instance['align'] ) ? $instance['align'] : $this->settings['align']['std'];

		$inverted_block_color = isset( $instance['inverted_block_color'] ) ? $instance['inverted_block_color'] : $this->settings['inverted_block_color']['std'];
		// Inverted Color.
		if ( $inverted_block_color ) {
			$wrapper_class .= ' saga-block-inverted-color';
		}

		?>
		<div class="magze-social-menu-widget menu-align-<?php echo esc_attr( $wrapper_class ); ?>">
			<?php

			if ( has_nav_menu( 'social-menu' ) ) {

				$social_link_class  = ' reset-list-style magze-social-icons ';
				$social_link_style  = isset( $instance['style'] ) ? $instance['style'] : $this->settings['style']['std'];
				$social_link_style .= magze_get_social_icons_class( $social_link_style );
				$social_link_color  = isset( $instance['color'] ) ? $instance['color'] : $this->settings['color']['std'];

				$social_link_class .= $social_link_style . ' ' . $social_link_color;

				$label_class = 'screen-reader-text';
				$show_label  = isset( $instance['show_label'] ) ? $instance['show_label'] : $this->settings['show_label']['std'];
				if ( $show_label ) {
					$label_class        = 'em-social-menu-label';
					$social_link_class .= ' has-social-menu-label';
					$column             = isset( $instance['column'] ) ? $instance['column'] : $this->settings['column']['std'];
					$social_link_class .= ' em-flex-col-' . $column;
				}

				wp_nav_menu(
					array(
						'theme_location'  => 'social-menu',
						'container_class' => 'social-navigation',
						'fallback_cb'     => false,
						'depth'           => 1,
						'menu_class'      => $social_link_class,
						'link_before'     => '<span class="' . $label_class . '">',
						'link_after'      => '</span>',
					)
				);
			} else {
				esc_html_e( 'Social menu is not set. You need to create menu and assign it to Social Menu on Menu Settings.', 'magze' );
			}
			?>
		</div>
		<?php

		do_action( 'magze_after_social_menu' );

		$this->widget_end( $args );

		echo ob_get_clean();
	}

	public function enqueue_assets() {
		magze_widget_css( $this->id_base, 'social-menu' );
	}
}
