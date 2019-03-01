<?php
///////CUSTOM POST///////////////////////////////////////////
function news() {
    $labels = array(
        'name'                => 'Artykuły',
        'singular_name'       => 'Artykuł',
        'menu_name'           => 'Artykuły',
        'parent_item_colon'   => 'Artykuły',
        'all_items'           => 'Wszystkie artykuły',
        'view_item'           => 'Zobacz artykuł',
        'add_new_item'        => 'Dodaj nowy artykuł',
        'add_new'             => 'Napisz',
        'edit_item'           => 'Edytuj',
        'update_item'         => 'Aktualizuj',
        'search_items'        => 'Szukaj',
        'not_found'           => 'Baza wiedzy jest pusta, dodaj nowy artykuł',
        'not_found_in_trash'  => 'Kosz jest pusty'
			);
    $args = array(
        'label'               => 'bazawiedzy',
        'description'         => 'opis',
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', 'editor', 'page-attributes', 'post-formats'),
        'taxonomies'          => array( 'genres' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 0,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
				'menu_icon' => 'dashicons-list-view',
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    // Registering your Custom Post Type
    register_post_type( 'news', $args );
}
add_action( 'init', 'news', 10, 0);
/////CUSTOM TAXONOMY/////////////////////////////////////////////
function news_taxtaxonomy() {
flush_rewrite_rules();
$labels = array(
    'name'                       => 'Kategorie artykułów',
    'singular_name'              => 'Kategorie',
    'menu_name'                  => 'Kategorie',
    'all_items'                  => 'Wszystkie',
    'new_item_name'              => 'Nazwa',
    'add_new_item'               => 'Dodaj kategorię',
    'edit_item'                  => 'Edytuj',
    'update_item'                => 'Zapisz',
    'separate_items_with_commas' => 'Sortuj',
    'search_items'               => 'Szukaj',
    'add_or_remove_items'        => 'Dodaj lub usuń typ',
    'choose_from_most_used'      => 'Znajdz wiecej',
    'not_found'                  => 'Lista jest pusta',
);
$rewrite = array(
        'slug'                       => 'kategorie',
        'with_front'                 => false,
        'hierarchical'               => true,
    );
$args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'rewrite'                    => $rewrite,
);
register_taxonomy( 'tax_news', array( 'news' ), $args );
}
add_action( 'init', 'news_taxtaxonomy', 10, 0 );
/////////////////////////////////////////////////////////////////////////////////
//Listowanie produktów
function listNews($taxonomy, $data){
	$parent_terms = get_terms($taxonomy, array(
		'parent' => 0,
		'orderby' => 'slug',
		'hide_empty' => false ));
		//sa($parent_terms);

	if ($parent_terms) {
		foreach ( $parent_terms as $pterm ) {
		$text .= '<ul>';
			$text .= '<a
			class="'.(($data == $pterm->term_id) ? 'current' : '').'"
			href="'.get_term_link($pterm, $taxonomy).'">
			'.$pterm->name.'
			</a>';
				//Get the Child terms
				$terms = get_terms( $taxonomy, array(
					'parent' => $pterm->term_id,
					'orderby' => 'slug',
					'hide_empty' => false ));

				foreach ($terms as $term) {
						$text .= '<li><a
						class="'.(($data == $term->term_id) ? 'current' : '').'"
						href="'.get_term_link($term, $taxonomy).'">
						'.$term->name.'
						</a></li>';
				}
				$terms = null;
				$text .= '</ul>';
		}
	}else{
		$text .= '<ul>Brak kategorii w bazie.</ul>';
	}
	return $text;
}
/////////////////////////////////////////////////////////////////////////////////
