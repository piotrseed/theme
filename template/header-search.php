<form action="<?php echo esc_url(home_url()); ?>/oferty/" method="POST">
<div class="seditBlockSearch">
<div class="block">
  <span>Typ</span>
  <select name="types">
    <option value="" disabled selected>-- Wybierz --</option>
    <?php
    $parent_terms = get_terms('typ', array(
    //'term_id' => $data,
    'parent' => 0,
    'orderby' => 'slug',
    'hide_empty' => false));
      foreach ($parent_terms as $key => $value) {
          echo '<option value="' . $value->slug . '">' . $value->name . '</option>';
      }
    ?>
  </select>
</div>
<div class="block">
  <span>Cena</span>
  <div class="groupText">
    <input type="text" name="min" placeholder="min">
    <input type="text" name="max" placeholder="max">
  </div>
</div>
<div class="block">
  <span>Lokalizacja</span>
  <select name="lokalizacja">
    <option value="" disabled selected>-- Wybierz --</option>
<?php
    $query = "
          SELECT DISTINCT meta_value
          FROM sedit_posts 
          LEFT JOIN sedit_postmeta ON ( sedit_postmeta.post_id = sedit_posts.ID) 
          WHERE post_type = 'oferty' AND post_status = 'publish' 
          GROUP BY sedit_posts.ID,sedit_posts.post_title 
          ";
  global $wpdb;
  $lokalizacja = $wpdb->get_results($query);
  foreach ($lokalizacja as $key => $value) {
      if ($value->meta_value) {
        echo '<option value="' . $value->meta_value . '">' . $value->meta_value . '</option>';
      }
  }

?>
  </select>
</div>
<div class="block">
  <span>Rodzaj oferty</span>
  <div class="groupCheckbox">
    <label class="container">
      <input type="checkbox" name="sale" value="sprzedaz">
      <span class="checkmark"></span>Sprzedaż
    </label>
    <label class="container">
      <input type="checkbox" name="rent" value="wynajem">
      <span class="checkmark"></span>Wynajem
    </label>
  </div>
</div>
<div class="block">
  <input type="submit" name="search" value="">
</div>
</div>
</form>