<?php get_header(); ?>

	<div id="content">
		<div id="inner-content" class="container clearfix">
			<div class="row">
			
				<main id="main" class="col-md-9 clearfix" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
				
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

								<header class="article-header entry-header">
								
									<?php if( get_field('video_embed') ) { // IF VIDEO grab embed ?>
										<div id="video-head" class="mb-3 full-w">
											<div class="embed-responsive embed-responsive-16by9"><?php the_field('video_embed'); ?></p></div>
										</div>
									<?php } else if (has_post_thumbnail() ) { 
										echo '<div class="single-banner mb-1 full-w">';
											the_post_thumbnail('large', array('class' => 'img-fluid', 'style' => 'width:100%;')); 
										echo '</div>';
									}
									?>

									<h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>

									<p class="byline entry-meta vcard">
										<?php echo 'Posted on <time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>'; ?>
									</p>

								</header> <?php // end article header ?>

								<section class="entry-content clearfix" itemprop="articleBody">
								  <?php the_content();  ?>
								</section> <?php // end article section ?>

								<footer class="article-footer">
									<div class="alert alert-primary"
										<?php printf( __( 'Categories:', 'bonestheme' ).': %1$s', get_the_category_list(', ') ); ?>
										<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>
									</div>
								</footer> <?php // end article footer ?>
								
								
								<?php // GET RELATED POSTS 
								$orig_post = $post;
								global $post;
								$tags = wp_get_post_tags($post->ID);
								if ($tags) {
								$tag_ids = array();
								foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
								$args=array(
								'tag__in' => $tag_ids,
								'post__not_in' => array($post->ID),
								'posts_per_page'=>4,
								'caller_get_posts'=>1
								);
								$my_query = new wp_query( $args );
								if( $my_query->have_posts() ) {

								echo '<section id="similar-posts"><h3 class="blog-vh" id="similar-title">Similar Posts</h3><div class="row">';

								while( $my_query->have_posts() ) {
								$my_query->the_post(); ?>

								<div class="col-6 col-lg-3 similar-box">
									<a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">
										<?php the_post_thumbnail(); ?>
										<h3 class="h5 mt-1 mb-0"><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></h3>
									</a>
								</div>
								<? }
								echo '</div></section>';
								}
								}
								$post = $orig_post;
								wp_reset_query(); 
								// END RELATED POSTS ?>

								
								<?php
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
									
								// Edit post link
								edit_post_link( __('Edit'), '', '', 0, 'post-edit-link btn btn-warning btn-lg btn-block mt-3 mb-3' );
								?>
								
							</article> <?php // end article ?>
						
						<?php endwhile; ?>
						<?php else : ?>

							<article id="post-not-found" class="hentry clearfix">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

				</main>

				<?php get_sidebar(); ?>

			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /#content -->

<?php get_footer(); ?>
