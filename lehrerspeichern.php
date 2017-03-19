<html>
<head>
</head>
<body>
<?php
require_once('./scripte/datenbank.php');
require_once('./login/funktions.php');
$vorname = $_POST['vorname'];
$nachname = $_POST['Nachname'];
$Benutzername = $_POST['Benutzername'];
$pword = $_POST['pword'];
$pword2 = $_POST['pword2'];
if ($pword != $pword2) {
	echo "Password stimmt nicht überein";
	exit();}
if (isset($_POST['rschuel'])) {
	$rschuel = 1;}
else {
	$rschuel = 0;}
if (isset($_POST['rlehrer'])) {
	$rlehrer = 1;}
else {
	$rlehrer = 0;}
if (isset($_POST['ID']))
{
	$sql = "UPDATE lehrer SET Vorname='$vorname', Nachname='$nachname', Benutzername='$Benutzername',
			rschuel='$rschuel', rlehrer='$rlehrer' WHERE LehrerID='".$_POST['ID']."'";
	mysqli_query( $db_link, $sql );
	}
else {
	$sql = "SELECT count(Benutzername) as anzahl FROM lehrer WHERE `Benutzername`='".$Benutzername."'";
	$db_erg = mysqli_query( $db_link, $sql );
	while ($zeile = mysqli_fetch_array($db_erg))
	{
		if ($zeile['anzahl'] == 0) {
			$hash = password_hash($pword, PASSWORD_DEFAULT);
			$sql = "INSERT INTO lehrer (`Vorname`, `Nachname`, `Benutzername`, `pword`,
				`rschuel`, `rlehrer`)
				VALUES('".$vorname."', '".$nachname."', '".$Benutzername."', '".$hash."', '".$rschuel."', '".$rlehrer."');";
			mysqli_query($db_link, $sql) or die("Ein Fehler beim Schreiben in die Datenbank ist aufgeträten: " . mysql_error());
		}
		else
		{
			echo "Ein Benutzer mit dem gleichen Benutzernamen existiert schon";
		}
	}
}
?>
</body>
</html>