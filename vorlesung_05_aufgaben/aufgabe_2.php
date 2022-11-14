<!DOCTYPE HTML>
<html>

<head>
  <title>Aufgabe 2</title>
</head>

<body>
  <!--
           Schreiben Sie zwei Funktionen berechneKreisflaeche und berechneKreisumfang,
		   die beide als Parameter den Radius haben. Über eine HTML-Seite soll der 
		   Radius in einem Eingabefeld eingegeben warden können. Die Verarbeitung 
		   soll von einem PHP-Skript übernommen werden und bei erfolgreicher 
		   Pflichtfeldeingabe sollen die beiden Methoden aufgerufen und deren 
		   Ergebnisse mit echo ausgegeben werden.
        -->

  <?php
  function berechneKreisflaeche($radius)
  {
    return $radius * $radius * pi();
  }

  function berechneKreisumfang($radius)
  {
    return $radius * 2 * pi();
  }

  if (isset($_GET['radius'])) {
    if (is_numeric($_GET['radius'])) {
      echo 'Kreisfläche ist ' . berechneKreisflaeche($_GET['radius']) . '. <br />';
      echo 'Kreisumfang ist ' . berechneKreisumfang($_GET['radius']) . '.';
    } else {
      echo 'Falscher Datentyp für Parameter radius.';
    }
  } else {
    echo 'Falsche Parameter.';
  }
  ?>
</body>

</html>