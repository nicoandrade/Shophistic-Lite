<div id="container" class="container">
    <section id="main" role="main" class="row">
        <div class="content_background">
            <?php 
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>

            <?php get_sidebar(); ?>

            <div id="content" class="col-md-9">