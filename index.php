<?php get_header(); ?>

<!-- GET SLIDER PHP FILE  -->
<div class="row ">
    <div class="large-8 medium-8 columns">
		<?php get_template_part( 'template-parts/slider', 'entries' ); ?>
    </div>
    <div class="large-4 medium-4 columns" style="margin: 10px auto 10px auto ;">
        <div class="callout">
			<?php
			$ID                = get_option( 'theme_rtcampOne_page' );
			$post_thumbnail_id = get_post_thumbnail_id( $ID );
			$title             = get_the_title( $ID );
			?>
            <h3><?php echo $title; ?></h3>
			<?php echo '<img src="' . wp_get_attachment_image_url( $post_thumbnail_id, 'post-thumbnail' ) . '" alt="pagethumbnail" " />';; ?>
            <p><?php the_excerpt( $ID ); ?></p>

        </div>
    </div>
</div>
<div class="row">
	<?php get_template_part( 'template-parts/youtube', 'slider' ) ?>
</div>

<div class="row">
    <div class="large-8 medium-8 columns">
        <h4>Glimpses of Exhibition</h4>
        <div class="products row">
			<?php if ( have_posts() ): ?>
				<?php
				$args      = array( 'post_type' => 'Exhibitions', 'posts_per_page' => 10 );
				$the_query = new WP_Query( $args );
				?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="large-3 medium-4 small-12 columns product end">
                        <img src="<?php the_post_thumbnail_url(); ?>">
                        <div class="card-section">
                            <p><?php the_title(); ?></p>
                        </div>
                    </div>
				<?php endwhile; ?>
			<?php endif; ?>
        </div>
    </div>

    <div class="large-4 medium-4 columns " style="padding-left: ">
        <h4> News</h4>
		<?php
		$sticky_post = new WP_Query( array(
			'post_type'      => 'post',
			'post__in'       => get_option( 'sticky_posts' ),
			'posts_per_page' => 2
		) );
		?>
        <div class="row">
			<?php
			$k = 0;
			while ( $sticky_post->have_posts() ):
				$sticky_post->the_post();
				$k ++;
				if ( $k != 1 ) {
					break;
				}
				?>
                <div class="large-4 columns">
					<?php the_post_thumbnail(); ?>
                </div>
                <div class="large-8 columns">
					<?php the_title(); ?>
                    <br><br>
					<?php the_date(); ?>
                </div>
			<?php endwhile; ?>
        </div>


		<div class="row">
            <div class="small-12">
                <?php $slider = new WP_Query( 'category_name=news&posts_per_page=6' );
                while ( $slider->have_posts() ): $slider->the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
            </div>
        </div>

    </div>


</div>
<div class="row">

    <div class="large-4 medium-4 columns">
        <div class="twbox">
            <h4> Latest Tweets</h4>
			<?php require_once 'twitter.php '; ?>
        </div>
    </div>
    <div class="large-4 medium-4 columns">
        <div class="fbbox">
            <!-- facebook box Code Goes Here -->
            <h4> Follow Us on
                Facebook </h4>
            <div class="fb-page" data-href="https://www.facebook.com/<?php echo get_option( 'fb_username' ); ?>"
                 data-tabs="timeline"
                 data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                 data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/<?php echo get_option( 'fb_username' ); ?>"
                            class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/<?php echo get_option( 'fb_username' ); ?>">I&#039;m
                        mediocre</a></blockquote>
            </div>
        </div>

    </div>
    <div class="large-4 medium-4 columns">
		<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar' ) ?>
		<?php endif; ?>
    </div>

</div>

<div class="row" style="margin: 10px auto;">
    <h4>Our partners</h4>
	<?php get_template_part( 'template-parts/partners', 'slider' ) ?>
</div>

<?php get_footer(); ?>
