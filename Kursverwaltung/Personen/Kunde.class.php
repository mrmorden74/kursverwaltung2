<?php 
namespace Kursverwaltung\Personen;
class Kunde {

	public function test () {
		return 'test';
	}

	private $id;
	private $kundennummer;
	private $vorname;
	private $nachname;
	private $adresse;
	private $plz;
	private $ort;
	private $telefon;
	private $email;

	public function __construct() {

	}

	public function __set($name, $value)
	{
		if (property_exists($this, $name)) {
			$this->$name = $value;
		} else {
				throw new \Exception('Ungültiger Zugriff!!!!!!!!!!!!!!!');	
		}
	}

	public function __get($name) {
		if (property_exists($this, $name)) {
			return $this->$name;
		} else {
				throw new \Exception('Ungültiger Zugriff!!!!!!!!!!!!!!!');	
		}

	}


}