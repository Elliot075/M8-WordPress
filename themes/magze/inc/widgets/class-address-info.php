<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Magze_Address_info extends Magze_Widget_Base {

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->widget_cssclass    = 'magze_address_info_widget';
		$this->widget_description = __( 'Displays address and contact info', 'magze' );
		$this->widget_id          = 'magze_address_info';
		$this->widget_name        = __( 'Magze: Address Info', 'magze' );
		$this->settings           = array(
			'title'                   => array(
				'type'  => 'text',
				'label' => __( 'Title', 'magze' ),
			),
			'desc'                    => array(
				'type'  => 'textarea',
				'label' => __( 'Description', 'magze' ),
			),
			'address'                 => array(
				'type'  => 'textarea',
				'label' => __( 'Address', 'magze' ),
			),
			'phone'                   => array(
				'type'  => 'text',
				'label' => __( 'Phone', 'magze' ),
			),
			'site'                    => array(
				'type'  => 'text',
				'label' => __( 'Website', 'magze' ),
			),
			'fax'                     => array(
				'type'  => 'text',
				'label' => __( 'Fax', 'magze' ),
			),
			'email'                   => array(
				'type'  => 'text',
				'label' => __( 'Email', 'magze' ),
			),
			'widget_settings_heading' => array(
				'type'  => 'heading',
				'label' => __( 'Widget Settings', 'magze' ),
			),
			'style'                   => array(
				'type'    => 'select',
				'label'   => __( 'Style', 'magze' ),
				'options' => array(
					'style_1' => __( 'Stack', 'magze' ),
					'style_2' => __( 'Inline', 'magze' ),
				),
				'std'     => 'style_1',
			),
			'show_icons'              => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Icons', 'magze' ),
				'std'   => false,
			),
			'show_label'              => array(
				'type'  => 'checkbox',
				'label' => __( 'Show Label', 'magze' ),
				'std'   => false,
			),
			'icon_color'              => array(
				'type'  => 'color',
				'label' => __( 'Icon Color', 'magze' ),
				'std'   => '',
			),
			'inverted_block_color'    => array(
				'type'  => 'checkbox',
				'label' => __( 'Inverted Color', 'magze' ),
				'desc'  => __( 'Can be used if you have dark background and want lighter color on the text.', 'magze' ),
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

		do_action( 'magze_before_address_info' );

		$widget_class = '';

		$desc       = isset( $instance['desc'] ) ? $instance['desc'] : '';
		$address    = isset( $instance['address'] ) ? $instance['address'] : '';
		$phone      = isset( $instance['phone'] ) ? $instance['phone'] : '';
		$site       = isset( $instance['site'] ) ? $instance['site'] : '';
		$fax        = isset( $instance['fax'] ) ? $instance['fax'] : '';
		$email      = isset( $instance['email'] ) ? $instance['email'] : '';
		$show_icons = isset( $instance['show_icons'] ) ? $instance['show_icons'] : $this->settings['show_icons']['std'];
		$show_label = isset( $instance['show_label'] ) ? $instance['show_label'] : $this->settings['show_label']['std'];
		$style      = isset( $instance['style'] ) ? $instance['style'] : $this->settings['inverted_block_color']['std'];

		$inverted_block_color = isset( $instance['inverted_block_color'] ) ? $instance['inverted_block_color'] : $this->settings['inverted_block_color']['std'];

		$widget_class .= ' ' . $style;

		// Inverted Color.
		if ( $inverted_block_color ) {
			$widget_class .= ' saga-block-inverted-color';
		}

		$widget_inline_styles = '';
		$widget_id            = isset( $args['widget_id'] ) ? $args['widget_id'] : '';

		if ( $widget_id ) {
			$icon_color = isset( $instance['icon_color'] ) ? $instance['icon_color'] : $this->settings['icon_color']['std'];
			if ( $icon_color ) {
				$widget_inline_styles .= "
					#{$widget_id} .magze-address-info-widget svg {
						fill:{$icon_color} !important;
					}
				";
			}
			if ( $widget_inline_styles ) {
				echo '<style>' . wp_strip_all_tags( magze_refactor_css( $widget_inline_styles ) ) . '</style>';
			}
		}
		?>

		<div class="magze-address-info-widget <?php echo esc_attr( $widget_class ); ?>">
			<?php if ( ! empty( $desc ) ) : ?>
				<div class="magze-address-desc">
					<?php echo wp_kses_post( nl2br( $desc ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</div>
			<?php endif; ?>
			<address>
				<?php if ( ! empty( $address ) ) : ?>
					<div class="magze-address-field">
						<?php
						if ( $show_icons ) :
							echo '<span class="address-icon">' . magze_get_theme_svg( 'geo-alt-fill' ) . '</span>';
						endif;
						if ( $show_label ) :
							esc_html_e('Address:', 'magze');
						endif;
						?>
						<span class="address-meta"><?php echo wp_kses_post( nl2br( $address ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $phone ) ) : ?>
					<div class="magze-address-field">
						<?php
						if ( $show_icons ) :
							echo '<span class="address-icon">' . magze_get_theme_svg( 'phone' ) . '</span>';
						endif;
						if ( $show_label ) :
							esc_html_e('Phone:', 'magze');
						endif;
						?>
						<span class="address-meta">
							<a href="tel:<?php echo esc_attr( preg_replace( '/\D/', '', esc_attr( $phone ) ) ); ?>" ><?php echo esc_html( $phone ); ?></a>
						</span>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $site ) ) : ?>
					<div class="magze-address-field">
						<?php
						if ( $show_icons ) :
							echo '<span class="address-icon">' . magze_get_theme_svg( 'globe' ) . '</span>';
						endif;
						if ( $show_label ) :
							esc_html_e( 'Website:', 'magze' );
						endif;
						?>
						<span class="address-meta">
							<a href="<?php echo esc_url( $site ); ?>" target="_blank"><?php echo esc_html( $site ); ?></a>
						</span>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $fax ) ) : ?>
					<div class="magze-address-field">
						<?php
						if ( $show_icons ) :
							echo '<span class="address-icon">' . magze_get_theme_svg( 'printer-fill' ) . '</span>';
						endif;
						if ( $show_label ) :
							esc_html_e('Fax:', 'magze');
						endif;
						?>
						<span class="address-meta"><?php echo esc_html( $fax ); ?></span>
					</div>
				<?php endif; ?>
				<?php
				if ( ! empty( $email ) ) :
					$email = sanitize_email( $email );
					?>
					<div class="magze-address-field">
						<?php
						if ( $show_icons ) :
							echo '<span class="address-icon">' . magze_get_theme_svg( 'envelope-fill' ) . '</span>';
						endif;
						if ( $show_label ) :
							esc_html_e('E-mail:', 'magze');
						endif;
						?>
						<span class="address-meta">
							<a href="mailto:<?php echo esc_attr( antispambot( $email ) ); ?>" ><?php echo esc_html( antispambot( $email ) ); ?></a>
						</span>
					</div>
				<?php endif; ?>
			</address>
		</div>
		<?php

		do_action( 'magze_after_address_info' );

		$this->widget_end( $args );

		echo ob_get_clean();
	}

	public function enqueue_assets() {
		magze_widget_css( $this->id_base, 'address-info' );
	}
}
