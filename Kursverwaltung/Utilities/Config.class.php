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

	];

	public static function getDbConfig() {
		return self::$dbConfig;
	}

	public static function getKundeConfig() {
		return self::$kundeConfig;
	}
}