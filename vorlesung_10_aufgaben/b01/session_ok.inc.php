<?php
	if (!isset($_SESSION['benutzername'])) {
		echo 'Sie sind nicht angemeldet.';
		echo '<p><a href="login.php">Anmelden</a></p>';
		exit;
	}
