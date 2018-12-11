<?php
    /**
     * Single Product Thumbnails
     *
     * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
     *
     * HOWEVER, on occasion WooCommerce will need to update template files and you
     * (the theme developer) will need to copy the new files to your theme to
     * maintain compatibility. We try to do this as little as possible, but it does
     * happen. When this occurs the version of the template file will be bumped and
     * the readme will list any important changes.
     *
     * @see         https://docs.woocommerce.com/document/template-structure/
     * @package     WooCommerce/Templates
     * @version     3.5.1
     */

    defined( 'ABSPATH' ) || exit;

    // Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
    if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
        return;
    }

    global $product;

    $attachment_ids = $product->get_gallery_image_ids();

    if ( $attachment_ids && $product->get_image_id() ) {
    ?>
	<div class="thumbnails"><?php
    $post_thumbnail_id = $product->get_image_id();
        $html = wc_get_gallery_image_html( $post_thumbnail_id, true );
        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );

        foreach ( $attachment_ids as $attachment_id ) {
            $full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
            $thumbnail = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
            $image_title = get_post_field( 'post_excerpt', $attachment_id );

            $attributes = array(
                'title'                   => $image_title,
                'data-src'                => $full_size_image[0],
                'data-large_image'        => $full_size_image[0],
                'data-large_image_width'  => $full_size_image[1],
                'data-large_image_height' => $full_size_image[2],
            );

            $html = '<a href="' . esc_url( $full_size_image[0] ) . '">';
            $html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
            $html .= '</a>';

            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
        }

    ?></div>
	<?php
    }
