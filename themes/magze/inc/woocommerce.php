<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Magze
 */

if ( ! function_exists( 'magze_woocommerce_setup' ) ) {
	/**
	 * WooCommerce setup function.
	 *
	 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
	 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
	 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
	 *
	 * @return void
	 */
	function magze_woocommerce_setup() {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
}
add_action( 'after_setup_theme', 'magze_woocommerce_setup' );

if ( ! function_exists( 'magze_woocommerce_scripts' ) ) {
	/**
	 * WooCommerce specific scripts & stylesheets.
	 *
	 * @return void
	 */
	function magze_woocommerce_scripts() {

		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_style( 'magze-woocommerce-style', get_template_directory_uri() . '/assets/custom/css/woocommerce' . $min . '.css', array(), _S_VERSION );
		wp_style_add_data( 'magze-woocommerce-style', 'rtl', 'replace' );
		wp_add_inline_style( 'magze-woocommerce-style', magze_get_woo_inline_css() );

		$font_path   = WC()->plugin_url() . '/assets/fonts/';
		$inline_font = '@font-face {
				font-family: "star";
				src: url("' . $font_path . 'star.eot");
				src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
					url("' . $font_path . 'star.woff") format("woff"),
					url("' . $font_path . 'star.ttf") format("truetype"),
					url("' . $font_path . 'star.svg#star") format("svg");
				font-weight: normal;
				font-style: normal;
			}';

		wp_add_inline_style( 'magze-woocommerce-style', $inline_font );
	}
}
add_action( 'wp_enqueue_scripts', 'magze_woocommerce_scripts' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function magze_woocommerce_active_body_class( $classes ) {

	$classes[] = 'woocommerce-active';

	if ( is_woocommerce() || is_checkout() || is_cart() || is_account_page() ) {
		$classes[] = 'magze-active-woocommerce-page';
	}

	return $classes;
}
add_filter( 'body_class', 'magze_woocommerce_active_body_class' );

// Remove default wrappers.
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// Add new wrappers for the primary section - Note ** Sidebar not included.
add_action( 'woocommerce_before_main_content', 'magze_woocommerce_content_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'magze_woocommerce_content_wrapper_end', 10 );

if ( ! function_exists( 'magze_woocommerce_content_wrapper_start' ) ) {
	/**
	 * Add a opening wrapper.
	 */
	function magze_woocommerce_content_wrapper_start() {
		echo '<div id="primary" class="content-area">';
	}
}

if ( ! function_exists( 'magze_woocommerce_content_wrapper_end' ) ) {
	/**
	 * Add a closing wrapper.
	 */
	function magze_woocommerce_content_wrapper_end() {
		echo '</div><!-- #primary -->';
	}
}

// Add main wrapper to wrap the whole content and sidebar too.
add_action( 'woocommerce_before_main_content', 'magze_woocommerce_whole_wrapper_start', 5 );
// Close the wrapper after sidebar.
add_action( 'woocommerce_sidebar', 'magze_woocommerce_whole_wrapper_end', 50 );

if ( ! function_exists( 'magze_woocommerce_whole_wrapper_start' ) ) {
	/**
	 * Add a opening wrapper.
	 */
	function magze_woocommerce_whole_wrapper_start() {
		echo '<main id="site-content" role="main" class="wrapper wide-max-width">';
	}
}

if ( ! function_exists( 'magze_woocommerce_whole_wrapper_end' ) ) {
	/**
	 * Add a closing wrapper.
	 */
	function magze_woocommerce_whole_wrapper_end() {
		echo '</main><!-- #site-content -->';
	}
}

// Open a wrapper to the content of the product below the image in product listings.
add_action( 'woocommerce_shop_loop_item_title', 'magze_product_details_wrapper_start', 5 );
// Close the wrapper.
add_action( 'woocommerce_after_shop_loop_item', 'magze_product_details_wrapper_end', 15 );

if ( ! function_exists( 'magze_product_details_wrapper_start' ) ) {
	/**
	 * Add a opening wrapper.
	 */
	function magze_product_details_wrapper_start() {
		echo '<div class="magze-archive-products-details">';
	}
}

if ( ! function_exists( 'magze_product_details_wrapper_end' ) ) {
	/**
	 * Add a closing wrapper.
	 */
	function magze_product_details_wrapper_end() {
		echo '</div><!-- magze-archive-products-details -->';
	}
}

/*
Default image size in gallery thumbnail
*------------------------------------------*/
add_filter(
	'woocommerce_gallery_thumbnail_size',
	function( $size ) {
		return 'woocommerce_thumbnail';
	}
);


if ( ! function_exists( 'magze_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function magze_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		magze_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'magze_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'magze_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function magze_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="javascript:void(0)">
			<?php magze_the_theme_svg( 'cart' ); ?>
			<span class="magze-woo-counter"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'magze_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function magze_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="magze-cart site-header-cart reset-list-style" aria-hidden="true">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php magze_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}
/*
Add product added to cart message to fragment data
*/
if ( ! function_exists( 'magze_add_to_cart_fragments' ) ) {
	function magze_add_to_cart_fragments( $data ) {
		$product       = isset( $_REQUEST['product_id'] ) ? wc_get_product( $_REQUEST['product_id'] ) : false;
		$product_image = $product_title = '';

		if ( $product ) {
			$product_image = $product->get_image();
			$product_title = sprintf( __( '%s has been added to your cart.', 'magze' ), '<strong>' . $product->get_title() . '</strong>' );
		} else {
			$product_title = __( 'Product Added to cart', 'magze' );
		}

		ob_start();
		?>
		<div class="magze-product-notification-wrapper">
			<div class="header">
				<h3><?php esc_html_e( 'Cart Items', 'magze' ); ?></h3>
			</div>
			<div class="details">
				<div class="image">
					<?php echo $product_image; ?>
				</div>
				<div class="title">
					<?php echo $product_title; ?>
				</div>
			</div>
			<div class="view-cart">
				<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'cart' ) ) ); ?>">
					<?php esc_html_e( 'View Cart', 'magze' ); ?>
				</a>
			</div>
		</div>

		<?php
		$data['magze_added_to_cart_msg'] = ob_get_clean();

		return $data;
	}
}
// add_filter( 'woocommerce_add_to_cart_fragments', 'magze_add_to_cart_fragments' );

// Enable/Disable breadcrumb.
if ( ! function_exists( 'magze_woo_breadcrumb' ) ) {
	function magze_woo_breadcrumb() {
		if ( is_shop() || is_product_category() ) {
			if ( get_theme_mod( 'shop_page_disable_breadcrumb' ) ) {
				remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
			}
		}
		if ( is_product() ) {
			if ( get_theme_mod( 'product_page_disable_breadcrumb' ) ) {
				remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
			}
		}
	}
}
add_action( 'wp', 'magze_woo_breadcrumb' );
