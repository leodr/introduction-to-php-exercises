<!DOCTYPE HTML>
<?php
    if (!isset($_SESSION)) {
    	session_start();   
    }
	require_once('session_ok.inc.php');
    require_once('classloader.php');
?>
<html> <!-- vgl. Quelle: Heide Balzert: Basiswissen Web-Programmierung - S. 212-214-->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Spieltagsergebnisse</title>
		<link href="stylesheet.css" rel="stylesheet" type="text/css" />
    </head>
	<body>
		<h1> Liste aller Spieltagsergebnisse </h1>
		<?php
            if (!isset($_GET['nur_alte_ergebnisse'])) {
                echo "<p>Vielen Dank für Ihr Spielergebnis.</p>";
            }
            echo "<form method=post action=ergebnisse_auflisten.php?nur_alte_ergebnisse=1>";
			// 1c) Erweitern Sie die Anzeige der Fussballergebnisse um eine Combobox für das 
			// Spieljahr, die zur Filterung verwendet wird. Die Box soll mit den aktuell 
			// vorhandenen Spieljahren aus der Datenbank gefüllt werden. Des Weiteren
			// soll es den Eintrag ‚Alle‘ in der Combobox geben, der initial ausgewählt
			// ist oder falls der Post-Wert zur combobox-Auswahl leer ist.
			// Bei der Auswahl ‚Alle‘ werden die Spielbegegnungen zu allen Jahren angezeigt.
            // HTML-Teil der Auswahl mit select und option in einem Formular erzeugen

            echo '<tr><th>Jahr</th><th>Spieltag</th><th>Heimannschaft</th><th>Ausw&auml;rtsmannschaft</th><th>Spielergebnis</th></tr>';
			// 1b) Ersetzen Sie im php-Skript ergebnisse_auflisten.php den Aufruf fopen
			// durch einen Datenbankzugriff mittels PDO, welches die Spielbegegnungen 
			// zurückliefert.
            $spielbegegnungen = DBFacade::getInstance()->getSpielbegegnungen();

			// 1c) Erweitern Sie die Anzeige der Fussballergebnisse um eine Combobox für das 
			// Spieljahr, die zur Filterung verwendet wird. Die Box soll mit den aktuell 
			// vorhandenen Spieljahren aus der Datenbank gefüllt werden. Des Weiteren
			// soll es den Eintrag ‚Alle‘ in der Combobox geben, der initial ausgewählt
			// ist oder falls der Post-Wert zur combobox-Auswahl leer ist.
			// Bei der Auswahl ‚Alle‘ werden die Spielbegegnungen zu allen Jahren angezeigt.

            foreach ($spielbegegnungen as $spielbegegnung) {
                echo '<tr><td>'.$spielbegegnung->getSpieljahr().'</td><td>'.$spielbegegnung->getSpieltag().'</td><td>'.$spielbegegnung->getHeimmannschaft().'</td><td>'.
                                      $spielbegegnung->getAuswaertsmannschaft().'</td><td>'.$spielbegegnung->getSpielergebnis().'</td></tr>';
            }            
            echo '</table>';
            echo '<p><a href="index.php">Zurück zur Eingabemaske</a></p>';
            echo "<p><a href=\"login.php\">Abmelden</a></p>";
		?>
	</body>
</html>
