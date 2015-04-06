<?php

/* Template Name: Doctors Page */

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
					  		<section>
							  <?php
                                if(get_field('page_sub-headline_(h2)')) {
                                  echo '<h2>';
                                      the_field('page_sub-headline_(h2)');
                                  echo '</h2>';
                                }
                              ?>
                              <?php the_content(); ?>
                           </section>

						  <?php endwhile; else: ?>
                              
                            Sorry, there may have been a problem.
                          
                            <?php get_search_form(); ?>
                          
                          <?php endif; ?>
                          <?php wp_reset_query(); ?>
                          
                          <?php 
                              $args = array( 'post_type' => 'doctors', 'order' => 'ASC' );
                              $loop = new WP_Query( $args );
                          ?>
                          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                          <section>
                              <div class="row">
                              		<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-md-push-7">
										<?php if ( has_post_thumbnail() ) { ?>
                                                 <?php the_post_thumbnail('large',array('class'=>'img-responsive img-thumbnail')); ?>
                                        <?php } ?>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-5 col-ld-5 col-md-pull-5">
                                        <h2><?php the_title(); ?></h2>
                                        <?php the_content(); ?>
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