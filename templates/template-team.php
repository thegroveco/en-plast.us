<?php
/**
 * Template Name: Team
 */
?>
<?php while (have_posts()) : the_post(); ?>

	<?php get_template_part('templates/page', 'header'); ?>

	<div class="content-wrap">
		<div class="container">

			<?php
			$args = array(
				'post_type' 		=> 'team_member',
				'posts_per_page' 	=> -1,
				'order'				=> 'ASC',
				'orderby'			=> 'menu_order'
			);
			$members = new WP_Query( $args );
			?>

			<?php if ( $members->have_posts() ) : ?>

				<h2 class="team-title">Team Members</h2>
				<div class="team-flex" style="margin-bottom: 30px;">

			    	<?php while ( $members->have_posts() ) : $members->the_post(); $details = get_fields(get_the_ID()); ?>

						<?php if ( $details['team_or_advisor'] == 'team' ) : ?>

					        <div class="team-flex__member">
								<a href="#" data-toggle="modal" data-target="#modal-<?php echo get_the_ID(); ?>">

							        <?php if ( $details['image'] ) : ?>
						            	<img src="<?php echo $details['image']['url']; ?>" alt="" width="340" height="340" class="alignnone size-full wp-image-<?php echo $details['image']['ID']; ?>">
									<?php else : ?>
										<img src="<?php echo get_template_directory_uri(); ?>/dist/images/default-avatar.jpg" alt="" width="340" height="340" class="alignnone size-full">
						            <?php endif; ?>

						            <div class="team-flex__deets">
						                <h5><?php the_title(); ?></h5>
						                <h6><?php echo $details['title']?$details['title']:''; ?></h6>
						                <div class="team-flex__links">
						                	READ MORE &raquo;
						                </div>
						            </div>

								</a>
					        </div>

							<div class="modal fade" id="modal-<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-<?php echo get_the_ID(); ?>" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<a href="#" class="modal-close float-right" aria-hidden="true" data-dismiss="modal"><i class="fas fa-times"></i></a>
										<div class="modal-body">
											<div class="row">
												<div class="col-md-5">
													<?php if ( $details['image'] ) : ?>
										            	<img src="<?php echo $details['image']['url']; ?>" alt="" width="340" height="340" class="alignnone size-full wp-image-<?php echo $details['image']['ID']; ?>">
													<?php else : ?>
														<img src="<?php echo get_template_directory_uri(); ?>/dist/images/default-avatar.jpg" alt="" width="340" height="340" class="alignnone size-full">
										            <?php endif; ?>
												</div>
												<div class="col-md-7">
													<div class="row">
														<div class="col-md-6 modal-lead">
															<h3><?php the_title(); ?></h3>
															<h4><?php echo $details['title']?$details['title']:''; ?></h4>
														</div>
														<div class="col-md-6 modal-social">
															<?php if ($details['twitter']) : ?>
																<a href="<?php echo $details['twitter']; ?>" target="_blank"><i class="fab fa-twitter"></i></a>
															<?php endif; ?>
															<?php if ($details['facebook']) :?>
																<a href="<?php echo $details['facebook']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
															<?php endif; ?>
															<?php if ($details['linkedin']) : ?>
																<a href="<?php echo $details['linkedin']; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
															<?php endif; ?>
															<?php if ($details['instagram']) : ?>
																<a href="<?php echo $details['instagram']; ?>" target="_blank"><i class="fab fa-instagram"></i></a>
															<?php endif; ?>
														</div>
													</div>
													<div class="row">
														<div class="col-sm modal-bio">
															<?php echo $details['bio']?$details['bio']:''; ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

					    <?php endif; ?>

				    <?php endwhile; ?>

			    </div>

			<?php endif; ?>

			<p>&nbsp;</p>

			<?php if ( $members->have_posts() ) : ?>

				<h2 class="team-title">Advisors</h2>
				<div class="team-flex" style="margin-bottom: 30px;">

			    	<?php while ( $members->have_posts() ) : $members->the_post(); $details = get_fields(get_the_ID()); ?>

						<?php if ( $details['team_or_advisor'] == 'advisor' ) : ?>

					        <div class="team-flex__member">
						        <a href="#" data-toggle="modal" data-target="#modal-<?php echo get_the_ID(); ?>">
						            <?php if ( $details['image'] ) : ?>
						            	<img src="<?php echo $details['image']['url']; ?>" alt="" width="340" height="340" class="alignnone size-full wp-image-<?php echo $details['image']['ID']; ?>">
									<?php else : ?>
										<img src="<?php echo get_template_directory_uri(); ?>/dist/images/default-avatar.jpg" alt="" width="340" height="340" class="alignnone size-full">
						            <?php endif; ?>
						            <div class="team-flex__deets">
						                <h5><?php the_title(); ?></h5>
						                <h6><?php echo $details['title']; ?></h6>
						                <div class="team-flex__links">
						                    READ MORE &raquo;
						                </div>
						            </div>
						        </a>
					        </div>

					        <div class="modal fade" id="modal-<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-<?php echo get_the_ID(); ?>" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<a href="#" class="modal-close float-right" aria-hidden="true" data-dismiss="modal"><i class="fas fa-times"></i></a>
										<div class="modal-body">
											<div class="row">
												<div class="col-md-5">
													<?php if ( $details['image'] ) : ?>
										            	<img src="<?php echo $details['image']['url']; ?>" alt="" width="340" height="340" class="alignnone size-full wp-image-<?php echo $details['image']['ID']; ?>">
													<?php else : ?>
														<img src="<?php echo get_template_directory_uri(); ?>/dist/images/default-avatar.jpg" alt="" width="340" height="340" class="alignnone size-full">
										            <?php endif; ?>
												</div>
												<div class="col-md-7">
													<div class="row">
														<div class="col-md-6 modal-lead">
															<h3><?php the_title(); ?></h3>
															<h4><?php echo $details['title']?$details['title']:''; ?></h4>
														</div>
														<div class="col-md-6 modal-social">
															<?php if ($details['twitter']) : ?>
																<a href="<?php echo $details['twitter']; ?>" target="_blank"><i class="fab fa-twitter"></i></a>
															<?php endif; ?>
															<?php if ($details['facebook']) :?>
																<a href="<?php echo $details['facebook']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
															<?php endif; ?>
															<?php if ($details['linkedin']) : ?>
																<a href="<?php echo $details['linkedin']; ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
															<?php endif; ?>
															<?php if ($details['instagram']) : ?>
																<a href="<?php echo $details['instagram']; ?>" target="_blank"><i class="fab fa-instagram"></i></a>
															<?php endif; ?>
														</div>
													</div>
													<div class="row">
														<div class="col-sm modal-bio">
															<?php echo $details['bio']?$details['bio']:''; ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

					    <?php endif; ?>

				    <?php endwhile; ?>

			    </div>

			<?php endif; ?>

		</div>
	</div>

<?php endwhile; ?>


