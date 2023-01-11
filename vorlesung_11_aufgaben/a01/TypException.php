<?php

class TypException extends Exception {

    public function __construct($attribut, $typ) {
        parent::__construct("Attribut '<b>" . $attribut . "</b>' muss vom Typ <b>" . $typ . "</b> sein.");
    }
}


?>
