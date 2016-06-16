
# 6 Seiten Freifunk Faltblatt/Flyer - Wickelfalz, Bund links
Leicht individualisierbar  

Geschlossen: 9,8 x 9,8 cm  
Offen: 29,4 x 9,8 cm (ohne Anschnitt)  

Unsymmetrie (passend für Flyeralarm) wegen Wickelfalz - Bund links   
Dokumentseite 1: | 9,7 cm | 9,8cm | 9,9 cm |  
Dokumentseite 2: | 9,9 cm | 9,8 cm | 9,7 cm |  
Anschnitt ist vorbereitet auf bis zu 2mm links/rechts/oben/unten


![Flyer Außenseite](https://cloud.githubusercontent.com/assets/1434390/10337989/bc6b6d54-6d03-11e5-84d8-499caf4eac4a.png)

![Flyer Innenseite](https://cloud.githubusercontent.com/assets/1434390/10337996/c4178826-6d03-11e5-8abb-d188a904d11b.png)

# Motivation
Texte und Grafiken wurden derart erstellt, dass unbedarfte Laien (ohne jegliche Freifunk Kenntnis) nicht mit negativ vorbelasteten Begriffen konfrontiert werden. Durch die benutzte, positive Ansprache findet der Leser vielleicht eher Spaß an Freifunk.  

# Anpassung an eure Community per Skript
Dieses Faltblatt wurde für die Community Frankfurt erstellt.  
**Das Faltblatt kann jedoch mittels eines beiliegenden PHP-Scripts sehr leicht an jede Community angepasst werden.**  
Voraussetzung ist, dass PHP auf eurem System installiertet ist. (Erfolgreich getestet unter OS X 10.10.x, Debian 7.x, Ubuntu 15.04 )  

Wechselt einfach in das Verzeichnis, in welches Ihr das Flyer-Projekt kopiert habt und dann in das Verzeichnis 'lokaliserung'.  Dort befindet sich die Datei '**config.php**'.  
Macht bitte in dieser Datei eure Anpassungen für eure Community. Die Skript-Kommentare sollten Euch eigentlich helfen (hoffentlich :o)

Dann direkt im aktuellen Verzeichnis das Community-Anpassungs-Skript mit folgendem Befehl ausführen lassen:

    php -f flyermod.php

Folgende Dateien werden dann im gleichen Ordner erzeugt:

    lokalisiert-faltblatt_6_seiten_9.8x9.8_ohne_anschnitt.pdf
    lokalisiert-faltblatt_6_seiten_9.8x9.8_1mm_anschnitt.pdf
    lokalisiert-faltblatt_6_seiten_9.8x9.8_2mm_anschnitt.pdf

Ggf. können mit "Gimp" oder z.B. dem Kommando "convert" (ImageMagick) die erzeugten PDFs in Grafiken umgewandelt werden.

**Anmerkung Flyeralarm:**<br>
Bei der Version mit 2mm Anschnitt gibt es systembedingt, durch die verwendete PHP-Library, auf der ersten Seite rechts einen dünnen weissen Rand. Dieser ist aber im Anschnitt und sollte keine Probleme bereiten.


# Anpassung mit Scribus 1.5.x  
Dieses Faltblatt wurde mit **[Scribus](http://www.scribus.net/) 1.5** erstellt (hier OS X 1.5.0).
Das Dokument heißt './faltblatt-6-seiten_9.8x9.8cm_Scribus/FF_Faltblatt_6_Seiten_9.8x9.8.sla'.   
Für die Lokalisierung kann man sich an der Ebene "Community Template" orientieren.  

Das Dokument ist für einen Anschnitt auf bis zu 2mm links/rechts/oben/unten vorbereitet. Dieses ist beim PDF-Export zu beachten und ggf. anzugeben.

Wird das Faltblatt per Scribus als Grafik exportiert, so geschieht dieses ohne Anschnitt.  

# Basis
Grundlage dieses hier vorliegenden Faltblattes ist eine Kieler Version.
Siehe https://github.com/rubo77/freifunk-faltblatt-6-seiten/tree/freifunk.net

# Lizenz
Die Inhalte sind in der Regel unter CC-BY-SA veröffentlicht. In Ausnahmen ist dies explizit angegeben!

 + Rechteinhaber für die Skyline-Grafik aus "logo-ffm.png" ist <a rel="license" href="http://www.face2image.de/"> Fa. Face2image (Inh. Andrea Weckner)</a>.

<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.