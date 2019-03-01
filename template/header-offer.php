<?php
$loop = new WP_Query(array(
    'post_type' => 'katalog',
));
$i = 1;
while ($loop->have_posts()): $loop->the_post();
    $PostID = get_the_ID();
    $postMeta = get_post_meta($PostID);
    $image_arr = wp_get_attachment_image_src(get_post_thumbnail_id($PostID), 'full');
    $image_url = $image_arr[0];

    echo '
			      <section class="sectionCat">
			        <div class="seditBlock ' . (($i % 2 == 0) ? '' : 'typeRight') . '">
			          <div class="block">
			            <div>
			              <h1>' . get_the_title() . '</h1>
			              <p>' . $postMeta['des2'][0] . '</p>
			              <a href="' . get_the_permalink() . '">' . assetImgGet('ar.png') . '</a>
			            </div>
			          </div>
			          <div data-aos="' . (($i % 2 == 0) ? 'fade-left' : 'fade-right') . '" class="block" style="background-image:url(' . $image_url . ');"></div>
			        </div>
			      </section>
			          ';
    $i++;
endwhile;