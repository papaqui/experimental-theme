<?php get_header(); 

while(have_posts()){
    the_post(); ?>
    
    <div class="main-container">

			<div class="single-post-title">
				<h1><?php the_title(); ?></h1>
			</div>

      <div class="metabox metabox-single">
				<p><a class="blog-home-link" href="<?php echo site_url('/blog') ?>"><i class="fas fa-home fa-custom"></i>Back to Blog</a> <span class="metabox-main"><span class="metabox-icon"><i class="fas fa-calendar-alt"></i></span><?php the_time('d.m.Y'); ?> &bull; <span class="metabox-icon"><i class="fas fa-tags"></i></span><?php echo get_the_category_list(', '); ?></span></p>
			</div>

    </div>

    <div class="single-content">
      <div class="main-container">
        <?php the_content(); ?> 
      </div>
    </div>

	<?php } ?>

<div class="pagination-next-previous main-container">
    <?php
    // Previous - Next post navigation with thumbnail as background image 
			$next_post = get_next_post();
			$previous_post = get_previous_post();
			the_post_navigation( array(
					'next_text' => get_the_post_thumbnail($next_post->ID,'thumbnail') . 
					'<div class="next-box">' .
					'<span class="meta-nav" aria-hidden="true">' . 
					__( 'Next', 'papaqui' ) . 
					'</span> ' .
					// '<span class="screen-reader-text">' . 
					// __( 'Next post:', 'papaqui' ) . 
					// '</span> ' .
					'<span class="post-title">%title</span>' . 
					'</div>' ,
				'prev_text' => 
					get_the_post_thumbnail($previous_post->ID,'thumbnail') . 
					'<div class="previous-box">' .
 					'<span class="meta-nav" aria-hidden="true">' . 
					__( 'Previous', 'papaqui' ) . 
					'</span> ' .
					// '<span class="screen-reader-text">' . 
					// __( 'Previous post:', 'papaqui' ) . 
					// '</span> ' .
					'<span class="post-title">%title</span>' .
					'</div>',
			) );
      ?>
    </div>

<?php get_footer(); ?>