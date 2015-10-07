# 6 Seiten Freifunk Faltblatt/Flyer - Wickelfalz, Bund links
Leicht individualisierbar  

Geschlossen: 9,8 x 9,8 cm  
Offen: 29,4 x 9,8 cm (ohne Anschnitt)  

Unsymmetrie (passend für Flyeralarm) wegen Wickelfalz - Bund links   
Dokumentseite 1: | 9,7 cm | 9,8cm | 9,9 cm |  
Dokumentseite 2: |9,9 cm | 9,8 cm | 9,7 cm |  
Anschnitt ist vorbereitet bis zu 2mm links/rechts/oben/unten


![Flyer Außenseite](https://cloud.githubusercontent.com/assets/1434390/10337989/bc6b6d54-6d03-11e5-84d8-499caf4eac4a.png)

![Flyer Innenseite](https://cloud.githubusercontent.com/assets/1434390/10337996/c4178826-6d03-11e5-8abb-d188a904d11b.png)

# Motivation
Texte und Grafiken wurde derart erstellt, dass unbedarfte DAUs (ohne jegliche Freifunk Kenntnis) nicht mit negativ vorbelasteten Begriffen konfrontiert werden, und dann evtl. doch keine Lust auf Freifunk bekommen.  

# Anpassung an eure Community
Dieses Faltblatt wurde für die Community Frankfurt erstellt.  
**Das Faltblatt kann jedoch mittels eines beiliegenden PHP-Scripts sehr leicht an jede Community angepasst werden.**  
Voraussetzung ist, dass PHP auf eurem System installiertet ist.

Im ordner './faltblatt-6-seiten_9.8x9.8cm' befindet sich das die Datei 'config.php'.  
Hier könnt Ihr die Inhalte der Variablen an eure Community anpassen; Die Skript-Kommentare sollten Euch eigentlich helfen (hoffentlich :o)

Dann direkt im Verzeichnis das PHP-Skript aufrufen mit:

    php -f ../lokalisierung/flyermod.php

Folgende Dateien sollten dann im out-Ordner erzeugt werden:

    lokalisiert-faltblatt_6_seiten_9.8x9.8_ohne_anschnitt.pdf
    lokalisiert-faltblatt_6_seiten_9.8x9.8_1mm_anschnitt.pdf
    lokalisiert-faltblatt_6_seiten_9.8x9.8_2mm_anschnitt.pdf 

Ggf. können mit "Gimp" oder z.B. dem Kommando "convert" (ImageMagick) die erzeugten PDFs in Grafiken umwandelt werden.

# Anpassung mit Scribus 1.5.x  
Dieses Faltblatt wurde mit **[Scribus](http://www.scribus.net/) 1.5** erstellt (hier OS X 1.5.0).
Das Dokument heißt './faltblatt-6-seiten_9.8x9.8cm/FF_Faltblatt_6_Seiten_9.8x9.8.sla'.   
Für die Lokalisierung kann man sich an der Ebene "Community Template" orientieren.  

Das Dokument ist für einen Anschnitt auf bis zu 2mm links/rechts/oben/unten vorbereitet. Dieses ist beim PDF-Export zu beachten und ggf. anzugeben.

Wird das Faltblatt per Scribus als Grafik exportiert, so geschieht dieses ohne Anschnitt.  

# Basis
Grundlage dieses hier vorliegenden Faltblattes ist eine Kieler Version.
Siehe https://github.com/rubo77/freifunk-faltblatt-6-seiten/tree/freifunk.net

# Lizenz
Die Inhalte sind in der Regel unter CC-BY-SA veröffentlicht. In Ausnahmen ist dies explizit angegeben!

<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.