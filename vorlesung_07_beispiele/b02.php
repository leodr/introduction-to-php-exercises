<!DOCTYPE HTML>
<?php
// Erstellt aus dem übergebenen Array einen String in dem die Schlüssel und Wert per "=" und die einzelnen Paare per "&" getrennt sind
//  Einschränkung: Die Wert in dem Array dürfen weder "&" noch "=" enthalten
function enCookifiziere($array) {
    $string = "";
    $zaehler = 0;
    foreach ($array as $schluessel => $wert) {
        $string .= $schluessel . "=" . $wert;
        
        if ($zaehler++ < count($array) - 1) $string .= "&";
    }
    
    return $string;
}

// Erstellt aus dem übergebenen String einen Array, indem der String zuerst anhand von "&" in Schlüssel-Wert-Paare aufgteilt wird und diese Paare dann
// anhand von "=" getrennt und assoziativ in einem Array abgelegt werden
function deCookifiziere($string) {
    $paare = explode("&", $string);
    
    $array = [];
    foreach ($paare as $paar) {
        $paar = explode("=", $paar);
        $array[$paar[0]] = $paar[1];
    }
    
    return $array;
}

// Kleine Hilfsfunktion zum setzen eines Cookies, dessen Wert der "enCookifizierte" Array darstellt
function speichern($array, $name = "PHP_V07_B02",  $zeitstempel = 900) {
    setcookie($name, enCookifiziere($array), time() + $zeitstempel);    
}

// Der "Ok"-Knopf wurde gedrückt
if (isset($_POST["weiter"])) {
    // Cookie-Daten wurden geändert
    $array = array("vorname" => $_POST["vorname"], "nachname" => $_POST["nachname"]);
    // speichern
    speichern($array);    
?>
<div>
    Gespeichert!
</div>
<div>
    <a href="b02.php">Neuladen</a>
</div>
<?php
    
    // 
    return ;
}
else {
    // Cookie existiert nicht
    if (!isset($_COOKIE["PHP_V07_B02"])) {
        // leere Daten anlegen
        $array = array("vorname" => "", "nachname" => "");
        speichern($array);
    }
    else {
        // Cookie exisitert
        // Array aus dem Cookie-Wert ersteleln
        $array = deCookifiziere($_COOKIE["PHP_V07_B02"]);
    }
}
?>

<html>
    <head>
        <title>Beispiel 2</title>
    </head>
    <body>
        
        <form action="b02.php?" method="POST" style="padding: 5px;">
            Vornamen:
            <br />
            <input type="text" name="vorname" size="50" value="<?=$array["vorname"]?>"/>            
            <br />
            
            Nachnamen:
            <br />
            <input type="text" name="nachname" size="50" value="<?=$array["nachname"]?>"/>
            
            <br />
            
            <br />            
            <input type="submit" value="Ok" name="weiter">
        </form>

    </body>
</html>
