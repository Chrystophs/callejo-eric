<!DOCTYPE html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php wp_title(''); ?></title>
    
    <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />

    <?php wp_head(); ?>
    <?php get_wpbs_theme_options(); ?>

    <link href="<?php bloginfo('stylesheet_directory'); ?>/css/jquery.bxslider.css" rel="stylesheet" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.bxslider.min.js"></script>

    
    <!-- css3-mediaqueries.js for IE less than 9 -->
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    
    <!-- html5.js for IE less than 9 -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script type='text/javascript' src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->

    
</head>

<body <?php body_class();?>>
<?php get_template_part( 'partials/svg','icons'); ?>
<?php if (of_get_option('remove_top_bar') != 1) : ?> 
<div class="top-bar">
</div>
<?php endif; ?>
<header role="banner">
<div class="container">
	<div class="row">
            <div class="col-sm-5 col-md-5 col-lg-4">
                <?php $logo_header = of_get_option('logo_header');
				  if ($logo_header) { ?>
				   <a class="main-logo" href="<?php echo get_option('home'); ?>" title="<?php bloginfo('name'); ?>">
                        <img src="<?php echo $logo_header; ?>" alt="<?php bloginfo('name'); ?>" class="main-logo img-responsive"/>
                   </a>
				<?php } else { ?>
					<a class="main-logo" href="<?php echo get_option('home'); ?>" title="<?php bloginfo('name'); ?>">
						<img src="<?php bloginfo('template_url'); ?>/i/logo.png" alt="<?php bloginfo('name'); ?>" class="main-logo img-responsive"/>
					</a>
				<?php } ?>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-7">
            	<div class="social-links">
					<?php get_template_part( 'partials/svg','declaration'); ?>
                </div>
                
                <div class="h-phone">
                	<?php
						$kettering_phone_new = contact_detail('kettering_phone_new', '' , '', false);
                        $kettering_phone_current = contact_detail('kettering_phone_current', '' , '', false);
                        $dayton_phone_new = contact_detail('dayton_phone_new', '' , '', false);
                        $dayton_phone_current = contact_detail('dayton_phone_current', '' , '', false);
					?>
                    <?php if (!empty($kettering_phone_new)) : ?>
                        <span class="blue-tag-number">KETTERING</span> <span itemprop="telephone">NEW PATIENTS: <?php echo $kettering_phone_new; ?> CURRENT PATIENTS: <?php echo $kettering_phone_current; ?></span>
                    <?php endif; ?>
                    <?php if (!empty($dayton_phone_new)) : ?>
                        <span class="blue-tag-number">DAYTON</span> <span itemprop="telephone">NEW PATIENTS: <?php echo $dayton_phone_new; ?> CURRENT PATIENTS: <?php echo $dayton_phone_current; ?></span>
                    <?php else: ?>
                        Phone: 
                    <?php endif; ?>
                        <span itemprop="telephone"><strong><?php echo $phone_current; ?></strong></span>
                </div>
            </div>
     </div>
</div>
</header>
<?php if (of_get_option('make_nav_sticky') == 1) : ?> 
<div data-spy="affix" data-offset-top="210" data-offset-bottom="200">
<?php endif; ?>
    <div class="navbar navbar-default">
      <div class="container">
          <nav role="navigation">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span>Menu</span>
                  </button>
              </div>
        
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php 
                        wp_nav_menu( array(
                        'theme_location'       => 'Main Menu',
                        'depth'      => 3,
                        'container'  => false,
                        'menu_class' => 'nav navbar-nav',
                        'walker' => new twitter_bootstrap_nav_walker(),
                        'fallback_cb'    => '__return_false')
                        );
                    ?>
               </div>
          </nav>
      </div>
    </div>
<?php if (of_get_option('make_nav_sticky') == 1) : ?> 
</div>
<?php endif; ?>
<!--Open if is_home first condition-->
<?php if (is_front_page()) {?>
    <?php
        $posts_per_page = 4;
        $args = array( 'post_type' => 'homepage-slider', 'order' => 'ASC', 'posts_per_page' => $posts_per_page );
        $loop = new WP_Query( $args ); 
    ?>
    <?php if ($loop->have_posts()) : ?>
    <div id="owl-home-wide" class="owl-carousel owl-carousel-wide owl-theme visible-lg visible-md">
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
    <?php endif; ?>
<?php } ?>
<!-- Close If is_home-->