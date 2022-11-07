<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8" />
  <title>Aufgabe 2</title>
</head>

<body>
  <!--
			Mit rand(1, 10) wird eine Zufallszahl im Bereich von 1 bis 10 einer 
			Variablen zugewiesen. Mit einer if-Anweisungsoll die Variable ausge- 
			wertet werden und bei geraden Zahl nationale und bei ungeraden Zahl
			internationale Städte angezeigt werden. Hierbei erstellen Sie eine 
			geordnete Liste von 5 Städten Ihrer Wahl als HTML5-Ausgabe, wobei 
			der erste Eintrag die meisten Einwohner haben soll und die Liste 
			nach Einwohnerzahl absteigend sortiert werden soll. 
			Tipp: ($a % 2) liefert 1 bei ungeraden Zahlen sonst 0
        -->
  <ol>
    <?php
    $random_number = rand(1, 10);

    if ($random_number % 2 === 0) {
      echo '<li>Berlin</li>';
      echo '<li>Hamburg</li>';
      echo '<li>München</li>';
      echo '<li>Köln</li>';
      echo '<li>Frankfurt am Main</li>';
    } else {
      echo '<li>Tokyo</li>';
      echo '<li>Delhi</li>';
      echo '<li>Shanghai</li>';
      echo '<li>São Paulo</li>';
      echo '<li>Mexico City</li>';
    }
    ?>
  </ol>
</body>

</html>