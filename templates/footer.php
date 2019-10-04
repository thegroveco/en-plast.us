<?php if (is_front_page()) : ?>

	<div id="bottom-contact" class="home-section bottom-contact">
	  <div class="container">
		<div class="row">
			<div class="col-lg-6">
			    <h2>Need More Info?</h2>
			    <p>Want to learn more about how En-Plast can help your business? Click below to get in touch. </p>
			    <p><a href="/contact" class="btn reverse">Contact Us &raquo;</a></p>
			    <p>&nbsp;</p>
			    <p>&nbsp;</p>
			</div>
			<div class="col-lg-6">
				<?php echo do_shortcode('[instagram-feed cols=4]'); ?>
			</div>
		</div>
	  </div>
	</div>
	<footer class="content-info">
	  <div class="container">
	    <?php dynamic_sidebar('sidebar-footer'); ?>
	  </div>
	</footer>

<?php else : ?>

	<div id="bottom-contact" class="home-section bottom-contact">
	  <div class="container">
	    <h2>Need More Info?</h2>
	    <p>Want to learn more about how En-Plast can help your business? Click below to get in touch. </p>
	    <p><a href="/contact" class="btn reverse">Contact Us &raquo;</a></p>
	    <p>&nbsp;</p>
	    <p>&nbsp;</p>
	  </div>
	</div>
	<footer class="content-info gr">
	  <div class="container">
	    <?php dynamic_sidebar('sidebar-footer'); ?>
	  </div>
	</footer>

<?php endif; ?>


