<?php
///////CUSTOM POST///////////////////////////////////////////
function custom_post_type()
{
    $labels = array(
        'name' => 'Produkty',
        'singular_name' => 'Produkt',
        'menu_name' => 'Katalog',
        'parent_item_colon' => 'Produkty',
        'all_items' => 'Wszystkie produkty',
        'view_item' => 'Zobacz produkt',
        'add_new_item' => 'Dodaj nowy produkt',
        'add_new' => 'Dodaj',
        'edit_item' => 'Edytuj',
        'update_item' => 'Aktualizuj',
        'search_items' => 'Szukaj',
        'not_found' => 'Katalog jest pusty, dodaj produkt.',
        'not_found_in_trash' => 'Kosz jest pusty',
    );
    $args = array(
        'label' => 'katalog',
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
    register_post_type('katalog', $args);
}
add_action('init', 'custom_post_type', 10, 0);
///CUSTOM TAXONOMY//////////////////////////////////////////////////
function catalog_taxtaxonomy()
{
//flush_rewrite_rules();
    $labels = array(
        'name' => 'Kategorie',
        'singular_name' => 'Kategorie',
        'menu_name' => 'Kategorie',
        'all_items' => 'Wszystkie Kategorie',
        'new_item_name' => 'Nazwa',
        'add_new_item' => 'Dodaj Kategorię',
        'edit_item' => 'Edytuj',
        'update_item' => 'Zapisz',
        'parent_item' => 'Sortowanie',
        'separate_items_with_commas' => 'Sortuj',
        'search_items' => 'Szukaj',
        'add_or_remove_items' => 'Dodaj lub usuń Kategorię',
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
    register_taxonomy('kategoria', array('katalog'), $args);
}
add_action('init', 'catalog_taxtaxonomy', 10, 0);

/////////////////////////////////////////////////////////////////////////////////
//Listowanie produktów
function catalogShow()
{
    $loop = new WP_Query([
        'post_type' => 'katalog',
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
////////////////////////////////////////////////////////////////////////////////////

$sedit->postTypeData([

    [
        'page' => 'Dane opisowe obiekt',
        'posttype' => 'katalog',
        'title' => 'Dane opisowe ',
        'dashicons' => 'dashicons-index-card',
        'atoms' => [
            [
                'title' => 'Krótki opis',
                'name' => 'des2',
                'type' => 'input',
                'description' => 'Krótki opis pod tytułem na stronie głównej',
            ], [
                'title' => 'Galeria',
                'name' => 'galeria',
                'type' => 'images',
                'description' => 'Wybierz kilka zdjęć obiektu.',
            ],
        ],
    ],

]);
