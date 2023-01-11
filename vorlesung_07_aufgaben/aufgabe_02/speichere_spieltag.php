<?php
	session_start();
	include "session_ok.inc.php";
    // vgl. Quelle: Heide Balzert: Basiswissen Web-Programmierung - S. 212-214
    $ergebnis = "";
    $jahr = "";
    $spieltag = "";
    $heimmannschaft = "";
    $auswaertsmannschaft = "";    
    if (isset($_POST['ergebnis'])) {
        $ergebnis = $_POST['ergebnis'];
    }
    if (isset($_POST['jahr'])) {
        $jahr = $_POST['jahr'];
    }
    if (isset($_POST['spieltag'])) {
        $spieltag = $_POST['spieltag'];
    }
    if (isset($_POST['heimmannschaft'])) {
        $heimmannschaft = $_POST['heimmannschaft'];
    }
    if (isset($_POST['auswaertsmannschaft'])) {
        $auswaertsmannschaft = $_POST['auswaertsmannschaft'];
    }
    // Prüfung, ob die Pflichfelder gefüllt wurden
    $pruefung_ok = true;  // zu Beginn davon ausgehen, daass die Prüfung ok ist
    $tore = explode(':', $ergebnis);
    if (count($tore) != 2 or !is_numeric($tore[0]) or !is_numeric($tore[1]))
    {
        echo '<p>Die Eingabe des Spielergebnisses hat kein korrektes Format wie z. B. 1:2 </p>';
        $pruefung_ok = false;
    }
    if (!is_numeric($jahr))
    {
        echo '<p>Die Eingabe des Jahres ist nicht numerisch. </p>';
        $pruefung_ok = false;
    }
    else if ($jahr < 1800 || $jahr > 2100)
    {
        echo '<p>Die Eingabe der Jahreszahl liegt nicht im Bereich 1800 bis 2100. </p>';
        $pruefung_ok = false;
    }
    if (!is_numeric($spieltag))
    {
        echo '<p>Die Eingabe des Spieltages ist nicht numerisch. </p>';
        $pruefung_ok = false;
    }
    else if ($spieltag < 1 || $spieltag > 40)
    {
        echo '<p>Die Eingabe des Spieltages liegt nicht im Bereich 1 bis 40. </p>';
        $pruefung_ok = false;
    }
    if (empty($jahr) or empty($spieltag) or empty($heimmannschaft) or empty($auswaertsmannschaft) or empty($ergebnis))
    {
        echo '<p>Bitte alle Pflichtfelder ausfüllen.</p>';
        $pruefung_ok = false;
    }
    if ($pruefung_ok)
    {
        $werte = array();
        $werte[] = $jahr;
        $werte[] = $spieltag;
        $werte[] = $heimmannschaft;
        $werte[] = $auswaertsmannschaft;
        $werte[] = $ergebnis."\r\n";  
        $datei_zeile = implode(';', $werte);
        addToFile($datei_zeile);
    }           
    else
    {
        echo '<html>';
        echo '<head>';
        echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
        echo '<title>Spielergebnisse</title>';
        echo '<link href="stylesheet.css" rel="stylesheet" type="text/css" />';
        echo '</head>';
        echo '<body>';
        echo '<form action="index.php" method="post">';
        if (!empty($jahr))  {
            echo '<input id="jahr" name="jahr" value="'.$jahr.'" type="hidden" /> ';
        }
        if (!empty($spieltag))  {
            echo '<input id="spieltag" name="spieltag" value="'.$spieltag.'" type="hidden" /> ';
        }
        if (!empty($heimmannschaft))  {
            echo '<input id="heimmannschaft" name="heimmannschaft" value="'.$heimmannschaft.'" type="hidden" /> ';
        }
        if (!empty($auswaertsmannschaft))  {
            echo '<input id="auswaertsmannschaft" name="auswaertsmannschaft" value="'.$auswaertsmannschaft.'" type="hidden" /> ';
        }
        if (!empty($ergebnis))  {
            echo '<input id="ergebnis" name="ergebnis" value="'.$ergebnis.'" type="hidden" /> ';
        }
        echo '<input name="Abschicken" value="Zurück zur Eingabemaske" type="submit" /> ';
		echo "<p><a href=\"login.php\">Abmelden</a></p>";
        echo '</form>';
        echo '</body>';
        echo '</html>';
    }

    function addToFile($datei_zeile)
    {
        $filename = "spieltag_ergebnisse.csv"; // Dateiname in der alle Ergebnisse abgespeichert werden
        $file = fopen($filename, "a"); // Datei wird zum Schreiben geoeffnet
        fwrite($file, $datei_zeile);
        fclose($file);
        include "ergebnisse_auflisten.php"; // Einbinden der Datei rezepte_auflisten, die wiederum die Datei rezeptliste.html einbindet, welche alle vorhanden Rezepteintraege enthaelt.
    }
?>
