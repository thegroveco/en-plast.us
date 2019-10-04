<div class="content-wrap">
    <div class="row">
      <div class="col-md-6">
	      <div class="post-media">
		     <?php if ($vid = get_field('video') ) : ?>
		     	<div class="video-container">
					<?php echo wp_oembed_get( $vid . '?api=1' ); ?>
				</div>
		     <?php else : ?>
			 	<?php the_post_thumbnail( 'large' ); ?>
			 <?php endif; ?>
	     </div>
      </div>
      <div class="col-md-6">
        <article <?php post_class(); ?>>
	      <div class="post-date"><?php echo get_the_date('M d'); ?></div>
          <header>
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

          </header>
          <div class="entry-summary">
            <?php the_excerpt(); ?>
          </div>
          <div class="entry-footer">
	          <a href="<?php echo get_the_permalink(); ?>#comments" title="Comment on this article">Add a Comment</a>
          </div>

        </article>
      </div>
    </div>
</div>