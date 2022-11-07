<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8" />
  <title>Aufgabe 3</title>
</head>

<body>
  <!--
    		Berechnen Sie die Summe der geraden Zahlen von 1 bis 100 mit einer
			der vorgestellten Schleifen.
        -->
  <?php
  $sum = 0;

  for ($i = 0; $i <= 100; $i++) {
    $sum += $i;
  }

  echo $sum;
  ?>
</body>

</html>