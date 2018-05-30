<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="container clearfix">

			<main id="main" class="row clearfix py-3 py-md-5" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<?php
			
			if ( ! is_front_page() ) { ?>
			<div class="clearfix col-12">
				<?php the_archive_title( '<h1 class="page-title pb-3">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description pb-3">', '</div>' ); ?>
			</div>
			<?php }  ?>
							
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<?php 
				$cat = new WPSEO_Primary_Term('category', get_the_ID());
				$cat = $cat->get_primary_term();
				$catName = get_cat_name($cat);
				$catLink = get_category_link($cat);
				?>

				<div class="col-md-6 col-lg-4 archive-box">
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article">
				<a class="archive-link" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
						
					<div class="archive-img-wrap">
						<?php the_post_thumbnail('medium', ['class' => 'img-fluid archive-thumb']); ?>
						<p class="main-cat"><?php echo $catName; ?></p>
					</div>

					<p class="byline entry-meta vcard">
						<?php echo '<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>'; ?>
                    </p>
						
					<h1 class="h3 entry-title archive-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					
				</a>
				</article>
				</div>

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>


			</main>
		</div>
	</div>


<?php get_footer(); ?>
