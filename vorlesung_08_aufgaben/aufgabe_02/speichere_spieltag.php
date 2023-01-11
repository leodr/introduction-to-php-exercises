<?php
	session_start();   
	require_once('session_ok.inc.php');
    /* 2a)
       Binden Sie den Klassenlader aus dem Skript classloader.php ein
	*/	
    // vgl. Quelle: Heide Balzert: Basiswissen Web-Programmierung - S. 212-214
    $ergebnis = "";
    $jahr = "";
    $spieltag = "";
    $heimmannschaft = "";
    $auswaertsmannschaft = "";    
    if (isset($_POST['ergebnis'])) {
        $ergebnis = $_POST['ergebnis'];
    }
    if (isset($_POST['jahr'])) {
        $jahr = $_POST['jahr'];
    }
    if (isset($_POST['spieltag'])) {
        $spieltag = $_POST['spieltag'];
    }
    if (isset($_POST['heimmannschaft'])) {
        $heimmannschaft = $_POST['heimmannschaft'];
    }
    if (isset($_POST['auswaertsmannschaft'])) {
        $auswaertsmannschaft = $_POST['auswaertsmannschaft'];
    }
	/* 2c)
       Schreiben Sie einen try-catch-Block in der die Objektinstanz der Klassen 
	   Spielbegegnung erstellt wird und und rufen Sie die Funktion addToFile aus
	   der Teilaufgabe b mit diesem Objekt auf.
	*/	

    /* 2d)
       Geben Sie im Fehlerfall die Fehlermeldung aus und schaffen Sie die Möglichkeit
	   zurück zur Eingabemaske zu gehen und sichern Sie die Nutzer eingaben in hiddenfields.

	*/	


    /* 2b)
       Schreiben Sie die Funktion addToFile um, sodas ein Objekt der Klasse Spielbegegnung erwartet wird.
	*/	

?>
