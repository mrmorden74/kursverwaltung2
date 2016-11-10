<?php
require_once('inc/init.inc.php');
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<title>Kurverwaltung 2.0</title>
</head>
<body>
	<?php
	use Kursverwaltung\Personen\Kunde;
	// use Kursverwaltung\Kurse\Kurs;
	$test = new Kunde();
	$test->kundennummer = 'KdNr-000011'; // ruft __set auf
	$test->vorname = 'Max';
	$test->nachname = 'Musterman';
	$test->adresse = 'Straße 1';
	$test->plz = '1000';
	$test->ort = 'Irgendwo';
	$test->telefon = '01123456789';
	$test->email = 'test@test.at';
	$test->save();
	?>
</body>
</html>