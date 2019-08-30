<?php
/*
Template Name: Testimonials
*/
?>

<?php get_header(); ?>

			<div id="content">
                <article class="sidebar-nav secondary" id="post-53" role="article" itemscope="" itemtype="http://schema.org/BlogPosting" style="top: 479.188px; bottom: auto;">

                    <section class="entry-content clearfix" itemprop="articleBody">
                        <p><a href="/schedule-online">Schedule Online Now!</a></p>
                    </section>

                </article>
				<div id="inner-content" class="wrap clearfix">
	
					<div class="main twelvecol first clearfix" id='testimonials' role="main">
                    	<div class='clearfix'>
                        <div class='test-col number1'>
						<?php
							  // The "Testimonials" Query
							  $the_testimonial_query = new WP_Query(array('category_name'=>"Testimonials",
								  'showposts'=>5,
								  'order'=>DESC)
							  );
							  $counter = 1;
							  $class = 'number'.$counter;
							  $numPosts = $the_testimonial_query->post_count;
							  $postsPerCol = intval($numPosts/4);
							  echo $postsPerCol;
							
							if ($the_testimonial_query->have_posts() ) : while ( $the_testimonial_query->have_posts() ) : $the_testimonial_query->the_post();
							$remainder = $counter % 4;
                        	 ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                                    <section class="entry-content clearfix" itemprop="articleBody">
                                        <?php the_content();?>
                                    </section>
                                </article>
							<?php
								if ((($counter % $postsPerCol) == 0 && $remainder == $postsPerCol) || (($counter % $postsPerCol) == 0 && $remainder == 0)){
								?>
                                
									</div>
									<div class='test-col <?php echo $class ?>'>
								<?php } 
							
                                $counter++;
                                $class = 'number'.$counter;
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

<?php get_footer(); ?>
