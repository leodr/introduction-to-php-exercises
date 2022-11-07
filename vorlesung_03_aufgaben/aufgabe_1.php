<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8" />
  <title>Aufgabe 1</title>
</head>

<body>
  <!--
    		Das Ausgabekonstrukt auf Folie 12 ist verbesserungswürdig. Schreiben
			Sie die foreach-Schleife so um, dass die Ausgabezeile nicht auf “, ”
			endet.
        -->

  <?php
  $mondanzahl = array('Merkur' => 0, 'Venus' => 0, 'Erde' => 1, 'Mars' => 2);

  $planeten = array_keys($mondanzahl);

  $planeten_count = count($planeten);

  for ($i = 0; $i < $planeten_count; $i++) {
    $schluessel = $planeten[$i];
    $wert = $mondanzahl[$schluessel];

    echo $schluessel . ': ' . $wert;

    if ($i !== $planeten_count - 1) {
      echo ', ';
    }
  }
  ?>
</body>

</html>