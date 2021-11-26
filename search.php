<?php get_header(); ?>

  <div class="page-banner" style="background-image: url(<?php echo get_theme_file_uri('/images/Papaqui_page.jpg') ?>);">
    <h1>Search results</h1>
  </div>

  <div class="results-for">
    <div class="main-container">
      <?php printf( esc_html__( 'Results for: %s', 'papaqui' ), '<span class="results-for-result">' . get_search_query() . '</span>' ); ?>
    </div>
  </div>
  
  <div class="results-for-content recent-posts-list main-container">
  

		<?php if ( have_posts() ) : ?>

			<?php
			while ( have_posts() ) :
				the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="recents-posts-item">
          
            <h3 class="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="recent-posts-image">
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
              </a>
            </div>
            <div class="generic-content">
              <?php echo wp_trim_words(get_the_content(), 18); ?>
              <p><a class="small-btn" href="<?php the_permalink(); ?>">Read more &raquo;</a></p>
            </div>

          </div>
          </article><!-- #post-<?php the_ID(); ?> -->

      <?php
			  endwhile;
        endif;
		  ?>

</div>
</div>
<?php	get_footer();	?>