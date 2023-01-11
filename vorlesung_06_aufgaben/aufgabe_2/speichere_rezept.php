<?php
// vgl. Quelle: Heide Balzert: Basiswissen Web-Programmierung - S. 212-214
$vorname = "";
$nachname = "";
$rezept = "";
if (isset($_POST['vorname'])) {
  $vorname = $_POST['vorname'];
}
if (isset($_POST['nachname'])) {
  $nachname = $_POST['nachname'];
}
if (isset($_POST['rezept'])) {
  $rezept = $_POST['rezept'];
}
// Prüfung, ob die Pflichfelder gefüllt wurden
if (empty($vorname) or empty($nachname) or empty($rezept)) {
  echo '<html>';
  echo '<head>';
  echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
  echo '<title>Weihnachtsrezepte</title>';
  echo '<link href="stylesheet.css" rel="stylesheet" type="text/css" />';
  echo '</head>';
  echo '<body>';
  echo '<p>Bitte die Pflichtfelder ausfüllen.</p>';
  echo '<form action="index.php" method="post">';
  if (!empty($vorname)) {
    echo '<input id="vorname" name="vorname" value="' . $vorname . '" type="hidden" /> ';
  }
  if (!empty($nachname)) {
    echo '<input id="nachname" name="nachname" value="' . $nachname . '" type="hidden" /> ';
  }
  if (!empty($rezept)) {
    echo '<input id="rezept" name="rezept" value="' . $rezept . '" type="hidden" /> ';
  }
  echo '<input name="Abschicken" value="Zurück zur Eingabemaske" type="submit" /> ';
  echo '</form>';
  echo '</body>';
  echo '</html>';
} else {
  addToFile($vorname, $nachname, $rezept);
}

/*
    Ändern Sie beim Beispiel mit den Weihnachtsrezepten in der Datei speichere_rezept.php die Einfügungsreihenfolge in der Funktion addToFile
	in der Datei rezeptliste.html und damit auch in der Anzeige so, dass das neue Rezept oben eingefügt wird.
	*/

function addToFile($vorname, $nachname, $rezept)
{
  $filename = "rezeptliste.html";

  $prep = "<div class=\"gesamtrezept\">\n"
    . "\t<div class=\"rezeptschreiber\">\n"
    . "\t\tRezept von: " . $vorname . " " . $nachname . "\n"
    . "\t</div>\n"
    . "\t" . nl2br($rezept) . "\n"
    . "</div>\n";

  file_prepend($prep, $filename);

  include "rezepte_auflisten.php";

  // bisherige Variante, dass die Rezepte hinten anfügt		
  //		$filename = "rezeptliste.html";										// Dateiname ,in der alle Rezepte abgespeichert werden
  //		$file = fopen($filename, "a");										// Datei wird zum Schreiben geoeffnet
  //		fwrite($file, "<div class=\"gesamtrezept\">\n");	// neues Rezept wird als Eintrag in die Datei hinzugefuegt
  //		fwrite($file, "\t<div class=\"rezeptschreiber\">\n");
  //		fwrite($file, "\t\tRezept von: ". $vorname ." ". $nachname. "\n");
  //		fwrite($file, "\t</div>\n");
  //		fwrite($file, "\t". nl2br($rezept) ."\n");
  //		fwrite($file, "</div>\n");
  //		fclose($file);
  //		include "rezepte_auflisten.php"; // Einbinden der Datei rezepte_auflisten, die wiederum die Datei rezeptliste.html einbindet, welche alle vorhanden Rezepteintraege enthaelt.
}

function file_prepend($string, $filename)
{
  $fileContent = file_get_contents($filename);

  file_put_contents($filename, $string . "\n" . $fileContent);
}
