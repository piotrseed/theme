<?php
include 'sedit/core.php';

register_nav_menus( array(
	'top'    => 'Menu główne'
) );
// $sedit = new seditSlider();
// $sedit->addSlider();
$sedit->pagesData([

	 [
		'page' => 'HOME',
		'title' => 'jakiś tytuł',
		'description' => 'główny opis dla sekcji',
		'dashicons' => 'dashicons-admin-tools',
		'atoms' => [
			  [
				'title' => 'Imię',
				'name' => 'logdo',
				'type' => 'images',
				'placeholder' => 'Imię i nazwisko',
				'description' => 'Proszę uzupełnić dane',
				],[
				'title' => 'Zdjęcie',
				'name' => 'foto',
				'type' => 'input',
				'placeholder' => 'input',
				'description' => 'Kliknij aby wybrać z biblioteki mediów.'
				],[
				'title' => 'Zdjęcie',
				'name' => 'foto',
				'type' => 'title',
				'placeholder' => 'input',
				'description' => 'Kliknij aby wybrać z biblioteki mediów.'
				],[
				'title' => 'Zdjęcie',
				'name' => 'foto',
				'type' => 'imagess',
				'placeholder' => 'input',
				'description' => 'Kliknij aby wybrać z biblioteki mediów.'
				]
			]
	 ],

	 [
		'page' => 'Google maps',
		'title' => 'jakiś tytuł',
		'description' => 'główny opis dla sekcji',
		'atoms' => [
			'Google' => [
				'name' => 'googlecddss',
				'type' => 'module:google',
				'placeholder' => 'Imię i nazwisko',
				'description' => 'Proszę uzupełnić dane'
				]
			]
	]

]);
