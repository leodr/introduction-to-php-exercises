<?php
session_start();
// TODO Aufgabe 1 
// notwendige Datei einbinden
include 'funktionen.inc.php';
?>
<html>

<body>
  <?php
  $weiteraufforderung = false;
  if (isset($_POST['neu'])) {
    $_SESSION = array();
    session_destroy();
  }
  $vergangeneZeit = 0;
  if (isset($_SESSION['zeit'])) {
    $vergangeneZeit = time() - $_SESSION['zeit'];
    if ($vergangeneZeit > 10) {
      $vergangeneZeit = 10;
    }
  }
  if ($vergangeneZeit >= 10) {
    $weiteraufforderung = true;
  } else if (isset($_SESSION['zugriff'])) {
    $_SESSION['zugriff'] = $_SESSION['zugriff'] + 1;
  } else {
    $_SESSION['zugriff'] = 1;
    $_SESSION['zeit'] = time();
  }
  echo 'Klicken Sie in 10 Sekunden so oft Sie können auf den Button "Neu laden"';
  if ($weiteraufforderung) {
    echo "<br /><br /><br /><br /><br />";
  } else {
    echo "<p><a href=\"index.php\">Neu laden</a></p><br />";
  }
  echo 'Guten Tag! Sie besuchen diese Seite zum ' . $_SESSION['zugriff'] . ' Mal.<br />';

  /* TODO Aufgabe 1)
			Erweitern Sie das 4. Beispiel dieser Vorlesung um die Ausgabe der 
			“durchschnittliche Klicks/s: ”. Die Angabe soll oberhalb von “Ticket gültig bis”
			erscheinen. Zur Berechnung sollen Sie aus der Funktionssammlung auf die Funktion
			dividiereMitException zurückgreifen. Im Fehlerfall soll die Ausgabe “keine Angabe”
			erfolgen. Im finally-Block geben Sie ein br-Tag aus
			*/


  try {
    $vergangene_sekunden = time() - $_SESSION['zeit'];

    $klicks_pro_sekunde = dividiereMitException($_SESSION['zugriff'], $vergangene_sekunden);

    echo 'Du klickst Neu Laden ' . $klicks_pro_sekunde . ' Mal pro Sekunde.<br>';
  } catch (Exception $e) {
    echo 'keine Angabe<br>';
  } finally {
    echo '<br>';
  }

  echo 'Ticket gültig bis: ' . date("H:i:s", $_SESSION['zeit'] + 10) . '<br />';
  echo 'Aktuelle Zeit: ' . date("H:i:s") . '<br /><br />';
  if ($weiteraufforderung) {
    echo '<form action="index.php" method="post">';
    echo 'Ihr Ticket ist abgelaufen. <br />';
    echo '<input type="submit" name="neu" value="Neue Session" />';
    echo '</form><br /><br />';
  }
  /*
			echo 'Ihre Session-ID lautet: '.session_id().'<br />';
			echo 'Ihre Sessiondatei liegt unter: '.session_save_path().'<br />';		
			echo 'Sessionvariablen: ';
      print_r($_SESSION);
			echo '<br />POST-Variablen: ';
      print_r($_POST);
      */
  ?>
</body>

</html>