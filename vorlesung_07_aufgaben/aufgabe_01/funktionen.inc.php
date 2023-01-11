<?php
    function dividiere($zaehler, $nenner) {
        if ($nenner == 0) {
            return FALSE;
        }

        return sprintf("%.2f", $zaehler / $nenner);
    }

    function dividiereMitException($zaehler, $nenner) {
        if ($nenner == 0) {
            throw new Exception("Division durch 0");
        }

        return sprintf("%.2f", $zaehler / $nenner);
    }

?>

