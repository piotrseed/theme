<div class="menu-right">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo sedit(null, 'logo', 'image', 'thumb350', null); ?></a>
	<i class="fas fa-bars"></i>
	<div class="menua">
	  <div>
			<p><i class="fas fa-envelope"></i> <?php echo get_option('email'); ?></p>
			<p><i class="fas fa-phone"></i> <?php echo sedit('', 'tel', 'option', null, null); ?></p>
	    <p><?php //pll_the_languages(array('dropdown'=>1));  ?></p>
	  </div>
	  <div>
			<?php
			$walker = new MenuIMG;
				$args = array(
				'container' => '',
				'container_class' => '',
				'container_id' => '',
				'depth' => '3',
				'theme_location' => '',
				'walker' => $walker,
				'menu_class'=> 'menu'
				);
				wp_nav_menu( $args );
			?>
	  </div>
	</div>
</div>
