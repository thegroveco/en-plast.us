<?php
/**
 * Template Name: Homepage
 */
?>

<?php
$args = array(
  'post_type'      => 'home_slide',
  'posts_per_page' => -1,
  'order'          => 'ASC',
  'orderby'        => 'menu_order'
);

$slides = new WP_Query( $args );

if ( $slides->have_posts() ) : ?>
  <div class="home-slides">
    <?php while ( $slides->have_posts() ) : $slides->the_post(); ?>
      <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); ?>
      <div id="<?php echo $post->post_name; ?>" class="home-slide <?php echo $post->post_name; ?>" style="background-image: url(<?php echo $url; ?>)">
        <div class="container d-flex align-items-center">
          <div class="content">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; wp_reset_postdata(); ?>

<div class="home-wrapper">
  <?php
  $args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
  );

  $parent = new WP_Query( $args );

  if ( $parent->have_posts() ) : ?>
    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
      <div id="<?php echo $post->post_name; ?>" class="home-section <?php echo $post->post_name; ?>">
	    <?php  if ( get_the_ID() == 146 ) : ?>
	    	<div class="container">
        		<?php get_template_part( 'templates/content', 'videos' ); ?>
	    	</div>
		<?php else : ?>
	        <div class="container">
	          <?php the_content(); ?>
	        </div>
	    <?php endif; ?>
      </div>
    <?php endwhile; ?>
  <?php endif; wp_reset_postdata(); ?>

  <!-- <div class="bg-map"></div> -->
  <div class="bg-stadium"></div>
</div>