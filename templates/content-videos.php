<?php
/*
 * Template Part:  Video Gallery
 *
 * @package enplast
 *
 */
?>

<?php /* if ( $vids = get_fields(146) ) : */ ?>

	<div class="video-gallery">

		<div class="video-current">
			<div class="video-container-hold">
				<?php /* echo wp_oembed_get( $vids['video_1'] . '?api=1' ); */ ?>
				<img src="http://en-plast.us.336.thegrove.co/wp-content/uploads/2018/12/videos-placeholder.jpg" class="img-responsive" alt="Video placeholder" />
			</div>
		</div>

		<!-- <div class="row">
			<?php /*  foreach ( $vids as $key => $vid) :  */?>
				<div class="col-md-4 match vid-thumb">
					<div id ="<?php /* echo $key; */ ?>"class="video-container">
						<?php /* echo wp_oembed_get( $vid . '?api=1' ); */ ?>
					</div>
				</div>
			<?php /* endforeach; */ ?>
		</div> -->

	</div>

<?php /* endif; */ ?>