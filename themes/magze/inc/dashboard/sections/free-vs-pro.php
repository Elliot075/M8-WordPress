<?php
/**
 * Free v Pro
 *
 * @package Magze
 */

$icons = array(
	'0' => '<span class="dashicons dashicons-no"></span>',
	'1' => '<span class="dashicons dashicons-yes"></span>',
);
?>
<div class="magze-dashboard-body">
	<div class="free-vs-pro-wrapper">
		<div class="section-cta-upgrade">
			<span><?php esc_html_e( 'PREMIUM', 'magze' ); ?></span>
			<h2><?php esc_html_e( 'Unlock More with Magze Pro', 'magze' ); ?></h2>
			<p><?php esc_html_e( 'Unlock all the possibilties and true potential with premium version of this theme', 'magze' ); ?></p>
			<a href="<?php echo esc_url( $this->theme_url . '?utm_source=wp&utm_medium=theme-dashboard&utm_campaign=fvp' ); ?>" target="_blank" class="button button-primary button-plus"><?php esc_html_e( 'Upgrade To Pro', 'magze' ); ?></a>
		</div>
		<table>
			<thead>
				<tr>
					<th class="magze-text-left"><?php esc_html_e( 'Features', 'magze' ); ?></th>
					<th class="magze-text-center"><?php esc_html_e( 'Free', 'magze' ); ?></th>
					<th class="magze-text-center"><?php esc_html_e( 'Pro', 'magze' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$free_vs_pro = array(
					array(
						'feature' => __( 'Help and support', 'magze' ),
						'free'    => __( 'Standard support', 'magze' ),
						'pro'     => __( 'High priority support', 'magze' ),
					),
					array(
						'feature' => __( 'Predesigned website templates', 'magze' ),
						'free'    => __( '1', 'magze' ),
						'pro'     => __( '4', 'magze' ),
					),
					array(
						'feature' => __( 'Seo optimized', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Translation ready', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'RTL ready', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Post formats support', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'WooCommerce ready', 'magze' ),
						'free'    => 1,
						'pro'     => __( 'With more options', 'magze' ),
					),
					array(
						'feature' => __( 'Preloader option', 'magze' ),
						'free'    => 1,
						'pro'     => __( '20+ Preloaders', 'magze' ),
					),
					array(
						'feature' => __( 'Progressbar option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Typography font option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Typography color option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Primary menu font option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Primary menu responisve font sizes', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sub menu font option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sub menu responisve font sizes', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Headings font option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Headings responisve font sizes', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Body font option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Body responisve font sizes', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Primary color option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Menu color option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sub-menu color option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage ticker posts', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Multiple ticker labels', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Multiple ticker styles', 'magze' ),
						'free'    => 0,
						'pro'     => __( '5+', 'magze' ),
					),
					array(
						'feature' => __( 'Homepage banner slider option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Banner slider multiple style', 'magze' ),
						'free'    => 0,
						'pro'     => __( '4', 'magze' ),
					),
					array(
						'feature' => __( 'Homepage banner thumbnail option', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage banner thumbnail style', 'magze' ),
						'free'    => 0,
						'pro'     => __( '3', 'magze' ),
					),
					array(
						'feature' => __( 'Homepage banner carousel option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Banner carousel multiple style', 'magze' ),
						'free'    => 0,
						'pro'     => __( '4', 'magze' ),
					),
					array(
						'feature' => __( 'Homepage pinned posts', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage banner section visibility options', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage banner section dimensions', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage banner section dividers', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage trending posts', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage trending post style', 'magze' ),
						'free'    => __( '1', 'magze' ),
						'pro'     => __( '2', 'magze' ),
					),
					array(
						'feature' => __( 'Homepage trending post visibility options', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage trending post section dimensions', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage trending post section dividers', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Homepage layout option', 'magze' ),
						'free'    => 1,
						'pro'     => __( 'With more options', 'magze' ),
					),
					array(
						'feature' => __( 'Homepage custom sidebar', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Darkmode option', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Topbar option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Topbar color option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Header style', 'magze' ),
						'free'    => __( '2', 'magze' ),
						'pro'     => __( '5', 'magze' ),
					),
					array(
						'feature' => __( 'Header ad banner', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sticky header', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sticky header on scroll up', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Header section dimensions', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Menu Bar option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
				
					array(
						'feature' => __( 'Sticky sidebar', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Offcanvas', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Offcanvas light/dark theme', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Offcanvas logo', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Offcanvas widgets title style', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Archive style', 'magze' ),
						'free'    => __( '4', 'magze' ),
						'pro'     => __( '9', 'magze' ),
					),
					array(
						'feature' => __( 'Archive post metas', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Ajax load posts on click', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Infinite scroll load posts', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Related posts', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Floating related posts', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Author posts', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Author info box', 'magze' ),
						'free'    => 1,
						'pro'     => __( 'With social links option', 'magze' ),
					),
					array(
						'feature' => __( 'Integrated social share option', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Single posts social share position', 'magze' ),
						'free'    => 0,
						'pro'     =>  __( '8+', 'magze' ),
					),
					array(
						'feature' => __( 'Page layout option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Category image option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Category color option', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Category banner image option', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Category different pagination', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Category post metas option', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Different design style for each category', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Different design style for each tags', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Tags different pagination', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Tags post metas option', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Custom widgets', 'magze' ),
						'free'    => __( '16+', 'magze' ),
						'pro'     => __( '22+', 'magze' ),
					),
					array(
						'feature' => __( 'Widgets title style & align options', 'magze' ),
						'free'    =>  __( '10+ Styles', 'magze' ),
						'pro'     =>  __( '20+ Styles', 'magze' ),
					),
					array(
						'feature' => __( 'Widgetareas', 'magze' ),
						'free'    =>  __( '12+', 'magze' ),
						'pro'     =>  __( '12+', 'magze' ),
					),
					array(
						'feature' => __( 'Widgetareas visibility options', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Widgetareas dimension options', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Widgetareas background image options', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Widgetareas dividers', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Single post layout', 'magze' ),
						'free'    =>  __( '3', 'magze' ),
						'pro'     =>  __( '6', 'magze' ),
					),
					array(
						'feature' => __( 'Single post navigation style', 'magze' ),
						'free'    => __( '3', 'magze' ),
						'pro'     => __( '5', 'magze' ),
					),
					array(
						'feature' => __( 'Post primary category option', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Post subtitle option', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Extended gallery format support', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Extended video format support', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Extended audio format support', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( '404 page options', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Animation options', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Coming soon mode', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Shortcode modules', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Footer layouts', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Footer widgets title style & align options', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Footer light/dark theme', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sub footer', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sub footer light/dark theme', 'magze' ),
						'free'    => 1,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Sub footer multiple layout', 'magze' ),
						'free'    => 0,
						'pro'     => __( '2', 'magze' ),
					),
					array(
						'feature' => __( 'Sub footer logo', 'magze' ),
						'free'    => 0,
						'pro'     => 1,
					),
					array(
						'feature' => __( 'Scroll to top', 'magze' ),
						'free'    => 1,
						'pro'     => __( 'With more options', 'magze' ),
					),
				);
				foreach ( $free_vs_pro as $features ) :
					?>
					<tr>
						<td class="magze-text-left"><?php echo esc_html( $features['feature'] ); ?></td>
						<td class="magze-text-center">
							<?php
							if ( 1 === $features['free'] ) {
								echo $icons[1];
							} elseif ( 0 === $features['free'] ) {
								echo $icons[0];
							} else {
								echo esc_html( $features['free'] );
							}
							?>
						</td>
						<td class="magze-text-center">
							<?php
							if ( 1 === $features['pro'] ) {
								echo $icons[1];
							} elseif ( 0 === $features['pro'] ) {
								echo $icons[0];
							} else {
								echo esc_html( $features['pro'] );
							}
							?>
						</td>
					</tr>
					<?php
				endforeach;
				?>
			</tbody>
		</table>
		<div class="free-vs-pro-footer">
			<a href="<?php echo esc_url( $this->theme_url . '?utm_source=wp&utm_medium=theme-dashboard&utm_campaign=fvp' ); ?>" target="_blank"><?php esc_html_e( 'And many more features', 'magze' ); ?><span class="dashicons dashicons-external"></span></a>
		</div>
	</div>
</div>
