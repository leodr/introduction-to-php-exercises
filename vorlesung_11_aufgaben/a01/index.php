<!DOCTYPE HTML>
<html>
<head>
    <title>Lösung Aufgabe 1 Vorlesung 11</title>
</head>
<body>
<?php
require_once('classloader.php');
define('NL', '<br />' . PHP_EOL);
?>

<h1>Aufgabe 1, Vorlesung 10</h1>
<div>
    Schreiben Sie eine Klasse <b>Dozent</b>, die von der Klasse <b>Person</b> erbt.
    <ol>
        <li>Überlegen Sie sich sinnvolle Attribute, die <b>Dozent</b> von <b>Person</b> unterscheidet</li>
        <li>Schützen Sie diese Attribute durch <i>Getter</i> bzw. <i>Setter</i></li>
    </ol>
</div>
<hr/>

<?php
// Einen Dozenten anlegen
//  Neben den Attributen von "Person" hat "Dozent" noch das Attribute "fachbereich", welches vom Typ "string" sein muss
$dozent1 = new Dozent("Fred", "Feuerstein", "01.05.1965", "Astrophysik", "Dipl. Inf.");
$dozent2 = new Dozent("Max", "Mustermann", "05.05.1955", "WWU IT", "Tester");

// Testen, dass "fachbereich" nur "string" annimmt
try {
    $dozent1->setFachbereich("WWU IT");    // OK
    echo "[OK]:ZIV wurde für gesetzt für: " . $dozent1 . NL;
    $dozent2->setFachbereich(10);       // Exception
    echo "[OK]:10 wurde für gesetzt für: " . $dozent1 . NL;
} catch (TypException $e) {
    echo "[TYP-FEHLER]: " . $e->getMessage() . NL;
}
catch (Exception $e) {
    echo "[UNBEKANNTER FEHLER]: " . $e->getMessage() . NL;
}

// Dozent ausgeben
echo $dozent1 . NL;
echo $dozent2 . NL;
?>

</body>
</html>
