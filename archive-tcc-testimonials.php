<?php
/*
Template Name: tcc-testimonials
*/
?>

<?php get_header('alt'); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">
	
					<div class="main twelvecol first clearfix" id='testimonials' role="main">
                    	<div class='clearfix'>
                        <h3 class="page-title">Testimonials</h3>
                        
                        <div class='test-col number1'>
						<?php
							  // The "Testimonials" Query
							  $the_tcc_query = new WP_Query(array('post_type'=>"tcc-testimonials",
								  'showposts'=>20,
								  'order'=>DESC)
							  );
							  $counter = 1;
							  $colCounter = 0;
							  $colLimit = 1;
							  $class = 'number'.$counter;
							  $numPosts = $the_tcc_query->post_count;
							  $postsPerCol = intval($numPosts/4);

							if ($the_tcc_query->have_posts() ) : while ( $the_tcc_query->have_posts() ) : $the_tcc_query->the_post();
							if ($colLimit < 4){
								if($colCounter >= $postsPerCol){
									$colCounter = 0; ?>
									</div>
									<div class='test-col <?php echo $class ?>'>
									<?php	
									$colLimit++;
								}
								if ($colCounter <= $postsPerCol){
								 ?>
									<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
										<section class="entry-content clearfix" itemprop="articleBody">
											<?php the_content();?>
										</section>
									</article>
								<?php
								}
								$colCounter++;
                                $class = 'number'.($colLimit+1);
							}
							else { ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                                    <section class="entry-content clearfix" itemprop="articleBody">
                                        <?php the_content();?>
                                    </section>
                                </article>
							<?php }
								?>
                                
								<?php 
							
                                $counter++;
                                ?>
                                                               
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

			</div>

<?php get_footer('alt'); ?>
