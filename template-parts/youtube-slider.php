<div id="carouselYoutubeIndicators" class="carousel slide " data-ride="carousel"  >

	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">

		<?php $i == 0 ?>

			<div class=" <?php echo $i == 0 ? 'active' : '' ?> item">

				<?php echo '<iframe width="237" height="160" src="' . get_option('theme_rtcampOne_slider1') . '" frameborder="0" allowfullscreen">
				</iframe>'  ?>
				<?php echo '<iframe width="237" height="160" src="' . get_option('theme_rtcampOne_slider2') . '" frameborder="0" allowfullscreen">
				</iframe>'  ?>
				<?php echo '<iframe width="237" height="160" src="' . get_option('theme_rtcampOne_slider3') . '" frameborder="0" allowfullscreen">
				</iframe>'  ?>
				<?php echo '<iframe width="237" height="160" src="' . get_option('theme_rtcampOne_slider4') . '" frameborder="0" allowfullscreen">
				</iframe>'  ?>
				<?php echo '<iframe width="237" height="160" src="' . get_option('theme_rtcampOne_slider5') . '" frameborder="0" allowfullscreen">
				</iframe>'  ?>
			</div>
		<div class="item">

			<?php echo '<iframe width="237" height="160" src="' . get_option('theme_rtcampOne_slider1') . '" frameborder="0" allowfullscreen">
				</iframe>'  ?>
			<?php echo '<iframe width="237" height="160" src="' . get_option('theme_rtcampOne_slider2') . '" frameborder="0" allowfullscreen">
				</iframe>'  ?>
			<?php echo '<iframe width="237" height="160" src="' . get_option('theme_rtcampOne_slider3') . '" frameborder="0" allowfullscreen">
				</iframe>'  ?>
			<?php echo '<iframe width="237" height="160" src="' . get_option('theme_rtcampOne_slider4') . '" frameborder="0" allowfullscreen">
				</iframe>'  ?>
			<?php echo '<iframe width="237" height="160" src="' . get_option('theme_rtcampOne_slider5') . '" frameborder="0" allowfullscreen">
				</iframe>'  ?>
		</div>

			<?php $i ++; wp_reset_postdata(); ?>

		<!-- Indicators -->

		<ol class="carousel-indicators">
			<?php $entries = $slider->post_count; ?>
			<?php for ( $i = 0; $i < $entries; $i ++ ) { ?>
				<li class="<?php echo $i == 0 ? 'active' : '' ?>" data-target="#carouselYoutubeIndicators"
				    data-slide-to="<?php echo $i; ?>"></li>
			<?php } ?>
		</ol>
	</div>

	<!-- Left and right controls -->

	<a class="left carousel-control" href="#carouselYoutubeIndicators" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#carouselYoutubeIndicators" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	</a>


</div>
