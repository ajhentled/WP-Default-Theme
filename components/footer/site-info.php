<div class="site-info">
	<div class="copyright">
		<div class="container">
			<?php
				$site_info = get_bloginfo( 'description' ) . ' - ' . get_bloginfo( 'name' ) . ' &copy; ' . date( 'Y' );

				if ( get_theme_mod( 'scwd_credits_copyright' ) ) :
					echo get_theme_mod( 'scwd_credits_copyright' );
				else :
					echo $site_info;
				endif;
			?>
		</div>
	</div>
</div><!-- .site-info -->