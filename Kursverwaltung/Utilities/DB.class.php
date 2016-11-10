<?php
namespace Kursverwaltung\Utilities;

class DB
{
    private static $connection;

    public static function insert($value)
    {
        //check ob Connection vorhanden ist
        self::checkConnection();

		// check ob Objekt

		// SQL zusammen setzen
		var_dump($value);
		$tbl = $value->config['tableName'];
		$pre = $value->config['prefix'];
		$fields = $value->config['columns'];
		$sql = 'INSERT INTO '.$tbl.' SET ';
		$fill = '';
		$count = 0;
		foreach ($fields as $key => $wert) {
			$field = self::getInsertFields($key,$wert);
			if ($count !== 0) {
			$sql .= $fill.$pre.$key.' = "'.$value->$key.'"';
			$fill = ', ';
			}
			$count++;
			// echo $key.'<br>';
		}
		$sql .= ';';
		echo $sql.'<br>';
    }
    
    private static function checkConnection()
    {
        if (self::$connection === null) {
            self::$connection = self::getConnection();
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
            $config['password'],
            $config['database']
        );

        if ($conn->connect_error !== null) {
            throw new \Exception('Datenbank Verbindungsfehler');
        }
        return $conn;
    }

	private static function getInsertFields($key,$value) {
		foreach ($value as $attr) {
		var_dump($attr);
			if 
		}
	}
}
