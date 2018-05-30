<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // BOOTSTRAP CSS ?>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container">

			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">

				<div id="top-bar" class="bg-twc-lightblue2">
					<div class="container clearfix py-2">

						<h1 class="m-0 p-0 float-left top-logo">
						<a href="<?php echo home_url(); ?>">
							<img id="top-logo" class="img-fluid" alt="Two Wheel Cruise Cycling Life in Japan logo" src="<?php echo get_template_directory_uri(); ?>/library/images/logos/TWC-two-wheel-cruise-cycling-japan-logo.png" /></a>
						</a>
						</h1>
						
						<p class="float-right p-0 m-0 social-nav-top">
							<a class="btn btn-sm btn-dark" role="button" target="_blank" href="https://youtube.com/twowheelcruise/">
								<img class="img-fluid yt-logo-top" alt="Two Wheel Cruise YouTube Channel" src="<?php echo get_template_directory_uri(); ?>/library/images/logos/youtube-logo.png" />
							</a>
						</p>

					</div><!-- /.container -->
				</div><!-- /#top-bar -->

				<div id="top-nav-bar" class="bg-dark text-white">
					



					<nav id="nav-top" class="navbar navbar-expand-lg navbar-dark bg-dark" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<div class="container clearfix py-1 py-md-0">
						<button class="navbar-toggler float-left" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarColor01">			  
							<?php	wp_nav_menu(array(
								'container' => 'false',                    		// enter '' to remove nav container 
								'menu' => __( 'Top Menu', 'bonestheme' ),   	// nav name
								'menu_class' => 'top-menu navbar-nav mr-auto',  // adding custom nav class
								'theme_location' => 'top-menu',             	// where it's located in the theme
								'depth' => 2,                                   // limit the depth of the nav
								'walker'         => new Bootstrap_NavWalker(),
								'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
							)); ?>
						</div>

						<form role="search" method="get" class="form-inline" action="<?php echo home_url( '/' ); ?>">
								<input class="form-control" type="search" id="s" name="s" value="<?php get_search_query() ?>" placeholder="search" aria-label="Search">
								<button class="btn btn-outline-info my-2 my-sm-0 d-md-none" type="submit">Search</button>
							</form>
					
					</div>
					</nav>	




				</div><!-- /#top-nav-bar --> 

			</header>
