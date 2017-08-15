<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

		<?php $i == 0 ?>
		<?php $slider = new WP_Query( 'category_name=slider&posts_per_page=4' );
		while ( $slider->have_posts() ): $slider->the_post(); ?>

            <div class=" <?php echo $i == 0 ? 'active' : '' ?> item">

                <img src="<?php the_post_thumbnail_url(); ?>">
                <div class="carousel-caption d-none d-md-block">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                </div>

            </div>

			<?php $i ++; endwhile; wp_reset_postdata(); ?>

        <!-- Indicators -->

        <ol class="carousel-indicators">
			<?php $entries = $slider->post_count; ?>
			<?php for ( $i = 0; $i < $entries; $i ++ ) { ?>
                <li class="<?php echo $i == 0 ? 'active' : '' ?>" data-target="#carouselExampleIndicators"
                    data-slide-to="<?php echo $i; ?>"></li>
			<?php } ?>
        </ol>
    </div>

    <!-- Left and right controls -->

    <a class="left carousel-control" href="#carouselExampleIndicators" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carouselExampleIndicators" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>


</div>
