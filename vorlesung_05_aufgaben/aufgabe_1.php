<!DOCTYPE HTML>
<html>

<head>
  <title>Aufgabe 1</title>
</head>

<body>
  <!--
    		Schreiben Sie eine Methode test, die zwei int-Werte erwartet und true
			zurückliefert, falls diese identisch sind, ansonsten false. Erweitern
			Sie die Methode test, so dass sie per „Nebeneffekt“ ihr Rückgabe-
			ergebnis als echo-Anweisung ausgibt mit „Die Werte sind identisch.“ 
			oder „Die Werte sind verschieden.“
        -->

  <?php
  function test($zahl1, $zahl2)
  {
    $rueckgabe = $zahl1 === $zahl2;

    if ($rueckgabe) {
      echo 'Die Werte sind identisch.';
    } else {
      echo 'Die Werte sind verschieden.';
    }

    return $rueckgabe;
  }

  test(1, 2);
  ?>
  <br />
  <?php
  test(2, 2);
  ?>
</body>

</html>