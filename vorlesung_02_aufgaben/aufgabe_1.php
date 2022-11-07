<!DOCTYPE HTML>
<html>
    <head>
		<meta charset="utf-8" />
        <title>Aufgabe 1</title>
    </head>
    <body>
        <!--
    		Schreiben Sie ein php-Skript, dass mit rand(1, 12) einer Variablen 
			eine Zufallszahl im Bereich von 1 bis 12 zuweist.
 			Die Variable soll mit einer switch-Anweisung ausgewertet werden und 
			den jeweiligen Monatsnamen mit einer echo-Anweisung ausgeben.
        -->
        <?php
          $month = rand(1, 12);

          switch ($month) {
            case 1:
              echo 'Januar';
              break;
            case 2:
              echo 'Februar';
              break;
            case 3:
              echo 'März';
              break;
            case 4:
              echo 'April';
              break;
            case 5:
              echo 'Mai';
              break;
            case 6:
              echo 'Juni';
              break;
            case 7:
              echo 'Juli';
              break;
            case 8:
              echo 'August';
              break;
            case 9:
              echo 'September';
              break;
            case 10:
              echo 'Oktober';
              break;
            case 11:
              echo 'November';
              break;
            case 12:
              echo 'Dezember';
              break;
            
            default:
              echo 'Ungültiger Monat';
              break;
          }
        ?>
    </body>
</html>
