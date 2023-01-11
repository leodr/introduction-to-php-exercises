<?php  // vgl. Quelle: Heide Balzert: Basiswissen Web-Programmierung - S. 212-214
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

$fehler = array();

if (empty($ergebnis) || !preg_match("/^\d+\:\d+$/i", $ergebnis)) {
  $pruefung_ok = false;
  array_push($fehler, 'Ergebniseingabe falsch.');
}
if (!(is_numeric($jahr) && $jahr >= 1800 & $jahr < 2100)) {
  $pruefung_ok = false;
  array_push($fehler, 'Jahr falsch eingegeben.');
}
if (!(is_numeric($spieltag) && $spieltag >= 1 & $spieltag < 40)) {
  $pruefung_ok = false;
  array_push($fehler, 'Spieltag nicht richtig.');
}
if (empty($heimmannschaft) || empty($auswaertsmannschaft)) {
  $pruefung_ok = false;
  array_push($fehler, 'Mannschaften nicht richtig eingetragen.');
}

if ($pruefung_ok) {
  addToFile(
    $ergebnis,
    $jahr,
    $spieltag,
    $heimmannschaft,
    $auswaertsmannschaft
  );

  redirect("./ergebnisse_auflisten.php");
} else {
  echo '<html>';
  echo '<head>';
  echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
  echo '<title>Spielergebnisse</title>';
  echo '<link href="stylesheet.css" rel="stylesheet" type="text/css" />';
  echo '</head>';
  echo '<body>';
  echo implode('<br />', $fehler);
  echo '<form action="index.php" method="post">';
  if (!empty($ergebnis)) {
    echo '<input id="ergebnis" name="ergebnis" value="' . $ergebnis . '" type="hidden" /> ';
  }
  if (!empty($jahr)) {
    echo '<input id="jahr" name="jahr" value="' . $jahr . '" type="hidden" /> ';
  }
  if (!empty($spieltag)) {
    echo '<input id="spieltag" name="spieltag" value="' . $spieltag . '" type="hidden" /> ';
  }
  if (!empty($heimmannschaft)) {
    echo '<input id="heimmannschaft" name="heimmannschaft" value="' . $heimmannschaft . '" type="hidden" /> ';
  }
  if (!empty($auswaertsmannschaft)) {
    echo '<input id="auswaertsmannschaft" name="auswaertsmannschaft" value="' . $auswaertsmannschaft . '" type="hidden" /> ';
  }

  echo '<input name="Abschicken" value="Zurück zur Eingabemaske" type="submit" /> ';
  echo '</form>';
  echo '</body>';
  echo '</html>';
}

function addToFile(
  $ergebnis,
  $jahr,
  $spieltag,
  $heimmannschaft,
  $auswaertsmannschaft
) {
  $file = fopen('spieltag_ergebnisse.csv', 'a') or die('Die Datei mit den Spielergebnissen konnte nicht geöffnet werden.');

  fwrite($file, implode(';', array($jahr, $spieltag, $heimmannschaft, $auswaertsmannschaft, $ergebnis)) . "\n");

  fclose($file);
}

function redirect($url, $statusCode = 303)
{
  header('Location: ' . $url, true, $statusCode);
  die();
}
