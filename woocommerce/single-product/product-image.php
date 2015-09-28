<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product;

?>
	<div class="row">
        <div class="col-md-2 col-sm-2 ql_thumbnail_column">

        		<?php do_action( 'woocommerce_product_thumbnails' ); ?>
                                        
        </div><!-- /ql_thumbnail_column -->

        <div class="col-md-10 col-sm-10 ql_main_image_column_wrap">
        	<div class="images">
            <div class="ql_main_image_column">
            	<div class="ql_main_images owl-carousel">

				<?php
					if ( has_post_thumbnail() ) {

						$image_title 	= esc_attr( get_the_title( get_post_thumbnail_id() ) );
						$image_caption 	= get_post( get_post_thumbnail_id() )->post_excerpt;
						$image_link  	= wp_get_attachment_url( get_post_thumbnail_id() );
						$image_metadata = wp_get_attachment_metadata( get_post_thumbnail_id() );
						$image       	= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
							'title'	=> $image_title,
							'alt'	=> $image_title
							) );

						//Add Feature Image
						echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-width="%s" data-height="%s">%s</a>', $image_link, $image_caption, $image_metadata['width'], $image_metadata['height'], $image ), $post->ID );

						//Add the rest of the images
						$attachment_ids = $product->get_gallery_attachment_ids();
						if ( $attachment_ids ) {
								foreach ( $attachment_ids as $attachment_id ) {
									$image_link = wp_get_attachment_url( $attachment_id );
									$image_metadata = wp_get_attachment_metadata( $attachment_id );
									if ( ! $image_link )
										continue;

									$image = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
									$image_title = esc_attr( get_the_title( $attachment_id ) );

									echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" title="%s" data-width="%s" data-height="%s">%s</a>', $image_link, $image_title, $image_metadata['width'], $image_metadata['height'], $image ), $attachment_id, $post->ID);

								}
						}

					} else {

						echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'shophistic-lite' ) ), $post->ID );

					}
				?>
				</div><!-- /ql_main_images -->
				<a href="#" class="ql_main_images_btn ql_prev"><i class="ql-arrow-left"></i></a>
                <a href="#" class="ql_main_images_btn ql_next"><i class="ql-arrow-right"></i></a>

			</div><!-- /ql_main_image_column -->
			</div>
        </div><!-- /ql_main_image_column_wrap -->
    </div><!-- /row -->