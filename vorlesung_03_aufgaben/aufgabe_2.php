<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8" />
  <title>Aufgabe 2</title>
</head>

<body>
  <!--
			Speichern Sie die Anzahl der Kalendertage für ein Schaltjahr zu jedem
			Monat in ein Array und geben Sie die Monate mit der jeweiligen Tages-
			anzahl in einer foreach-Schleife aus. 
			Des Weiteren soll die Summe der Tage des ganzen Jahres berechnet werden
			und als Gesamtwert ausgegeben werden.
        -->

  <ul>
    <?php
    $tagesanzahlen = array(
      'Januar' => 31,
      'Februar' => 29,
      'März' => 31,
      'April' => 30,
      'Mai' => 31,
      'Juni' => 30,
      'Juli' => 31,
      'August' => 31,
      'September' => 30,
      'Oktober' => 31,
      'November' => 30,
      'Dezember' => 31
    );
    $day_sum = 0;
    foreach ($tagesanzahlen as $monat => $tagesanzahl) {
      $day_sum += $tagesanzahl;
      echo "<li>$monat: $tagesanzahl</li>";
    }
    ?>
  </ul>
  <?php
  echo "Gesamte Tage im Jahr: $day_sum";
  ?>
</body>

</html>