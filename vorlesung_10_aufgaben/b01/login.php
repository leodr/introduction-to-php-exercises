<?php
session_start();
$_SESSION = array();
session_destroy();
?>
<html>

<head>
  <title>Login</title>
</head>

<body>
  <form action="start.php" method="post">
    <br />
    Benutzername:
    <br />
    <input type="text" name="benutzername" size="15" maxlength="20" />
    <br />
    Passwort:
    <br />
    <input type="password" name="passwort" size="15" maxlength="20" /><br />
    <input type="submit" value="abschicken">
  </form>
</body>

</html>