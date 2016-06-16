<?php
/* ------------------------------------------------------------------------------------
 * Bitte tragt hier eure lokalen Freifunk Daten ein.
 * ------------------------------------------------------------------------------------
 *
 * Hinweis Community-Logo:
 * Mögliche Formate sind GIF, JPG und PNG.
 *
 * Länge des Community Namens:
 * Falls der Community-Name zu lang ist und es zu einem Zeilenumbruch kommt,
 * dann sollte 'communityNameFontSize' verkleiner werden
 *
 * -------------------------------------------------------------------------------------*/

return [

    // Community Name fuer Hauptseite
    'communityNameText'            => 'Freifunk Duckburg',
    'communityNameFontSize'        => 48.0,  // in pt
    'communityNamePositionOffsetX' => 0.0,   // +/- in mm
    'communityNamePositionOffsetY' => 0.0,   // +/- in mm

    // Logo-Grafik auf Kontaktseite
    'kontaktLogoDateiName'         => 'logo-template.png',

    // Breite des Logos auf dem Flyer in mm (Muss kleiner 98.0 mm sein!)
    'kontaktLogoWidth'             => 66.25,
    //Die Logo-Hoeheneinstellung (in mm) ist etwas frickelig. Es klappt aber :-)
    'kontaktLogoPositionY'         => 47.0,

    // Texte fuer Seite mit Kontaktdaten
    'kontaktTitelText'             => 'Kontakt',
    'kontaktInfoTexte'             => [
                                      ['Webseite', 'http://ffdb.freifunk.net'],
                                      ['Mail', 'info@ff-duckburg.ffdb'],
                                      ['Mailingliste', 'subscribe@ff-duckburg.ffdb'],
                                      ['Twitter', '@FreiFunkDB'],
                                      ['Treffen', 'Jeden zweiten Montag'],
                                      ['', 'Und wo? Siehe unsere Webseite'],
                                      ['', ''],
                                      ['', ''],
    ],

    // Text Fusszeile
    'kontaktFusszeileText'         => 'Freifunk Duckburg e.V.',



/* -----------------------------------------------------------------------------------
 *
 * Ab hier sollte nichts mehr geander werden.
 * Ausser Ihr wisst was Ihr tut.
 *
 * ------------------------------------------------------------------------------------*/
    'dateiPrefix'                  => 'lokalisiert',
    'templates'                    => [
        'faltblatt_6_seiten_9.8x9.8_ohne_anschnitt.pdf' => 0.0,
        'faltblatt_6_seiten_9.8x9.8_1mm_anschnitt.pdf'  => 1.0,
        'faltblatt_6_seiten_9.8x9.8_2mm_anschnitt.pdf'  => 2.0,
    ],
];
