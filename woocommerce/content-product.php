<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}
?>
<li <?php post_class( $classes ); ?>>
	<div class="ql_regular_product">
        <div class="product_wrap">
            <div class="product_content">
                <a class="product_thumbnail_wrap" href="<?php the_permalink(); ?>">
					<?php
						/**
						 * woocommerce_before_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_show_product_loop_sale_flash - 10
						 * @hooked shophistic_lite_template_loop_product_thumbnail - 10
						 */
						do_action( 'woocommerce_before_shop_loop_item_title' );
						global $product;
						$button_icon = "ql-cart-plus";
						if ($product->product_type == "variable") {
							$button_icon = "ql-arrow-right";
						}
						echo apply_filters( 'woocommerce_loop_add_to_cart_link',
							sprintf( '<div class="add_to_cart_wrap"><button href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" data-quantity="%s" class="button %s product_type_%s"><i class="%s"></i></button></div>',
								esc_url( $product->add_to_cart_url() ),
								esc_attr( $product->id ),
								esc_attr( $product->get_sku() ),
								esc_attr( isset( $quantity ) ? $quantity : 1 ),
								$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
								esc_attr( $product->product_type ),
								$button_icon
							),
						$product );
					?>
				</a>
                <div class="product_text">
                	<?php shophistic_lite_product_category(); ?>

						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<?php
							/**
							 * woocommerce_after_shop_loop_item_title hook
							 *
							 * @hooked woocommerce_template_loop_rating - 5
							 * @hooked woocommerce_template_loop_price - 10
							 * @hooked woocommerce_template_loop_add_to_cart - 20
							 */
							do_action( 'woocommerce_after_shop_loop_item_title' );
						?>


					<?php

						/**
						 * woocommerce_after_shop_loop_item hook
						 *
						 * @hooked woocommerce_template_loop_add_to_cart - 10
						 */
						do_action( 'woocommerce_after_shop_loop_item' ); 

					?>
					<div class="clearfix"></div>
				</div><!-- /product_text -->
            </div>
        </div>
        <div class="product_content_hidden">
                <a class="product_thumbnail_wrap" href="<?php the_permalink(); ?>">
					<?php
						/**
						 * woocommerce_before_shop_loop_item_title hook
						 *
						 * @hooked woocommerce_show_product_loop_sale_flash - 10
						 * @hooked shophistic_lite_template_loop_product_thumbnail - 10
						 */
						do_action( 'woocommerce_before_shop_loop_item_title' );
					?>
				</a>
                <div class="product_text">
                	<?php shophistic_lite_product_category(); ?>

						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<?php
							/**
							 * woocommerce_after_shop_loop_item_title hook
							 *
							 * @hooked woocommerce_template_loop_rating - 5
							 * @hooked woocommerce_template_loop_price - 10
							 * @hooked woocommerce_template_loop_add_to_cart - 20
							 */
							do_action( 'woocommerce_after_shop_loop_item_title' );
						?>


					<?php

						/**
						 * woocommerce_after_shop_loop_item hook
						 *
						 * @hooked woocommerce_template_loop_add_to_cart - 10
						 */
						do_action( 'woocommerce_after_shop_loop_item' ); 

					?>

				</div><!-- /product_text -->
        </div><!-- /product_content_hidden -->
    </div><!-- /ql_regular_product -->

</li>
