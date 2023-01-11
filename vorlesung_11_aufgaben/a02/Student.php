<?php

class Student extends Person {
    private $matrikelnr;
    private $studienfach;

    public function __construct($vorname, $nachname, $geburtsdatum, $matrikelnr, $studienfach) {
        parent::__construct($vorname, $nachname, $geburtsdatum);
        $this->setMatrikelNr($matrikelnr);
        $this->setStudienfach($studienfach);
    }

    public function getMatrikelNr() {
        return $this->matrikelnr;
    }

    public function setMatrikelNr($nummer) {
        if (!is_int($nummer)) {
            throw new TypException("matrikelnr", "int");
        }
        $this->matrikelnr = $nummer;
    }

    public function getStudienfach() {
        return $this->studienfach;
    }

    public function setStudienfach($fach) {
        if (!is_string($fach)) {
            throw new TypException("studienfach", "string");
        }
        $this->studienfach = $fach;
    }

    public function __toString() {
        return parent::__toString() . " eingeschrieben in '" . $this->studienfach . "' (Matrikelnummer: " . $this->matrikelnr . ")";
    }
}
?>
