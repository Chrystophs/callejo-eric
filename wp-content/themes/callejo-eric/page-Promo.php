<?php

/* Template Name: Promo Page */

get_header(); ?>
<div class="body-bg">
    <?php if(get_field('page_header')) {
      echo '<div class="service-header"><img src="'.get_field('page_header').'"/></div>';
    } 
    ?>
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
                                <?php

                                  if(get_field('second_header'))
                                  {
                                    echo '<h2 class="second-head">' . get_field('second_header') . '</h2>';
                                  }

                                ?>
                                <div class="spacer"></div>
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
                    </article>
            </div>
        </div>
    </div>
  </div>
    <div class="img-divider"></div>
  <div class="container">
     <div class="row">
          <div class="col-xs-12">
              <div class="content-block">
                    <article>

							<?php 
                                $args = array( 'post_type' => 'promos', 'order' => 'ASC' );
                                $loop = new WP_Query( $args );
                            ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <hr/>
                                </div>
                            </div>
                            <?php 
								$args = array( 'post_type' => 'promos', 'order' => 'ASC', 'orderby' => 'menu_order' );
								$loop = new WP_Query( $args );
							?>
							<div class="row">
							<?php $y = 0; ?>
							<?php $x = 0; ?>
							<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
								  <div class="col-xs-3">
                                  	<section>
									  <div class="promos">
										<?php if ( has_post_thumbnail() ) { ?>
												 <?php the_post_thumbnail(array(150,150),array('class'=>'center')); ?>
										<?php } ?>
										
										<!--<?php the_content(); ?>
										<h4 class="center blue"><em>- <?php the_title(); ?></em></h4>-->
									  </div>
                                    </section>
								  </div>
								  <?php $y++; ?>
								  <?php $x++; ?>
								  <?php if ($x >= 4) { $x = 0; } ?>
								  <?php if ($y % 4 == 0) { echo '</div><div class="row">'; } ?>
							<?php endwhile; ?>
							<?php wp_reset_query(); ?> 
							</div>
                     </article> 
               </div>          			
          </div>
        </div>
   	</div>
</div>
		
<?php get_footer(); ?>