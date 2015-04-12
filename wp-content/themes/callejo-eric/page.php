<?php get_header(); ?>
<div class="body-bg">
    <div class="container">
    	<div class="row">
        	<div class="col-xs-12">
                  <?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <!-- Right Body Container -->
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
                    <div class="content-block">
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
                                <div class="spacer"></div>
                                <?php

                                  if(get_field('second_header'))
                                  {
                                    echo '<h2 class="second-head">' . get_field('second_header') . '</h2>';
                                  }

                                ?>
                            </header>
                            <section itemprop="articleBody">
								<?php
                                  if(get_field('page_sub-headline_(h2)')) {
                                    echo '<h2>';
                                        the_field('page_sub-headline_(h2)');
                                    echo '</h2>';
                                  }
                                ?>
                                
                                <?php if ( has_post_thumbnail() ) { ?>
                                      <?php the_post_thumbnail(array(200,200), array('class'=>'img-thumbnail pull-right margin-left')); ?>
                                <?php } ?>
                                
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
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            	<div class="content-block">
                	<aside>
                		<?php get_sidebar('sidebar')?>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>