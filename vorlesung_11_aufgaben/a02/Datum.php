<?php
class Datum {
    private $tag;
    private $monat;
    private $jahr;

    public function __construct($string) {
        $zerlegt = explode(".", $string);
        if (count($zerlegt) !== 3) {#
            throw new Exception("Datum-String '$string' hat nicht das richtig Format. Beispiel: 01.01.1970");
        }
        $this->setTag(intval($zerlegt[0]));
        $this->setMonat(intval($zerlegt[1]));
        $this->setJahr(intval($zerlegt[2]));
    }

    public function setTag($tag) {
        if (!is_int($tag)) {
            throw new TypException("tag", "int");
        }
        if ($tag < 1) {
            throw new Exception("Tag ist kleiner 1.");
        }
        $this->tag = $tag;
    }

    public function getTag() {
        return $this->tag;
    }

    public function setMonat($monat) {
        if (!is_int($monat)) {
            throw new TypException("monat", "int");
        }
        if ($monat < 1) {
            throw new Exception("Monat ist kleiner 1.");
        }
        $this->monat = $monat;
    }

    public function getMonat() {
        return $this->monat;
    }

    public function setJahr($jahr) {
        if (!is_int($jahr)) {
            throw new TypException("jahr", "int");
        }
        if ($jahr < 1) {
            throw new Exception("Jahr ist kleiner 1.");
        }
        $this->jahr = $jahr;
    }

    public function getJahr() {
        return $this->jahr;
    }

    public function __toString() {
        return $this->tag . "."  . $this->monat . "." . $this->jahr;
    }
}
?>