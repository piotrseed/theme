<section class="sectionSlider">
  <div class="seditBlock">
    <ul class="rslides block" id="top-slider">
      <?php
$args = array('post_type' => 'slider');
$loop = new WP_Query($args);
while ($loop->have_posts()): $loop->the_post();
    $slider_image = esc_html(get_post_meta($post->ID, 'slider_image', true));
    $array_image = explode(',', $slider_image);
    $image_attributes = wp_get_attachment_image_src($array_image[0], 'full')[0];
    echo '<li data="' . get_the_ID() . '" style="background-image:url(' . $image_attributes . ');">';
    //$slider_title .= '<p id="" class="normal-font slide-'.get_the_ID().' animated fadeInUp delay-1">'.get_the_title().'</p>';
    echo '<div class="wrapp">';
    echo '<div class="slider-content" data-aos="zoom-in-down">
            <p class="animated fadeInUp delay-1">' . get_post_meta($post->ID, 'option1', true) . '</p>
            <p class="animated fadeInUp delay-2">' . get_post_meta($post->ID, 'option2', true) . '</p>
          </div>';
    echo '</div>';
    echo '<a class="rslides_nav rslides1_nav prev">' . assetImgGet('arr1.png') . '</a>';
    echo '<a class="rslides_nav rslides1_nav next">' . assetImgGet('arr2.png') . '</a>';
    echo '</li>';
endwhile;
?>
    </ul>
  </div>
</section>

