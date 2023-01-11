<?php
	session_start();   
	require_once('session_ok.inc.php');
    require_once('classloader.php');
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
    try {
        $tore = explode(':', $ergebnis);
        if (count($tore) != 2) {
            throw new Exception('Die Eingabe des Spielergebnisses hat kein korrektes Format wie z. B. 1:2 .');
        }
        else {
            $spielbegegnung = new Spielbegegnung($jahr, $spieltag, $heimmannschaft, $auswaertsmannschaft, $tore[0], $tore[1]);
            addToFile($spielbegegnung);
        }
    }
    catch (Exception $ex) {
        echo '<html>';
        echo '<head>';
        echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
        echo '<title>Spielergebnisse</title>';
        echo '<link href="stylesheet.css" rel="stylesheet" type="text/css" />';
        echo '</head>';
        echo '<body>';
        echo $ex->message();
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

    function addToFile($spielbegegnung)
    {
        $filename = "spieltag_ergebnisse.csv"; // Dateiname in der alle Ergebnisse abgespeichert werden
        $file = fopen($filename, "a"); // Datei wird zum Schreiben geoeffnet
        $datei_zeile = $spielbegegnung->getCSVFormat()."\r\n";
        fwrite($file, $datei_zeile);
        fclose($file);
        include "ergebnisse_auflisten.php"; // Einbinden der Datei rezepte_auflisten, die wiederum die Datei rezeptliste.html einbindet, welche alle vorhanden Rezepteintraege enthaelt.
    }
?>
