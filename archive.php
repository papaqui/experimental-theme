<?php 

get_header(); ?>

<div class="page-banner" style="background-image: url(<?php echo get_theme_file_uri('/images/Papaqui_page.jpg') ?>);">
    <h1><?php if (is_category()) { ?>
      <i class="fas fa-tags"></i>
      <?php
      single_cat_title();
    } 
    if (is_author()) { ?>
      <i class="fas fa-user"></i>
    <?php
      the_author();
    } ?></h1>
    <p><?php the_archive_description(); ?></p>
</div>

<div class="main-container">
    <div class="blog-posts">
    <?php 
    while(have_posts()) {
        the_post(); ?>
        <div class="post-item">
            <h3 class="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

            <div class="metabox">
                <p><span class="metabox-icon"><i class="fas fa-calendar-alt"></i></span><?php the_time('d.m.Y'); ?> &bull; <span class="metabox-icon"><i class="fas fa-tags"></i></span><?php echo get_the_category_list(', '); ?></p>
            </div>

            <div class="generic-content">
                <?php the_excerpt(); ?>
                <p><a class="main-btn" href="<?php the_permalink(); ?>">Read more &raquo;</a></p>
            </div>

        </div>
        
    <?php } ?>
    </div>
    <div class="pagination">
    <?php
     echo paginate_links(); 
    ?>
    </div>
</div>

<?php get_footer();

?>