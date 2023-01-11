<?php
/* 2a)
    In der “start.php” wird nur ein Nutzer mit dem Nutzernamen “admin” und Passwort
	“geheim” akzeptiert und führt dazu, dass in der $_SESSION[‘benutzername’] der 
	benutzername eingetragen wird.	
	*/

if (isset($_POST['benutzername'])) {
  $benutzername = $_POST['benutzername'];
}

if (isset($_POST['passwort'])) {
  $passwort = $_POST['passwort'];
}

session_start();

if ($benutzername === 'admin' && $passwort === 'geheim') {
  $_SESSION['benutzername'] = $benutzername;
}

// 2c)

include "session_ok.inc.php";
/*
	Mit dem include-Baustein aus c) sollen die Skripte “ergebnisse_auflisten.php”,
	“index.php”, “speichere_spieltag.php” und “start.php” abgesichert werden.
	*/
echo 'Sie sind erfolgreich angemeldet.';
echo '<p><a href="index.php">Zur Eingabemaske</a></p>';
// 2d)
/*
	Die Seiten “ergebnisse_auflisten.php”, “index.php” und “start.php” erhalten
	einen “Abmelden”-Link, der auf die Seite login.php zeigt. 
    */
?>

<p><a href="./login.php">Abmelden</a></p>