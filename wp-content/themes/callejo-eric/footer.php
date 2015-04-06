<?php if (of_get_option('disable_footer_callouts') != 1) : ?> 
<div class="testimonial-bar visible-lg">
    <div class="container">
      <div class="row">
          <?php 
              $args = array( 'post_type' => 'callouts', 'posts_per_page' => 4, 'order' => 'ASC', 'orderby' => 'menu_order' );
              $loop = new WP_Query( $args ); 
              $i = 1;
              $numPerRow = 3;
          ?>
          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
              <?php echo '<div class="col-lg-'.(12/$numPerRow).'">'; ?>
              	<?php $callout_link = get_field('callout_link_url'); ?>
                <?php if ( has_post_thumbnail() ) { ?>
                		<?php if(!empty($callout_link)) { echo '<a href="'.$callout_link.'">'; } ?>
						<?php echo get_the_post_thumbnail($post->ID,'full', array('class'=>'img-responsive img-thumbnail')); ?>
                        <?php if(!empty($callout_link)) { echo '</a>'; } ?>
                <?php } else { ?>
                	<div class="callout-title">
                    	<?php if(!empty($callout_link)) : ?>
                        	<a href="<?php echo $callout_link; ?>">
                       	<?php endif; ?>
							<?php the_title(); ?>
                        <?php if(!empty($callout_link)) : ?>
                        	</a>
                       	<?php endif; ?>
                    </div>
                	<div class="callout-body"><?php the_content(); ?></div>
                    	<?php
							if(!empty($callout_link)) {
								  echo '<a class="btn-square btn-callout btn-default btn-block" href="'.$callout_link.'">';
								  	$callout_text = get_field('callout_link_text');
								  	if(!empty($callout_text)) { echo $callout_text; } else { echo 'Learn More'; }
								  echo '</a>';
							}
						?>
                <?php } ?>
                
              <?php echo '</div>'; ?> 
              <?php if($i % $numPerRow == 0) {echo '</div><div class="row testimonial-row">';} ?>
                <?php $i++; ?> 
           <?php endwhile; wp_reset_query();?>
      </div>
    </div>
</div>
<?php endif; ?>
<footer>
    <div class="footer-bar">
        <div class="container">   
            <div class="row">
            	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-5">
                        <?php 
                            $contact_fax = contact_detail('fax', '' , '', false);
                            $contact_line1 = contact_detail('address_line_1', '' , '', false);
							$contact_line2 = contact_detail('address_line_2', '' , '', false);
                            $contact_city = contact_detail('address_city', '' , '', false);
                            $contact_state = contact_detail('address_state', '' , '', false);
                            $contact_zipcode = contact_detail('address_zipcode', '' , '', false);
                            $phone_new = contact_detail('phone_new', '' , '', false);
                            $phone_current = contact_detail('phone_current', '' , '', false);
							$google_maps = contact_detail('google_maps', '' , '', false);
                        ?>
                        <a href="<?php echo $google_maps; ?>" title="<?php bloginfo('name'); ?>" class="f-map">
                            <img src="<?php bloginfo('template_url'); ?>/i/map-small.jpg" alt="<?php bloginfo('name'); ?>" class="img-responsive img-thumbnail"/>
                        </a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="contact-box">
                        <address itemscope itemtype="http://schema.org/PostalAddress">
                            <span itemprop="description"><strong><?php bloginfo('description'); ?></strong></span><br/>
                            <span itemprop="name"><strong><?php bloginfo('name'); ?></strong></span>
                            <div itemprop="address" itemtype="http://schema.org/PostalAddress">
                                <span itemprop="streetAddress"><?php echo $contact_line1; ?>
                                <?php
									if (!empty($contact_line2)) {
										echo '<br/>'.$contact_line2;	
									}
								?>
                                </span><br/>
                                <span itemprop="addressLocality"><?php echo $contact_city; ?></span>,
                                <span itemprop="addressRegion"><?php echo $contact_state; ?></span>
                                <span itemprop="postalCode"><?php echo $contact_zipcode; ?></span>
                            </div>
                        </address>
                        <address>
                            <?php if (!empty($phone_new)) : ?>
                                New Patients: <span itemprop="telephone"><strong><?php echo $phone_new; ?></strong></span><br/>
                            <?php endif; ?>
                            <?php if (!empty($phone_new)) : ?>
                                Current Patients:
                            <?php else: ?>
                                Phone: 
                            <?php endif; ?>
                                <span itemprop="telephone"><strong><?php echo $phone_current; ?></strong></span>
                        </address>
                        <?php if (!empty($contact_fax)) : ?>
                            <address>
                                <span itemprop="faxNumber">Fax: <strong><?php echo $contact_fax; ?></strong></span>
                            </address>
                        <?php endif; ?>
                        
                        <div class="social-links social-links-bottom">
                            <?php get_template_part( 'partials/svg','declaration'); ?>
                        </div>
                    </div>
                    
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                    <div class="footer-links">
                    <?php 
                        wp_nav_menu( array(
                        'theme_location' => 'Footer Menu',
                        'depth'      => 1,
                        'container'  => false,
                        'menu_class' => 'footer-menu nav nav-pills nav-stacked',
                        'fallback_cb'    => '__return_false')
                        );
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container"> 
            <div class="row">
                <div class="col-xs-12">
                    <p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> - Designed &amp; Developed by <a href="http://www.goldenproportions.com" target="_blank">Golden Proportions Marketing</a> - <?php wp_loginout(); ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>

<!-- <script type="text/javascript">try{Typekit.load();}catch(e){}</script> -->

</html>
