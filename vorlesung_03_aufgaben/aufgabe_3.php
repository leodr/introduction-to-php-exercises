<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8" />
  <title>Aufgabe 3</title>
</head>

<body>
  <!--
    		Sehen Sie sich noch einmal das HTML-Tabellenkonstrukt der ersten 
			Vorlesung (Folie 28ff) an und nutzen Sie dieses um einen mehrdimensonalen
			Array wie bspw. auf Folie 23 gegeben in eine Tabellenausgabe per 
			php-Skript auszugeben. 
        -->

  <table border="1">
    <caption>Personen</caption>
    <tr>
      <th>Vorname</th>
      <th>Nachname</th>
      <th>Wohnort</th>
    </tr>
    <?php
    $personen = array(
      array(
        'vorname' => 'Otto',
        'nachname' => 'Normalverbraucher',
        'wohnort' => '12345 Musterstadt'
      ),
      array(
        'vorname' => 'Erika',
        'nachname' => 'Mustermann',
        'wohnort' => '67890 Musterhausen'
      )
    );

    foreach ($personen as $index => $person) {
      echo '<tr>';

      foreach ($person as $attribut => $wert) {
        echo "<td>$wert</td>";
      }

      echo '</tr>';
    }
    ?>
  </table>
</body>

</html>