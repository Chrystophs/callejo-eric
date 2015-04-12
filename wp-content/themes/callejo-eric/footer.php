<?php if (of_get_option('disable_footer_callouts') != 1) : ?> 

<?php endif; ?>
<footer>
<div class="request-bar">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <a href="#" ><div class="request">REQUEST AN APPOINTMENT</div></a>
        </div>
      </div>
    </div>
</div>
    <div class="footer-bar">
        <div class="container">   
            <div class="row">
                <!--Footer link pics -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 smile-footer">
                        <img src="<?php bloginfo('template_url'); ?>/i/smile-footer.jpg" alt="Smile Gallery" height="175" width="263"/>
                        <h4>Smile Gallery</h4>
                        <div></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 dental-footer">
                        <img src="<?php bloginfo('template_url'); ?>/i/dental-footer.jpg" alt="Dental Services" width="263" height="175"/>
                        <h4>Dental Services</h4>
                        <div></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 pull-right testimonial-footer">
                        <img src="<?php bloginfo('template_url'); ?>/i/testimonial-footer.jpg" alt="Testimonials" width="263" height="175"/>
                        <h4>Testimonials</h4>
                        <div></div>
                </div>

                </div>
                <?php if(is_front_page()): ?>
                <div class="col-xs-12 description">
                    <img src="<?php bloginfo('template_url'); ?>/i/description.png" atl="Description"/>
                </div>
                <?php endif; ?>
                <div class="col-xs-12">
                    <div class="f-phone">
                    <?php
                        $kettering_phone_new = contact_detail('kettering_phone_new', '' , '', false);
                        $kettering_phone_current = contact_detail('kettering_phone_current', '' , '', false);
                        $dayton_phone_new = contact_detail('dayton_phone_new', '' , '', false);
                        $dayton_phone_current = contact_detail('dayton_phone_current', '' , '', false);
                    ?>
                    <?php if (!empty($kettering_phone_new)) : ?>
                        <span class="green-tag-number">KETTERING</span> &nbsp; <span><?php if (function_exists('contact_detail')) { contact_detail('kettering_address_short'); } ?></span> <span itemprop="telephone">NEW PATIENTS: <?php echo $kettering_phone_new; ?> CURRENT PATIENTS: <?php echo $kettering_phone_current; ?></span><br/>
                    <?php endif; ?>
                    <?php if (!empty($dayton_phone_new)) : ?>
                        <span class="green-tag-number">DAYTON</span> &nbsp;<span><?php if (function_exists('contact_detail')) { contact_detail('dayton_address_short'); } ?></span> <span itemprop="telephone">NEW PATIENTS: <?php echo $dayton_phone_new; ?> CURRENT PATIENTS: <?php echo $dayton_phone_current; ?></span>
                    <?php endif; ?>
                </div>
                </div>
                    <div class="footer-links">
                    <?php 
                        wp_nav_menu( array(
                        'theme_location' => 'Footer Menu',
                        'depth'      => 1,
                        'container'  => false,
                        'menu_class' => 'footer-menu nav-pills',
                        'menu_id'   => 'nav',
                        'fallback_cb'    => '__return_false')
                        );
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>

<!-- <script type="text/javascript">try{Typekit.load();}catch(e){}</script> -->

</html>
