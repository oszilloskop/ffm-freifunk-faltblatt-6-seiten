<?php

/*
 * All rights reserved. No warranty, explicit or implicit, provided.
 */

set_include_path(get_include_path() . PATH_SEPARATOR . './');
require_once('fpdf/fpdf.php');
require_once('fpdi/fpdi.php');

define('FPDF_FONTPATH', './fonts');


$templateAnschnitt_0mm = "faltblatt_6_seiten_9.8x9.8_ohne_anschnitt.pdf";
$templateAnschnitt_1mm = "faltblatt_6_seiten_9.8x9.8_1mm_anschnitt.pdf";
$templateAnschnitt_2mm = "faltblatt_6_seiten_9.8x9.8_2mm_anschnitt.pdf"; 

if (file_exists ($templateAnschnitt_0mm)) {
    FlyerRendering ("$templateAnschnitt_0mm", "lokalisiert", 0.0);
} else {
    echo "\nDie Datei $templateAnschnitt_0mm ist nicht vorhanden!\n";
}

if (file_exists ($templateAnschnitt_1mm)) {
    FlyerRendering ("$templateAnschnitt_1mm", "lokalisiert", 1.0);
} else {
    echo "\nDie Datei $templateAnschnitt_1mm ist nicht vorhanden!\n";
}

if (file_exists ($templateAnschnitt_2mm)) {
    FlyerRendering ("$templateAnschnitt_2mm", "lokalisiert", 2.0);
} else {
    echo "\nDie Datei $templateAnschnitt_2mm ist nicht vorhanden!\n";
}

echo "\n";
echo "Fertig!\n";
echo "\n";
exit ; 

