<?php
/*
Template Name: TCC Page
*/
?>

<?php get_header('alt'); ?>

			<div id="content">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php
                          $secondary_sidebar_menu = get_field("secondary_sidebar_navigation");
                ?>
                <article class='sidebar-nav secondary' id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                    <section class="entry-content clearfix" itemprop="articleBody">
                        <?php echo $secondary_sidebar_menu; ?>
                    </section>

                </article>
				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="main twelvecol first clearfix" role="main">

							

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">
									<h3 class="page-title"><?php the_title(); ?></h3>
								</header>

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section>

								<footer class="article-footer">
									<p class="clearfix"><?php the_tags( '<span class="tags">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '' ); ?></p>

								</footer>

							</article>

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							

						</div>


				</div>
<?php endif; ?>
			</div>

<?php get_footer('alt'); ?>
