<?php

/* Template Name: Testimonial Page */

get_header(); ?>
<div class="body-bg">
	<div class="container">
    	<div class="row">
        	<div class="col-xs-12">
            	<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>
            </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
          		<div class="content-block">
                  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
                      <article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/WebPage">
                        	<header class="article-header">
                            	<h1 class="page-title" itemprop="headline">
								  <?php
                                    if(get_field('custom_page_headline_(h1)')) {
                                          the_field('custom_page_headline_(h1)');
                                    } else {
                                          the_title();
                                    }
                                  ?>
                                </h1>
                            </header>
					  		<section itemprop="articleBody">
									<?php
                                      if(get_field('page_sub-headline_(h2)')) {
                                        echo '<h2>';
                                            the_field('page_sub-headline_(h2)');
                                        echo '</h2>';
                                      }
                                    ?>
                                    <?php the_content(); ?>
                                    
                                <?php endwhile; else: ?>
                                    
                                  Sorry, there may have been a problem.
                                
                                  <?php get_search_form(); ?>
                                
                                <?php endif; ?>
                                <?php wp_reset_query(); ?>
                            </section>
                  
							<?php 
                                $args = array( 'post_type' => 'testimonials', 'order' => 'ASC' );
                                $loop = new WP_Query( $args );
                            ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <hr/>
                                </div>
                            </div>
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                              <section>         
                                <div class="row">
                                    
                                    <?php if ( has_post_thumbnail() ) { ?>
                                        <div class="col-xs-3">
                                             <?php the_post_thumbnail('medium',array('class'=>'img-responsive img-thumbnail')); ?>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php if ( has_post_thumbnail() ) { ?><div class="col-xs-9"><?php } else { ?><div class="col-xs-12"><?php } ?>
                                        <?php the_content(); ?>
                                        <h3 class="text-right"><em>- <?php the_title(); ?></em></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <hr/>
                                    </div>
                                </div>
                              </section>
                            <?php endwhile; ?>
                            <?php wp_reset_query(); ?>
                     </article> 
               </div>          			
          </div>
        </div>
   	</div>
</div>
		
<?php get_footer(); ?>