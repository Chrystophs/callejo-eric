<?php

/* Template Name: Sub Contact Page */

get_header(); ?>

<div class="body-bg">
                <div style="padding-top:10px;">
                        <a href="<?php if (get_field('google_maps')) { the_field('google_maps'); } ?>" target="_blank"  itemprop=”maps”><img src="<?php bloginfo('template_url'); ?>/i/<?php the_title(); ?>-map.jpg" alt="google-maps" class=""/></a>
            </div>
    <div class="container" id="b-container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5" id="contact-sidebar">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
                            <div class="content-block">
                                <?php the_content(); ?>
                                <div itemscope itemtype="http://schema.org/Dentist">
                                <?php 
                                    $contact_fax = get_field('fax', '' , '', false);
                                    $contact_line1 = get_field('address-line-1', '' , '', false);
                                    $contact_line2 = get_field('address-line-2', '' , '', false);
                                    $contact_city = get_field('city', '' , '', false);
                                    $contact_state = get_field('state', '' , '', false);
                                    $contact_zipcode = get_field('zip_code', '' , '', false);
                                    $phone_new = get_field('new-patient', '' , '', false);
                                    $phone_current = get_field('current-patient', '' , '', false);
    
                                    $hours_sunday = get_field('sunday_hours', '' , '', false);
                                    $hours_monday = get_field('monday_hours', '' , '', false);
                                    $hours_tuesday = get_field('tuesday_hours', '' , '', false);
                                    $hours_wednesday = get_field('wednesday_hours', '' , '', false);
                                    $hours_thursday = get_field('thursday_hours', '' , '', false);
                                    $hours_friday = get_field('friday_hours', '' , '', false);
                                    $hours_saturday = get_field('saturday_hours', '' , '', false);
                                    
                                    $hours_sunday_schema = get_field('sunday_hours_schema', '' , '', false);
                                    $hours_monday_schema = get_field('monday_hours_schema', '' , '', false);
                                    $hours_tuesday_schema = get_field('tuesday_hours_schema', '' , '', false);
                                    $hours_wednesday_schema = get_field('wednesday_hours_schema', '' , '', false);
                                    $hours_thursday_schema = get_field('thursday_hours_schema', '' , '', false);
                                    $hours_friday_schema = get_field('friday_hours_schema', '' , '', false);
                                    $hours_saturday_schema = get_field('saturday_hours_schema', '' , '', false);
                                ?>
                                <address itemscope itemtype="http://schema.org/PostalAddress">
                                    <span itemprop="description" class="contact-name"><?php bloginfo('description'); ?></span><br/>
                                    <span itemprop="name" class="contact-subname"><?php bloginfo('name'); ?></span>
                                    <div itemprop="address" itemtype="http://schema.org/PostalAddress">
                                        <span itemprop="streetAddress"><?php echo $contact_line1; ?>
                                        <?php
                                            if (!empty($contact_line2)) {
                                                echo '<br/>'.$contact_line2;	
                                            }
                                        ?></span><br/>
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
                                <address>
                                    <span class="contact-hours">Practice Hours</span><br/>
                                    <?php if (!empty($hours_sunday)) : ?>
                                        <meta itemprop="openingHours" content="Su <?php echo $hours_sunday_schema; ?>">Sun: <strong><?php echo $hours_sunday; ?></strong><br/>
                                    <?php endif; ?>
                                    <?php if (!empty($hours_monday)) : ?>
                                        <meta itemprop="openingHours" content="Mo <?php echo $hours_monday_schema; ?>">Mon: <strong><?php echo $hours_monday; ?></strong><br/>
                                    <?php endif; ?>
                                    <?php if (!empty($hours_tuesday)) : ?>
                                        <meta itemprop="openingHours" content="Tu <?php echo $hours_tuesday_schema; ?>">Tue: <strong><?php echo $hours_tuesday; ?></strong><br/>
                                    <?php endif; ?>
                                    <?php if (!empty($hours_wednesday)) : ?>
                                        <meta itemprop="openingHours" content="We <?php echo $hours_wednesday_schema; ?>">Wed: <strong><?php echo $hours_wednesday; ?></strong><br/>
                                    <?php endif; ?>
                                    <?php if (!empty($hours_thursday)) : ?>
                                        <meta itemprop="openingHours" content="Th <?php echo $hours_thursday_schema; ?>">Thu: <strong><?php echo $hours_thursday; ?></strong><br/>
                                    <?php endif; ?>
                                    <?php if (!empty($hours_friday)) : ?>
                                        <meta itemprop="openingHours" content="Fr <?php echo $hours_friday_schema; ?>">Fri: <strong><?php echo $hours_friday; ?></strong><br/>
                                    <?php endif; ?>
                                    <?php if (!empty($hours_saturday)) : ?>
                                        <meta itemprop="openingHours" content="Sa <?php echo $hours_saturday_schema; ?>">Sat: <strong><?php echo $hours_saturday; ?></strong><br/>
                                    <?php endif; ?>
                                </address>
                                </div>
                            </div>
                        <?php endwhile; endif; ?>
                        <?php wp_reset_query(); ?>
                </div>
                <div class="col-lg-7  col-md-7 col-sm-7 entry-content" id="c-container">
                    <div class="content-block">
                        <?php echo do_shortcode('[gravityform id="1" name="Contact Us" title="false" description="true"]'); ?><br/><br/>
                    </div>
                </div>
          </div>
    </div>
</div>
<?php get_footer(); ?>