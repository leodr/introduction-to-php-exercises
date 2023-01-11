<?php 
class Vorlesung {
    private $titel;
    private $sws;
    private $dozenten;

    public function __construct($titel, $sws, $dozenten = array()) {
		$this->dozenten = array();
        $this->setTitel($titel);
        $this->setSWS($sws);
        $this->setDozenten($dozenten);
    }

    public function getTitel() {
        return $this->titel;
    }

    public function setTitel($titel) {
        if (!is_string($titel)) {
            throw new TypException("titel", "string");
        }
        $this->titel = $titel;
    }

    public function getSWS() {
        return $this->sws;
    }

    public function setSWS($sws) {
        if (!is_int($sws)) {
            throw new TypException("sws", "int");
        }
        $this->sws = $sws;
    }

    public function getDozenten() {
        return $this->dozenten;
    }

    public function setDozenten($dozenten) {
        if (!is_array($dozenten)) {
            $dozenten = array($dozenten);
        }
        if (count($dozenten) == 0 || count($dozenten) > 3) {
            throw new Exception("Die Anzahl der Dozenten muss größer 0 und kleiner-gleich 3 sein");
        }
        // Dozent über die fuegeDozentHinzu-Methode hinzufügen
        foreach ($dozenten as $dozent) {
            $this->fuegeDozentHinzu($dozent);
        }
    }
    
    public function fuegeDozentHinzu($dozent) {
        if (count($this->dozenten) > 2) {
            throw new Exception("Die Anzahl der Dozenten darf nicht mehr als 3 sein.");
        }
		// 2a) Ändern Sie diese Klasse, dass nur noch Objekte der Klasse Dozent akzeptiert werden.

        // 2b) Stellen Sie sicher, dass ein Dozent nicht zweimal hinzugefügt 
		// werden kann, indem Sie eine eigene DoppeltException für diesen Fall
		// definieren und werfen. Fangen Sie diese Exception separat.       

        $this->dozenten[] = $dozent;
    }

    public function __toString() {
        $ergebnis = $this->titel . ', ' . $this->sws . ' SWS, ';
        $liste = 'Dozenten: ';
        foreach ($this->dozenten as $element) {
            $liste .= ''.$element.', ';
        }
        $ergebnis .= $liste;
        return $ergebnis;
    }

    public function __destruct() {
        echo '// Aufruf des Destruktors von Vorlesung ' . $this->getTitel() . '<br />';
    }

}
?>
