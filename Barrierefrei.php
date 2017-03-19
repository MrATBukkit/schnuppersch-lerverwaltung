<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/table.css" media="screen">
<link rel="stylesheet" type="text/css" href="./css/print.css" media="print">
</head>
<body>
<?php
require_once('./scripte/datenbank.php');
require_once('./login/auth.php');
echo "<br><table border>
	<tr><th>Lehrer</th><th>Interesse</th><th>Lern-
	fähigkeit</th><th>Motivation</th><th>Genauigkeit</th><th>Ausdauer</th><th>Pünktlichkeit</th><th>Belastbar-
	keit</th><th>Arbeitstempo</th>
	<th>Folgsamkeit</th><th>Geschick-
	lichkeit</th><th>Leistungs-
	bereitschaft</th><th>Gewissen-
	haftigkeit</th><th>Auffassungsgabe</th></tr>";
$sql = "SELECT * FROM bewertung b join lehrer l on b.Lehrer_ID=l.LehrerID where b.Schueler_ID='".$_GET['id']."'";
//SQL Befehl wird ausgeführt und in db_erg gespeichert
$db_erg = mysqli_query( $db_link, $sql );
while ($zeile = mysqli_fetch_array($db_erg)) {
	echo "<tr><td>".$zeile['Vorname']." ".$zeile['Nachname']."</td>
	<td>".$zeile['Interesse']."</td>
	<td>".$zeile['Lernfaehigkeit']."</td>
	<td>".$zeile['Motivation']."</td>
	<td>".$zeile['Genauigkeit']."</td>
	<td>".$zeile['Ausdauer']."</td>
	<td>".$zeile['Puenktlichkeit']."</td>
	<td>".$zeile['Belastbarkeit']."</td>
	<td>".$zeile['Arbeitstempo']."</td>
	<td>".$zeile['Folgsamkeit']."</td>
	<td>".$zeile['Geschicklichkeit']."</td>
	<td>".$zeile['Leistungsbereitschaft']."</td>
	<td>".$zeile['Gewissenhaftigkeit']."</td>
	<td>".$zeile['Auffassungsgabe']."</td>
	</tr>";
}
echo "</table> ";
?>
</body>
</html>