# Freifunk Faltblatt-6-Seiten - Wickelfalz, Bund links

Geschlossen 9,8 x 9,8 cm  
Offen: 29,4 x 9,8 cm (ohne Anschnitt)  

Unsymmetrie (passend für Flyeralarm) wegen Wickelfalz - Bund links   
Dokumentseite 1: | 9,7 cm | 9,8cm | 9,9 cm |  
Dokumentseite 2: |9,9 cm | 9,8 cm | 9,7 cm |  
Anschnitt bis zu 2mm links/rechts/oben/unten vorbereitet


![enter image description here](https://cloud.githubusercontent.com/assets/1434390/10319322/fc054e4e-6c6d-11e5-9439-492a63543a06.png)

![enter image description here](https://cloud.githubusercontent.com/assets/1434390/10321642/1c286394-6c7a-11e5-91e5-1a253ab4c076.png)

# Motivation
Das Design wurde neu Aufgesetzt.
Texte und Grafiken wurde derart überarbeitet, dass unbedarfte DAUs (ohne jegliche Freifunk Kenntnis) nicht mit negativ vorbelasteten Begriffen konfrontiert werden.  
# Anpassung an eure Community per PHP-Skript
Dieses Faltblatt wurde für die Community Frankfurt erstellt.  
**Das Faltblatt kann jedoch mittels eines beiliegenden PHP-Scripts sehr leicht an jede Community angepasst werden.**  

Im ordner './lokalisierung' befindet sich das Skript 'flyermod.php'.  
Hier einfach die Inhalte folgende Variablen an eure Community anpassen:

$communityNameText  
$kontaktTitelText  
$kontaktInfoTexte  
$kontaktFusszeileText  
$kontaktLogoDateiName  
$kontaktLogoWidth  
$kontaktLogoPositionY  
ggf. $communityNameFontSize  
Die Skript-Kommentare sollten Euch eigentlich helfen (hoffentlich :o)

Dann direkt im Verzeichnis das Skript aufrufen mit:

php -f flyermod.php  
Folgende Dateien sollten dann erzeugt werden:

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