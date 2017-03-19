<?php
//Lädt die Konvig Datei
require_once('konvig.php');
//Speichert den Mysqli_connect Befehl in eien Variable
$db_link = mysqli_connect(MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT);
//Zeichensatz wird auf UTF8 gesetzt
mysqli_set_charset($db_link, 'utf8');
//Datenbank wird erstelllt
$sql = 'CREATE DATABASE IF NOT EXISTS '.MYSQL_DATENBANK;
//Verbindung mit der SQL Server und der obere SQL befehl wird ausgeführt
mysqli_query($db_link, $sql) or die("Schreiben der Datenbank fehlgeschlagen: " . mysql_error());
//Speichert den Mysqli_connect Befehl in eien Variable
$db_link = mysqli_connect(MYSQL_HOST, MYSQL_BENUTZER, MYSQL_KENNWORT, MYSQL_DATENBANK);
//Tabelle Bewertung wird erstellt
$sql = "create table IF NOT EXISTS
		bewertung(BewertungID int(6) AUTO_INCREMENT,
		Schueler_ID int(6),
		Lehrer_ID int(5),
		Interesse int(1),
		Lernfaehigkeit int(1),
		Motivation int(1),
		Genauigkeit int(1),
		Ausdauer int(1),
		Puenktlichkeit int(1),
		Belastbarkeit int(1),
		Arbeitstempo int(1),
		Folgsamkeit int(1),
		Geschicklichkeit int (1),
		Leistungsbereitschaft int(1),
		Gewissenhaftigkeit int(1),
		Auffassungsgabe int(1),
		Kommentar text,
		datum timestamp,
		PRIMARY KEY (`BewertungID`))";
//Verbindung mit der SQL Server und der obere SQL befehl wird ausgeführt
mysqli_query($db_link, $sql) or die("Schreiben der Tabelle fehlgeschlagen: " . mysql_error());
//Tabelle Lehrer wird erstellt
$sql = "create table if not exists
		lehrer (LehrerID int(6) AUTO_INCREMENT PRIMARY KEY,
		Vorname varchar(20),
		Nachname varchar(20),
		Benutzername varchar(20),
		pword varchar(200),
		rschuel bool,
		rlehrer bool);";
//Verbindung mit der SQL Server und der obere SQL befehl wird ausgeführt
mysqli_query($db_link, $sql) or die("Schreiben der Tabelle fehlgeschlagen: " . mysql_error());
//Tabelle Schueler wird erstellt
$sql = "create table if not exists
		schueler (Schueler_ID int(5) AUTO_INCREMENT primary key,
		Vorname varchar(20),
		Nachname varchar(20),
		Geburtsdatum date,
		Strasse varchar(30),
		PLZ int(5),
		Ort varchar(10),
		Besuchsjahr varchar(10));";
//Verbindung mit der SQL Server und der obere SQL befehl wird ausgeführt
mysqli_query($db_link, $sql) or die("Schreiben der Tabelle fehlgeschlagen: " . mysql_error());
$sql = "SELECT count(Benutzername) as anzahl FROM lehrer WHERE `Benutzername`='root'";
//Sql Befehl wird ausgeführt und das Ergebniss wird in db_erg gespeichert
$db_erg = mysqli_query( $db_link, $sql );
//Prüft ob Die SQL-Abfrage überhaupt ein Ergebnis liefert wenn nicht wird wieder ein Fehler ausgegeben
while ($zeile = mysqli_fetch_array($db_erg))
{
	if ($zeile['anzahl'] == 0) {
		$sql = "INSERT INTO lehrer (`Vorname`, `Nachname`, `Benutzername`, `pword`, `rschuel`, `rlehrer`) VALUES ('Master', 'User', 'root', '".root_Default_password_hash."', '1', '1')";
		mysqli_query($db_link, $sql) or die("Schreiben der Tabelle fehlgeschlagen: " . mysql_error());
	}
}
//mysqli_query($db_link, $sql) or die("Schreiben des Datensatzes Fehlgeschlagen" . mysql_error());
?>