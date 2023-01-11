<?php
/* 2b)
     Die Datei “session_ok_inc.php” soll prüfen, ob der Nutzer laut der SESSION
	 angemeldet ist. Falls nicht, erhält man eine Meldung sowie ein Anmelden-Link
	 zur login.php und das Skript wird mit exit beendet.
    */

if (empty($_SESSION['benutzername'])) {
  echo 'Sie sind nicht angemeldet. <a href="./login.php">Zum Login</a>';
  exit();
}