function FlyerRendering ($inputFile, $outputPostfix, $anschnitt)
{

/*------------------------------------------------------------------------------------
 * Bitte tragt hier eure lokalen Freifunk Daten ein.
 *------------------------------------------------------------------------------------
 *
 * Hinweiss Community-Logo: 
 * Moegliche Format sind GIF, JPG und PNG.
 *
 * Laenge des Community Namen:
 * Falls der Community-Name zu lang ist und es zu einem Zeilenumbruch kommt,
 * dann sollte $communityNameFontSize verkleiner werden
 *
-------------------------------------------------------------------------------------*/


    // Community Name fuer Hauptseite
    $communityNameText = "Freifunk Duckburg";
    $communityNameFontSize = 48.0;        //in pt
    $communityNamePositionOffsetX = 0.0;  // +/- in mm
    $communityNamePositionOffsetY = 0.0;  // +/- in mm

    // Logo auf Kontaktseite
    $kontaktLogoDateiName = "logo-template.png";
    $kontaktLogoWidth=66.25;    //in mm  // Muss kleiner 98.0 mm sein! Hier bitte die gewuenschte Breite des Logos auf dem Flyer eintragen. 
    $kontaktLogoPositionY=47.0; //in mm  // Die Hoeheneinstellung ist etwas frickelig. Es klappt aber :-)

    // Texte fuer Seite mit Kontaktdaten
    $kontaktTitelText = "Kontakt";

    $kontaktInfoTexte = [
                        [ "Webseite" , "http://ffdb.freifunk.net"],
                        [ "Mail" , "info@ff-duckburg.ffdb"],
                        [ "Mailingliste" , "subscribe@ff-duckburg.ffdb"],
                        [ "Twitter" , "@FreiFunkDB"],
                        [ "Treffen" , "Jeden zweiten Montag"],
                        [ "" , "Und wo? Siehe unsere Webseite"],
                        [ "" , ""],
                        [ "" , ""]
                        ];

    // Text Fusszeile
    $kontaktFusszeileText ="Freifunk Duckburg e.V.";




/*-----------------------------------------------------------------------------------
 *
 * Ab hier sollte nichts mehr geander werden!
 *
 ------------------------------------------------------------------------------------*/

    // Breite der einzelnen Seiten
    $wRechts = 99.0; //mm
    $wMitte  = 98.0; //mm
    $wLinks  = 97.0; //mm

    // Community Name
    $communityNamePositionX = $wLinks + $wMitte + $communityNamePositionOffsetX; //mm
    $communityNamePositionY = 12.2 + $communityNamePositionOffsetY; //mm

    // Kontakt Titel
    $kontaktTitelPositionX = $wLinks + 3.975; //mm
    $kontaktTitelPositionY = 10.425; //mm
    $kontaktTitelFontSize = 15.0; //pt

    // Kontakt Info
    $kontaktInfoTextPositionX = $kontaktTitelPositionX + 25.0; //mm
    $kontaktInfoPositionY = $kontaktTitelPositionY + 7.0; //mm
    $kontaktInfoZeilenOffsetY = 4.7; //mm
    $kontaktInfoFontSize = 10.9; //pt

    // Kontakt Logo
    $kontaktLogoPositionX = $wLinks + $wMitte/2 - $kontaktLogoWidth/2;

    // Kontakt Footer
    $kontaktFooterPositionX = $wLinks; //mm
    $kontaktFooterPositionY = 95.4; //mm
    $kontaktFooterWidth = $wMitte; //mm
    $kontaktFooterFontSize = 10.9; //pt


    echo "\n";

    // Output-Dasteiname zusammenbauen
    $outputFile = $outputPostfix . "-" . $inputFile;

    // initiate FPDI
    $pdf = new FPDI();
    echo "Input: $inputFile\n";
    $pageCount = $pdf->setSourceFile($inputFile);

    // Importiere Vorder- und Rueckseite
    $Vorderseite = $pdf->ImportPage(1);
    $Rueckseite = $pdf->ImportPage(2);
    // Seitenabmessungen holen
    $size = $pdf->getTemplateSize($Vorderseite);
    $dokumentBreite = round($size['w'],2);
    $dokumentHoehe = round($size['h'],2);
    echo "Dokumenten Breite: $dokumentBreite mm\n";
    echo "Dokumenten Hoehe: $dokumentHoehe mm\n";
    echo "Anschnitt: $anschnitt mm\n";
    // Vorderseite uebernehmen
    // Anfang eines bloeden Hacks wegen des FooterZeilen-Textes.
    // Der Footertext laesst sich nur einfügen, wenn die Seite eine A4 Seite ist.
    // Keine Ahnung warum!
    $pdf->AddPage('L');
    $tplVorderseite = $pdf->importPage(1);
    $pdf->useTemplate($tplVorderseite);

    //Margin ist wegen der Rand-Platzierung des Community Names wichtig.
    $pdf->SetMargins(0,0,0);

    // erstmal alle Fonts laden
    echo "Lade Fonts...\n";
    $pdf->AddFont('lato-bold');
    $pdf->AddFont('lato-regular');
    $pdf->AddFont('alternategothic');

    // Rendern Titel Text
    echo "Verarbeite Titel Text...\n";
    $pdf->SetFont('lato-bold');
    $pdf->SetFontSize($kontaktTitelFontSize);
    $pdf->SetTextColor(0,0,0); //schwarz
    $pdf->SetXY($kontaktTitelPositionX + $anschnitt, $kontaktTitelPositionY + $anschnitt);
    $pdf->Write(0,iconv('UTF-8', 'windows-1252',$kontaktTitelText));

    // Rendern Info Text
    echo "Verarbeite Info Text...\n";
    $pdf->SetTextColor(0,0,0); //schwarz
    $pdf->SetFontSize($kontaktInfoFontSize);
    foreach ($kontaktInfoTexte as $a) {
        	$pdf->SetFont('lato-bold');
        	$pdf->SetXY($kontaktTitelPositionX + $anschnitt, $kontaktInfoPositionY + $anschnitt);
        	$pdf->Write(0,iconv('UTF-8', 'windows-1252',$a[0]));
        	$pdf->SetFont('lato-regular');
        	$pdf->SetXY($kontaktInfoTextPositionX + $anschnitt, $kontaktInfoPositionY +$anschnitt);
        	$pdf->Write(0,iconv('UTF-8', 'windows-1252',$a[1]));
        	$kontaktInfoPositionY=$kontaktInfoPositionY + $kontaktInfoZeilenOffsetY;
    }

    // Rendern Community Logo
    echo "Verarbeite Logo...\n";
    $pdf->Image($kontaktLogoDateiName,$kontaktLogoPositionX + $anschnitt, $kontaktLogoPositionY + $anschnitt, $kontaktLogoWidth,0);

    // Rendern Fusszeilen Text
    echo "Verarbeite Fusszeile...\n";
    $pdf->SetFont('lato-regular');
    $pdf->SetFontSize($kontaktFooterFontSize);
    $pdf->SetTextColor(255,255,255); //weiss
    $pdf->SetXY($kontaktFooterPositionX + $anschnitt, $kontaktFooterPositionY + $anschnitt);
    $pdf->Cell($kontaktFooterWidth,0,iconv('UTF-8', 'windows-1252',$kontaktFusszeileText),0,0,'C');

    // Rendern Community Name
    echo "Verarbeite Community Name...\n";
    $pdf->SetFont('alternategothic');
    $pdf->SetFontSize($communityNameFontSize);
    $pdf->SetTextColor(0,0,0); //schwarz
    $pdf->SetXY($communityNamePositionX + $anschnitt, $communityNamePositionY + $anschnitt);
    $pdf->MultiCell($wRechts, 10, iconv('UTF-8', 'windows-1252',$communityNameText),0,'C');

    // Das war's mit dem Editieren


    // Original PDF Rueckseit uebernehmen
    $pdf->AddPage('L', array($dokumentBreite, $dokumentHoehe));
    $tplRueckseite = $pdf->importPage(2);
    $pdf->useTemplate($tplRueckseite);
    
    // und erstmal abspeichern
    echo "Zwischenspeichern...\n";
    $pdf->Output($outputFile);

    // Hier geht jetzt der Hack wegen der Footerzeile weiter
    // Die gerade abgespeicherte Datei wird erneut eingelesen
    // um dann im Seiten-Format der Ursprungsdatei erneut abgespeichert zu werden.
    // Is' doof, muss aber sein

    $pdf_2 = new FPDI();
    echo "Erneut laden...\n";
    $pageCount = $pdf_2->setSourceFile($outputFile);
    echo "Feinschliff...\n";
    $Vorderseite_2 = $pdf_2->ImportPage(1);
    $Rueckseite_2 = $pdf_2->ImportPage(2);
    $pdf_2->AddPage('L', array($dokumentBreite, $dokumentHoehe));
    $tplForderseite = $pdf_2->importPage(1);
    $pdf_2->useTemplate($tplForderseite);
    $pdf_2->AddPage('L', array($dokumentBreite, $dokumentHoehe));
    $tplRueckseite = $pdf_2->importPage(2);
    $pdf_2->useTemplate($tplRueckseite);

    echo "Output: $outputFile\n";
    $pdf_2->Output($outputFile);
    unset ($pdf);
    unset ($pdf_2);
}

?>
