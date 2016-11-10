<?php 
namespace Kursverwaltung\Personen;
use Kursverwaltung\Utilities\DB;
/** 
* Entspricht einem Datensatz in der Tabelle kunden.
* Erlaubt crud Funktionalitäten
*/
class Kunde {
	private $id;
	private $kundennummer;
	private $vorname;
	private $nachname;
	private $adresse;
	private $plz;
	private $ort;
	private $telefon;
	private $email;
	private $dbConnection;

	public function __construct() {
	
	}

	/**
	* Setter
	* @public
	* @param string $name
	* @param mixed $value 
	*/
	public function __set($name, $value)
	{
		if (property_exists($this, $name)) {
			$this->$name = $value;
		} else {
				throw new \Exception('Ungültiger Zugriff!!!!!!!!!!!!!!!');	
		}
	}

	/**
	* Getter
	* @public
	* @param string $name
	*/
	public function __get($name) {
		if (property_exists($this, $name)) {
			return $this->$name;
		} else {
				throw new \Exception('Ungültiger Zugriff!!!!!!!!!!!!!!!');	
		}

	}

	public function save () {
		/* Wir brauchen DB connection, validInfos 

		*/
		DB::insert();
	}

}