<?php

/**
 * @author Michael Hasseler
 */
class DBFacade
{

  private $dbConnection;

  /**
   * instance
   *
   * Statische Variable, um die aktuelle (einzige!) Instanz dieser Klasse zu halten
   *
   * @var Singleton
   */
  protected static $_instance = null;

  /**
   * get instance
   *
   * Falls die einzige Instanz noch nicht existiert, erstelle sie
   * Gebe die einzige Instanz dann zurück
   *
   * @return   Singleton
   */
  public static function getInstance()
  {
    if (null === self::$_instance) {
      self::$_instance = new self;
    }
    return self::$_instance;
  }

  /**
   * externe Instanzierung verbieten
   */
  protected function __construct()
  {
    $this->dbConnections = null;
    $this->notAvailableConnections = array();
  }

  /**
   *
   * Kopieren der Instanz von aussen ebenfalls verbieten
   */
  protected function __clone()
  {
  }

  private function getConnection()
  {
    if ($this->dbConnections === null) {
      $dbpwdLocation = 'C:/xampp/db_user.pwd';
      try {
        $dbhost = 'localhost';
        $dbUser = 'user_phpws2021';
        $dbName = 'phpws2021';
        $pwd = trim(file_get_contents($dbpwdLocation));
        $this->dbConnection = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbName . ';charset=utf8', $dbUser, $pwd);
        $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        unset($pwd);
      } catch (PDOException $e) {
        print date('Y-m-d H:i:s ') . "ERROR!: " . $e->getMessage() . PHP_EOL;
        $this->dbConnection = null;
      }
    }
    return $this->dbConnection;
  }



  public function sindLoginDatenBekannt($benutzername, $passwort)
  {
    $db = $this->getConnection();
    try {
      $sql = 'SELECT COUNT(*) as anzahl FROM benutzer WHERE login=:benutzername AND passwort=:passwort;';
      $statement = $db->prepare($sql);
      $statement->bindParam(':benutzername', $benutzername);
      $statement->bindParam(':passwort', $passwort);
      $statement->execute();
      $count = $statement->fetchColumn();
      if ($count > 0) {
        $this->aktualiereAnmeldedatum($benutzername);
        return true;
      } else {
        return false;
      }
    } catch (PDOException $ex) {
      echo 'Datenbank-Fehler! <!-- ' . $ex->getMessage() . ' -->';
      die();
    }
  }

  private function aktualiereAnmeldedatum($benutzername)
  {
    $db = $this->getConnection();
    try {
      $sql = 'UPDATE benutzer SET angemeldet_am = now() WHERE login=:login';
      $statement = $db->prepare($sql);
      $statement->bindParam(':login', $benutzername);
      $statement->execute();
    } catch (PDOException $ex) {
      echo 'Datenbank-Fehler! <!-- ' . $ex->getMessage() . ' -->';
      die();
    }
  }
}
