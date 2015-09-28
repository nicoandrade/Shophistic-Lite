<?php 

if ( is_active_sidebar( 'Sidebar Widgets' ) ) { 

?>
    <aside id="sidebar" class="col-md-3">

		<?php
		if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Sidebar Widgets' ) ) : else :
        endif;
        ?>

        <div class="clearfix"></div>
	</aside>

<?php }//if is_active_sidebar ?>  