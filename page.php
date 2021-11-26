<?php get_header(); 

  while(have_posts()){
    the_post(); ?>

  <div class="page-content">
    <div class="small-container">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?> 
      </div>
    </div>

  <?php }



get_footer();

?>
