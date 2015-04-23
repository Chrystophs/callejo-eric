<?php

/* Template Name: Team Page */

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
                  			<hr/>
							<?php 
                                $args = array( 'post_type' => 'team', 'order' => 'ASC' );
                                $loop = new WP_Query( $args );
                            ?>
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <section>
                                <div class="row">
                                    
                                    <?php if ( has_post_thumbnail() ) { ?>
                                        <div class="col-xs-3">
                                             <?php the_post_thumbnail('medium',array('class'=>'img-responsive img-thumbnail')); ?>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php if ( has_post_thumbnail() ) { ?><div class="col-xs-9"><?php } else { ?><div class="col-xs-12"><?php } ?>
                                    	<h3>
                                          	<?php the_title(); ?>
                                        </h3>
                                        <?php the_content(); ?>
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