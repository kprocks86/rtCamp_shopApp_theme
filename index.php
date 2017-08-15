<?php get_header(); ?>

<!-- GET SLIDER PHP FILE  -->
<?php get_template_part( 'template-parts/slider', 'entries' ); ?>


<?php if ( is_active_sidebar( 'showcase' ) ) : ?>
    <div class="row showcase">
        <div class="large-12 columns">
            <div class="callout secondary">
				<?php dynamic_sidebar( 'showcase' ); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="large-8 medium-8 columns">
        <div class="products row">

            <!--             Start the Loop -->

			<?php if ( have_posts() ): ?>
				<?php $slider = new WP_Query( 'cat=-199&posts_per_page=10' );
				while ( $slider->have_posts() ): $slider->the_post(); ?>
                    <div class="large-4 medium-4 small-12 columns product end">
                        <h3><?php the_title(); ?></h3>
						<?php if ( has_post_thumbnail() ): ?>
							<?php the_post_thumbnail(); ?>
						<?php endif; ?>
                        <a class="button" href="<?php echo the_permalink(); ?>">Details</a>
                    </div>
				<?php endwhile; ?>
			<?php endif; ?>
        </div>
    </div>

    <div class="large-4 medium-4 columns">
		<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar' ) ?>
		<?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>
