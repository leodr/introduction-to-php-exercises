<?php
class Person {
    private $vorname;
    private $nachname;
    private $geburtsdatum;

    public function __construct($vorname, $nachname, $geburtsdatum) {
        $this->setVorname($vorname);
        $this->setNachname($nachname);
        $this->setGeburtsdatum($geburtsdatum);
    }

    public function getVorname() {
        return $this->vorname;
    }
    
    public function setVorname($name) {
        if (!is_string($name)) {
            throw new TypException("vorname", "string");
        }
        $this->vorname = $name;
    }

    public function getNachname() {
        return $this->nachname;
    }

    public function setNachname($name) {
        if (!is_string($name)) {
            throw new TypException("nachname", "string");
        }
        $this->nachname = $name;
    }

    public function getGeburtsdatum() {
        return $this->geburtsdatum;
    }
    
    public function setGeburtsdatum($datum) {
        if (!is_string($datum)) {
            throw new TypException("geburtsdatum", "string");
        }
        $this->geburtsdatum = new Datum($datum);
    }

    public function getVollerName() {
        return $this->getVorname() . ' ' . $this->getNachname();
    }

    public function __toString() {
        return __class__ . ': '. $this->getVollerName() . ' ' . '(Geburtsdatum: ' . $this->getGeburtsdatum() . ')';
    }
}
?>
