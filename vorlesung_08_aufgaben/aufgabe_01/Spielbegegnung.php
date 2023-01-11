<?php

class Spielbegegnung
{
  // Aufgabe 1a) Fügen Sie der Klasse Attribute für das Spieljahr, den Spieltag,
  //	           Heimmannschaft, Auswärtsmannschaft, Heimtore und Auswaertstore hinzu.

  private $spieljahr;
  private $spieltag;
  private $heimmannschaft;
  private $auswaertsmannschaft;
  private $heimtore;
  private $auswaertstore;

  // Aufgabe 1b) Fügen Sie zu jedem Attribut Setter- und Getter-Methoden hinzu, welche die 
  //             Prüfungen auf den Objektattributen vornimmt analog zu den Prüfungen aus der 
  //             Vorlesung 6 in Aufgabe 2. Bei einem Fehler wird eine Exception mit 
  //             aussagekräftigem Text geworfen.

  // Aufgabe 1c) Geben Sie der Klasse einen Konstruktor mit 6 Parametern, der 
  //             die Attribute die Parameterwerte über die Setter-Methoden zuweist.

  public function __construct($spieljahr, $spieltag, $heimmannschaft, $auswaertsmannschaft, $heimtore, $auswaertstore)
  {
    $this->setSpieljahr($spieljahr);
    $this->setSpieltag($spieltag);
    $this->setHeimmannschaft($heimmannschaft);
    $this->setAuswaertsmannschaft($auswaertsmannschaft);
    $this->setHeimtore($heimtore);
    $this->setAuswaertstore($auswaertstore);
  }

  // Aufgabe 1d) Fügen Sie der Klasse die Methode getSpielergebnis() hinzu, die
  //	           das Spielergebnis mit Hilfe der Attribute in der Form 
  //             “heimtore:auswaertstore” zurückliefert.
  public function getSpielergebnis()
  {
    return $this->getHeimtore() . ':' . $this->getAuswaertstore();
  }

  // Aufgabe 1e) Fügen Sie der Klasse die Methode getCSVFormat() hinzu, welche 
  //             die Objektattribute als String mit Semikolon getrennt zurückliefert.

  public function getCSVFormat()
  {
    return implode(';', array(
      $this->getSpieljahr(),
      $this->getSpieltag(),
      $this->getHeimmannschaft(),
      $this->getAuswaertsmannschaft(),
      $this->getHeimtore(),
      $this->getAuswaertstore()
    ));
  }

  /**
   * @return mixed
   */
  public function getSpieljahr()
  {
    return $this->spieljahr;
  }

  /**
   * @param mixed $spieljahr 
   * @return self
   */
  public function setSpieljahr($spieljahr): self
  {
    if ((is_numeric($spieljahr) and $spieljahr >= 1800 and $spieljahr < 2100)) {
      $this->spieljahr = $spieljahr;
    } else {
      throw new Exception("Wrong year input.");
    }

    return $this;
  }

  /**
   * @return mixed
   */
  public function getSpieltag()
  {
    return $this->spieltag;
  }

  /**
   * @param mixed $spieltag 
   * @return self
   */
  public function setSpieltag($spieltag): self
  {
    if (is_numeric($spieltag) && $spieltag >= 1 & $spieltag < 40) {
      $this->spieltag = $spieltag;
    } else {
      throw new Exception("Wrong spieltag input.");
    }

    return $this;
  }

  /**
   * @return mixed
   */
  public function getHeimmannschaft()
  {
    return $this->heimmannschaft;
  }

  /**
   * @param mixed $heimmannschaft 
   * @return self
   */
  public function setHeimmannschaft($heimmannschaft): self
  {
    if (empty($auswaertsmannschaft)) {
      throw new Exception("Heimmannschaft darf nicht leer sein.");
    } else {
      $this->heimmannschaft = $heimmannschaft;
    }

    return $this;
  }

  /**
   * @return mixed
   */
  public function getAuswaertsmannschaft()
  {
    return $this->auswaertsmannschaft;
  }

  /**
   * @param mixed $auswaertsmannschaft 
   * @return self
   */
  public function setAuswaertsmannschaft($auswaertsmannschaft): self
  {
    if (empty($auswaertsmannschaft)) {
      throw new Exception("Auswaertsmannschaft darf nicht leer sein.");
    } else {
      $this->auswaertsmannschaft = $auswaertsmannschaft;
    }

    return $this;
  }

  /**
   * @return mixed
   */
  public function getHeimtore()
  {
    return $this->heimtore;
  }

  /**
   * @param mixed $heimtore 
   * @return self
   */
  public function setHeimtore($heimtore): self
  {
    if (is_numeric($heimtore)) {
      $this->heimtore = $heimtore;
    } else {
      throw new Exception("Heimtore müssen eine Zahl sein.");
    }

    return $this;
  }

  /**
   * @return mixed
   */
  public function getAuswaertstore()
  {
    return $this->auswaertstore;
  }

  /**
   * @param mixed $auswaertstore 
   * @return self
   */
  public function setAuswaertstore($auswaertstore): self
  {
    if (is_numeric($auswaertstore)) {
      $this->auswaertstore = $auswaertstore;
    } else {
      throw new Exception("auswaertstore müssen eine Zahl sein.");
    }

    return $this;
  }
}
