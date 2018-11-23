<div class="wrapp">
  <section class="slider">
    <ul class="rslides" id="top-slider">
      <?php
      $args = array( 'post_type' => 'slider' );
      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ) : $loop->the_post();
      $slider_image = esc_html( get_post_meta( $post->ID, 'slider_image', true ) );
      $array_image = explode(',', $slider_image);
      $image_attributes = wp_get_attachment_image_src($array_image[0], 'full')[0];
      ?>
          <li style="background-image:url(<?php echo $image_attributes; ?>);">
            <div class="slider-content">
              <p class="animated fadeInUp delay-1"><?php echo get_post_meta( $post->ID, 'option1', true ); ?></p>
              <p class="animated fadeInUp delay-2"><?php echo get_post_meta( $post->ID, 'option2', true ); ?></p>
              <p class="animated fadeInUp delay-2"><?php echo get_post_meta( $post->ID, 'option3', true ); ?></p>
            </div>
            <div class="filtr1"></div>
          </li>
      <?php
      endwhile;
      ?>
    </ul>
  </section>
</div>
