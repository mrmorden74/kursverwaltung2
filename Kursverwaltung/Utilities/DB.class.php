<?php
namespace Kursverwaltung\Utilities;

class DB
{
    private static $connection;

    public static function insert(object $value)
    {
        //check ob Connection vorhanden ist
        self::checkConnection();
    }
    
    private static function checkConnection()
    {
        if (self::$connection === null) {
            self::$connection = self::getConnection;
        }
    }

    /**
    * Erstellt Datenbankverbindung
    * @return resource mysqli Connection
    */
    private static function getConnection()
    {
        $config = Config::getDbConfig();
        $conn = new \mysqli(
            $config['host'],
            $config['user'],
            $config['passwort'],
            $config['database']
        );

        if ($mysqli->connect_error !== null) {
            throw new \Exception('Datenbank Verbindungsfehler');
        }
        return $conn;
    }
}
