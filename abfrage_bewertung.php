<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/table.css" media="screen">
<link rel="stylesheet" type="text/css" href="./css/print.css" media="print">
<title>Bewertung</title>
</head>
<body>
<center>
<?php
//Dateien werden geladen
require_once('./scripte/datenbank.php');
require_once('./login/auth.php');
//Prüft ob die id übergeben wurde
if (!isset($_GET['id'])) {
	//Wenn nicht wird die Meldung Kein Schüler ausgewählt
	echo "Kein Sch&uuml;ler ausgew&auml;lt";
	exit();
}
//SQL Befehl um die Daten des Schülers anzuzeigen
$sql = "SELECT * FROM schueler where Schueler_ID='".$_GET['id']."'";
//SQL Befehl wird ausgeführt und in db_erg gespeichert
$db_erg = mysqli_query( $db_link, $sql );
//Jede Zeile von db_erg wird einzelnd ausgeführt
while ($zeile = mysqli_fetch_array($db_erg))
	{
	//Der Vorname und Nachname des Schülers werden angezeigt
	echo"<h1>$zeile[Vorname] $zeile[Nachname]</h1>";
	}
echo '<form>
<script type="text/javascript" src="./js/drucken.js"></script>
<input type="button" value= "drucken" onClick="javascript:SeiteDrucken()">
</form>';
echo "<br><table border>
	<tr><th>Lehrer</th><th>Kommentar</th><th class='noprint'>Bearbeiten</th></tr>";
$sql = "SELECT * FROM bewertung b join lehrer l on b.Lehrer_ID=l.LehrerID where b.Schueler_ID='".$_GET['id']."'";
//SQL Befehl wird ausgeführt und in db_erg gespeichert
$db_erg = mysqli_query( $db_link, $sql );
while ($zeile = mysqli_fetch_array($db_erg)) {
	echo "<tr><td>".$zeile['Vorname']." ".$zeile['Nachname']."</td>
	<td>".$zeile['Kommentar']."</td><td class='noprint'><form action='./bewertung.php' method='POST'>
	<input type='hidden' name='ID' value='".$zeile['BewertungID']."'>
	<input type='hidden' name='LID' value='".$zeile['Lehrer_ID']."'>
	<input type='hidden' name='SID' value='".$zeile['Schueler_ID']."'>
	<input type='hidden' name='Interresse' value='".$zeile['Interesse']."'>
	<input type='hidden' name='Lernfaehigkeit' value='".$zeile['Lernfaehigkeit']."'>
	<input type='hidden' name='Motivation' value='".$zeile['Genauigkeit']."'>
	<input type='hidden' name='Genauigkeit' value='".$zeile['Genauigkeit']."'>
	<input type='hidden' name='Ausdauer' value='".$zeile['Ausdauer']."'>
	<input type='hidden' name='Puenktlichkeit' value='".$zeile['Puenktlichkeit']."'>
	<input type='hidden' name='Belastbarkeit' value='".$zeile['Belastbarkeit']."'>
	<input type='hidden' name='Arbeitstempo' value='".$zeile['Arbeitstempo']."'>
	<input type='hidden' name='Folgsamkeit' value='".$zeile['Folgsamkeit']."'>
	<input type='hidden' name='Geschicklichkeit' value='".$zeile['Geschicklichkeit']."'>
	<input type='hidden' name='Leistungsbereitschaft' value='".$zeile['Leistungsbereitschaft']."'>
	<input type='hidden' name='Gewissenhaftigkeit' value='".$zeile['Gewissenhaftigkeit']."'>
	<input type='hidden' name='Auffassungsgabe' value='".$zeile['Auffassungsgabe']."'>
	<input type='hidden' name='Kommentar' value='".$zeile['Kommentar']."'>
	<input type='submit' name='' value='Bearbeiten ".$zeile['Vorname']." ".$zeile['Nachname']."'>
	</form></td></tr>";
}
echo "</table> ";
?>
<script type="text/javascript">
function toggle() {
	if (document.getElementById('buttontoggle').value == "Barrierefrei ansicht") {
		document.getElementById('myframe').src = "./Barrierefrei.php?id=<?php echo $_GET['id'];?>";
		document.getElementById('buttontoggle').value = "Diagramm"
	}
	else {
		document.getElementById('myframe').src = "./Diagram.php?id=<?php echo $_GET['id'];?>";
		document.getElementById('buttontoggle').value = "Barrierefrei ansicht"
	}
}
</script>
<form>
<input id="buttontoggle" type="button" onclick="toggle()" value="Barrierefrei ansicht">
<iframe id="myframe" frameborder="0" height="900" width="100%" src="./Diagram.php?id=<?php echo $_GET['id'];?>"></iframe>
</form>
</center>
</body>
</html>