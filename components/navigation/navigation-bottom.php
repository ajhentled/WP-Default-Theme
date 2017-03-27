<nav id="footer-navigation" class="footer-navigation clear" role="navigation">
	<?php wp_nav_menu( array(
		'theme_location'	=> 'bottom',
		'depth'             => 1,
		'menu_class' 		=> 'menu-footer clearfix' ,
		'fallback_cb' 		=> 'scwd_menu_home'
		) ); ?>
</nav>