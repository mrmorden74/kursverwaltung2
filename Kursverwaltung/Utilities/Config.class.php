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
		'primaryKey' => 'id',
		'columns' => [
			'id' => [
				'auto' => true,
				'datatyp' => 'int'
				],
			'kundennummer' => [
				'required' => true,
				'max' => 25,
				'datatyp' => 'string'
				],
			'vorname' => [
				'required' => true,
				'max' => 255,
				'datatyp' => 'string'
				],
			'nachname' => [
				'required' => true,
				'max' => 255,
				'datatyp' => 'string'
				],
			'adresse' => [
				'required' => true,
				'max' => 255,
				'datatyp' => 'string'
				],
			'plz' => [
				'required' => true,
				'max' => 4,
				'datatyp' => 'string'
				],
			'ort' => [
				'required' => true,
				'max' => 80,
				'datatyp' => 'string'
				],
			'telefon' => [
				'required' => true,
				'max' => 32,
				'datatyp' => 'string'
				],
			'email' => [
				'required' => true,
				'max' => 120,
				'datatyp' => 'email'
				]
		]
	];

	public static function getDbConfig() {
		return self::$dbConfig;/** Lesezugriff auf $dbConfig */
	}

	public static function getKundeConfig() {
		return self::$kundeConfig;
	}

}