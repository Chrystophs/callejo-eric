<?php 
					
	$icon_style = "round";
	if (function_exists('contact_detail')) { 
		$fb = contact_detail('facebook', '' , '', false); 
		$twitter = contact_detail('twitter', '' , '', false);
		$google = contact_detail('google+', '' , '', false);
		$linkedin = contact_detail('linkedin', '' , '', false);
	} 
?>
<?php if (!empty($fb)) : ?>
	<a href="<?php echo $fb; ?>" target="_blank">
		<svg class="icon icon-facebook-<?php echo $icon_style; ?>" viewBox="0 0 32 32">
			<use xlink:href="#icon-facebook-<?php echo $icon_style; ?>"></use>
        </svg>
    </a>
<?php endif; ?>
<?php if (!empty($twitter)) : ?>
	<a href="<?php echo $twitter; ?>" target="_blank">
		<svg class="icon icon-twitter-<?php echo $icon_style; ?>" viewBox="0 0 32 32">
			<use xlink:href="#icon-twitter-<?php echo $icon_style; ?>"></use>
        </svg>
    </a>
<?php endif; ?>
<?php if (!empty($google)) : ?>
	<a href="<?php echo $google; ?>" target="_blank">
		<svg class="icon icon-googleplus-<?php echo $icon_style; ?>" viewBox="0 0 32 32">
			<use xlink:href="#icon-googleplus-<?php echo $icon_style; ?>"></use>
        </svg>
    </a>
<?php endif; ?>
<?php if (!empty($linkedin)) : ?>
	<a href="<?php echo $linkedin; ?>" target="_blank">
		<svg class="icon icon-linkedin-<?php echo $icon_style; ?>" viewBox="0 0 32 32">
			<use xlink:href="#icon-linkedin-<?php echo $icon_style; ?>"></use>
        </svg>
    </a>
<?php endif; ?>