<h1>Übersicht</h1>

<style>            
    table, th, td {
        border: 1px solid lightgray;
    }
    th {
        background-color: #efefef;
    }
    td {
        padding: 5px;
    }
</style>

<?php
    // "seite" aus der Session löschen, so dass beim nächsten laden oder bei einem Klick auf "Ok"
    // alles wieder bei der ersten Seite beginnt
    unset($_SESSION["seite"]);

    foreach ($_SESSION as $seite => $array) {
        echo "<div>";
        echo "<h2>Eingabe auf der Seite '$seite'</h2>";
        
        echo "<table>";
        foreach ($array as $name => $wert) {
            echo "<tr>";
            echo "<td>$name</td>";
            echo "<td>$wert</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }
?>

<form action="b01.php?" method="POST" style="padding: 5px; margin-top: 10px;">       
    <input type="submit" value="Ok" name="Ok">
</form>


