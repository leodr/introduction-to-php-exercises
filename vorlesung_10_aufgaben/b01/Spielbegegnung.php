<?php

class Spielbegegnung {

    private $spieljahr;
    private $spieltag;
    private $heimmannschaft;
    private $auswaertsmannschaft;
    private $heimtore;
    private $auswaertstore;

    public function getSpieljahr() {
        return $this->spieljahr;
    }
    
    public function setSpieljahr($spieljahr) {
        if (empty($spieljahr)) {
            throw new Exception('Bitte alle Pflichtfelder ausfüllen.');
        }
        if (!is_numeric($spieljahr)) {
            throw new Exception('Die Eingabe des Jahres ist nicht numerisch.');
        } else if ($spieljahr < 1800 || $spieljahr > 2100) {
            throw new Exception('Die Eingabe der Jahreszahl liegt nicht im Bereich 1800 bis 2100.');
        }
        $this->spieljahr = $spieljahr;
    }

    public function getSpieltag() {
        return $this->spieltag;
    }
    
    public function setSpieltag($spieltag) {
        if (empty($spieltag)) {
            throw new Exception('Bitte alle Pflichtfelder ausfüllen.');
        }
        if (!is_numeric($spieltag)) {
            throw new Exception('Die Eingabe des Spieltages ist nicht numerisch.');
        } else if ($spieltag < 1 || $spieltag > 40) {
            throw new Exception('Die Eingabe des Spieltages liegt nicht im Bereich 1 bis 40.');
        }
        $this->spieltag = $spieltag;
    }

    public function getHeimmannschaft() {
        return $this->heimmannschaft;
    }
    
    public function setHeimmannschaft($heimmannschaft) {
        if (empty($heimmannschaft)) {
            throw new Exception('Bitte alle Pflichtfelder ausfüllen.');
        }
		// 1.b) Versuchen Sie einen Cross-Site-Scripting-Angriff bei den Nutzer- 
		// eingaben und sichern Sie die Skripte bei notwendigen Stellen dagegen ab.
        $this->heimmannschaft = $heimmannschaft;
    }
    
    public function getAuswaertsmannschaft() {
        return $this->auswaertsmannschaft;
    }
    
    public function setAuswaertsmannschaft($auswaertsmannschaft) {
        if (empty($auswaertsmannschaft)) {
            throw new Exception('Bitte alle Pflichtfelder ausfüllen.');
        }
		// 1.b) Versuchen Sie einen Cross-Site-Scripting-Angriff bei den Nutzer- 
		// eingaben und sichern Sie die Skripte bei notwendigen Stellen dagegen ab.
        $this->auswaertsmannschaft = $auswaertsmannschaft;
    }
    
    public function getHeimtore() {
        return $this->heimtore;
    }
    
    public function setHeimtore($heimtore) {
        if (empty($heimtore) && $heimtore !== '0') {
            throw new Exception('Bitte alle Pflichtfelder ausfüllen.');
        }
        if (!is_numeric($heimtore)) {
            throw new Exception('Die Eingabe der Heimtore ist nicht numerisch.');
        }
        $this->heimtore = $heimtore;
    }

    public function getAuswaertstore() {
        return $this->auswaertstore;
    }
    
    public function setAuswaertstore($auswaertstore) {
        if (empty($auswaertstore) && $auswaertstore !== '0') {
            throw new Exception('Bitte alle Pflichtfelder ausfüllen.');
        }
        if (!is_numeric($auswaertstore)) {
            throw new Exception('Die Eingabe der Auswaertstore ist nicht numerisch.');
        }
        $this->auswaertstore = $auswaertstore;
    }

    public function __construct($spieljahr, $spieltag, $heimmannschaft, $auswaertsmannschaft, $heimtore, $auswaertstore) {
        $this->setSpieljahr($spieljahr);
        $this->setSpieltag($spieltag);
        $this->setHeimmannschaft($heimmannschaft);
        $this->setAuswaertsmannschaft($auswaertsmannschaft);
        $this->setHeimtore($heimtore);
        $this->setAuswaertstore($auswaertstore);
    }
    
    public function getSpielergebnis() {
        return $this->heimtore . ':' . $this->auswaertstore;
    }

    public function getCSVFormat() {
        return $this->spieljahr . ';' . $this->spieltag . ';' . $this->heimmannschaft . ';'
                . $this->auswaertsmannschaft . ';' . $this->heimtore . ';' . $this->auswaertstore;
    }

    public function __destruct() {
        echo '// Aufruf des Destruktors von Spielbegegnung<br />';
    }

    public function __toString() {
        return __class__ . ': ' . $this->spieljahr . ', ' . $this->spieltag . ', ' . $this->heimmannschaft . ', '
                . $this->auswaertsmannschaft . ', ' . $this->heimtore . ', ' . $this->auswaertstore;
    }

}

?>
