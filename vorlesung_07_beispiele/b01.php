<!DOCTYPE HTML>
<?php
// Reihenfolge der Eingabe-Seiten
$SEITEN = array("name", "adresse", "zahlungsart", "uebersicht");

// Session starten
session_name("ZIV");
session_start();

// In der super-globalen Variablen $_SERVER sind 
// allgemeine Informationen zum Server gespeichert
// unter "REQUEST_URI" die zuletzt angefragte URL,
// welche in diesem Beispiel der Startseite entspricht
$start = $_SERVER['REQUEST_URI'];

// Wurde logout gedrückt?
if (isset($_POST["logout"])) {
    // Logout in dem die Session zerstört wird
    session_unset();
    session_destroy();
    
    // gehe zur Logout-Seite
    $seite = "logout";
}
else {
    // Falls "seite" noch in Session enthalten:
    //  1) Erstes Laden der Seite oder erstes Laden nach einem Logout
    //  2) Ok auf der "Übersichts"-Seite wurde gedrückt
    if (!isset($_SESSION["seite"])) {      
        $_SESSION["seite"] = $SEITEN[0];        
    }
    elseif (isset($_POST["weiter"])) {
		// aktuelle Seite aus dem POST 
		$seite = $_POST["seite"];		
		
		// Alle eingegebenen Daten in den Array und damit in die Session einfügen
        foreach ($_POST as $schluessel => $wert) {
            if ($schluessel !== "weiter") {                 // "weiter" Datum überspringen
                // Eingaben der Seite speichern
                $_SESSION[$seite][$schluessel] = $wert;
            }
        }

		// nächste Seite ermitteln
        $index = array_search($seite, $SEITEN);        
        if ($index >= 0 && $index < count($SEITEN) - 1) {
            $_SESSION["seite"] = $SEITEN[$index + 1];
        }
        else {
            $_SESSION["seite"] = $SEITEN[0];
        }		
    }    
               
    // Welche Seite soll angezeigt werden?     
    $seite = $_SESSION["seite"];
}

?>

<html>
    <head>
        <title>Beispiel 1</title>
    </head>
    <body>

        <?php
            //  Inkludieren abhängig von der aktuell in $_SESSION gespeicherten Seite
            include("b01/b01_$seite.php");
        
            if (!isset($_POST["logout"])) {
                ?>
                <div style="padding: 5px; border-top: 1px solid lightgray; margin-top: 20px; width: 500px; position: relative">
                    <div>Cookies unterstützt: <b><?=(SID === '' ? "Ja" : "Nein")?></b></div>
                    <div>Session-ID: <b><?=session_name()?>=<?=session_id()?><b></div>
    
                    <form action="b01.php" method="POST" style="position: absolute; right: 0; top: 5px">
                        <input type="submit" value="Logout" name="logout">						
                    </form>
                </div>
                <?php
            }
        ?>
    
    </body>
</html>
