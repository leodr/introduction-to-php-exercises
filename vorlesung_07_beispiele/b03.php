<!DOCTYPE HTML>
<html>
    <head>
        <title>Beispiel 3</title>
    </head>
    <body>

    <?php
    	require_once("funktionen.inc.php");
    
        // Randomisierte Default-Werte
        $zaehler = random_int(1, 1000);
        $nenner = random_int(0, 10);

        // Eingaben überschreiben die Default-Werte
        if (isset($_POST["zaehler"]) && isset($_POST["nenner"])) {
            $zaehler = $_POST["zaehler"];
            $nenner = $_POST["nenner"];
        }

        // Nachrichten-Array
        $nachrichten = array();

        // Ausrechnen Ergebnis ohne Exception
        $ergebnis1 = dividiere($zaehler, $nenner);

        // Falls das Ergebnis FALSE ist, so wird eine Nachricht erzeugt
        if ($ergebnis1 === FALSE) {
            $nachrichten[] = "Division ohne Exception lieferte 'FALSE'";

            // Zur Visualisierung
            $ergebnis1 = "-";
        }

        // Ausrechnen mit Exception
        try {
            $nachrichten[] = "Vor einem Aufruf von 'dividiereMitException'";
            $ergebnis2 = dividiereMitException($zaehler, $nenner);
            $nachrichten[] = "Nach einem Aufruf von 'dividiereMitException'";
        }
        catch (Exception $e) {
            $nachrichten[] = "Exception wurde geworfen: " . $e;

            // Zur Visualisierung
            $ergebnis2 = "-";
        }
        finally {
            $nachrichten[] = "Innerhalb von 'finally'";
        }
    ?>


    <form action="b03.php?" method="POST" style="padding: 5px;">
        <input type="text" name="zaehler" size="5" value="<?=$zaehler?>"/>
        <span>/</span>
        <input type="text" name="nenner" size="5" value="<?=$nenner?>"/>
        <span>=</span>
        <span><?=$ergebnis1?></span>
        <span>|</span>
        <span><?=$ergebnis2?></span>
        <input type="submit" value="Ok" name="weiter">

        <div style="border: 1px dotted lightgray; margin-top: 10px">
            <h2 style="margin: 0; padding: 5px; background-color: #efefef">Nachrichten</h2>
            <div style="padding: 5px;">
            <?php
                echo implode("<br/>", $nachrichten);
            ?>
            </div>
        </div>
    </form>
    <?php


    ?>
    </body>
</html>
