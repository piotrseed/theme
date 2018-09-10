<?php
include 'sedit/core.php';

register_nav_menus( array(
	'top'    => 'Menu główne'
) );
$sedit = new seditSlider();
$sedit->addSlider();
$tabs = [

	'Podstawowe dane' => [
		'Logo' => [
			'name' => 'logo',
			'type' => 'image',
			'description' => 'Główne logo dla szablonu'
		],
		'Opis strony' => [
			'name' => 'opis',
			'type' => 'textarea',
			'description' => 'Opis zawierający kluczowe frazy'
			]
		],

	'Testowy moduł' => [
		'mod1' => [
			'name' => 'googlemap',
			'type' => 'module:google'
			]
		]
];

$sedit = new seditTabs();
$sedit->pageTabsData($tabs);
