<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Magze_Mailchimp_Form extends Magze_Widget_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'widget_magze_mailchimp_form';
		$this->widget_description = __( 'Displays MailChimp form if you have any', 'magze' );
		$this->widget_id          = 'magze_mailchimp_form';
		$this->widget_name        = __( 'Magze: MailChimp Form', 'magze' );
		$this->settings           = array(
			'title'                      => array(
				'type'  => 'text',
				'label' => __( 'Widget Title', 'magze' ),
			),
			'mailchimp_settings_heading' => array(
				'type'  => 'heading',
				'label' => __( 'Mailchimp Settings', 'magze' ),
			),
			'mailchimp_title'            => array(
				'type'  => 'text',
				'label' => __( 'Mailchimp Title', 'magze' ),
			),
			'desc'                       => array(
				'type'  => 'textarea',
				'label' => __( 'Description', 'magze' ),
				'rows'  => 10,
			),
			'form_shortcode'             => array(
				'type'  => 'text',
				'label' => __( 'MailChimp Form Shortcode', 'magze' ),
			),
			'widget_settings_heading'    => array(
				'type'  => 'heading',
				'label' => __( 'Widget Settings', 'magze' ),
			),
			'style'                      => array(
				'type'    => 'select',
				'label'   => __( 'Style', 'magze' ),
				'desc'    => __( 'For Inline Style, make sure to wrap each element ( like name, email, submit, etc. ) you want to display as inline, inside a "&lt;p&gt;&lt;/p&gt;" tag.', 'magze' ),
				'options' => array(
					'style_1' => __( 'Default Style', 'magze' ),
					'style_2' => __( 'Form Items Inline', 'magze' ),
					'style_3' => __( 'Content Inline + Form Items Inline', 'magze' ),
				),
				'std'     => 'style_1',
			),
			'center_aligned_form'        => array(
				'type'  => 'checkbox',
				'label' => __( 'Center Aligned Form', 'magze' ),
				'std'   => false,
			),
			'wide_submit_btn'            => array(
				'type'  => 'checkbox',
				'label' => __( 'Wide Submit Button', 'magze' ),
				'std'   => false,
			),
			'inverted_block_color'       => array(
				'type'  => 'checkbox',
				'label' => __( 'Inverted Color', 'magze' ),
				'desc'  => __( 'Can be used if you have dark background color or image background and want lighter color on the text.', 'magze' ),
				'std'   => false,
			),
			'height'                     => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 150,
				'max'   => '',
				'std'   => 350,
				'label' => __( 'Height (px)', 'magze' ),
				'desc'  => __( 'Works when there is either a background color or image.', 'magze' ),
			),
			'bg_color_settings'          => array(
				'type'  => 'heading',
				'label' => __( 'Background Color', 'magze' ),
			),
			'enable_bg_color'            => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Background Color', 'magze' ),
				'std'   => false,
			),
			'bg_color'                   => array(
				'type'  => 'color',
				'label' => __( 'Background Color', 'magze' ),
				'std'   => '#f5f7f8',
				'desc'  => __( 'Will be overridden if used background image.', 'magze' ),
			),
			'bg_image_settings'          => array(
				'type'  => 'heading',
				'label' => __( 'Background Image', 'magze' ),
			),
			'bg_image'                   => array(
				'type'  => 'image',
				'label' => __( 'Background Image', 'magze' ),
				'desc'  => __( 'Will override the background color if you set an image.', 'magze' ),
			),
			'enable_fixed_bg'            => array(
				'type'  => 'checkbox',
				'label' => __( 'Enable Fixed Background Image', 'magze' ),
				'std'   => true,
			),
			'bg_overlay_color'           => array(
				'type'  => 'color',
				'label' => __( 'Overlay Color', 'magze' ),
				'std'   => '#000000',
			),
			'overlay_opacity'            => array(
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
		if ( ! empty( $instance['form_shortcode'] ) ) {

			ob_start();

			$style         = '';
			
			$display_style = isset( $instance['style'] ) ? $instance['style'] : $this->settings['style']['std'];
			$class         = $display_style;
			
			if ( 'style_2' == $display_style || 'style_3' == $display_style ) {
				$class .= ' magze-inline-mailchimp-form';
			}

			$image_enabled = false;

			$this->widget_start( $args, $instance );

			if ( $instance['center_aligned_form'] ) {
				$class .= ' magze-mailchimp-centered';
			}

			if ( $instance['wide_submit_btn'] ) {
				$class .= ' magze-mailchimp-wide-btn';
			}

			if ( ( $instance['bg_image'] && 0 != $instance['bg_image'] ) ) {
				$image_enabled = true;
				if ( $instance['enable_fixed_bg'] ) {
					$class .= ' magze-bg-image magze-bg-attachment-fixed';
				}
			}

			if ( $instance['enable_bg_color'] || $image_enabled ) {
				$height = isset( $instance['height'] ) ? $instance['height'] : $this->settings['height']['std'];
				$style .= 'min-height:' . esc_attr( $height ) . 'px;';
				$class .= ' magze-cover-block';
			}

			// Inverted Color.
			$inverted_block_color = isset( $instance['inverted_block_color'] ) ? $instance['inverted_block_color'] : $this->settings['inverted_block_color']['std'];
			if ( $inverted_block_color ) {
				$class .= ' saga-block-inverted-color';
			}

			do_action( 'magze_before_mailchimp' );

			$widget_inline_styles = '';
			$widget_id            = isset( $args['widget_id'] ) ? $args['widget_id'] : '';

			if ( $widget_id ) {
				if ( $instance['enable_bg_color'] ) {
					$bg_color = isset( $instance['bg_color'] ) ? $instance['bg_color'] : $this->settings['bg_color']['std'];
					if ( $bg_color ) {
						$widget_inline_styles .= "
							#{$widget_id} .magze-mailchimp-widget {
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
			
			<div class="magze-mailchimp-widget <?php echo esc_attr( $class ); ?>" style="<?php echo esc_attr( $style ); ?>">

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
				<div class="magze-mailchimp-inner-wrapper magze-block-inner-wrapper">

					<div class="mailchimp-content">

						<?php if ( $instance['mailchimp_title'] ) : ?>
							<h3 class="mailchimp-title">
								<?php echo esc_html( $instance['mailchimp_title'] ); ?>
							</h3>
						<?php endif; ?>

						<?php if ( $instance['desc'] ) : ?>
							<div class="mailchimp-desc">
								<?php echo wpautop( wp_kses_post( $instance['desc'] ) ); ?>
							</div>
						<?php endif; ?>

					</div>
					
					<div class="mailchimp-form">
						<?php echo do_shortcode( $instance['form_shortcode'] ); ?>
					</div>

				</div>

			</div>

			<?php

			do_action( 'magze_after_mailchimp' );

			$this->widget_end( $args );

			echo ob_get_clean();
		}
	}

	public function enqueue_assets() {
		magze_widget_css( $this->id_base, 'mailchimp-form' );
	}
}
