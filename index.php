<?php 

get_header(); ?>

<div class="single-post-title">
    <h1>Blog</h1>
</div>

<div class="page-blog background-lg">
    <div class="main-container">
    
    <div class="blog-posts">
    <?php 
    while(have_posts()) {
        the_post(); ?>
        <div class="blog-post-item">
            <h3 class="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

            <div class="metabox metabox-white">
                <p><span class="metabox-icon"><i class="fas fa-calendar-alt"></i></span><?php the_time('d.m.Y'); ?> &bull; <span class="metabox-icon"><i class="fas fa-tags"></i></span><?php echo get_the_category_list(', '); ?></p>
            </div>

            <div class="recent-posts-image">
                <?php the_post_thumbnail(); ?>
            </div>

            <div class="generic-content">
                <?php the_excerpt(); ?>
                <p><a class="small-btn" href="<?php the_permalink(); ?>">Read more &raquo;</a></p>
            </div>

        </div>
        
    <?php } ?>

    </div>

    <div class="pagination">
        <?php echo paginate_links(); ?>
    </div>
</div>
</div>

<?php get_footer();

?>