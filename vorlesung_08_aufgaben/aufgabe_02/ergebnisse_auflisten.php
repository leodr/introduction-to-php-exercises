<!DOCTYPE HTML>
<?php
  if (!isset($_SESSION)) {
	session_start();   
  }
  require_once('session_ok.inc.php');
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
            echo '<table border="1">';
            echo '<tr><th>Jahr</th><th>Spieltag</th><th>Heimannschaft</th><th>Ausw&auml;rtsmannschaft</th><th>Spielergebnis</th></tr>';
            $file =  fopen('spieltag_ergebnisse.csv', 'r') or die ('Die Datei mit den Spielergebnissen konnte nicht geöffnet werden.');
            while (!feof($file)) {
                $zeile = fgets($file);
                $werte = explode(';', $zeile);
                if (count($werte) > 5) {
                    echo '<tr><td>'.$werte[0].'</td><td>'.$werte[1].'</td><td>'.$werte[2].'</td><td>'.$werte[3].'</td><td>'.$werte[4] . ':' . $werte[5] .'</td></tr>';
                }
            }
            fclose($file);
            echo '</table>';
            echo '<p><a href="index.php">Zurück zur Eingabemaske</a></p>';
            echo "<p><a href=\"login.php\">Abmelden</a></p>";
		?>
	</body>
</html>
