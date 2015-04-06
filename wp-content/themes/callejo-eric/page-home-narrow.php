<?php

/* Template Name: Home (Narrow Slider) */

get_header(); 

?>
<div class="body-bg">
    <div class="container">
    		<?php
				$posts_per_page = 4;
				$args = array( 'post_type' => 'homepage-slider', 'order' => 'ASC', 'posts_per_page' => $posts_per_page );
				$loop = new WP_Query( $args ); 
			?>
			<?php if ($loop->have_posts()) : ?>
			<div class="slide-container">
				<div class="row">
					<div class="col-xs-12">
						<div id="owl-home-narrow" class="owl-carousel owl-theme visible-lg visible-md">
						<?php $cnt2 = 0; ?>
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<div>
								<?php 
									if ( has_post_thumbnail() ) { 
										$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
								?>
									<?php $key = "slide_url"; ?> 
									<?php $key_value = get_post_meta($post->ID, $key, true); ?>
									<?php if (!empty($key_value)) : ?>
									   <a href="<?php echo $key_value; ?>">
									<?php endif; ?>
											<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
									<?php if (!empty($key_value)) : ?>
									   </a>
									<?php endif; ?>
								<?php } ?>
								<div class="slider-content"><?php the_content(); ?></div>
							</div>
							<?php $cnt2++; ?>
						 <?php endwhile; ?>
						 <?php wp_reset_query(); ?>
						</div>
					</div>
				</div>
			</div>
				
			<?php endif; ?>
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