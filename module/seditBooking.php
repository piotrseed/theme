<?php
///////CUSTOM POST///////////////////////////////////////////
function custom_post_type()
{
    $labels = array(
        'name' => 'Nieruchomości',
        'singular_name' => 'Oferta',
        'menu_name' => 'Nieruchomości',
        'parent_item_colon' => 'Nieruchomości',
        'all_items' => 'Wszystkie oferty',
        'view_item' => 'Zobacz oferty',
        'add_new_item' => 'Dodaj nowy obiekt',
        'add_new' => 'Dodaj obiekt',
        'edit_item' => 'Edytuj',
        'update_item' => 'Aktualizuj',
        'search_items' => 'Szukaj',
        'not_found' => 'Lista ofert jest pusta, dodaj nowy obiekt.',
        'not_found_in_trash' => 'Kosz jest pusty',
    );
    $args = array(
        'label' => 'oferty',
        'description' => 'opis',
        'labels' => $labels,
        'supports' => array('title', 'thumbnail', 'editor'),
        'taxonomies' => array('genres'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 0,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'menu_icon' => 'dashicons-category',
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    // Registering your Custom Post Type
    register_post_type('oferty', $args);
}
add_action('init', 'custom_post_type', 10, 0);
///CUSTOM TAXONOMY//////////////////////////////////////////////////
function custom_taxtaxonomy()
{
//flush_rewrite_rules();
    $labels = array(
        'name' => 'Typy',
        'singular_name' => 'Typy',
        'menu_name' => 'Kategorie',
        'all_items' => 'Wszystkie typy',
        'new_item_name' => 'Nazwa',
        'add_new_item' => 'Dodaj typ nieruchomości',
        'edit_item' => 'Edytuj',
        'update_item' => 'Zapisz',
        'parent_item' => 'Sortowanie',
        'separate_items_with_commas' => 'Sortuj',
        'search_items' => 'Szukaj',
        'add_or_remove_items' => 'Dodaj lub usuń typ',
        'choose_from_most_used' => 'Znajdz wiecej',
        'not_found' => 'Lista jest pusta',
    );
    $rewrite = array(
        'slug' => 'typ',
        'with_front' => false,
        'hierarchical' => true,
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => $rewrite,
    );
    register_taxonomy('typ', array('oferty'), $args);
}
add_action('init', 'custom_taxtaxonomy', 10, 0);
///DESCRIPTION//////////////////////////////////////////////////////////

///LISTING//////////////////////////////////////////////////////////////
//Listowanie ofert
function catalogShow()
{
    $loop = new WP_Query([
        'post_type' => 'oferty',
    ]);
    while ($loop->have_posts()): $loop->the_post();
        $image_arr = wp_get_attachment_image_src(get_post_thumbnail_id($post_array->ID), 'thumb200');
        $image_url = $image_arr[0];
        $katalog .= '
					<div class="seditBlock">
						<a href="' . get_permalink() . '">
							<div class="block">
								<h2>' . get_the_title() . '</h2>
								<img src="' . $image_url . '" alt="">
							</div>
						</a>
					</div>
					';
    endwhile;
    return $katalog;
}
///END////////////////////////////////////////////////////////////////////

///KATEGORIE//////////////////////////////////////////////////////////////
function categoryShow($taxonomy, $mytax)
{
    //sa($mytax);
    $parent_terms = get_terms($taxonomy, array(
        //'term_id' => $data,
        'parent' => 0,
        'orderby' => 'slug',
        'hide_empty' => false));
//sa($parent_terms);
    foreach ($parent_terms as $key => $value) {
        echo '
      <a href="' . get_term_link($value->term_id, $taxonomy) . '">
        <ul>
          <i id="' . $value->term_id . '" class="fas fa-plus-square"></i>
          <p class="' . (($mytax->term_id == $value->term_id) ? 'current' : '') . '" id="' . $value->term_id . '"><span>' . $value->name . '</span> <l>(' . $value->count . ')</l></p>
        </ul>
      </a>
  ';
    }
}
///END////////////////////////////////////////////////////////////////////

///LOOP///////////////////////////////////////////////////////////////////
function loopShow($loop)
{
    if ($loop->have_posts()) {
        while ($loop->have_posts()): $loop->the_post();
            $PostID = get_the_ID();
            $postMeta = get_post_meta($PostID);
            $postImg = unserialize(explode(",", $postMeta['galeria'][0])[0]);
            $image = wp_get_attachment_image($postImg[0], 'thumb250x200');
            if (!$image) {
                $image = '<img src="' . get_stylesheet_directory_uri() . '/assets/images/noimage.jpg' . '">';
            }
            if ($postMeta['cena'][0]) {
                $cena = $postMeta['cena'][0] . ' zł';
            } else {
                $cena = null;
            }

            echo '<a href="' . get_the_permalink() . '">
						          <div class="productList">
						            <ul>' . $image . '</ul>
						            <ul>
						              <li><h1>' . get_the_title() . '</h1></li>
						              <li><span>Lokalizacja:</span><p>' . $postMeta['lokalizacja'][0] . '</p></li>
						              <li><span>Cena:</span><p><b>' . $cena . '</b></p></li>
						              <li><span>Osoba kontaktowa:</span><p>' . $postMeta['kontakt'][0] . '</p></li>
						              <li><span>Ogłoszenie nr:</span><p>' . sprintf("%04s", $PostID) . '</p></li>
						            </ul>
						          </div>
						        </a>
				            ';
            //sa(get_post_meta($PostID));
        endwhile;
        the_posts_pagination(array(
            'mid_size' => 1,
            'prev_text' => 'Poprzednia',
            'next_text' => 'Następna',
            'screen_reader_text' => '',
        ));
    }
}
///END////////////////////////////////////////////////////////////////////
$sedit->postTypeData([

    [
        'page' => 'Dane opisowe obiekt',
        'posttype' => 'oferty',
        'title' => 'Dane opisowe ',
        'dashicons' => 'dashicons-index-card',
        'atoms' => [
            [
                'title' => 'Lokalizacja',
                'name' => 'lokalizacja',
                'type' => 'input',
                'placeholder' => 'Lokalizacja obiektu',
            ], [
                'title' => 'Cena',
                'name' => 'cena',
                'type' => 'input',
                'placeholder' => 'Cena',
            ], [
                'title' => 'Kontakt',
                'name' => 'kontakt',
                'type' => 'input',
                'placeholder' => 'Odoba kontaktowa',
            ], [
                'title' => 'Project',
                'name' => 'project',
                'type' => 'input',
                'placeholder' => 'Link do projektu',
            ], [
                'title' => 'Licencja',
                'name' => 'licencja',
                'type' => 'input',
                'placeholder' => 'Numer licencji',
            ], [
                'title' => 'Galeria',
                'name' => 'galeria',
                'type' => 'images',
                'description' => 'Wybierz kilka zdjęć obiektu.',
            ],
        ],
    ],

]);
