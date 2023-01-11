<?php

class Dozent extends Person
{
  private $fachbereich;
  private $titel;

  public function getFachbereich()
  {
    return $this->fachbereich;
  }

  public function setFachbereich($fachbereich)
  {
    $this->fachbereich = $fachbereich;
  }

  public function getTitel()
  {
    return $this->titel;
  }

  public function setTitel($titel)
  {
    $this->titel = $titel;
  }

  public function __construct($vorname, $nachname, $geburtsdatum, $fachbereich, $titel)
  {
    parent::__construct($vorname, $nachname, $geburtsdatum);
    $this->fachbereich = $fachbereich;
    $this->titel = $titel;
  }

  public function __toString()
  {
    return parent::__toString() . " Fachbereich: " . $this->fachbereich . " Titel: " . $this->titel;
  }
}
