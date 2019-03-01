<?php
include 'sedit/core.php';
include 'module/seditNews.php';
include 'module/seditCatalog.php';

$slider = new seditSlider();
$slider->addSlider();

$sedit->tabsData([

    [
        'page' => 'DANE',
        'title' => 'Strona główna',
        'description' => 'Podstawowe informacje o stronie',
        'dashicons' => 'dashicons-media-document',
        'atoms' => [
            [
                'title' => 'Logo',
                'name' => 'logo',
                'type' => 'image',
                'description' => 'Logo w menu',
            ], [
                'title' => 'Sklep internetowy',
                'name' => 'sklep',
                'type' => 'input',
                'placeholder' => 'http://...',
                'description' => 'Link do sklepu VDF',
            ], [
                'title' => 'Nasi partnerzy',
                'name' => 'logopartner',
                'type' => 'images',
                'description' => 'Kliknij aby wybrać z biblioteki mediów.',
            ],
        ],
    ], [
        'page' => 'Kontakt',
        'title' => 'Strona kontaktowa',
        'description' => 'Dane kontaktowe dla dla strony kontakt',
        'dashicons' => 'dashicons-media-document',
        'atoms' => [
            [
                'title' => 'Tytuł',
                'name' => 'titk',
                'type' => 'input',
                'placeholder' => 'Nazwa firmy',
                'description' => 'Nazwa na stronie kontakt',
            ], [
                'title' => 'NIP',
                'name' => 'nip',
                'type' => 'input',
                'placeholder' => '8130336926',
                'description' => 'Numer nip ',
            ], [
                'title' => 'KRS',
                'name' => 'krs',
                'type' => 'input',
                'placeholder' => '0000180810',
                'description' => 'Numer KRS',
            ],

            [
                'title' => 'Pracujemy',
                'type' => 'title',
                'description' => 'Informacje o godzinach pracy',
            ], [
                'name' => 'ponpt',
                'type' => 'input',
                'placeholder' => 'pon-pt: 7:00-16:00',
            ], [
                'name' => 'sob',
                'type' => 'input',
                'placeholder' => 'soboty: 8:00-12:00',
            ], [
                'name' => 'niel',
                'type' => 'input',
                'placeholder' => 'niedziela: nieczynne',
            ],

            [
                'title' => 'Dane kontaktowe',
                'type' => 'title',
                'description' => 'Dział obsługi klienta dane kontaktowe',
            ], [
                'title' => 'Telefon',
                'name' => 'telrz',
                'type' => 'input',
                'placeholder' => '17 000 00 00',
                'description' => 'Telefon stacjonarny',
            ], [
                'title' => 'Tel komórkowy',
                'name' => 'telrzkom1',
                'type' => 'input',
                'placeholder' => '000 000 000',
                'description' => 'Telefon komórkowy',
            ], [
                'title' => 'Adres',
                'name' => 'adrz',
                'type' => 'input',
                'placeholder' => 'Nazwa ulicy',
                'description' => 'Dokładny adres',
            ], [
                'title' => 'Adres cd',
                'name' => 'adrzcd',
                'type' => 'input',
                'placeholder' => 'kod pocztowy, miasto',
                'description' => 'Kod pocztowy oraz miejscowość',
            ], [
                'title' => 'Adres email',
                'name' => 'email1',
                'type' => 'input',
                'placeholder' => 'biuro@vdfstrona.pl',
                'description' => 'Główny adres email',
            ],

        ],
    ], [
        'page' => 'Mapa',
        'title' => 'Google maps',
        'description' => 'Konfiguracja ustawień dla mapy',
        'dashicons' => 'dashicons-admin-site',
        'atoms' => [
            [
                'title' => 'Google maps API KEY',
                'name' => 'googlemapapi',
                'type' => 'input',
                'placeholder' => 'AIzaSyC_xl2eHSi5uhXLqW9z8PZY3XDs68asYsM',
                'description' => 'API uzyskanie po rejestracji w Google',
            ],
            [
                'title' => 'Widoczny obszar',
                'name' => 'sizemap',
                'type' => 'input',
                'placeholder' => '1 - 20',
                'description' => 'Wybierz poziom zblizenia 1 do 20',
            ],
        ],
    ],

]);
