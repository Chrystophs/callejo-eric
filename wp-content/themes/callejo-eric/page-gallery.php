<?php

/* Template Name: Smile Gallery */

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
                            	<h1 class="page-title2" itemprop="headline">
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
                            </article>
                </div>
            </div>
          </div>
    </div>
           <div class="img-divider"></div>
     <div class="container">
        <div class="row">
              <div class="col-xs-12">
                            <article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/WebPage">
                            <section itemprop="articleBody">
                          		<?php the_content(); ?>
                            </section>
                          
							  <?php endwhile; else: ?>
                      
                                  Sorry, there may have been a problem.
                      
                                  <?php get_search_form(); ?>
                  
                              <?php endif; ?>
                              <?php wp_reset_query(); ?>
                              
                              <?php 
                                  $args = array( 'post_type' => 'gallery', 'order' => 'ASC' );
                                  $loop = new WP_Query( $args ); 
                              ?>
                            <section>
                              <div id="owl-smile" class="owl-carousel owl-carousel-narrow owl-theme owl-controls owl-buttons owl-next owl-prev">
                                  <?php $cnt2 = 0; ?>
                                  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                      <div>
                                        <?php
                                            $children = get_children( 'post_type=attachment&post_mime_type=image&output=ARRAY_N&orderby=menu_order&order=DESC&posts_per_page=-1&post_parent='.$post->ID);
                                            $num_children = count($children);
                                            if ($num_children == 1) {
                                                $num_children = 1;
                                            } else if ($num_children % 3 == 0) {
                                                $num_children = 3;
                                            } elseif ($num_children % 2 == 0) {
                                                $num_children = 2;
                                            } else {
                                                $num_children = 2;
                                            }	
                                        ?>
                                        <?php echo do_shortcode('[gpm-gallery numperrow="'.$num_children.'" imgthumb="full"]'); ?>
                                        <?php the_content(); ?>
                                      <h3><?php the_title(); ?></h3>
                                      </div>
                                      <?php $cnt2++; ?>
                                   <?php endwhile; ?>
                                   <?php wp_reset_query(); ?>     
                              </div>
                           </section>
                   		</article>
                </div>			
            </div>
          </div>
    </div>
</div>
<?php get_footer(); ?>