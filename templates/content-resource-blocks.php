<div class="resource-blocks content-wrap">
	<div class="container">
		<div class="row">
			<?php
			$blocks = get_fields(10);

			if ($blocks['block_1']) :
				echo '<div class="col-lg-4 match"><div class="block">' .$blocks['block_1']. '</div></div>';
			endif;
			if ($blocks['block_2']) :
				echo '<div class="col-lg-4 match"><div class="block">' .$blocks['block_2']. '</div></div>';
			endif;
			if ($blocks['block_3']) :
				echo '<div class="col-lg-4 match"><div class="block">' .$blocks['block_3']. '</div></div>';
			endif;

			?>
		</div>
	</div>
</div>
