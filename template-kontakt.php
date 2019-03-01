<?php
/**
 * Template Name: Widok kontaktu
 * Template Post Type: page
 */

get_header();
while ( have_posts() ) : the_post();
?>
<section class="sectionHeader">
    <div class="wrapp">
      <div class="seditBlock">
      <div class="block"><h1>Kontakt</h1></div>
      </div>
    </div>
  </section>


<div class="sectionKontakt">
  <div class="wrapp">
    <div class="seditBlock">
      <div class="block">
        <div>
          <h2 data-aos="fade-up" data-aos-delay="100"><?php echo sedit(null, 'titk', 'value'); ?></h2>
          <p data-aos="fade-up" data-aos-delay="200"><i class="fas fa-road"></i><?php echo sedit(null, 'adrz', 'value'); ?></p>
          <p data-aos="fade-up" data-aos-delay="300"><i class="fas fa-map-marker"></i><?php echo sedit(null, 'adrzcd', 'value'); ?></p>
          <p data-aos="fade-up" data-aos-delay="400"><i class="fas fa-phone"></i>tel: <a href="tel:<?php echo sedit(null, 'telrz', 'value'); ?>"><?php echo sedit(null, 'telrz', 'value'); ?></a></p>
          <p data-aos="fade-up" data-aos-delay="500"><i class="fas fa-phone"></i>tel kom: <a href="tel:<?php echo sedit(null, 'telrzkom1', 'value'); ?>"><?php echo sedit(null, 'telrzkom1', 'value'); ?></a></p>
          <p data-aos="fade-up" data-aos-delay="600"><i class="fas fa-envelope"></i><a href="mailto:<?php echo sedit(null, 'email1', 'value'); ?>"><?php echo sedit(null, 'email1', 'value'); ?></a></p>
          <p data-aos="fade-up" data-aos-delay="700"><i class="fas fa-file-alt"></i>NIP: <?php echo sedit('', 'nip', 'option', null, null); ?></p>
          <p data-aos="fade-up" data-aos-delay="800"><i class="fas fa-file-alt"></i>REGON: <?php echo sedit('', 'regon', 'option', null, null); ?></p>
          <h2 data-aos="fade-up" data-aos-delay="1000">Pracujemy</h2>
          <p data-aos="fade-up" data-aos-delay="1100"><?php echo sedit(null, 'ponpt', 'value'); ?></p>
          <p data-aos="fade-up" data-aos-delay="1200"><?php echo sedit(null, 'sob', 'value'); ?></p>
          <p data-aos="fade-up" data-aos-delay="1300"><?php echo sedit(null, 'niel', 'value'); ?></p>
        </div>
      </div>
      <div class="block">
      <?php echo do_shortcode('[contact-form-7 id="91" title="Formularz 1"]') ?>
      </div>
   






    </div>
  </div>
</div>

<?php
endwhile;
?>
<?php
get_footer();
