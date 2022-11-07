<!DOCTYPE HTML>
<html>

<head>
  <title>Aufgabe 1</title>
</head>

<body>
  <!--
    		Erstellen Sie eine Datei aufgabe_1.html, die ein Textfeld Benutzername
			und ein Textfeld mit type=“password” für das Passwort hat. 
			Die Verarbeitung der Eingabe soll von der Datei aufgabe_1.php 
			vorgenommen werden. Bei der Eingabe “admin” und “geheim” soll der Text:
			“Sie sind angemeldet als Administrator.” erscheinen, ansonsten ein
			Hinweis auf ungültige Anmeldedaten. Die Übertragung soll mit der 
			GET-Variante erfolgen. Manipulieren Sie die Werte in der URL bei Ihren Tests.
        -->

  <?php
  if ($_GET['username'] === 'admin' and $_GET['password'] === 'geheim') {
    echo 'Sie sind angemeldet als Administrator.';
  } else {
    echo 'Ungültige Anmeldedaten.';
  }
  ?>
</body>

</html>