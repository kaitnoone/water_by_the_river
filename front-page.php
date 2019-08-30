<?php get_header(); ?>

			<div id="content">
                <article class="sidebar-nav secondary" id="post-53" role="article" itemscope="" itemtype="http://schema.org/BlogPosting" style="top: 479.188px; bottom: auto;">

                    <section class="entry-content clearfix" itemprop="articleBody">
                        <p><a href="/schedule-online">Schedule Online Now!</a></p>
                    </section>

                </article>
                
				<div id="inner-content" class="wrap clearfix">
                
                		<div id='home-slider' class='twelvecol first clearfix'>
                        	<?php
							  $line1 = get_field("slider_line1", 48);
							  $line2 = get_field("slider_line2", 48);
							  $cta = get_field("call_to_action_headline", 48);
							  $cta_bottom = get_field("call_to_action_headline_bottom", 48);
						?>
                            <div class='cta'>
                            	<?php echo $cta ?>
                            </div>
                            <div class='cta two'>
                            	<?php echo $cta_bottom ?>
                            </div>
                            <div class='headline'>
								<div id='line1'><?php echo $line1 ?></div>
								<div id='line2'><?php echo $line2 ?></div>
                            </div>
                        	<?php echo do_shortcode("[rsSlider id='43']");  ?>
							
                        </div>

						<div id="main" class="twelvecol first clearfix" role="main">
                            
							  <?php
                                  // The "Recent News" Query
                                  $recent_news_query = new WP_Query(array('category_name'=>"Recent News",
                                    'showposts' => 1,
									'order'=>DESC)
                                  );

                                  // The "Who We Are" Query
                                  $who_we_are_query = new WP_Query(array('pagename'=>"who-we-are",
                                    'showposts' => 1,
									'order'=>DESC)
                                  );
								  
                                  // The Testimonial Query
                                  $the_testimonial_query = new WP_Query(array('post_type'=>"testimonials",
                                    'showposts'=>1,
									'order'=>DESC)
                                  );

                              ?>

                            <div class='clearfix'>
                            	<div class='home-module first'>
                                    
									<?php if ($recent_news_query->have_posts() ) : while ( $recent_news_query->have_posts() ) : $recent_news_query->the_post();  ?>
                                            <?php 
                                                $cats = wp_get_post_categories($post->ID);
												$the_slug = $recent_news_query->get('category_name');
												$cat_name = 'Recent News';
												foreach ($cats as $key => $value){
													$cat = get_category($value);
												if ($cat->slug == $the_slug){
														$cat_slug = $cat->slug;
														$cat_name = $cat->name;
													}
												}
											?>
		
											<h3 class="entry-title">
												<a href="<?php echo 'category/'.$cat_slug ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'bones' ), $cat_name) ); ?>" rel="bookmark"><?php echo $cat_name ?></a>
											</h3>
													
											<?php the_excerpt(); ?>
											<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
										<?php endwhile; else: ?>

											<h3 class="entry-title">
												<?php echo $recent_news_query->get('category_name') ?>
											</h3><p>Sorry, no posts matched your criteria.</p>
										<a class='read-more' href='index.php/<?php echo $cat_slug ?>'>Read More</a>		
                                    <?php endif; ?>

								
                                    
                                    
                                </div>
                                <article class='home-module'>

                                    	<?php if ($who_we_are_query->have_posts() ) : while ( $who_we_are_query->have_posts() ) : $who_we_are_query->the_post();  ?>
                                            <?php 
                                                $cats = get_pages($post->ID);
												$the_slug = $who_we_are_query->get('pagename');
												$page_title = 'title';
												$page_ID = 'ID';
												$page_slug = 'slug';
												foreach ($cats as $page){
													if ($page->post_name == $the_slug){
														$page_slug = $the_slug;
														$page_title = $page->post_title;
														$page_ID = "?page_id=$page->ID";
													}
												}
											?>
                                           
		
											<h3 class="entry-title">
												<a href="<?php echo ($page_ID) ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'bones' ), $page-slug) ); ?>" rel="bookmark"><?php echo $page_title ?></a>
											</h3>
		
											<?php the_excerpt( __( 'Continue reading <span class="meta-nav">→</span>', 'twentytwelve' ) ); ?>
											<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
										<?php endwhile; ?>
                                    <?php endif; ?>

                                </article>
                                <article class='home-module last'>
									<?php if ($the_testimonial_query->have_posts() ) : while ( $the_testimonial_query->have_posts() ) : $the_testimonial_query->the_post();  ?>
                                            <?php 
												$the_type = $the_testimonial_query->get('post_type');
	                                            $info = get_post_type_object($the_type);
												$the_name = $info->labels->singular_name;
											?>
		
											<h3 class="entry-title">
												<a href="<?php echo ($the_type) ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'bones' ), $the_name) ); ?>" rel="bookmark"><?php echo $the_name ?></a>
											</h3>
													
											<?php the_excerpt( __( 'Continue reading <span class="meta-nav">→</span>', 'twentytwelve' ) ); ?>
											<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
										<?php endwhile; ?>
										<a class='read-more' href='/<?php echo $the_type ?>'>Read More</a>		
                                    <?php endif; ?>

                                </article>
                            </div>





						</div>

				</div>

			</div>

<?php get_footer(); ?>
