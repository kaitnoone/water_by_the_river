<?php
/*
Template Name: Wide and Two Column
*/
?>

<?php get_header(); ?>

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
                        
                        <?php
							 
							$narrow_headline = get_field("narrow_column_headline");
							$narrow_content = get_field("narrow_column"); 
							$wider_headline = get_field("larger_column_headline"); 
							$wider_content = get_field("larger_column"); 
						 ?>
                         
                            
						<div class="clearfix">	
                            <div class='small-column'>
                                <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
    
                                    <header class="article-header">
                                        <h3 class="page-title"><?php echo $narrow_headline; ?></h3>
                                    </header>
    
                                    <section class="entry-content clearfix" itemprop="articleBody">
                                        <?php echo $narrow_content; ?>
                                    </section>

                                </article>
                            </div>

                            <div class='large-column'>
                                <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
    
                                    <header class="article-header">
                                        <h3 class="page-title"><?php echo $wider_headline; ?></h3>
                                    </header>
    
                                    <section class="entry-content clearfix" itemprop="articleBody">
                                        <?php echo $wider_content; ?>
                                    </section>

                                </article>
                            </div>
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

                          

                      </div>
<?php endif; ?>
				</div>

			</div>

<?php get_footer(); ?>
