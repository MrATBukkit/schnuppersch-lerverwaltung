<html> 
<head><!--Ist der Kopf der Seite-->
<title>Schüler</title><!--Ist der Titel der Seite-->
</head><!--Schließt den Kopf der Seite-->
<body><!--Ist der Körper der Seite wo der Inhalt hinein kommt-->
<h1>Schüler Anlegen</h1><!--Ist der Überschrift der Seite-->
<?php
require_once('./login/auth.php');
if (!$rschueler) {
	echo "<h2>Keine Rechte</h2>";
	exit();}
?>
<p><!--Legt einen Absatz an-->
</p><!--Schließt immer den gegebenen Tag oder Befehl-->
<form action="schuelerspeichern.php" method="POST" name="schueler" id="schueler">
<table border="1"><!--Legt eine Tabelle an und Stellt den Rahmen mit 1 pixel dar-->
<tr bgcolor="#FF3E03"><!--Färb die Zeile der Tabelle-->
<td colspan="2" align="center">Schüler</td><!--Verbindet die 2 Spalten und gibt die Schüler zentriert aus-->
</tr>
<tr bgcolor="#F1F900"><!--Färb die Zeile der Tabelle-->
<td>Vorname</td><!--Schreibt in die Zelle Vorname hinein-->
<td bgcolor="#F1F900"><input type="text" name="vorname" id="Vorname" size="25" value='<?php if (isset($_POST['Vorname'])) {echo $_POST['Vorname'];} ?>'></td><!--Färbt die Zelle und fügt einen Textfeld hinen mit der göße von 25 damit man nur 25 Buchstaben hinein schreiben kann-->
</tr>
<tr>
<td bgcolor="#F1F900">Nachname</td>
<td bgcolor="#F1F900">
<input type="text" name="Nachname" id="Nachname" size="25" value='<?php if (isset($_POST['Nachname'])) {echo $_POST['Nachname'];} ?>'></td>
</tr>
<tr>
<td bgcolor="#F1F900">Geburtsdatum</td>
<td bgcolor="#F1F900">
<input type="text" name="Geburtsdatum" id="Geburtsdatum" size="10" value='<?php if (isset($_POST['Geburtsdatum'])) {
	$tmp = explode("-", $_POST['Geburtsdatum']);
	echo $tmp[2].".".$tmp[1].".".$tmp[0];
	} ?>'>
</td>
</tr>
<tr>
<td bgcolor="#F1F900">Straße</td>
<td bgcolor="#F1F900"><input type="text" name="Strasse" id="Strasse" size="25" value='<?php if (isset($_POST['Strasse'])) {echo $_POST['Strasse'];} ?>'></td>
</tr>
<tr>
<td bgcolor="#F1F900">PLZ</td>
<td bgcolor="#F1F900"><input type="Zahl" name="PLZ" size="4" id="PLZ" maxlength="4" value='<?php if (isset($_POST['PLZ'])) {echo $_POST['PLZ'];} ?>'></td>
</tr>
<tr>
<td bgcolor="#F1F900">Ort</td>
<td bgcolor="#F1F900"><input type="text" name="Ort" id="Ort" size="25" value='<?php if (isset($_POST['Ort'])) {echo $_POST['Ort'];} ?>'></td>
</tr>
<tr>
<td bgcolor="#F1F900">Besuchsjahr</td>
<td bgcolor="#F1F900"><select name="Besuchsjahr"><!--Select ist ein Feld um die Besuchsjahren auswählen zu können-->
<?php
if (isset($_POST['Besuchsjahr']))
{
	$jahr = substr($_POST['Besuchsjahr'], 0, 4);
	for ( $i = ($jahr-2); $i < ($jahr+3); $i++) {
		$zweistell = ($i+1)%100;
		$bjahr = $i ."/". $zweistell;
		if ($i == $jahr) {
			echo "<option value='$bjahr' selected>$bjahr</option>";
		}
		else
		{
			echo "<option value='$bjahr'>$bjahr</option>";
		}
	}
}
else
{
	for ( $i = date("Y")-1; $i < date("Y")+2; $i++) {
		$zweistell = ($i+1)%100;
		$bjahr = $i."/".$zweistell;
		echo "<option value='$bjahr'>$bjahr</option>";
	}
}
?>
</select>
</td>
</tr>
</table><!--Schließt die Tabelle-->
<?php if (isset($_POST['ID'])) {echo "<input name='ID' type='hidden' value='".$_POST['ID']."'>";} ?>
<script type="text/javascript" src="/Schnupperverwaltung/js/Datum.js"></script>
<input type="button" value="Senden" name="senden" onclick="formularsenden()"><!--Schalter für das senden der geschriebenen Daten-->
<!--Ladet die Datei mit der Funktion des Datums-->
</form>
</body>
</html>