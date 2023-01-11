<!DOCTYPE HTML>
<?php
// 2c)
session_start();
include "session_ok.inc.php";
?>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Spieltagsergebnisse</title>
  <link href="stylesheet.css" rel="stylesheet" />
</head>

<body>
  <div id="inhalt">
    <h1>Spieltagsergebnisse</h1>
    <p>
      Hier finden Sie <a href="ergebnisse_auflisten.php?nur_alte_ergebnisse=1">Spieltagsergebnisse</a> von Besuchern dieser Website.
    </p>
    <form action="speichere_spieltag.php" method="post">
      <label for="jahr">Jahr *</label>
      <input id="jahr" name="jahr" value="<?php if (isset($_POST['jahr'])) echo $_POST['jahr']; ?>" size=40 type="text" />
      <br />
      <label for="spieltag">Spieltag *</label>
      <input id="spieltag" name="spieltag" value="<?php if (isset($_POST['spieltag'])) echo $_POST['spieltag']; ?>" size=40 type="text" />
      <br />
      <label for="heimmannschaft">Heimmannschaft *</label>
      <input id="heimmannschaft" name="heimmannschaft" value="<?php if (isset($_POST['heimmannschaft'])) echo $_POST['heimmannschaft']; ?>" size=40 type="text" />
      <br />
      <label for="auswaertsmannschaft">Ausw&auml;rtsmannschaft *</label>
      <input id="auswaertsmannschaft" name="auswaertsmannschaft" value="<?php if (isset($_POST['auswaertsmannschaft'])) echo $_POST['auswaertsmannschaft']; ?>" size=40 type="text" />
      <br />
      <label for="ergebnis">Ergebnis *</label>
      <input id="ergebnis" name="ergebnis" value="<?php if (isset($_POST['ergebnis'])) echo $_POST['ergebnis']; ?>" size=40 type="text" />
      <br />
      <label>&nbsp;</label>
      <input name="Abschicken" value="Senden" type="submit" />
      <input name="Abbrechen" value="Abbrechen" type="reset" />
      <!-- 2d) -->
    </form>
  </div>
</body>

<p><a href="./login.php">Abmelden</a></p>


</html>