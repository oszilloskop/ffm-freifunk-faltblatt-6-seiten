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
    'dateiPrefix'                  => 'ff-ffm',
    'templates'                    => [
        'faltblatt_6_seiten_9.8x9.8_ohne_anschnitt.pdf' => 0.0,
        'faltblatt_6_seiten_9.8x9.8_1mm_anschnitt.pdf'  => 1.0,
        'faltblatt_6_seiten_9.8x9.8_2mm_anschnitt.pdf'  => 2.0,
    ],
    // Community Name fuer Hauptseite
    'communityNameText'            => 'Freifunk Frankfurt',
    //in pt
    'communityNameFontSize'        => 48.0,
    // +/- in mm
    'communityNamePositionOffsetX' => 0.0,
    // +/- in mm
    'communityNamePositionOffsetY' => 0.0,
    // Logo auf Kontaktseite
    'kontaktLogoDateiName'         => 'logo-ffm.png',
    //in mm, Größe des Logos auf dem Flyer (Muss kleiner 98.0 mm sein!)
    'kontaktLogoWidth'             => 66.25,
    //in mm,  Die Hoeheneinstellung ist etwas frickelig. Es klappt aber :-)
    'kontaktLogoPositionY'         => 47.0,
    // Text Fusszeile
    'kontaktFusszeileText'         => 'Freifunk Frankfurt am Main e.V.',
    // Texte fuer Seite mit Kontaktdaten
    'kontaktTitelText'             => 'Kontakt',
    'kontaktInfoTexte'             => [
        ['Webseite', 'http://ffm.freifunk.net'],
        ['Mail', 'info@wifi-frankfurt.de'],
        ['Mailingliste', 'user-subscribe@wifi-frankfurt.de'],
        ['Twitter', '@FreiFunkFFM'],
        ['Treffen', 'Jeden ersten Mo. im Monat'],
        ['', 'Und wo? Siehe unsere Webseite'],
        ['', ''],
        ['', ''],
    ],
];
