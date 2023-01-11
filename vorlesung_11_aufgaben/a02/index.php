<!DOCTYPE HTML>
<html>
<head>
    <title>Lösung Aufgabe 2 Vorlesung 11</title>
</head>
<body>
<?php
require_once('classloader.php');
define('NL', '<br />' . PHP_EOL);
?>

<h1>Vorlesung 10, Aufgabe 2</h1>
<div>
    Der Klasse <b>Vorlesung</b> (vgl. Vorlesung 8, Beispiel 3) werden im Konstruktor oder per
    Setter Instanzen der Klasse <b>Person</b> zugewiesen.
    <ol>
        <li>Ändern Sie die Klasse, dass nur noch Objekte der Klasse “Dozent” akzeptiert werden.</li>
        <li>Stellen Sie sicher, dass ein <b>Dozent</b> nicht zweimal hinzugefügt werden kann, indem Sie eine eigene <b>DoppeltException</b>
            für diesen Fall definieren und werfen. Fangen Sie diese Exception separat.
        </li>
    </ol>
</div>

<?php
// Test, dass Vorlesung nur Dozenten akzeptiert
try {
    $person = new Student('Max', 'Mustermann', '01.02.1976', 12345, "");
    $vorlesung = new Vorlesung('Deutsch', 4, $person); // Fehler, da $person nicht vom Typ "Dozent" ist
    echo "[OK]: Vorlesung konnte initialisiert werden. " . NL;
} catch (TypException $e) {
    echo "[TYP-FEHLER]: " . $e->getMessage();
}

echo NL;

// Test, dass Vorlesung nur Dozenten akzeptiert
try {
    $dozent1 = new Dozent("Fred", "Feuerstein", "07.07.1977", "Informatik", "Dipl. Inf.");
    $dozent2 = new Dozent("Max", "Mustermann", "05.05.1955", "WWU IT", "Tester");
    $dozenten = array($dozent1, $dozent2);
    $vorlesung = new Vorlesung('Java', 4, $dozenten);                      // OK
    echo "[OK]: Dozenten-Liste wurde gesetzt für: " . $vorlesung . NL;
} catch (TypException $e) {
    echo "[TYP-FEHLER]: " . $e->getMessage() . NL;
} catch (DoppeltException $e) {
    echo "[DOPPELT-FEHLER]: " . $e->getMessage() . NL;
}
catch (Exception $e) {
    echo "[UNBEKANNTER FEHLER]: " . $e->getMessage() . NL;
}

// Test, dass doppelte Einträge zur Exception führen
try {
    $vorlesung->fuegeDozentHinzu($dozent1);  // Fehler, da $dozent1 bereits zugewiesen ist
    echo "[OK]: konnte zur Dozenten-Liste hinzugefügt werden" . NL;
} catch (TypException $e) {
    echo "[TYP-FEHLER]: " . $e->getMessage() . NL;
} catch (DoppeltException $e) {
    echo "[DOPPELT-FEHLER]: " . $e->getMessage() . NL;
}
catch (Exception $e) {
    echo "[UNBEKANNTER FEHLER]: " . $e->getMessage() . NL;
}

?>

</body>
</html>
