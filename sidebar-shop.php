<?php
if ( is_active_sidebar( 'shop-sidebar' ) ) { 

?>
    <aside id="sidebar" class="woocommerce-sidebar col-md-2">

        <?php
		if (function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'shop-sidebar' ) ) : else :

        endif;
        ?>
 
        <div class="clearfix"></div>
	</aside>
<?php }//if is_active_sidebar ?> 