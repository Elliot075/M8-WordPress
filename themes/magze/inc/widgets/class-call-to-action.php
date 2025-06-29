<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Magze_Call_To_Action extends Magze_Widget_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'widget_magze_call_to_action';
		$this->widget_description = __( 'Adds Call to action section', 'magze' );
		$this->widget_id          = 'magze_call_to_action';
		$this->widget_name        = __( 'Magze: Call To Action', 'magze' );

		$this->settings = array(
			'title'                => array(
				'type'  => 'text',
				'label' => __( 'Widget Title', 'magze' ),
			),
			'cta_settings'         => array(
				'type'  => 'heading',
				'label' => __( 'CTA Settings', 'magze' ),
			),
			'title_text'           => array(
				'type'  => 'text',
				'label' => __( 'CTA Title', 'magze' ),
			),
			'desc'                 => array(
				'type'  => 'textarea',
				'label' => __( 'CTA Description', 'magze' ),
				'rows'  => 10,
			),
			'btn_text'             => array(
				'type'  => 'text',
				'label' => __( 'Button Text', 'magze' ),
			),
			'btn_link'             => array(
				'type'  => 'url',
				'label' => __( 'Link to url', 'magze' ),
				'desc'  => __( 'Enter a proper url with http: OR https:', 'magze' ),
			),
			'btn_style'            => array(
				'type'    => 'select',
				'label'   => __( 'Button Style', 'magze' ),
				'options' => magze_get_read_more_styles(),
				'std'     => 'style_1',
			),
			'btn_icon'             => array(
				'type'    => 'select',
				'label'   => __( 'Button Icon', 'magze' ),
				'options' => magze_get_read_more_icons_list(),
				'std'     => '',
			),
			'link_target'          => array(
				'type'  => 'checkbox',
				'label' => __( 'Open Link in new Tab', 'magze' ),
				'std'   => true,
			),
			'widget_settings'      => array(
				'type'  => 'heading',
				'label' => __( 'Widget Settings', 'magze' ),
			),
			'style'                => array(
				'type'    => 'select',
				'label'   => __( 'Display Style', 'magze' ),
				'options' => array(
					'style_1' => __( 'Items Aligned Center + Small Width Description', 'magze' ),
					'style_2' => __( 'Items Aligned Center + Full Width Description', 'magze' ),
					'style_3' => __( 'Items Aligned Left', 'magze' ),
					'style_4' => __( 'Items Aligned Right', 'magze' ),
					'style_5' => __( 'Normal', 'magze' ),
				),
				'std'     => 'style_1',
			),
			'justify_content'      => array(
				'type'  => 'checkbox',
				'label' => __( 'Justify Content', 'magze' ),
				'std'   => false,
			),
			'inverted_block_color' => array(
				'type'  => 'checkbox',
				'label' => __( 'Inverted Color', 'magze' ),
				'desc'  => __( 'Can be used if you have dark background color or image background and want lighter color on the text.', 'magze' ),
				'std'   => false,
			),
			'height'               => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 150,
				'max'   => '',
				'std'   => 350,
				'label' => __( 'Height (px)', 'magze' ),
				'desc'  => __( 'Works when there is either a background color or image.', 'magze' ),
			),
			'bg_color_settings'    => array(
				'type'  => 'heading',
				'label' => __( 'Background Color', 'magze' ),
			),
			'enable_bg_color'      => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Background Color', 'magze' ),
				'std'   => true,
			),
			'bg_color'             => array(
				'type'  => 'color',
				'label' => __( 'Background Color', 'magze' ),
				'std'   => '#f5f7f8',
				'desc'  => __( 'Will be overridden if used background image.', 'magze' ),
			),
			'bg_image_settings'    => array(
				'type'  => 'heading',
				'label' => __( 'Background Image', 'magze' ),
			),
			'bg_image'             => array(
				'type'  => 'image',
				'label' => __( 'Background Image', 'magze' ),
				'desc'  => __( 'Will override the background color if you set an image.', 'magze' ),
			),
			'enable_fixed_bg'      => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Fixed Background Image', 'magze' ),
				'std'   => true,
			),
			'bg_overlay_color'     => array(
				'type'  => 'color',
				'label' => __( 'Overlay Color', 'magze' ),
				'std'   => '#000000',
			),
			'overlay_opacity'      => array(
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

		$style           = '';
		$class           = isset( $instance['style'] ) ? $instance['style'] : $this->settings['style']['std'];
		$enable_bg_color = isset( $instance['enable_bg_color'] ) ? $instance['enable_bg_color'] : $this->settings['enable_bg_color']['std'];
		$image_enabled   = false;

		$this->widget_start( $args, $instance );

		if ( ( isset( $instance['bg_image'] ) && 0 != $instance['bg_image'] ) ) {
			$image_enabled = true;
			if ( $instance['enable_fixed_bg'] ) {
				$class .= ' magze-bg-image magze-bg-attachment-fixed';
			}
		}

		if ( $enable_bg_color || $image_enabled ) {
			$height = isset( $instance['height'] ) ? $instance['height'] : $this->settings['height']['std'];
			$style .= 'min-height:' . esc_attr( $height ) . 'px;';
			$class .= ' magze-cover-block';
		}

		$justify_content = isset( $instance['justify_content'] ) ? $instance['justify_content'] : '';
		if ( $justify_content ) {
			$class .= ' justified-cta';
		}

		// Inverted Color.
		$inverted_block_color = isset( $instance['inverted_block_color'] ) ? $instance['inverted_block_color'] : $this->settings['inverted_block_color']['std'];
		if ( $inverted_block_color ) {
			$class .= ' saga-block-inverted-color';
		}

		do_action( 'magze_before_cta' );

		$widget_inline_styles = '';
		$widget_id            = isset( $args['widget_id'] ) ? $args['widget_id'] : '';

		if ( $widget_id ) {
			if ( $enable_bg_color ) {
				$bg_color = isset( $instance['bg_color'] ) ? $instance['bg_color'] : $this->settings['bg_color']['std'];
				if ( $bg_color ) {
					$widget_inline_styles .= "
						#{$widget_id} .magze-cta-widget {
							background-color:{$bg_color} !important;
						}
					";
				}
			}
			if ( $widget_inline_styles ) {
				echo '<style>' . wp_strip_all_tags( magze_refactor_css( $widget_inline_styles ) ) . '</style>';
			}
		}

		?>

		<div class="magze-cta-widget <?php echo esc_attr( $class ); ?>" style="<?php echo esc_attr( $style ); ?>">

			<?php
			if ( $image_enabled ) {
				$overlay_style  = 'background-color:' . $instance['bg_overlay_color'] . ';';
				$overlay_style .= 'opacity:' . ( $instance['overlay_opacity'] / 100 ) . ';';
				?>
					<span aria-hidden="true" class="magze-block-overlay" style="<?php echo esc_attr( $overlay_style ); ?>"></span>
					<?php echo wp_get_attachment_image( $instance['bg_image'], 'full' ); ?>
					<?php
			}
			?>
			<div class="magze-cta-inner-wrapper magze-block-inner-wrapper">

				<?php if ( isset( $instance['title_text'] ) && $instance['title_text'] ) : ?>
					<h3 class="cta-title">
						<?php echo esc_html( $instance['title_text'] ); ?>
					</h3>
				<?php endif; ?>

				<?php if ( isset( $instance['desc'] ) && $instance['desc'] ) : ?>
					<div class="cta-description">
						<?php echo wpautop( wp_kses_post( $instance['desc'] ) ); ?>
					</div>
				<?php endif; ?>

				<?php
				if ( isset( $instance['btn_text'] ) && $instance['btn_text'] ) :
					$link_class = isset( $instance['btn_style'] ) ? $instance['btn_style'] : $this->settings['btn_style']['std'];
					$btn_icon   = isset( $instance['btn_icon'] ) ? $instance['btn_icon'] : $this->settings['btn_icon']['std'];
					?>
					<div class="cta-button">
						<a href="<?php echo ( $instance['btn_link'] ) ? esc_url( $instance['btn_link'] ) : ''; ?>" 
						target="<?php echo ( $instance['link_target'] ) ? '_blank' : '_self'; ?>" class="magze-btn-link text-decoration-none <?php echo esc_attr( $link_class ); ?>">
							<?php
							echo esc_html( ( $instance['btn_text'] ) );
							if ( $btn_icon ) {
								?>
								<span><?php magze_the_theme_svg( $btn_icon ); ?></span>
								<?php
							}
							?>
						</a>
					</div>
				<?php endif; ?>

			</div>

		</div>

		<?php

		do_action( 'magze_after_cta' );

		$this->widget_end( $args );

		echo ob_get_clean();
	}

	public function enqueue_assets() {
		magze_widget_css( $this->id_base, 'call-to-action' );
	}
}
