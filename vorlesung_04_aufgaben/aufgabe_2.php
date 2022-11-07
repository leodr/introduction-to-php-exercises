<!DOCTYPE HTML>
<html>

<head>
  <title>Aufgabe 2</title>
</head>

<body>
  <!--
            Analog zu Aufgabe 1 soll nun die Übertragung mit der POST-Variante
			erfolgen. Speichern Sie die Dateien unter dem Namen aufgabe_2… .
			Vergleichen Sie die Unterschiede beim Aufruf im Browser zu Aufgabe 1
			und schildern Sie ihre Beobachtungen in der Datei aufgabe_2.hmtl.
        -->

  <?php
  if ($_POST['username'] === 'admin' and $_POST['password'] === 'geheim') {
    echo 'Sie sind angemeldet als Administrator.';
  } else {
    echo 'Ungültige Anmeldedaten.';
  }
  ?>
</body>

</html>