<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php if ( $blocks = get_fields(10) ) : ?>
	<?php get_template_part('templates/content', 'resource-blocks'); ?>
<?php endif; ?>

<?php if (have_posts()) : ?>

	<span class="hr"></span>

	<?php if ( get_field('feed_title', 10) ) : ?>
		<div class="container">
			<h2 class="feed-title"><?php the_field('feed_title', 10); ?></h2>
		</div>
	<?php endif; ?>

	<div class="container">
		<!-- <div class="news-feed">
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
			<?php endwhile; ?>
		</div> -->

		<div class="ig-feed" id="ig_feed">
			<?php echo do_shortcode('[instagram-feed widthunit=% width=100]'); ?>
		</div>
	</div>

<?php endif; ?>

<?php the_posts_navigation(); ?>
