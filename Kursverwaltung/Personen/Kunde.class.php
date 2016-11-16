<?php 
namespace Kursverwaltung\Personen;
use Kursverwaltung\Utilities\DB;
use Kursverwaltung\Utilities\Config;
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
	
	private $config;

	public function __construct() {
		$this->config = Config::getKundeConfig();
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
		if (!isset($this->id)) {
			$this->id = DB::insert($this);
		} else {
			DB::update($this);
		}
	}
	public function delete () {
		echo $this->id;
		
		if (isset($this->id)) {
			$this->id = DB::delete($this);
			unset($this->id);
		} else {
				throw new \Exception('Kein Datensatz zum Löschen gefunden');
		}
		
	}
	public function select () {
		echo $this->id;
		
		if (isset($this->id)) {
			$this->id = DB::select($this);
			var_dump($this);
		} else {
				throw new \Exception('Datensatz nicht gefunden');
		}
		
	}
}