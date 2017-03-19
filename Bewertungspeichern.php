<?php
require_once('./scripte/datenbank.php');
$Schüler = $_POST['Schueler'];
$Lehrer = $_POST['Lehrer'];
$Interesse = $_POST['Interesse'];
$Lernfähigkeit = $_POST['Lernfaehigkeit'];
$Motivation = $_POST['Motivation'];
$Genauigkeit = $_POST['Genauigkeit'];
$Ausdauer = $_POST['Ausdauer'];
$Puenktlichkeit = $_POST['Puenktlichkeit'];
$Belastbarkeit = $_POST['Belastbarkeit'];
$Arbeitstempo = $_POST['Arbeitstempo'];
$Folgsamkeit = $_POST['Folgsamkeit'];
$Geschicklichkeit = $_POST['Geschicklichkeit'];
$Leistungsbereitschaft = $_POST['Leistungsbereitschaft'];
$Gewissenhaftigkeit = $_POST['Gewissenhaftigkeit'];
$Auffasungsgabe = $_POST['Auffasungsgabe'];
$Kommentar = $_POST['Kommentar'];

$sql = "SELECT COUNT('Lehrer_ID') as zahl FROM bewertung WHERE (Lehrer_ID='".$Lehrer."' and Schueler_ID='".$Schüler."');";
//Sql Befehl wird ausgeführt und das Ergebniss wird in db_erg gespeichert
$db_erg = mysqli_query( $db_link, $sql );
if (isset($_POST['ID'])) {
	$sql = "UPDATE bewertung SET Interesse='$Interesse',
			Lernfaehigkeit='$Lernfähigkeit', Motivation='$Motivation',
			Genauigkeit='$Genauigkeit', Ausdauer='$Ausdauer', Puenktlichkeit='$Puenktlichkeit',
			Belastbarkeit='$Belastbarkeit', Arbeitstempo='$Arbeitstempo', Folgsamkeit='$Folgsamkeit',
			Geschicklichkeit='$Geschicklichkeit', Auffassungsgabe='$Auffasungsgabe', Kommentar='$Kommentar',
			Gewissenhaftigkeit='$Gewissenhaftigkeit', Leistungsbereitschaft='$Leistungsbereitschaft' 
			WHERE BewertungID='".$_POST['ID']."'";
	mysqli_query( $db_link, $sql ) or die("Ein Fehler beim Schreiben in die Datenbank ist aufgeträten: " . mysql_error());
	//header('Location: '.$uri.'/Schnupperverwaltung/abfrage_bewertung.php?id='.$_POST['SID']);
}
else {
	while ($zeile = mysqli_fetch_array($db_erg))
	{
		if ($zeile['zahl'] != 0) {
			echo "<h1>Sie haben diesen Sch&uuml;ler schon bewertet</h1>";
			exit();
		}
	}
	$sql = "INSERT INTO bewertung (`Schueler_ID`,`Lehrer_ID`,`Interesse`, `Lernfaehigkeit`, `Motivation`, `Genauigkeit`,
			`Ausdauer`, `Puenktlichkeit`, `Belastbarkeit`, `Arbeitstempo`, `Folgsamkeit`, `Geschicklichkeit`, `Leistungsbereitschaft`,
			`Gewissenhaftigkeit`, `Auffassungsgabe`, `Kommentar`)
			VALUES('".$Schüler."', '".$Lehrer."', '".$Interesse."', '".$Lernfähigkeit."', '".$Motivation."', '".$Genauigkeit."', '".$Ausdauer."', '".$Puenktlichkeit."',
			'".$Belastbarkeit."', '".$Arbeitstempo."', '".$Folgsamkeit."', '".$Geschicklichkeit."', '".$Leistungsbereitschaft."',
			'".$Gewissenhaftigkeit."', '".$Auffasungsgabe."', '".$Kommentar."');";
	mysqli_query($db_link, $sql) or die("Ein Fehler beim Schreiben in die Datenbank ist aufgeträten: " . mysql_error());
	//header('Location: '.$uri.'/Schnupperverwaltung/abfrage_bewertung.php?id='.$Schüler);
}
header('Location: '.$uri.'/Schnupperverwaltung/abfrage_bewertung.php?id='.$Schüler);
?>