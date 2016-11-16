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
		if (!is_object($value)) {
        	throw new \Exception('Fehler 666: Objekt ist kein Objekt');
    	}
		// SQL zusammen setzen
		// var_dump($value);
		$tbl = $value->config['tableName'];
		$pre = $value->config['prefix'];
		$fields = $value->config['columns'];
		$sqlPrep = 'INSERT INTO '.$tbl.' SET ';
		$PrepTyp = '';
		$PrepVal = [];
		$fill = '';
		foreach ($fields as $key => $wert) {
			// $wert['auto'] ?? false
			if (array_key_exists('auto',$wert) && $wert['auto'] === true) continue;
			$sqlPrep .= $fill.$pre.$key.' = ?';
			$PrepTyp .= self::getPrepDataTyp($wert['datatyp']);
			$$key = $value->$key;
			$PrepVal[] = &$$key;
			$fill = ', ';
			// echo $key.'<br>';
		}
		$sqlPrep .= ';';
		array_unshift($PrepVal, $PrepTyp);
		$prepare = self::prepareSql($sqlPrep);
		$execute = self::executSql($prepare,$PrepVal);
        return $execute;
    }

    public static function update($value)
    {
        //check ob Connection vorhanden ist
        self::checkConnection();

		// check ob Objekt
		if (!is_object($value)) {
        	throw new \Exception('Fehler 666: Objekt ist kein Objekt');
    	}
		// SQL zusammen setzen
		// var_dump($value);
		$tbl = $value->config['tableName'];
		$pre = $value->config['prefix'];
		$primary = $value->config['primaryKey'];
		$fields = $value->config['columns'];
		$sqlPrep = 'UPDATE '.$tbl.' SET ';
		$PrepTyp = '';
		$PrepVal = [];
		$fill = '';
		foreach ($fields as $key => $wert) {
			// $wert['auto'] ?? false
			var_dump ($key);
			if ($primary === $key) {
				// Variablen für WHERE setzen, werden erst am Ende angefügt
				$id_value = $value->$key;
				$PrepTypPrim = self::getPrepDataTyp($wert['datatyp']);

				continue;
			} 
			$sqlPrep .= $fill.$pre.$key.' = ?';
			$PrepTyp .= self::getPrepDataTyp($wert['datatyp']);
			$$key = $value->$key;
			$PrepVal[] = &$$key;
			$fill = ', ';
			// echo $key.'<br>';
		}
		$sqlPrep .= ' WHERE '.$pre.$primary.'=?;';
		$PrepVal[] = &$id_value;
		$PrepTyp .= $PrepTypPrim;
		echo $sqlPrep;
		var_dump ($PrepVal);
		array_unshift($PrepVal, $PrepTyp);
		$prepare = self::prepareSql($sqlPrep);
		$execute = self::executSql($prepare,$PrepVal);
        return $execute;
    }

    public static function delete($value)
    {
        //check ob Connection vorhanden ist
        self::checkConnection();

		// check ob Objekt
		if (!is_object($value)) {
        	throw new \Exception('Fehler 666: Objekt ist kein Objekt');
    	}
		// SQL zusammen setzen
		// var_dump($value);
		$tbl = $value->config['tableName'];
		$pre = $value->config['prefix'];
		$primary = $value->config['primaryKey'];
		$fields = $value->config['columns'];
		$sqlPrep = 'DELETE FROM  '.$tbl.' ';
		$PrepTyp = '';
		$PrepVal = [];
		$fill = '';
		foreach ($fields as $key => $wert) {
			// $wert['auto'] ?? false
			var_dump ($key);
			if ($primary === $key) {
				$id_value = $value->$key;
				$PrepTypPrim = self::getPrepDataTyp($wert['datatyp']);
				continue;
			} 
			// $sqlPrep .= $fill.$pre.$key.' = ?';
			// $PrepTyp .= self::getPrepDataTyp($wert['datatyp']);
			// $$key = $value->$key;
			// $PrepVal[] = &$$key;
			$fill = ', ';
			// echo $key.'<br>';
		}
		$sqlPrep .= ' WHERE '.$pre.$primary.'=?;';
		$PrepVal[] = &$id_value;
		$PrepTyp .= $PrepTypPrim;
		echo $sqlPrep;
		var_dump ($PrepVal);
		array_unshift($PrepVal, $PrepTyp);
		$prepare = self::prepareSql($sqlPrep);
		$execute = self::executSql($prepare,$PrepVal);
        return $execute;
    }
    public static function select($value)
    {
        //check ob Connection vorhanden ist
        self::checkConnection();

		// check ob Objekt
		if (!is_object($value)) {
        	throw new \Exception('Fehler 666: Objekt ist kein Objekt');
    	}
		// SQL zusammen setzen
		// var_dump($value);
		$tbl = $value->config['tableName'];
		$pre = $value->config['prefix'];
		$primary = $value->config['primaryKey'];
		$fields = $value->config['columns'];
		$sqlPrep = 'SELECT ';
		$PrepTyp = '';
		$PrepVal = [];
		$fill = '';
		foreach ($fields as $key => $wert) {
			// $wert['auto'] ?? false
			var_dump ($key);
			if ($primary === $key) {
				$id_value = $value->$key;
				$PrepTypPrim = self::getPrepDataTyp($wert['datatyp']);
				continue;
			} 
			$sqlPrep .= $fill.$pre.$key.' = ?';
			$PrepTyp .= self::getPrepDataTyp($wert['datatyp']);
			$$key = $value->$key;
			$PrepVal[] = &$$key;
			$fill = ', ';
			// echo $key.'<br>';
		}
		$sqlPrep .= ' FROM  '.$tbl.' WHERE '.$pre.$primary.'=?;';
		$PrepVal[] = &$id_value;
		$PrepTyp .= $PrepTypPrim;
		echo $sqlPrep;
		var_dump ($PrepVal);
		array_unshift($PrepVal, $PrepTyp);
		$prepare = self::prepareSql($sqlPrep);
		$execute = self::executSql($prepare,$PrepVal);
        return $execute;
    }    
	private static function getPrepDataTyp($value)
	{
		switch ($value) {
			case 'int':
				return 'i';
				break;
			case 'email':
			case 'regex':
			case 'string':
				return 's';
				break;
			case 'float':
				return 'd';
				break;
			case 'blob':
				return 'b';
				break;
			default:
           		throw new \Exception('Fehler 5733: Ungültiger Datentyp in Config');
		   		break;
		}
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
        $conn->set_charset("utf8"); /** gewünschte Kollation definieren*/
        return $conn;
    }

	private static function prepareSql($sql) 
	{
		$stmt = self::$connection->prepare($sql);
		if(!$stmt) {
			throw new \Exception('Fehler 4451: Daten können nicht geschrieben werden');
		}
		return $stmt;
	}
	private static function executSql($stmt,$stmtParams) 
	{
		// $stmt = self::$connection->prepare($sql) or trigger_error($stmt->error, E_USER_ERROR);
		call_user_func_array([$stmt, 'bind_param'], $stmtParams);
		// $stmt->execute();
		if ($stmt->execute()) {
			// $msg = '<p class="success">Datensatz '.$_POST['Vorname'].' '.$_POST['Nachname'].' ('.$_POST['Kundennummer'].') '.'erfolgreich hinzugefügt!</p>';
			$msg = '<p class="success">Datensatz wurde erfolgreich hinzugefügt! ID: '.self::$connection->insert_id.'</p>';
			// foreach($_POST as $key => $val) {
			// 	$_POST[$key]=''; // Formular löschen für weiteren Datensatz
			// }
		} else {
			if ($stmt->errno === 1062) {
				$msg = '<p class="error">Die Kundennummer ist bereits in Verwendung</p>';
			} else {
				$msg = '<p class="error">Datensatz konnte nicht hinzugefügt werden!<br>Fehlernummer: '.$stmt->errno.'</p>';
			}
			// throw new \Exception('Fehler beim Ausführen des Statements: '. mysqli_stmt_error($stmt));
			throw new \Exception('Fehler beim Ausführen des Statements: '. $stmt->error);
		}
		echo $msg;
		$stmt->close();
		return self::$connection->insert_id ;
    }
}
