<!DOCTYPE HTML>
<html>

<head>
  <title>Aufgabe 3</title>
</head>

<body>
  <!--
            Bauen Sie die html-Seite aufgabe_3.html mit 7 Lieblingsrestaurants
			als Kontrollkästchen z. B. chinesisch. 
			Die Verarbeitungsseite aufgabe_3.php soll die Auswahl der 
			Lieblingsrestaurants als Satz ausgeben. Eine Mehrfachauswahl soll
			möglich sein! 
			Für den Fall, dass keine Auswahl erfolgt, geben sie hierzu eine Meldung aus.
        -->

  <?php
  $restaurants = array(
    'chinesisch' => array('Jingu Sushi&grill', 'Mengu Buffet'),
    'italienisch' => array('Buca di Beppo Italian Restaurant'),
    'britisch' => array('The Lion & Rose'),
    'griechisch' => array('The Great Greek Restaurant', 'Le Petit Greek', 'Mykonos Greek Grill'),
    'tuerkisch' => array('Cafe Istanbul', 'Alchemist Restaurant'),
    'gut-buergerlich' => array('Wurstküche Restaurant Venice Beach', 'Wirtshaus', 'Red Lion Tavern'),
    'mongolisch' => array('Golden Mongolian Restaurant'),
  );

  $filtered_restaurants = array();

  foreach ($restaurants as $category => $restaurant_list) {
    if (isset($_GET[$category]) && $_GET[$category] === 'on') {
      $filtered_restaurants = array_merge($filtered_restaurants, $restaurant_list);
    }
  }

  if (count($filtered_restaurants) === 0) {
    echo 'Keine Auswahl.';
  } else {
    $rest_count = count($filtered_restaurants);

    echo 'Zu deinem Geschmack würde ';

    foreach ($filtered_restaurants as $index => $value) {
      $appendix = ', ';

      switch ($index) {
        case $rest_count - 2:
          $appendix = ' oder ';
          break;
        case $rest_count - 1:
          $appendix = '';
          break;
      }
      echo $value . $appendix;
    }

    echo ' passen.';
  }
  ?>
</body>

</html>