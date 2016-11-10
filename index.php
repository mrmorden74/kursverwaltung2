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
	use Kursverwaltung\Kurse\Kurs;
	$test = new Kurs();
	var_dump($test);
	?>
</body>
</html>