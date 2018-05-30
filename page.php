<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="container clearfix">

				<main id="main" class="clearfix" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
						
						<header class="article-header">

							<?php 
							$banner_id = get_field('banner_image');
							if( get_field('video_embed') ) { // IF VIDEO grab embed ?>
								<div id="video-head" class="mb-3 full-w">
									<div class="embed-responsive embed-responsive-16by9"><?php the_field('video_embed'); ?></p></div>
								</div>
							<?php } else if ($banner_id) { 
								$size = "full";
								$image = wp_get_attachment_image_src( $banner_id, $size ); ?>
								<div class="single-banner mb-1 full-w">
									<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid" />
								</div>
							<?php } else if (has_post_thumbnail() ) { 
								echo '<div class="single-banner mb-1 full-w">';
									the_post_thumbnail('full', array('class' => 'img-fluid', 'style' => 'width:100%;')); 
								echo '</div>';
							}
							?>

						</header> <?php // end article header ?>

						<section class="entry-content clearfix" itemprop="articleBody">
							<?php the_content(); ?>
						</section> <?php // end article section ?>

						<footer class="article-footer clearfix">

						</footer>

						<?php // Edit post link
							edit_post_link( __('Edit'), '', '', 0, 'post-edit-link btn btn-warning btn-lg btn-block mt-3 mb-3' );
						?>

					</article>

					<?php endwhile; endif; ?>

				</main>

			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /#content -->

<?php get_footer(); ?>
