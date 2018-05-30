<?php get_header(); ?>
	
	<div id="content">

		<div id="inner-content" class="container clearfix">

			<div class="row">
			<main id="main" class="col-md-9 clearfix" role="main">
				<div class="narrow-content">
				<h1 class="archive-title"><span><?php _e( 'Search Results for:', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix mb-3'); ?> role="article" style="border-bottom: solid 5px #333;">

						<header class="entry-header article-header">
							<?php the_post_thumbnail('medium', ['class' => 'img-fluid archive-thumb']); ?>
							<h3 class="search-title entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

           						<p class="byline entry-meta vcard">
                    				Posted <?php echo '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>'; ?>
                  				</p>

						</header>

						<section class="entry-content">
							<?php the_excerpt( '<span class="read-more">' . __( 'Read more &raquo;', 'bonestheme' ) . '</span>' ); ?>

						</section>

					
					</article>

				<?php endwhile; ?>
				</div>
				<?php bones_page_navi(); ?>
				
				<?php else : ?>

					<article id="post-not-found" class="hentry clearfix">
						<header class="article-header">
							<h1><?php _e( 'Sorry, No Results.', 'bonestheme' ); ?></h1>
						</header>
						<section class="entry-content">
							<p><?php _e( 'Try your search again.', 'bonestheme' ); ?></p>
						</section>
					</article>

				<?php endif; ?>

			</main>
			<?php get_sidebar(); ?>
			</div><!-- /.row -->
		</div>
	</div>

<?php get_footer(); ?>
