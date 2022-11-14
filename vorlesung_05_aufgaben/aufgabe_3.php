<!DOCTYPE HTML>
<html>

<head>
  <title>Aufgabe 3</title>
</head>

<body>
  <!--
            Schreiben Sie ein Verarbeitungsskript mit der Methode fib zur Berechnung
			der n-ten Fibonacci Zahl Fibonacci-Zahlen:
			{0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, ...}. 
            a) Nutzen Sie dabei Rekursion, indem Sie folgende mathematische Vorschrift
			   umsetzen:
			   fib(n) = {  0 falls n = 0;
            	    	   1 falls n = 1;
						   fib(n-1) + fib(n-2) sonst}
			b) Schreiben die eine html-Seite für die Eingabe von n. Was fällt beim
 	    		Aufruf fib(...) ab n > 60 auf?
			c) Nutzen Sie die Methode test aus Aufgabe 1 zum Testen der Methode fib.
 	   	       So soll z. B. test(fib(8), 21) im Browser  „Die Werte sind identisch.“
			   ausgeben.
        -->

  <?php
  function fib($n)
  {
    switch ($n) {
      case 0:
        return 0;
      case 1:
        return 1;
      default:
        return fib($n - 2) + fib($n - 1);
    }
  }

  if (isset($_GET['n'])) {
    if (is_numeric($_GET['n'])) {
      echo 'Die ' . $_GET['n'] . '-te Fibonacci-Zahl ist ' . fib($_GET['n']);
    } else {
      echo 'Falscher Datentyp für Parameter n.';
    }
  } else {
    echo 'Falsche Parameter.';
  }
  ?>

  <!--
    b) Beim Ausrechnen von hohen Zahlen wie bspw. fib(60) gibt der PHP-Server 
    keine Antwort mehr zurück, da die Berechnung so lange dauert.
  -->



  <p>
    <?php
    function test($zahl1, $zahl2)
    {
      $rueckgabe = $zahl1 === $zahl2;
      if ($rueckgabe) {
        echo 'Die Werte sind identisch.<br>';
      } else {
        echo 'Die Werte sind verschieden.<br>';
      }
      return $rueckgabe;
    }

    test(fib(8), 21);
    test(fib(10), 55);
    test(fib(0), 0);
    test(fib(1), 1);
    ?>
  </p>
</body>

</html>