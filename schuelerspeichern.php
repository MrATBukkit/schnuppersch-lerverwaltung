<html>
<head>
</head>
<body>
<?php
require_once('./scripte/datenbank.php');
//Variablen einlesen

$vorname = $_POST['vorname'];
$nachname = $_POST['Nachname'];
$Geburtsdatum = $_POST['Geburtsdatum'];
$Geburtsdatum = explode(".", $Geburtsdatum);
$Geburtsdatum = $Geburtsdatum[2]."-".$Geburtsdatum[1]."-".$Geburtsdatum[0];
$Strasse = $_POST['Strasse'];
$PLZ = $_POST['PLZ'];
$Ort = $_POST['Ort'];
$Besuchsjahr = $_POST['Besuchsjahr'];
if (isset($_POST['ID'])) {
	$sql = "UPDATE schueler SET Vorname='$vorname', Nachname='$nachname', Geburtsdatum='$Geburtsdatum',
			Strasse='$Strasse', PLZ='$PLZ', Ort='$Ort', Besuchsjahr='$Besuchsjahr' WHERE Schueler_ID='".$_POST['ID']."'";
	mysqli_query($db_link, $sql) or die("Ein Fehler beim Schreiben in die Datenbank ist aufgeträten: " . mysql_error());
}
else {
	//SQL Befehl zum einfügen eines Datensatzes
	$sql = "INSERT INTO schueler (`Vorname`, `Nachname`, `Geburtsdatum`, `Strasse`,
			`PLZ`, `Ort`, `Besuchsjahr`)
			VALUES('".$vorname."', '".$nachname."', '".$Geburtsdatum."', '".$Strasse."', '".$PLZ."', '".$Ort."', '".$Besuchsjahr."');";
	//SQL Befehl wird ausgeführt
	mysqli_query($db_link, $sql) or die("Ein Fehler beim Schreiben in die Datenbank ist aufgeträten: " . mysql_error());}
//Weiterleitung auf die Start seite
header('Location: '.$uri.'./start.html');
?>
</body>
</html>