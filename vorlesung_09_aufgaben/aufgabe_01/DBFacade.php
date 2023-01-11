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
            $sql = 'SELECT COUNT(*) as anzahl FROM benutzer WHERE login=:login AND passwort=:passwort;';
            $statement = $db->prepare($sql);
            $statement->bindParam(':login', $benutzername);
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

    // 1a) Schreiben Sie die Funktion addToDB($spielbegegnung), die als Parameter 
    // ein Objekt der Klasse Spielbegegnung übergeben bekommt und diese in der
    // Datenbank speichert. Diese Funktion soll die bisherige Funktion addToFile()
    // ersetzen.
    public function addToDB($spielbegegnung)
    {
        $db = $this->getConnection();
        try {
            $sql = 'INSERT INTO spielbegegnungen(jahr, spieltag, heimmannschaft, auswaertsmannschaft, heim_tore, auswaerts_tore) VALUES (:spieljahr, :spieltag, :heimmannschaft, :auswaertsmannschaft, :heim_tore, :auswaerts_tore)';
            $statement = $db->prepare($sql);
            $statement->bindParam(':spieljahr', $spielbegegnung->spieljahr);
            $statement->bindParam(':spieltag', $spielbegegnung->spieljahr);
            $statement->bindParam(':heimmannschaft', $spielbegegnung->spieljahr);
            $statement->bindParam(':auswaertsmannschaft', $spielbegegnung->auswaertsmannschaft);
            $statement->bindParam(':heim_tore', $spielbegegnung->heim_tore);
            $statement->bindParam(':auswaerts_tore', $spielbegegnung->auswaerts_tore);
            $statement->execute();
        } catch (PDOException $ex) {
            echo 'Datenbank-Fehler! <!-- ' . $ex->getMessage() . ' -->';
            die();
        }
    }

    // 1b) Ersetzen Sie im php-Skript ergebnisse_auflisten.php den Aufruf fopen
    // durch einen Datenbankzugriff mittels PDO, welches die Spielbegegnungen
    // zurückliefert.
    public function getSpielbegegnungen()
    {
        $db = $this->getConnection();
        try {
            $sql = 'SELECT * FROM spielbegegnungen';
            $statement = $db->prepare($sql);
            $statement->execute();

            $spielbegegnungen = array();

            while($row = $statement->fetch()) {
                array_push(
                    $spielbegegnungen,
                    new Spielbegegnung(
                        $row['jahr'],
                        $row['spieltag'],
                        $row['$heimmannschaft'],
                        $row['$auswaertsmannschaft'],
                        $row['$heim_tore'],
                        $row['$auswaerts_tore']
                    )
                );
            }

            return $spielbegegnungen;
        } catch (PDOException $ex) {
            echo 'Datenbank-Fehler! <!-- ' . $ex->getMessage() . ' -->';
            die();
        }
    }

    // 1c) Erweitern Sie die Anzeige der Fussballergebnisse um eine Combobox für das 
    // Spieljahr, die zur Filterung verwendet wird. Die Box soll mit den aktuell
    // vorhandenen Spieljahren aus der Datenbank gefüllt werden. Des Weiteren
    // soll es den Eintrag ‚Alle‘ in der Combobox geben, der initial ausgewählt
    // ist oder falls der Post-Wert zur combobox-Auswahl leer ist.
    // Bei der Auswahl ‚Alle‘ werden die Spielbegegnungen zu allen Jahren angezeigt.

}
