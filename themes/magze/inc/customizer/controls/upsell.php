<?php
/**
 * Custom Customizer Controls.
 *
 * @package Magze
 */

/**
 * Customize Control for upsell.
 *
 * @since 1.0.0
 *
 * @see WP_Customize_Control
 */
class Magze_Upsell extends WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'upsell';

	/**
	 * Displays the control content.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function render_content() {
		?>
		<div>
			<div class="customize-control">
				<h3><?php esc_html_e( 'Need More Features?', 'magze' ); ?> <span>*</span></h3>
				<ul class="theme-features">
					<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'Premium Modules', 'magze' ); ?></li>
					<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'Extended Typography Options', 'magze' ); ?></li>
					<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'More Color Options', 'magze' ); ?></li>
					<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'Beautiful Dark Mode', 'magze' ); ?></li>
					<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'More Header Options', 'magze' ); ?></li>
					<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'More Footer Options', 'magze' ); ?></li>
					<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'More Blog Layouts', 'magze' ); ?></li>
					<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'More Widget Options', 'magze' ); ?></li>
					<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'Extended Post Formats', 'magze' ); ?></li>
					<li><span class="dashicons dashicons-yes"></span><?php esc_html_e( 'Premium Support', 'magze' ); ?></li>
					<li><span class="dashicons dashicons-plus"></span><?php esc_html_e( 'Many More', 'magze' ); ?></li>
				</ul>
				<a href="<?php echo esc_url( 'https://unfoldwp.com/products/magze/?utm_source=wp&utm_medium=customizer&utm_campaign=upgrade' ); ?>" target="_blank" class="button upgrade-now"><?php esc_html_e( 'Upgrade Now', 'magze' ); ?></a>
			</div>
			<div class="customize-control">
				<h3><?php esc_html_e( 'Need Support?', 'magze' ); ?></h3>
				<p><?php esc_html_e( 'If you have any questions related to the theme, feel free to ask us.', 'magze' ); ?></p>
				<a href="<?php echo esc_url( 'https://unfoldwp.com/contact-us/' ); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'Contact Us', 'magze' ); ?></a>
			</div>
		</div>
		<?php
	}
}
