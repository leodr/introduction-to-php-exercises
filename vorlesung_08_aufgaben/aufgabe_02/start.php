<?php
	session_start();   
	if (isset($_POST['benutzername'])) {
		$benutzername = $_POST['benutzername'];
		$password = $_POST['passwort'];
		if ($benutzername== 'admin' && $password == 'geheim') {
			$_SESSION['benutzername'] = $benutzername;
		} 
	}
	require_once('session_ok.inc.php');
	echo 'Sie sind erfolgreich angemeldet.';    
	echo '<p><a href="index.php">Zur Eingabemaske</a></p>';
	echo '<p><a href="login.php">Abmelden</a></p>';
?>
