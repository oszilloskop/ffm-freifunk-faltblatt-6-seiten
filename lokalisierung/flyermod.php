<?php

/*
 * All rights reserved. No warranty, explicit or implicit, provided.
 */
$path = getcwd() . DIRECTORY_SEPARATOR;
$scriptPath = __DIR__ . DIRECTORY_SEPARATOR;
$configFile = $path . 'config.php';
$outputPath = implode(DIRECTORY_SEPARATOR, [$scriptPath]);

if (!file_exists($configFile)) {
    $configFile = $scriptPath . 'config.php';
}

define('FPDF_FONTPATH', $scriptPath . 'fonts');

require_once($scriptPath . 'fpdf/fpdf.php');
require_once($scriptPath . 'fpdi/fpdi.php');

/** @noinspection PhpIncludeInspection */
$config = require $configFile;

foreach ($config['templates'] as $templateDatei => $anschnitt) {
    $templateFile = $scriptPath . $templateDatei;
    if (!file_exists($templateFile)) {
        echo 'Die Datei ' . $templateDatei . ' ist nicht vorhanden' . PHP_EOL;
        continue;
    }

    echo PHP_EOL;
    FlyerRendering($config, $templateFile, $outputPath, $config['dateiPrefix'], $anschnitt);
}

echo PHP_EOL . 'Fertig!' . PHP_EOL;
exit;

