<?php
/*
Template Name: Wide
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<div class="main twelvecol first clearfix" role="main">

                                <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
    
                                    <header class="article-header">
                                        <h3 class="page-title"><?php the_title(); ?></h3>
                                    </header>
    
                                    <section class="entry-content clearfix" itemprop="articleBody">
                                        <?php the_content(); ?>
                                    </section>
    
                                </article>
                        </div>
                                                      
                             

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

                          <?php endif; ?>

                      </div>

				</div>

			</div>

<?php get_footer(); ?>
