<?php

/* Template Name: Services (Main) */

get_header(); ?>
<div class="body-bg">
    <?php if(get_field('service_header')) {
      echo '<div class="service-header visible-lg visible-md"><img src="'.get_field('service_header').'"/></div>';
    } 
    ?>
	<div class="container">
        <div class="main-body">
            <div class="row">
              	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="content-block">
                      <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>
                      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                          <article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/WebPage">
                        	<header class="article-header">
                              <h1 class="page-service" itemprop="headline">
                  <?php
                                    if(get_field('custom_page_headline_(h1)')) {
                                          the_field('custom_page_headline_(h1)');
                                    } else {
                                          the_title();
                                    }
                                  ?>
                                </h1>
                                <div class="spacer"></div>
                                <?php

                                  if(get_field('second_header'))
                                  {
                                    echo '<h2 class="second-head">' . get_field('second_header') . '</h2>';
                                  }

                                ?>
                            </header>
                            </article>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <div class="page-subhead">
  <div class="container container2"
    <div class="col-xs-12">
      <?php 
          if(get_field('page_subhead'))
          {
            echo '<span>' . get_field('page_subhead') . '</span>';
          }
          ?>
      <?php
          if(get_field('subhead_content'))
          {
            echo '<p>' . get_field('subhead_content') . '</p>';
          }
      ?>
    </div>
    </div>
  </div>
  <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                                  <?php if ( has_post_thumbnail() ) { ?>
                                          <div class="pull-left margin-left visible-lg">
                                              <?php the_post_thumbnail(array(200,200),array()); ?>
                                          </div><!-- /page-thumbnail -->
                                  <?php } ?>
                                  <!-- End Thumbnail Loop -->
									<?php the_content(); ?>

                                  <?php endwhile; else: ?>
                                      
                                    Sorry, there may have been a problem.
                                  
                                    <?php get_search_form(); ?>
                                  
                                  <?php endif; ?>
                                  <?php wp_reset_query(); ?>
                          </section>
                           
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
                                        <div class="pull-left">
                                          <?php the_post_thumbnail(); ?>  
                                        </div>
                                    <div class="col-xs-12 col-sm-12 col-md-<?php echo 8/$num_per_row; ?> col-lg-<?php echo 8/$num_per_row; ?> space2">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <div class="panel-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></div>
                                            </div>
                                            <div class="panel-body">
                                                <?php $inner_parent = $post->ID; ?>
                                                <?php $child_query = new WP_Query('post_type=page&post_parent='.$post->ID.'&order=ASC order_by=menu_order' . 'true'); ?>
                                                <?php $count_child = $child_query->post_count; ?>
                                                <?php $child_per_column = ceil($count_child/1); ?>
                                                <?php $posts = 1; ?>
                                                <?php $columns = 1; ?>
                                                <div class="row">
                                                <?php if (get_field('teaser-content'));?>
                                                <?php the_field('teaser-content'); ?>
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
              	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-md-pull-9">
                	<aside>
                  		<?php get_sidebar('sidebar')?>
                    </aside>
            	</div>
            </div>
        </div>
   	</div>
</div>
		
<?php get_footer(); ?>