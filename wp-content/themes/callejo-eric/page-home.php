<?php

/* Template Name: Home (Wide slider) */

get_header(); 

?>
<div class="body-bg">
    <div class="container">
          <div class="row">
              <div class="col-xs-12">
                  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
                    <div class="content-block">
                        <article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/WebPage">
                        	<?php if ( has_post_thumbnail() ) { ?>
								  <?php the_post_thumbnail(array(400,400), array('class'=>'img-thumbnail pull-left margin-right')); ?>
                            <?php } ?>
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
                            </header>
                            <div class="spacer">
                            </div>
                    </div>
              </div>
        </div>
  </div>
                            <div class="img-divider"></div>
  <div class="container">
          <div class="row">
              <div class="col-xs-12">
                      <div class="content-block">
                            <section itemprop="articleBody">
								
                                <?php
                                  if(get_field('page_sub-headline_(h2)')) {
                                    echo '<h2>';
                                        the_field('page_sub-headline_(h2)');
                                    echo '</h2>';
                                  }
                                ?>
                                <?php the_content(); ?>
                        	</section>
                        </article>
                    </div>
                  <?php endwhile; else: ?>    
                      Sorry, there may have been a problem.
                      <?php get_search_form(); ?>
                  <?php endif; ?>
                  <?php wp_reset_query(); ?>
              </div>
          </div>
          <?php $home_blog_feed = of_get_option('home_blog_feed'); ?>
          <?php if ($home_blog_feed == 1) : ?>
          <div class="row">
			  <?php 
                  $args = array( 'post_type' => 'post', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 2 );
                  $loop = new WP_Query( $args ); 
              ?>
              <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
              <article>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                  		<div class="panel panel-default">
                        	<div class="panel-heading">
                            	<header class="article-header">
                      				<h3 class="panel-title" itemprop="headline"><a href="<?php the_permalink(); ?>" class="blog-roll-title"><?php the_title(); ?></a></h3>
                                </header>
                            </div>
                            <div class="panel-body">
                            	<section>
                      				<?php the_excerpt(); ?>
                                </section>
                            </div>
                      	</div>
                  </div>
              </article>
              <?php endwhile; ?>
              <?php wp_reset_query(); ?>
          </div>
          <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>