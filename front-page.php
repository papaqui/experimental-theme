<?php get_header(); ?>

<?php
while(have_posts()){
  the_post();
  ?>
  <div class="page-content">
    <div class="main-container">
    <div class="site">
      <div class="site-content">
        <?php the_content(); ?> 
      </div>
      <div class="site-sidebar">
        <?php get_sidebar(); ?>
      </div>
    </div>
    </div>
  </div>
  <?php
}
?>

<section class="recent-posts main-container">
    <h2>Recent posts</h2>
    <div class="recent-posts-list">
        <?php
        $homepagePosts = new WP_Query(array(
          'posts_per_page' => 4
        ));
        
        while($homepagePosts->have_posts()){
            $homepagePosts->the_post(); ?>
            <div class="recents-posts-item">
              
              <h3 class="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <div class="metabox">
                <p><span class="metabox-icon"><i class="fas fa-calendar-alt"></i></span><?php the_time('d.m.Y'); ?> &bull; <span class="metabox-icon"><i class="fas fa-tags"></i></span><?php echo get_the_category_list(', '); ?></p>
              </div>
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
        <?php } wp_reset_postdata();
      ?>
      </div>
      <p class="recent-posts-button">
        <a class="main-btn" href="<?php echo site_url('/blog'); ?>">Go to Blog</a>
      </p>
    
</section>

<?php get_footer(); ?>

