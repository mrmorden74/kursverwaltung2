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
	$test->id = '1';
	$test->kundennummer = 'KdNr-000001'; // ruft __set auf
	$test->vorname = 'Habakuk'; // ruft __set auf

	$test->save();
	?>
</body>
</html>