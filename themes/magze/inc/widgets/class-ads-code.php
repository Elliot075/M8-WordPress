<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Magze_Ads_Code extends Magze_Widget_Base {
	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'magze_ads_code_widget';
		$this->widget_description = __( 'Advertisements or codes widget.', 'magze' );
		$this->widget_id          = 'magze_ads_code_widget';
		$this->widget_name        = __( 'Magze: Ads Code', 'magze' );
		$this->settings           = array(
			'ads_code'        => array(
				'type'  => 'custom_html',
				'label' => __( 'Ads Code', 'magze' ),
				'rows'  => 10,
			),
			'align'           => array(
				'type'    => 'select',
				'label'   => __( 'Alignment', 'magze' ),
				'desc'    => __( 'If you are using adsense code and it is not showing up, select "None" for the alignment.', 'magze' ),
				'options' => array(
					'unset'   => __( 'None', 'magze' ),
					'left'    => __( 'Left', 'magze' ),
					'center'  => __( 'Center', 'magze' ),
					'right'   => __( 'Right', 'magze' ),
					'strecth' => __( 'Stretch', 'magze' ),
				),
				'std'     => 'center',
			),
			'widget_visibility_heading' => array(
				'type'  => 'heading',
				'label' => __( 'Visibility Settings', 'magze' ),
			),
			'hide_on_desktop' => array(
				'type'  => 'checkbox',
				'label' => __( 'Hide on Desktop', 'magze' ),
				'std'   => false,
			),
			'hide_on_tablet'  => array(
				'type'  => 'checkbox',
				'label' => __( 'Hide on Tablet', 'magze' ),
				'std'   => false,
			),
			'hide_on_mobile'  => array(
				'type'  => 'checkbox',
				'label' => __( 'Hide on Mobile', 'magze' ),
				'std'   => false,
			),
		);

		parent::__construct();
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

		$before_widget = $args['before_widget'];
		$after_widget  = $args['after_widget'];

		echo wp_kses_post( $before_widget );

		$ad_class = '';
		if ( isset( $instance['hide_on_desktop'] ) && $instance['hide_on_desktop'] ) {
			$ad_class .= ' hide-on-desktop';
		}
		if ( isset( $instance['hide_on_tablet'] ) && $instance['hide_on_tablet'] ) {
			$ad_class .= ' hide-on-tablet';
		}
		if ( isset( $instance['hide_on_mobile'] ) && $instance['hide_on_mobile'] ) {
			$ad_class .= ' hide-on-mobile';
		}

		do_action( 'magze_before_ads_code' );

		if ( isset( $instance['ads_code'] ) && $instance['ads_code'] ) {
			$content = apply_filters( 'widget_custom_html_content', $instance['ads_code'], $instance, $this );
			?>
			<div class="magze-ads-code-widget<?php echo esc_attr( $ad_class ); ?>" style="justify-items:<?php echo esc_attr( $instance['align'] ); ?>;" >
				<?php echo $content; ?>
			</div>
			<?php
		}

		do_action( 'magze_after_ads_code' );

		echo wp_kses_post( $after_widget );

		echo ob_get_clean();
	}
}
