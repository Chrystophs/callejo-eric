<?php

/* Template Name: Services Page */

get_header(); ?>
<div class="body-bg">
<div id="owl-home-wide" class="owl-carousel owl-carousel-wide owl-theme visible-lg visible-md">
    <?php if(get_field('header_image')) {
      echo '<div class="service-header"><img src="'.get_field('header_image').'"/></div>';
    } 
    ?>
    </div>
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
                              <h1 class="page-service brown head-spacing" itemprop="headline">
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
                <div class="content-block">
                        <article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/WebPage">
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
                          <section>
                                  <?php
                                $i = 1;
                                $num_per_row = 2;
                          ?>
                          <?php $page_query = new WP_Query('post_type=page&post_parent='.$post->ID.'&order=ASC'); ?>
                          
                          <?php while ($page_query->have_posts()) : $page_query->the_post(); ?>
                                    <?php 
                                        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                                        } 
                                        ?>
                                    <div class="col-xs-12 col-sm-12 col-md-<?php echo 10/$num_per_row; ?> col-lg-<?php echo 10/$num_per_row; ?> space clear">
                                        <div class="service-thumb">
                                          <?php the_post_thumbnail(); ?>  
                                        </div>
                                        <div class="panel2 panel-default2">
                                            <div class="panel-heading2">
                                                <div class="panel-title2"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></div>
                                            </div>
                                            <div class="panel-body2">
                                                <?php $inner_parent = $post->ID; ?>
                                                <?php $child_query = new WP_Query('post_type=page&post_parent='.$post->ID.'&order=ASC order_by=menu_order' . 'true'); ?>
                                                <?php $count_child = $child_query->post_count; ?>
                                                <?php $child_per_column = ceil($count_child/1); ?>
                                                <?php $posts = 1; ?>
                                                <?php $columns = 1; ?>
                                                <div class="row">
                                                <?php if (get_field('teaser-content')) {
                                                  the_field('teaser-content');
                                                }?>
                                                    <?php while ($child_query->have_posts()) : $child_query->the_post(); ?>
                                                        <?php if ($posts == 1) : ?>
                                                            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                                                                <ul>
                                                        <?php endif; ?>
                                                    
                                                            <li><a href="<?php echo get_the_permalink($inner_parent).'#'.$post->post_name;?>"><?php echo the_title(); ?></a></li>
                                                      
                                                        <?php if (($posts % $child_per_column == 0) || $columns == $count_child) : ?>
                                                                </ul>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php
                                                            if ($posts%$child_per_column == 0) {
                                                                $posts = 1;
                                                            } else {
                                                                $posts++;
                                                            }
                                                            $columns++
                                                        ?>
                                                    <?php endwhile; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                          <?php endwhile; ?>
                          
                          <?php wp_reset_query(); ?> 
                         </section>
                    </article>
                </div>			
            </div>
  		</div>
  	</div>
</div>
<?php get_footer(); ?>