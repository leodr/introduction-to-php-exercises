<?php
	session_start();   
    require_once('classloader.php');
	if (isset($_POST['benutzername'])) {
		$benutzername = $_POST['benutzername'];
		// 1.d) In den php-Skripten muss dann anstatt des Klartext-Passwortes 
		// ebenfalls der SHA1-Wert vom Passwort berechnet und weiter verarbeitet
		// werden. Wenden Sie hierzu direkt nach der Passwortabfrage die php-Funktion
		// sha1 an.
		$passwort = $_POST['passwort'];
        if (DBFacade::getInstance()->sindLoginDatenBekannt($benutzername, $passwort)) {
			$_SESSION['benutzername'] = $benutzername;
		} 
	}
	require_once('session_ok.inc.php');
	echo 'Sie sind als erfolgreich angemeldet.';    
	echo '<p><a href="index.php">Zur Eingabemaske</a></p>';
	echo '<p><a href="login.php">Abmelden</a></p>';
?>
