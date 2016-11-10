<?php
namespace Kursverwaltung\Utilities; 
class Config {
	private static $dbConfig = [
		'host' => 'localhost',
		'user' => 'root',
		'password' => '',
		'database' => 'kurse'
	];

	private static $kundeConfig = [
		'tableName' => 'kunden',
		'prefix' => 'kunden_',
		'columns' => [
			'id' => ['required','auto'],
			'kundennummer' => ['required'],
			'vorname' => ['required', 'string'],
			'nachname' => ['required', 'string'],
			'adresse' => ['required'],
			'plz' => ['required'],
			'ort' => ['required'],
			'telefon' => ['required']
		]
	];

	public static function getDbConfig() {
		return self::$dbConfig;
	}

	public static function getKundeConfig() {
		return self::$kundeConfig;
	}
}