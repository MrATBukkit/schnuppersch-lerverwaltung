<html> 
<head>
<link rel="stylesheet" type="text/css" href="./css/table.css" media="screen">
<link rel="stylesheet" type="text/css" href="./css/print.css" media="print">
<title> Alle Schueler </title>
</head>
<body>
<center>
<br>
<br>
<form method="GET" action="abfrage_schueler.php">
<input name="suche" type="text" alt="Suche">
<input type="submit" value="suchen">
</form>
<?php
$suche='';
if (isset($_GET['suche'])) {
	$suche=$_GET['suche'];
}
//Lädt aus dem Ordner  Scripten die Datei datenbank.php-
require_once('./scripte/datenbank.php');
require_once('./login/auth.php');
//Zeigt alle Schüler an
$sql = "SELECT * FROM schueler WHERE (Vorname like '%".$suche."%' or Nachname like '%".$suche."%')";
//Führt den Befehl in der sql Variable aus und Speichert das Ergebniss in db_erg
$db_erg = mysqli_query( $db_link, $sql );
echo "<table border>
	<tr><th>Vorname</th><th>Nachname</th><th>Geburtsdatum</th><th>Stra&szlig;e</th><th>PLZ</th><th>Ort</th><th>Besuchsjahr</th><th class='noprint'>Bearbeiten</th><tr>";
//Führt den Inhalt der While Schleife für jede Zeile aus
	while ($zeile = mysqli_fetch_array($db_erg))
	{
	echo "<tr><td>".$zeile['Vorname']."</td>
		<td><a href='./abfrage_bewertung.php?id=".$zeile['Schueler_ID']."'>".$zeile['Nachname']."</a></td>
		<td>".$zeile['Geburtsdatum']."</td>
		<td>".$zeile['Strasse']."</td>
		<td>".$zeile['PLZ']."</td>
		<td>".$zeile['Ort']."</td>
		<td>".$zeile['Besuchsjahr']."</td>
		<td class='noprint'><form action='./schueler.php' method='POST'>
		<input type='hidden' name='ID' value='".$zeile['Schueler_ID']."'>
		<input type='hidden' name='Vorname' value='".$zeile['Vorname']."'>
		<input type='hidden' name='Nachname' value='".$zeile['Nachname']."'>
		<input type='hidden' name='Geburtsdatum' value='".$zeile['Geburtsdatum']."'>
		<input type='hidden' name='Strasse' value='".$zeile['Strasse']."'>
		<input type='hidden' name='PLZ' value='".$zeile['PLZ']."'>
		<input type='hidden' name='Ort' value='".$zeile['Ort']."'>
		<input type='hidden' name='Besuchsjahr' value='".$zeile['Besuchsjahr']."'>
		<input width='100' type='submit' value='Bearbeiten \n".$zeile['Vorname']." ".$zeile['Nachname']."' alt='Bearbeiten ".$zeile['Vorname']." ".$zeile['Nachname']."'>
		</form></td></tr>";}
?>
<form>
<script type="text/javascript" src="./js/drucken.js"></script>
<input type="button" value= "drucken" onClick="javascript:SeiteDrucken()">
</center>
</body>
</html>