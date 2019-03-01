<section class="sectionMenu">
  <div class="wrapp">
    <div class="seditBlock">
      <div class="block">
      	<a href="<?php echo esc_url(home_url('/')); ?>"><?php echo sedit(null, 'logo', 'image', 'thumb350', null); ?></a>
      </div>
      <div class="block">
      	<div class="menu-info">
					<i class="fas fa-bars hamburger"></i>
				</div>
				<div class="show-menu">
					<div class="menu-content">
						<?php
// /walker = new MenuIMG;
wp_nav_menu([
    'container' => '',
    'container_class' => '',
    'container_id' => '',
    'depth' => '3',
    'theme_location' => 'top',
    //'walker' => $walker,
    'menu_class' => 'menu',
]);
?>
          </div>
          <a href="tel:<?php echo sedit(null, 'telrzkom1', 'value'); ?>">
            <div class="info">
            <ul>
              <i class="fas fa-phone-square"></i>
            </ul>
            <ul>
              <p>Dział obsługi klienta</p>
              <p><?php echo sedit(null, 'telrzkom1', 'value'); ?></p>
            </ul>
          </div>
          </a>
				</div>
      </div>
    </div>
  </div>
</section>
