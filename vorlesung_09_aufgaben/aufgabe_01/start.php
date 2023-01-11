<?php
	session_start();   
    require_once('classloader.php');
	if (isset($_POST['benutzername'])) {
		$benutzername = $_POST['benutzername'];
		$passwort = $_POST['passwort'];
        if (DBFacade::getInstance()->sindLoginDatenBekannt($benutzername, $passwort)) {
			$_SESSION['benutzername'] = $benutzername;
		} 
	}
	require_once('session_ok.inc.php');
	echo 'Sie sind erfolgreich angemeldet.';    
	echo '<p><a href="index.php">Zur Eingabemaske</a></p>';
	echo '<p><a href="login.php">Abmelden</a></p>';
?>