function FlyerRendering($config, $inputFile, $outputPath, $outputPostfix, $anschnitt = 0.0)
{
    // Breite der einzelnen Seiten
    $wRechts = 99.0; //mm
    $wMitte = 98.0; //mm
    $wLinks = 97.0; //mm

    // Community Name
    $communityNamePositionX = $wLinks + $wMitte + $config['communityNamePositionOffsetX']; //mm
    $communityNamePositionY = 12.2 + $config['communityNamePositionOffsetY']; //mm

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
    $kontaktLogoPositionX = $wLinks + $wMitte / 2 - $config['kontaktLogoWidth'] / 2;

    // Kontakt Footer
    $kontaktFooterPositionX = $wLinks; //mm
    $kontaktFooterPositionY = 95.4; //mm
    $kontaktFooterWidth = $wMitte; //mm
    $kontaktFooterFontSize = 10.9; //pt

    // Output-Dasteiname zusammenbauen
    $outputFile = $outputPath . DIRECTORY_SEPARATOR . $outputPostfix . '_' . basename($inputFile);

    // initiate FPDI
    $pdf = new FPDI();
    echo 'Input: ' . basename($inputFile) . PHP_EOL;
    $pageCount = $pdf->setSourceFile($inputFile);

    // Importiere Vorder- und Rueckseite
    $Vorderseite = $pdf->ImportPage(1);
    $Rueckseite = $pdf->ImportPage(2);
    // Seitenabmessungen holen
    $size = $pdf->getTemplateSize($Vorderseite);
    $dokumentBreite = round($size['w'], 2);
    $dokumentHoehe = round($size['h'], 2);
    echo 'Dokumenten Breite: ' . $dokumentBreite . 'mm' . PHP_EOL;
    echo 'Dokumenten Hoehe: ' . $dokumentHoehe . 'mm' . PHP_EOL;
    echo 'Anschnitt: ' . $anschnitt . 'mm' . PHP_EOL;
    // Vorderseite uebernehmen
    // Anfang eines bloeden Hacks wegen des FooterZeilen-Textes.
    // Der Footertext laesst sich nur einfügen, wenn die Seite eine A4 Seite ist.
    // Keine Ahnung warum!
    $pdf->AddPage('L');
    $tplVorderseite = $pdf->importPage(1);
    $pdf->useTemplate($tplVorderseite);

    //Margin ist wegen der Rand-Platzierung des Community Names wichtig.
    $pdf->SetMargins(0, 0, 0);

    // erstmal alle Fonts laden
    echo 'Lade Fonts...' . PHP_EOL;
    $pdf->AddFont('lato-bold');
    $pdf->AddFont('lato-regular');
    $pdf->AddFont('alternategothic');

    // Rendern Titel Text
    echo 'Verarbeite Titel Text...' . PHP_EOL;
    $pdf->SetFont('lato-bold');
    $pdf->SetFontSize($kontaktTitelFontSize);
    $pdf->SetTextColor(0, 0, 0); //schwarz
    $pdf->SetXY($kontaktTitelPositionX + $anschnitt, $kontaktTitelPositionY + $anschnitt);
    $pdf->Write(0, iconv('UTF-8', 'windows-1252', $config['kontaktTitelText']));

    // Rendern Info Text
    echo 'Verarbeite Info Text...' . PHP_EOL;
    $pdf->SetTextColor(0, 0, 0); //schwarz
    $pdf->SetFontSize($kontaktInfoFontSize);
    foreach ($config['kontaktInfoTexte'] as $a) {
        $pdf->SetFont('lato-bold');
        $pdf->SetXY($kontaktTitelPositionX + $anschnitt, $kontaktInfoPositionY + $anschnitt);
        $pdf->Write(0, iconv('UTF-8', 'windows-1252', $a[0]));
        $pdf->SetFont('lato-regular');
        $pdf->SetXY($kontaktInfoTextPositionX + $anschnitt, $kontaktInfoPositionY + $anschnitt);
        $pdf->Write(0, iconv('UTF-8', 'windows-1252', $a[1]));
        $kontaktInfoPositionY = $kontaktInfoPositionY + $kontaktInfoZeilenOffsetY;
    }

    // Rendern Community Logo
    echo 'Verarbeite Logo...' . PHP_EOL;
    $pdf->Image(
        $config['kontaktLogoDateiName'],
        $kontaktLogoPositionX + $anschnitt,
        $config['kontaktLogoPositionY'] + $anschnitt,
        $config['kontaktLogoWidth'],
        0
    );

    // Rendern Fusszeilen Text
    echo 'Verarbeite Fusszeile...' . PHP_EOL;
    $pdf->SetFont('lato-regular');
    $pdf->SetFontSize($kontaktFooterFontSize);
    $pdf->SetTextColor(255, 255, 255); //weiss
    $pdf->SetXY($kontaktFooterPositionX + $anschnitt, $kontaktFooterPositionY + $anschnitt);
    $pdf->Cell($kontaktFooterWidth, 0, iconv('UTF-8', 'windows-1252', $config['kontaktFusszeileText']), 0, 0, 'C');

    // Rendern Community Name
    echo 'Verarbeite Community Name...' . PHP_EOL;
    $pdf->SetFont('alternategothic');
    $pdf->SetFontSize($config['communityNameFontSize']);
    $pdf->SetTextColor(0, 0, 0); //schwarz
    $pdf->SetXY($communityNamePositionX + $anschnitt, $communityNamePositionY + $anschnitt);
    $pdf->MultiCell($wRechts, 10, iconv('UTF-8', 'windows-1252', $config['communityNameText']), 0, 'C');

    // Das war's mit dem Editieren


    // Original PDF Rueckseit uebernehmen
    $pdf->AddPage('L', array($dokumentBreite, $dokumentHoehe));
    $tplRueckseite = $pdf->importPage(2);
    $pdf->useTemplate($tplRueckseite);

    // und erstmal abspeichern
    echo 'Zwischenspeichern...' . PHP_EOL;
    $pdf->Output($outputFile);

    // Hier geht jetzt der Hack wegen der Footerzeile weiter
    // Die gerade abgespeicherte Datei wird erneut eingelesen
    // um dann im Seiten-Format der Ursprungsdatei erneut abgespeichert zu werden.
    // Is' doof, muss aber sein

    $pdf_2 = new FPDI();
    echo 'Erneut laden...' . PHP_EOL;
    $pageCount = $pdf_2->setSourceFile($outputFile);
    echo 'Feinschliff...' . PHP_EOL;
    $Vorderseite_2 = $pdf_2->ImportPage(1);
    $Rueckseite_2 = $pdf_2->ImportPage(2);
    $pdf_2->AddPage('L', array($dokumentBreite, $dokumentHoehe));
    $tplForderseite = $pdf_2->importPage(1);
    $pdf_2->useTemplate($tplForderseite);
    $pdf_2->AddPage('L', array($dokumentBreite, $dokumentHoehe));
    $tplRueckseite = $pdf_2->importPage(2);
    $pdf_2->useTemplate($tplRueckseite);

    echo 'Output: ' . basename($outputFile) . PHP_EOL;
    $pdf_2->Output($outputFile);
    unset ($pdf);
    unset ($pdf_2);
}
