<?php
/**
 * Template Name: Widok O firmie
 * Template Post Type: page
 */

get_header();
while (have_posts()): the_post();

?>
<section class="sectionHeader">
    <div class="wrapp">
      <div class="seditBlock">
      <div class="block"><h1><?php the_title();?></h1></div>
      </div>
    </div>
  </section>

  <section class="sectionContentAbout">
    <div class="wrapp">
      <div class="seditBlock" data-aos="fade-left">
        <div class="block textaFormat"><?php the_content(); ?></div>
      </div>
      <div class="seditBlock" data-aos="fade-right">
        <?php 
        $PostID = get_the_ID();
        $image = wp_get_attachment_image(get_post_thumbnail_id($PostID), 'thumb500');
        if ($image) {
          echo $image;
        }
        ?>
      </div>
    </div>
  </section>
  
<section class="sectionAbout xabout">
  <div class="wrapp">
    <div class="seditBlock">
    </div>
    <?php get_template_part('template/header', 'about'); ?>
  </div>
</section>


<?php 
endwhile;
get_footer();
