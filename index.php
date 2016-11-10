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
	$test->vorname = 'Habakuk'; // ruft __set auf
	echo $test->vorname; // ruft __get auf
	var_dump($test);
	?>
</body>
</html>