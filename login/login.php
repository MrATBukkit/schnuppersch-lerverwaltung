<?php
//Die Datei funktions.php wird geladen in dieser werden die Funktionen password_hash und password_verify nachgebaut wenn sie noch nicht existieren.
require_once('funktions.php');
//Die Datei datenbank.php wird geladen dort werden die Datenbanken erstellte wenn sie nicht existieren und außerdem Verbindet man sich mit dieser Datei mit der Datenbank
require_once('../scripte/datenbank.php');
//Die Session wird gestartet um den Browser Daten länger merken zu lassen.
session_start();
//Variable hash wird erstellt
$hash='';
//Prüft ob ein Benutzername zugewiesen worden ist und weißt es der Variabel benutzername zu
if (isset($_POST['username'])) {
	$benutzername = $_POST['username'];
}
//Wenn nicht wird man zurück zum Login Formular geleitet und ihr wird Kein Benutzer angegeben übergeben
else {
	header('Location: '.$uri.'./loginf.php?message=Kein%20Benutzername%20angegeben');
	exit();
}
//Prüft ob ein Benutzername zugewiesen worden ist und weißt es der Variable password zu
if (isset($_POST['password'])) {
	$password = $_POST['password'];
}
//Wenn nicht wird man zurück zum Login Formular geleitet und ihr wird Kein Password angegeben
else {
	header('Location: '.$uri.'./loginf.php?message=Kein%20Password');
	exit();
}
//SQL Abfrage es wird alles Abgefragt wo der angegeben Benutzername übereinstimmt.
$sql = "SELECT * FROM lehrer WHERE Benutzername='".$benutzername."';";
//Sql Befehl wird ausgeführt und das Ergebniss wird in db_erg gespeichert
$db_erg = mysqli_query( $db_link, $sql );
//Prüft ob Die SQL-Abfrage überhaupt ein Ergebnis liefert wenn nicht wird wieder ein Fehler ausgegeben
if (!$db_erg) {
	header('Location: '.$uri.'./loginf.php?message=Benutzername%20oder%20Kennwort%20ist%20falsch');
	exit();
}
//
while ($zeile = mysqli_fetch_array($db_erg))
{
	//Das Passwort wird in die hash variable gelegt
	$hash = $zeile['pword'];
	//Die LehrerID wird in die lehrerid variable gespeichert
	$lehrerid = $zeile['LehrerID'];
}
//Prüft ob das eingebe Password mit dem hash in der Datenbank übereinstimmt
if (password_verify($password, $hash)) {
	//Man bestimmt die Session eingeloggt und weißt ihr true zu
	$_SESSION['eingeloggt'] = true;
	//Der Benutzername wird in Session username gespeichert
	$_SESSION['username'] = $benutzername;
	//Die LehrerID wird in die Variable Session LehrerID
	$_SESSION['lehrerid'] = $lehrerid;
	//Man wird auf die Startseite geleitet
	//header('Location: '.$uri.'/Schnupperverwaltung/start.html');
	echo "<script>if(parent!=self)parent.location.reload();</script>";
}
//Wenn das Password nicht stimmt wird ein Fehelr angezeigt
else
{
	header('Location: '.$uri.'./loginf.php?message=Benutzername%20oder%20Kennwort%20ist%20falsch');
	exit();
}
?>