<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( 'Name' ); ?></title>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >


<!-- FACEBOOK LIKE BOX REQUIRED CODE-->
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10&appId=1572635656359918";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class="top-bar">
    <div class="row">
        <div class="top-bar-left">
            <ul role="menubar" class="menu">
				<?php if ( has_custom_logo() ) { ?>
                    <li class="menu-text" role="menuitem"><?php the_custom_logo(); ?></li>
				<?php } else { ?>
					<li ><?php  echo '<img src="'. get_option("theme_rtcampOne_logo") . '" alt="logo">';?></li>
				<?php } ?>

            </ul>
        </div>
        <div class="top-bar-right">
            <ul class="menu" >
                <li role="menuitem"><?php wp_nav_menu( array(
						'theme_location'  => 'primary',
						'container_class' => 'menu simple main-nav'
					) );
					?>
                </li>
            </ul>
        </div>

    </div>
</div>
<div class="top-bar navsec ">
    <div class="row navsec">
        <ul class="menu navsec ">
            <li role="menuitem "><?php wp_nav_menu( array(
					'theme_location' => 'another-menu',
					'container_class' => ''
				) );
				?>
            </li>
        </ul>
    </div>
</div>
