
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
global $postx;
$args1 = array(
	'post_type' => 'partners',
	'numberposts' => -1,
	'orderby' => 'menu_order');
$slider_posts1 = get_posts($args1);
if ($slider_posts1) {
	$images = array();
	$i = 0;
// start the loop
	foreach ($slider_posts1 as $postx) {
		setup_postdata($postx);
		$myimage1 = wp_get_attachment_image_src(get_post_thumbnail_id($postx->ID), 'full');
		$images[$i] = $myimage1[0];
		$i++;
	}
}
?>

<!-- Our Partners -->

<div class="partners" style="margin:25px;">
    <div class="container">
        <div id="partners" class="carousel slide" data-ride="carousel" data-interval="2000">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
						<?php echo '<img class="col-md-3 col-xs-3" src="' . $images[0] . '" alt="image1"/>'; ?>
						<?php echo '<img class="col-md-3 col-xs-3" src="' . $images[1] . '" alt="image2"/>'; ?>
						<?php echo '<img class="col-md-3 col-xs-3" src="' . $images[2] . '" alt="image3"/>'; ?>
						<?php echo '<img class="col-md-3 col-xs-3" src="' . $images[3] . '" alt="image4"/>'; ?>
                    </div></div>

                <div class="item">
                    <div class="row">
						<?php echo '<img class="col-md-3 col-xs-3" src="' . $images[4] . '" alt="image5"/>'; ?>
						<?php echo '<img class="col-md-3 col-xs-3" src="' . $images[5] . '" alt="image6"/>'; ?>
						<?php echo '<img class="col-md-3 col-xs-3" src="' . $images[6] . '" alt="image7"/>'; ?>
						<?php echo '<img class="col-md-3 col-xs-3" src="' . $images[7] . '" alt="image8"/>'; ?>
                    </div></div>


                <div class="item">
                    <div class="row">
						<?php echo '<img class="col-md-3 col-xs-3" src="' . $images[8] . '" alt="image9"/>'; ?>
						<?php echo '<img class="col-md-3 col-xs-3" src="' . $images[9] . '" alt="image10"/>'; ?>
						<?php echo '<img class="col-md-3 col-xs-3" src="' . $images[10] . '" alt="image11"/>'; ?>
						<?php echo '<img class="col-md-3 col-xs-3" src="' . $images[11] . '" alt="image12"/>'; ?>
                    </div></div>

            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#partners" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#partners" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div></div>
