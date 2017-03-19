<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/table.css" media="screen">
<link rel="stylesheet" type="text/css" href="./css/print.css" media="print">
<title> Alle Lehrer </title>
</head>
<body>
<center><H1>Lehrer</h1></center>
<?php
require_once('./scripte/datenbank.php');
require_once('./login/auth.php');
$sql = "SELECT * FROM lehrer";
$db_erg = mysqli_query( $db_link, $sql );
echo "<table border>
	<tr><th>Vorname</th><th>Nachname</th><th>Benutzername</th><th class='noprint'>Bearbeiten</th><tr>";
while ($zeile = mysqli_fetch_array($db_erg))
	{
	echo"<tr><td>$zeile[Vorname]</td>
		<td>$zeile[Nachname]</td>
		<td>$zeile[Benutzername]</td>
		<td class='noprint'><form action='./lehrer.php' method='POST'>
		<input type='hidden' name='ID' value='".$zeile['LehrerID']."'>
		<input type='hidden' name='Vorname' value='".$zeile['Vorname']."'>
		<input type='hidden' name='Nachname' value='".$zeile['Nachname']."'>
		<input type='hidden' name='rschuel' value='".$zeile['rschuel']."'>
		<input type='hidden' name='rlehrer' value='".$zeile['rlehrer']."'>
		<input type='hidden' name='username' value='".$zeile['Benutzername']."'>
		<input width='100' type='submit' value='Bearbeiten \n".$zeile['Vorname']." ".$zeile['Nachname']."' alt='Bearbeiten ".$zeile['Vorname']." ".$zeile['Nachname']."'>
		</form></td></tr>";
	}
?>
<form>
<script type="text/javascript" src="./js/drucken.js"></script>
<input type="button" value= "drucken" onClick="javascript:SeiteDrucken()">
</center>
</form>
</body>
</html>